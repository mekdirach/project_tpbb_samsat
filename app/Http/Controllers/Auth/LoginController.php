<?php

namespace App\Http\Controllers\Auth;

use App\Models\SysRole;
use Illuminate\Http\Request;
use App\Services\UimServices;
use App\Models\SysApplication;
use App\Http\Controllers\Controller;
use Illuminate\Encryption\Encrypter;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
            "username" => "required",
            "password" => "required"
            ],
            [
            "username.required" => "Username tidak boleh kosong",
            "password.required" => "Password tidak boleh kosong"
            ]
        );

        if($validator->fails()){
            return back()->with([
                'message'       => $validator->errors()->first(),
                'alert-type'    => 'danger'
            ]);
        }

        $encrypter  = new Encrypter(Config::get('app.uim_encrypter'), Config::get('app.uim_string_encrypter'));

        $data       = [
            "userId"    => $request->username,
            "password"  => $encrypter->encrypt($request->password),
            // "password"  => $request->password,
            "appId"     => Config::get('app.uim_app_id'),
            "isEncrypted" => true
        ];
        $result = sendAPIUim($data);
	//dd($result);
        if($result->statusCode == '200'){
            if($result->data){
                $response       = $result->data;
                $role           = SysRole::where('id_fungsi', $response->idFungsi)->first();
                if($role){
                    // $applications = SysApplication::getAccessMenu($role->id, 1);
                    // $applications = collect($applications)->sortBy('order')->toArray();
                    // dd($applications);

                    if($role->permissions){
                        $permissions = [];
                        foreach($role->permissions as $rPermission){
                            $row = [
                                'id'                => $rPermission->id,
                                'role_id'           => $rPermission->role_id,
                                'application_id'    => $rPermission->application_id,
                                'permission_id'     => $rPermission->permission_id,
                                'isactive'          => $rPermission->isactive,
                            ];
                            array_push($permissions, $row);
                        }
                    }
                    Session::put([
                        'status' => 200,
                        'description' => $response->nama .' berhasil login!',
                        'user' => $response,
                        'role' => $role,
                        // 'menus' => $applications,
                        'permissions' => $permissions
                    ]);
                    if($response->kodeCabang != '0'){
                        $route      = 'landing-page';
                        $message    = '<b>Selamat datang '. session('user')->nama .'</b>';
                    }else{
                        $route      = 'landing-page';
                        if($role->id == 1){
                            $message    = 'System: '. $response->nama .' berhasil login!';
                        }else{
                            $message    = 'User Pusat: '. $response->nama .' berhasil login!';
                        }
                    }
                    $alert      = 'success';
                }else{
                    $route      = 'login';
                    $message    = 'Gagal login, User tersebut tidak memiliki role yang terdaftar!';
                    $alert      = 'danger';
                }
            }else{
                $route      = 'login';
                $message    = 'Gagal login, User tersebut tidak ditemukan!';
                $alert      = 'danger';
            }
        }else{
            $route      = 'login';
            $message    = 'User Tidak Ditemukan';
            $alert      = 'danger';
        }
        return redirect()->route($route)->with([
            'message'       => $message,
            'alert-type'    => $alert
        ]);
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect()->route('login')->with([
            'message'       => 'Berhasil logout',
            'alert-type'    => 'success'
        ]);
    }

    public function getMenu(Request $request) {
        $applications = SysApplication::getAccessMenu(session('role')->id, 1, $request->menu);
        $applications = collect($applications)->sortBy('order')->toArray();

        if ($request->menu == 'p') {
            $request->session()->put('navs', 'T - Pajak');
        } else {
            $request->session()->put('navs', 'T - Samsat');
        }
        // dd(session('navs'));
        $request->session()->put('menus', $applications);
        return redirect()->route($request->route);
    }
}
