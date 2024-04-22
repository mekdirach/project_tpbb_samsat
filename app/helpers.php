<?php

use App\Models\ClUserActivityModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use App\QueryService\Facades\QueryServiceFacades as QS;
use Illuminate\Support\Facades\Log;
use HisOrange\BrowserDetect\Facade as Browser;
// use HisOrange\BrowserDetect\Provider\BrowserDetectService;
// use hisorange\BrowserDetect\Facade as Browser;


//use HisOrange\BrowserDetect\Parser as Browser;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use App\Models\SysRolePermission;
use App\Models\SysApplication;
use App\Models\UserActivity;
use Illuminate\Support\Facades\Crypt;

if (!function_exists('getRupiah')) {
    // Penggunaan: rupiah(2500000); return: "Rp2.500.000", dengan pembulatan, tanpa desimal
    // Jika parameter $satuan bernilai true, simbol 'Rp' ditambahkan di depan $nominal
    function getRupiah($nominal, $satuan = true, $kurungNegatif = false)
    {
        if (!is_numeric($nominal)) {
            return ($satuan ? 'Rp ' : '') . '0';
        }

        if ($nominal < 0) {
            if ($kurungNegatif) {
                return '(' . ($satuan ? 'Rp ' : '') . number_format(abs(floor($nominal)), 0, ',', '.') . ')';
            }
            return ($satuan ? '-Rp ' : '-') . number_format(abs(floor($nominal)), 0, ',', '.');
        }
        return ($satuan ? 'Rp ' : '') . number_format(ceil($nominal), 0, ',', '.');
    }
}

if (!function_exists('indonesiaMonths')) {
    function indonesiaMonths()
    {
        return array(
            ['value' => 1, 'label' => 'Januari'],
            ['value' => 2, 'label' => 'Februari'],
            ['value' => 3, 'label' => 'Maret'],
            ['value' => 4, 'label' => 'April'],
            ['value' => 5, 'label' => 'Mei'],
            ['value' => 6, 'label' => 'Juni'],
            ['value' => 7, 'label' => 'Juli'],
            ['value' => 8, 'label' => 'Agustus'],
            ['value' => 9, 'label' => 'September'],
            ['value' => 10, 'label' => 'Oktober'],
            ['value' => 11, 'label' => 'November'],
            ['value' => 12, 'label' => 'Desember'],
        );
    }
}

if (!function_exists('getindonesiaMonthText')) {
    function getindonesiaMonthText($monthNumber)
    {
        $listMonth     = indonesiaMonths();
        $filteredMonth = array_reduce($listMonth, function ($carry, $item) use ($monthNumber) {
            if ($item['value'] == $monthNumber)
                $carry = $item;
            return $carry;
        }, []);
        return $filteredMonth['label'];
    }
}

if (!function_exists('storeCache')) {
    function storeCache($key, $value, $exp = '')
    {
        if ($exp != '') {
            $exp = now()->addMinutes($exp);
        } else {
            // 10 menit;
            $exp = now()->addMinutes(1440);
        }
        if (Cache::has($key)) {
            Cache::put($key, $value, $exp);
        } else {
            Cache::add($key, $value, $exp);
        }
        return Cache::get($key);
    }
}

if (!function_exists('getCache')) {
    function getCache($key)
    {
        return Cache::get($key);
    }
}

function getDummyUim($data)
{
    $username = $data['userId'];
    //0022
    $H479 = [
        "nama" => "AYUNINGTYAS DWI UTAMI",
        "nip" => null,
        "userId" => "H479",
        "kodeCabang" => "0114",
        "namaCabang" => "SUKAJADI",
        "kodeInduk" => "0114",
        "namaInduk" => "SUKAJADI",
        "kodeKanwil" => "1111",
        "namaKanwil" => "KANTOR WILAYAH 1",
        "jabatan" => "Customer Service",
        "email" => "aautami@BANKBJB.CO.ID",
        "idFungsi" => "3367",
        "namaFungsi" => "CS",
        "kodePenempatan" => "0114",
        "namaPenempatan" => "SUKAJADI",
        "id" => "11290"
    ];

    $Y136 = [
        "nama" => "KETY KUSMAWATI",
        "nip" => "12.89.3537",
        "userId" => "Y136",
        "kodeCabang" => "D440",
        "namaCabang" => "DIVISI INFORMATION TECHNOLOGY",
        "kodeInduk" => "D440",
        "namaInduk" => "DIVISI INFORMATION TECHNOLOGY",
        "kodeKanwil" => "0000",
        "namaKanwil" => "Kantor Pusat",
        "jabatan" => "Staf Business Analyst Corporate Services",
        "email" => "kkusmawati@BANKBJB.CO.ID",
        "idFungsi" => "3370",
        "namaFungsi" => "Divisi IT",
        "kodePenempatan" => "D440",
        "namaPenempatan" => "DIVISI INFORMATION TECHNOLOGY",
        "id" => "16118"
    ];

    $J570 = [
        "nama" => "KIRARA RIZKIANA DENEVA",
        "nip" => "16.92.0118",
        "userId" => "J570",
        "kodeCabang" => "D156",
        "namaCabang" => "DIVISI DANA & JASA KONSUMER",
        "kodeInduk" => "D156",
        "namaInduk" => "DIVISI DANA & JASA KONSUMER",
        "kodeKanwil" => "0000",
        "namaKanwil" => "Kantor Pusat",
        "jabatan" => "Staf Business Support - Dana Jasa Konsumer",
        "email" => "kdeneva@BANKBJB.CO.ID",
        "idFungsi" => "3372",
        "namaFungsi" => "Maker DJK",
        "kodePenempatan" => "D156",
        "namaPenempatan" => "DIVISI DANA & JASA KONSUMER",
        "id" => "15113"
    ];

    $user = [
        'H479' => $H479,
        'Y136' => $Y136,
        'J570' => $J570,
    ];

    $res = [
        'statusCode' => isset($user[$username]) ? '200' : 'rc-dummy-gagal',
        'message' => isset($user[$username]) ? 'Sukses' : 'Gagal',
        'data' => isset($user[$username]) ? $user[$username] : '',
    ];
    return $res;
}

function sendAPIUim($data){
    if(Config::get('app.is_dummy_uim')){
        $res = getDummyUim($data);
        return json_decode(json_encode($res));
    }

    $api        = Config::get('app.url_api_uim');
    Log::info('UIM request API '.$api.' : '.json_encode($data));

    $response   = Http::withHeaders([
        'Content-Type' => 'application/json'
    ])->post($api, $data);
    $res = $response->json();

    Log::info('UIM response : '.$response);
    return json_decode(json_encode($res));
}

function sendAPI($data, $url, $timeOut = 120)
{
    $api        = Config::get('app.url_api') . $url;

    Log::info('DOWNLINE REQUEST '.$api.' : '.json_encode($data));

    $response   = Http::timeout($timeOut)->withHeaders([
        'Content-Type' => 'application/json'
    ])->post($api, $data);

    Log::info('DOWNLINE RESPONSE : '.$response);

    return json_decode($response);
}


function sendAPInov1($data, $url, $timeOut = 60)
{
    $api        = Config::get('app.url_api_no_v1') . $url;
    $response   = Http::timeout($timeOut)->withHeaders([
        'Content-Type' => 'application/json'
    ])->post($api, $data);

    return json_decode($response);
}


function generateRandomString($length)
{
    $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    return strtoupper(substr(str_shuffle(str_repeat($pool, 5)), 0, $length));
}

// function getPermissions($roleId, $method){
//     $applications       = SysApplication::where('isactive', true)->get();
//     $rolePermissions    = SysRolePermission::where('role_id', $roleId)->get();
//     $permissionResults  = [];
//     foreach($applications as $application){
//         foreach($application->rPermissions as $rPermission){
//             if($rPermission->role_id == $roleId){
//                 if($method == 'create'){
//                     if($rPermission->permission->description == $method){
//                         if($rPermission->isactive == true){
//                             $permissionResults[] = [
//                                 'id'                => $rPermission->id,
//                                 'application_name'  => $rPermission->application->name,
//                                 'application_slug'  => $rPermission->application->slug,
//                                 'parent_id'         => $rPermission->application->parent_id,
//                                 'create'            => true
//                             ];
//                         }else{
//                             $permissionResults[] = [
//                                 'id'                => $rPermission->id,
//                                 'application_name'  => $rPermission->application->name,
//                                 'application_slug'  => $rPermission->application->slug,
//                                 'parent_id'         => $rPermission->application->parent_id,
//                                 'create'            => false
//                             ];
//                         }
//                     }
//                 }
//                 if($method == 'read'){
//                     if($rPermission->permission->description == $method){
//                         if($rPermission->isactive == true){
//                             $permissionResults[] = [
//                                 'id'                => $rPermission->id,
//                                 'application_name'  => $rPermission->application->name,
//                                 'application_slug'  => $rPermission->application->slug,
//                                 'parent_id'         => $rPermission->application->parent_id,
//                                 'read'              => true
//                             ];
//                         }else{
//                             $permissionResults[] = [
//                                 'id'                => $rPermission->id,
//                                 'application_name'  => $rPermission->application->name,
//                                 'application_slug'  => $rPermission->application->slug,
//                                 'parent_id'         => $rPermission->application->parent_id,
//                                 'read'              => false
//                             ];
//                         }
//                     }
//                 }
//                 if($method == 'update'){
//                     if($rPermission->permission->description == $method){
//                         if($rPermission->isactive == true){
//                             $permissionResults[] = [
//                                 'id'                => $rPermission->id,
//                                 'application_name'  => $rPermission->application->name,
//                                 'application_slug'  => $rPermission->application->slug,
//                                 'parent_id'         => $rPermission->application->parent_id,
//                                 'update'            => true
//                             ];
//                         }else{
//                             $permissionResults[] = [
//                                 'id'                => $rPermission->id,
//                                 'application_name'  => $rPermission->application->name,
//                                 'application_slug'  => $rPermission->application->slug,
//                                 'parent_id'         => $rPermission->application->parent_id,
//                                 'update'            => false
//                             ];
//                         }
//                     }
//                 }
//                 if($method == 'delete'){
//                     if($rPermission->permission->description == $method){
//                         if($rPermission->isactive == true){
//                             $permissionResults[] = [
//                                 'id'                => $rPermission->id,
//                                 'application_name'  => $rPermission->application->name,
//                                 'application_slug'  => $rPermission->application->slug,
//                                 'parent_id'         => $rPermission->application->parent_id,
//                                 'delete'            => true
//                             ];
//                         }else{
//                             $permissionResults[] = [
//                                 'id'                => $rPermission->id,
//                                 'application_name'  => $rPermission->application->name,
//                                 'application_slug'  => $rPermission->application->slug,
//                                 'parent_id'         => $rPermission->application->parent_id,
//                                 'delete'            => false
//                             ];
//                         }
//                     }
//                 }
//                 if($method == 'approve'){
//                     if($rPermission->permission->description == $method){
//                         if($rPermission->isactive == true){
//                             $permissionResults[] = [
//                                 'id'                => $rPermission->id,
//                                 'application_name'  => $rPermission->application->name,
//                                 'application_slug'  => $rPermission->application->slug,
//                                 'parent_id'         => $rPermission->application->parent_id,
//                                 'approve'           => true
//                             ];
//                         }else{
//                             $permissionResults[] = [
//                                 'id'                => $rPermission->id,
//                                 'application_name'  => $rPermission->application->name,
//                                 'application_slug'  => $rPermission->application->slug,
//                                 'parent_id'         => $rPermission->application->parent_id,
//                                 'approve'           => false
//                             ];
//                         }
//                     }
//                 }
//                 if($method == 'export'){
//                     if($rPermission->permission->description == $method){
//                         if($rPermission->isactive == true){
//                             $permissionResults[] = [
//                                 'id'                => $rPermission->id,
//                                 'application_name'  => $rPermission->application->name,
//                                 'application_slug'  => $rPermission->application->slug,
//                                 'parent_id'         => $rPermission->application->parent_id,
//                                 'export'            => true
//                             ];
//                         }else{
//                             $permissionResults[] = [
//                                 'id'                => $rPermission->id,
//                                 'application_name'  => $rPermission->application->name,
//                                 'application_slug'  => $rPermission->application->slug,
//                                 'parent_id'         => $rPermission->application->parent_id,
//                                 'export'            => false
//                             ];
//                         }
//                     }
//                 }
//             }
//         }
//     }
//     return $permissionResults;
// }

function getRupiah($nominal, $satuan = true, $kurungNegatif = false)
{
    if (!is_numeric($nominal)) {
        return ($satuan ? 'Rp ' : '') . '0';
    }

    if ($nominal < 0) {
        if ($kurungNegatif) {
            return '(' . ($satuan ? 'Rp ' : '') . number_format(abs(floor($nominal)), 0, ',', '.') . ')';
        }
        return ($satuan ? '-Rp ' : '-') . number_format(abs(floor($nominal)), 0, ',', '.');
    }
    return ($satuan ? 'Rp ' : '') . number_format(ceil($nominal), 0, ',', '.');
}

function userActivities($action, $description, $table, $type, $route)
{
    // Mendapatkan informasi browser dari User-Agent header
    $userAgent = request()->header('User-Agent');

    // Mendeteksi browser berdasarkan User-Agent
    $browserName = "Unknown";
    if (strpos($userAgent, 'Firefox') !== false) {
        $browserName = 'Mozilla Firefox';
    } elseif (strpos($userAgent, 'OPR') !== false || strpos($userAgent, 'Opera') !== false) {
        $browserName = 'Opera';
    } elseif (strpos($userAgent, 'Chrome') !== false) {
        $browserName = 'Google Chrome';
    } elseif (strpos($userAgent, 'Safari') !== false) {
        $browserName = 'Apple Safari';
    } elseif (strpos($userAgent, 'MSIE') !== false || strpos($userAgent, 'Trident') !== false) {
        $browserName = 'Microsoft Internet Explorer';
    } elseif (strpos($userAgent, 'Edge') !== false) {
        $browserName = 'Microsoft Edge';
    }

    $record = new UserActivity();
    $record->cua_id         = generateRandomString(32);
    $record->cua_act        = $action;
	$record->cua_cate       = $description;
    $record->cua_desc       = substr($description . ' table ' . $table, 0, 255);
    $record->cua_status     = '0000';
    $record->cua_by_uid     = Session::get('user')->userId;
    $record->cua_dt         = date('Y-m-d H:i:s');
    $record->cua_session    = Session::get('_token');
    $record->cua_ip         = request()->ip();
    $record->cua_user_agen = $browserName;
    $record->cua_act_id     = $route;
    $record->cua_type       = $type;
    $record->branch_code    = Session::get('user')->kodeCabang;

    if ($record->save()) {
        $rc = 200;
        $message = 'Save log success...';
    } else {
        $rc = 400;
        $message = 'Save log failed...';
    }

    return response()->json([
        'rc'        => $rc,
        'message'   => $message
    ], $rc);
}

function getMonths()
{
    $months = [
        'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember',
    ];

    return $months;
}

/*-------------------
* development 2023
* -------------------
*/

function isUserPusat($value)
{
    //LSBU masih pakai isUserPusat
    $userPusat = [1280, 1788, 1787, 1789, 1785];
    $result = in_array($value, $userPusat);
    return $result;
}

function checkUserPusat(){
    return substr(Session::get('user')->kodeCabang,0,1) == 'D' || substr(Session::get('user')->kodeCabang,0,1) == 'd';
}

function isUserMaker($value)
{
    $idFungsiMaker = [1231];
    $result = in_array($value, $idFungsiMaker);
    return $result;
}

function checkUserMaker()
{
    return isUserMaker(session('role')->id_fungsi);
}

function getFormatDate($format, $val)
{
    $result = '';
    if (!empty($val)) {
        $result = date($format, strtotime($val));
    }
    return $result;
}

function getDateNow() {
    $date = date('dd');
    return $date;
}


function getPeriodeDateThisMonth()
{
    //sp_pc_period_date
    $dates = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"];
    $res = [];
    for ($i = 0; $i < date('t'); $i++) {
        $res[] = $dates[$i];
    }
    return $res;
}

function getPeriodeDateList()
{
    //sp_pc_period_date
    return ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25"];
}

function getPeriodeDateWithKeyList()
{
    //sp_pc_period_date
    return ["01" => "01", "02" => "02", "03" => "03", "04" => "04", "05" => "05", "06" => "06", "07" => "07", "08" => "08", "09" => "09", "10" => "10", "11" => "11", "12" => "12", "13" => "13", "14" => "14", "15" => "15", "16" => "16", "17" => "17", "18" => "18", "19" => "19", "20" => "20", "21" => "21", "22" => "22", "23" => "23", "24" => "24", "25" => "25"];
}

function getNotiFlagList()
{
    return [
        '0' => 'Tidak Aktif',
        '1' => 'SMS',
        //'2' => '',
        // '3' => 'Email',
        // '4' => 'SMS & Email',
    ];
}

function getNotiFlagLabelById($id)
{
    //sp_pc_notif_flag
    $list = getNotiFlagList();
    return isset($list[$id]) ? $list[$id] : '';
}

function getStatusDropdown()
{
    //berjangka dan simuda
    return [
        '1' => 'Aktif',
        '9' => 'Aktif Migrasi',
    ];
}

function getStatusRekActiveList()
{
    //sp_pc_status
    return ['1', '9'];
}

function getStatusList()
{
    //sp_pc_status
    return [
        '0' => 'Menunggu',
        '1' => 'Aktif',
        '2' => 'Tutup Normal',
        '3' => 'Mid-Term',
        '4' => 'Mid-Term Manual', //or midterm manual
        '6' => 'Tunda', //mygoals
        '9' => 'Aktif Migrasi',
    ];
}

function getStatusLabelById($id)
{
    //sp_pc_status
    $statusList = getStatusList();
    return isset($statusList[$id]) ? $statusList[$id] : '';
}

function getGenderList()
{
    return [
        'l' => 'Laki-laki',
        'p' => 'Perempuan',
    ];
}

function getGenderLabelById($id)
{
    $id = strtolower($id);
    //sp_pc_gender
    $list = getGenderList();
    return isset($list[$id]) ? $list[$id] : '';
}

function getBadge($statusLabel)
{
    $rejects = ['ditolak'];
    $primaries = [];
    $approvalStatusList = ['approval pendaftaran', 'approval penundaan', 'approval penutupan', 'approval lanjut', 'approval perubahan'];
    $checkList = ['aktif', 'aktif migrasi', 'approved'];
    $clockList = ['tunda', 'menunggu'];
    $success = ['aktif', 'aktif migrasi'];
    $dangers = ['tutup normal', 'mid-term manual', 'ditolak', 'reject', 'nonaktif', 'mid-term'];
    $warnings = ['tunda', 'menunggu'];

    $badge = '';
    if (in_array(strtolower($statusLabel), $primaries)) {
        $badge = '<span class="badge badge-primary badge-app">' . $statusLabel . '</span>';
    } else if (in_array(strtolower($statusLabel), $checkList)) {
        $badge = '<span class="badge badge-success badge-app">'
            . $statusLabel . '&nbsp;'
            . '<i class="fa fa-check""></i>'
            . '</span>';
    } else if (in_array(strtolower($statusLabel), $approvalStatusList)) {
        $badge = '<span class="badge badge-warning badge-app" title="' . $statusLabel . '">'
            . 'Menunggu&nbsp;'
            . '<i class="fa fa-clock"></i>'
            . '</span>';
    } else if (in_array(strtolower($statusLabel), $checkList)) {
        $badge = '<span class="badge badge-success badge-app">'
            . $statusLabel . '&nbsp;'
            . '<i class="fa fa-check""></i>'
            . '</span>';
    } else if (in_array(strtolower($statusLabel), $clockList)) {
        $badge = '<span class="badge badge-warning badge-app">'
            . $statusLabel . '&nbsp;'
            . '<i class="fa fa-clock""></i>'
            . '</span>';
    } else if (in_array(strtolower($statusLabel), $success)) {
        $badge = '<span class="badge badge-success badge-app">' . $statusLabel . '</span>';
    } else if (in_array(strtolower($statusLabel), $dangers)) {
        $badge = '<span class="badge badge-danger badge-app bg-danger">' . $statusLabel . '</span>';
    } else if (in_array(strtolower($statusLabel), $warnings)) {
        $badge = '<span class="badge badge-warning badge-app">' . $statusLabel . '</span>';
    } else {
        $badge = '<span class="badge badge-primary badge-app">' . $statusLabel . '</span>';
    }

    return $badge;
}

// function getApprovalStatusList(){
//     //sp_pc_approval_status
//     //tidak dipakai
//     $list = [
//         '0' => 'Menunggu',
//         '1' => 'Approval pendaftaran',//1_all_approval-regist
//         '2' => 'Approval penutupan',//2_regular_approval-penutupan, 2_mygoals_approval_tunda
//         '3' => 'Approval edit',//3_berjangka_approval-edit, 3_mygoals_approval-penutupan
//         '4' => 'Approval lanjut',//4_mygoals_approval-lanjut
//         '6' => 'Approval Tunda',//6_mygoals_approval-tunda
//     ];

//     return $list;
// }

function getApprovalStatusLsbuList()
{
    //sp_pc_approval_status
    $list = [
        '0' => 'Approved',
        '1' => 'Approval Pendaftaran',
        '2' => 'Penutupan Permintaan Nasabah',
        '3' => 'Penutupan Kesalahan Data',
        '4' => 'Ditolak',
        '5' => 'Approval Perubahan',
        '6' => 'Approval Penundaan',
        '7' => 'Approval Penutupan',
        '8' => 'Approval Lanjut',
    ];

    return $list;
}
function getApprovalStatusMyGoalsList()
{
    //sp_pc_approval_status
    $list = [
        '0' => 'Approved',
        '1' => 'Approval Pendaftaran',
        '2' => 'Approval Penundaan',
        '3' => 'Approval Penutupan',
        '4' => 'Approval Lanjut',
        '5' => 'Approval Perubahan',
        '6' => 'Penutupan Kesalahan Data',
        '7' => 'Penutupan Permintaan Nasabah',
        '8' => 'Ditolak',
    ];

    return $list;
}

function getApprovalStatusById($id)
{
    $list = getApprovalStatusLsbuList();
    return isset($list[$id]) ? $list[$id] : '';
}

function getApprovalStatusMygoalsById($id)
{
    $list = getApprovalStatusMyGoalsList();
    return isset($list[$id]) ? $list[$id] : '';
}

function getJenisPeriodList()
{
    //sp_pc_jenis_period
    //mygoals
    $list = [
        '1' => 'Hari',
        '2' => 'Minggu',
        '3' => 'Bulan',
    ];

    return $list;
}

function getJenisPeriodById($key)
{
    $list = getJenisPeriodList();
    return isset($list[$key]) ? $list[$key] : '';
}

function getDayNameIndoList()
{
    $list = [
        'mon' => 'Senin',
        'tue' => 'Selasa',
        'wed' => 'Rabu',
        'thu' => 'Kamis',
        'fri' => "Jumat",
        'sat' => 'Sabtu',
        'sun' => 'Minggu',
    ];

    return $list;
}

function getDayNameIndoByName($key)
{
    $key = strtolower($key);
    $list = getDayNameIndoList();
    $res = isset($list[$key]) ? $list[$key] : '';
    return $res;
}

function getDayMyGoalsList()
{
    //sp_pc_period_date
    //mygoals
    $list = [
        '01' => 'Senin',
        '02' => 'Selasa',
        '03' => 'Rabu',
        '04' => 'Kamis',
        '05' => "Jumat",
        '06' => 'Sabtu',
        '07' => 'Minggu',
    ];

    return $list;
}

function getDayMyGoalsById($key)
{
    //sp_pc_period_date
    //mygoals
    $list = getDayMyGoalsList();
    return isset($list[$key]) ? $list[$key] : '';
}

function getDayMyGoalsEnglishList()
{
    //mygoals
    $list = [
        '01' => 'mun',
        '02' => 'tue',
        '03' => 'wed',
        '04' => 'thu',
        '05' => 'fri',
        '06' => 'sat',
        '07' => 'sun',
    ];

    return $list;
}

function getDayMyGoalsEnglishById($key)
{
    //mygoals
    $list = getDayMyGoalsEnglishList();
    return isset($list[$key]) ? $list[$key] : '';
}

function getPeriodDateByJenisPeriod($jenisPeriod, $key)
{
    $res = "";
    if ($jenisPeriod == "1") {
        $res = "Setiap Hari";
    } else if ($jenisPeriod == "2") {
        $res = getDayMyGoalsById($key);
    } else if ($jenisPeriod == "3") {
        $res = $key;
    }

    return $res;
}

function getNumberSpecial($val)
{
    $res = $val;
    if (!is_numeric($val)) {
        $res = 0;
    }
    return $res;
}

function setDecryptVal($val)
{
    return Config::get('app.is_use_encrypt') ? Crypt::decrypt($val) : $val;
}

function setEncryptVal($val)
{
    return Config::get('app.is_use_encrypt') ? Crypt::encrypt($val) : $val;
}

function getSqlWithBindings($query)
{
    return vsprintf(str_replace('?', '%s', $query->toSql()), collect($query->getBindings())->map(function ($binding) {
        return is_numeric($binding) ? $binding : "'{$binding}'";
    })->toArray());
}

function getAge($dateBirth, $date2 = 'now')
{
    try {
        if ($dateBirth > date('Y-m-d', strtotime($date2))) {
            throw new Exception('Tanggal pembanding tidak valid');
        }
        $dateBirth = date_create($dateBirth);
        $date2 = date_create($date2);
        $diff = date_diff($date2, $dateBirth);
        $res = $diff->y;
    } catch (Exception $e) {
        $res = 'Undefined';
    }
    return $res;
}

function getTimeout($key)
{
    $list['ajax-valid-rek'] = 60000; //ajax 60 detik
    $list['ajax-regist'] = 300000; //ajax 300 detik
    $list['ajax-closing'] = 300000;

    return isset($list[$key]) ? $list[$key] : 3;
}

function getCidTypeList()
{
    return [
        '1' => 'Realtime',
        '2' => 'Scheduler',
    ];
}

function getCidTypeLabelById($id)
{
    //sd_sc_type
    $list = getCidTypeList();
    return isset($list[$id]) ? $list[$id] : '';
}

function getStatusActiveList()
{
    //status setting
    return [
        '0' => 'Nonaktif',
        '1' => 'Aktif',
        //'9' => 'Soft delete',
    ];
}

function getStatusActiveLabelById($id)
{
    $list = getStatusActiveList();
    return isset($list[$id]) ? $list[$id] : '';
}

function getTransRcList()
{
    //sd_t_rc
    return [
        '0000' => 'Sukses',
        'R' => 'Sukses',
        'F' => 'Gagal',
    ];
}

function getTransRcById($id)
{
    $list = getTransRcList();
    return isset($list[$id]) ? $list[$id] : 'Gagal';
}

function getJenisLanjutList()
{
    //sp_pc_jenis_lanjut
    return [
        '1' => 'Nominal Angsuran Bertambah, Jangka Waktu Tetap',
        '2' => 'Nominal Angsuran Tetap, Jangka Waktu Bertambah',
    ];
}

function getJenisLanjutById($id)
{
    $list = getJenisLanjutList();
    return isset($list[$id]) ? $list[$id] : '';
}

function addNamespaces($xml) {
    $root = '<w:wordDocument
        xmlns:w="http://schemas.microsoft.com/office/word/2003/wordml"
        xmlns:wx="http://schemas.microsoft.com/office/word/2003/auxHint"
        xmlns:o="urn:schemas-microsoft-com:office:office">';
    $root .= $xml;
    $root .= '</w:wordDocument>';
    return $root;
}
