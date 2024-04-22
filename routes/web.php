<?php

use App\Http\Controllers\Approval\ApprovalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Setting\RoleManagementController;
use App\Http\Controllers\DaftarPemda\DaftarPemdaController;
use App\Http\Controllers\DownloadManager\DownloadManagerController;
use App\Http\Controllers\Laporan\LaporanBlokirController;
use App\Http\Controllers\Laporan\LaporanPembatalanController;
use App\Http\Controllers\Laporan\LaporanPendaftaranController;
use App\Http\Controllers\Laporan\LaporanTransaksiController;
use App\Http\Controllers\LogActivity\LogActivityController;
use App\Http\Controllers\ManagementApp\AccountTypeController;
use App\Http\Controllers\ManagementApp\MasterPemdaController;
use App\Http\Controllers\ManagementApp\MasterProvinsiController;
use App\Http\Controllers\ManagementApp\ParameterSistemController;
use App\Http\Controllers\ManagementApp\SchedulerController;
use App\Http\Controllers\ManagementApp\SuratKuasaController;
use App\Http\Controllers\PBB\DaftarTpbbController;
use App\Http\Controllers\PBB\PembatalanController;
use App\Http\Controllers\PBB\RegistrasiTpbbController;
use App\Http\Controllers\PBB\SuratKuasaController as SuratKuasa;
use App\Http\Controllers\Setting\MasterController;
use App\Http\Controllers\TSamsat\Approval\ApprovalController as ApprovalSamsatController;
use App\Http\Controllers\TSamsat\BjbSamsat\ListTabunganController;
use App\Http\Controllers\TSamsat\BjbSamsat\PembatalanController as BjbSamsatPembatalanController;
use App\Http\Controllers\TSamsat\BjbSamsat\RegistrasiSamsatController;
use App\Http\Controllers\TSamsat\BjbSamsat\SuratKuasaController as BjbSamsatSuratKuasaController;
use App\Http\Controllers\TSamsat\DownloadManager\DownloadManagerController as DownloadManagerSamsatController;
use App\Http\Controllers\TSamsat\Laporan\LaporanPembatalanController as LaporanSamsatPembatalanController;
use App\Http\Controllers\TSamsat\Laporan\LaporanRegistrasiController;
use App\Http\Controllers\TSamsat\ManagementApp\SuratKuasaController as ManagementAppSuratKuasaController;
use App\Http\Controllers\VPbbDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->name('login');

// Route::group(['middleware' => 'checksession'], function () {

// });
Route::controller(LoginController::class)->group(function () {
    // Route::get('/', 'view')->name('login');
    Route::post('/login', 'login')->name('login.process');
    Route::post('/get-menu', 'getMenu')->name('get-menu');
    Route::get('/logout', 'logout')->name('logout');
});

Route::group(['middleware' => 'checkauth'], function () {
    Route::get('/landing-page', function () {
        return view('landing-page');
    })->name('landing-page');

    Route::get('/dashboard', [VPbbDashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard-samsat', [VPbbDashboardController::class, 'samsat'])->name('dashboard-samsat');
    Route::get('/dashboard/data', [VPbbDashboardController::class, 'fetchData'])->name('dashboard.data');

    Route::group(['prefix' => 'daftar-pemda'], function () {
        Route::controller(DaftarPemdaController::class)->group(function () {
            Route::get('/', 'index')->name('daftar-pemda.index');
            Route::post('/', 'list')->name('daftar-pemda.list');
        });
    });

    Route::group(['prefix' => 'pbb'], function () {
        Route::controller(DaftarTpbbController::class)->group(function () {
            Route::get('/daftar-tpbb', 'index')->name('pbb.daftar-tpbb');
            Route::post('/daftar-tpbb', 'list')->name('pbb.daftar-tpbb.list');
            Route::get('/daftar-tpbb/show/{id}', 'show')->name('pbb.daftar-tpbb.show');
            Route::post('/daftar-tpbb/export', 'export')->name('pbb.daftar-tpbb.export');
        });

        Route::controller(RegistrasiTpbbController::class)->group(function () {
            Route::get('/registrasi-tpbb', 'index')->name('pbb.registrasi-tpbb');
            Route::post('/registrasi-tpbb/cek-norek', 'cekNorek')->name('pbb.registrasi-tpbb.cek-norek');
            Route::post('/registrasi-tpbb/cek-nop', 'cekNop')->name('pbb.registrasi-tpbb.cek-nop');
            Route::post('/registrasi-tpbb/simulasi', 'simulasiTpbb')->name('pbb.registrasi-tpbb.simulasi');
            Route::post('/registrasi-tpbb/registrasi', 'registrasiTpbb')->name('pbb.registrasi-tpbb.registrasi');
        });

        Route::controller(PembatalanController::class)->group(function () {
            Route::get('/pembatalan', 'index')->name('pbb.pembatalan');
            Route::post('/pembatalan-tpbb/detail', 'detailPembatalan')->name('pbb.pembatalan-tpbb.detail');
            Route::post('/pembatalan-tpbb/update', 'updatePembatalan')->name('pbb.pembatalan-tpbb.update');
        });

        Route::controller(SuratKuasa::class)->group(function () {
            Route::get('/surat-kuasa', 'index')->name('pbb.surat-kuasa');
            Route::post('/surat-kuasa/detail', 'detail')->name('pbb.surat-kuasa.detail');
            Route::post('/surat-kuasa/generate-docx','generateDocx')->name('pbb.surat-kuasa.generate-docx');
        });
    });

    Route::group(['prefix' => 'approval'], function () {
        Route::controller(ApprovalController::class)->group(function () {
            Route::get('/', 'index')->name('approval');
            Route::post('/', 'list')->name('approval.list');
            Route::post('/update', 'approvalUpdate')->name('approval.update-approve');
            Route::post('/reject', 'rejectUpdate')->name('approval.update-reject');
            Route::post('/check-user', 'checkUser')->name('approval.check-user');
        });
    });

    Route::group(['prefix' => 'reporting'], function () {
        Route::controller(LaporanPendaftaranController::class)->group(function () {
            Route::get('/laporan-pendaftaran', 'index')->name('laporan.pendaftaran');
            Route::post('/laporan-pendaftaran', 'list')->name('laporan.pendaftaran-list');
            Route::post('/laporan-pendaftaran/export', 'export')->name('laporan.pendaftaran-export');
        });
        Route::controller(LaporanPembatalanController::class)->group(function () {
            Route::get('/laporan-pembatalan', 'index')->name('laporan.pembatalan');
            Route::post('/laporan-pembatalan', 'list')->name('laporan.pembatalan-list');
            Route::post('/laporan-pembatalan/export', 'export')->name('laporan.pembatalan-export');
        });
        Route::controller(LaporanBlokirController::class)->group(function () {
            Route::get('/laporan-blokir', 'index')->name('laporan.blokir');
            Route::post('/laporan-blokir', 'list')->name('laporan.blokir-list');
            Route::post('/laporan-blokir/export', 'export')->name('laporan.blokir-export');
        });
        Route::controller(LaporanTransaksiController::class)->group(function () {
            Route::get('/laporan-transaksi-sukses', 'index_tran_sukses')->name('laporan.transaksi-sukses');
            Route::post('/laporan-transaksi-sukses', 'list_tran_sukses')->name('laporan.transaksi-sukses-list');
			Route::post('/laporan-transaksi-sukses/detail', 'detail_tran_sukses')->name('laporan.transaksi-sukses-detail');
            Route::post('/laporan-transaksi-sukses/export', 'export_laporan_tran_sukses')->name('laporan.transaksi-sukses-exort');
            Route::get('/laporan-transaksi-gagal', 'index_tran_gagal')->name('laporan.transaksi-gagal');
            Route::post('/laporan-transaksi-gagal', 'list_tran_gagal')->name('laporan.transaksi-gagal-list');
            Route::post('/laporan-transaksi-gagal/export', 'export_laporan_tran_gagal')->name('laporan.transaksi-gagal-exort');
        });
    });

    Route::group(['prefix' => 'download-manager'], function() {
        Route::controller(DownloadManagerController::class)->group(function () {
            Route::get('/', 'index')->name('download-manager');
            Route::post('/', 'list')->name('download-manager.list');
            Route::get('/download/{params}', 'download')->name('download-manager.download');
        });
    });

    Route::group(['prefix' => 'setting'], function () {

        Route::controller(MasterController::class)->group(function () {
            Route::get('/kota-kab/{id}', 'getKota')->name('setting.master.kota');
        });
    });

    Route::group(['prefix' => 'management-app'], function () {
       Route::group(['prefix' => 'parameter-sistem'], function () {
            Route::controller(ParameterSistemController::class)->group(function () {
                Route::get('/', 'index')->name('management-app.parameter-sistem');
                Route::get('/list', 'list')->name('management-app.parameter-sistem.list');
                Route::post('/edit', 'edit')->name('management-app.parameter-sistem.edit');
            });
        });

        Route::group(['prefix' => 'provinsi'], function () {
            Route::controller(MasterProvinsiController::class)->group(function () {
                Route::get('/', 'index')->name('management-app.provinsi');
                Route::post('/', 'list')->name('management-app.provinsi.list');
                Route::post('/create', 'create')->name('management-app.provinsi.create');
                Route::post('/show', 'show')->name('management-app.provinsi.show');
                Route::post('/edit', 'edit')->name('management-app.provinsi.edit');
            });
        });
        Route::group(['prefix' => 'pemda'], function () {
            Route::controller(MasterPemdaController::class)->group(function () {
                Route::get('/', 'index')->name('management-app.pemda');
                Route::post('/', 'list')->name('management-app.pemda.list');
                Route::post('/create', 'create')->name('management-app.pemda.create');
                Route::get('/show/{id}', 'show')->name('management-app.pemda.show');
                Route::post('/edit', 'edit')->name('management-app.pemda.edit');
                Route::post('/detail', 'detail')->name('management-app.pemda.detail');
            });
        });
        Route::group(['prefix' => 'account-type'], function () {
            Route::controller(AccountTypeController::class)->group(function () {
                Route::get('/', 'index')->name('management-app.account-type');
                Route::post('/', 'list')->name('management-app.account-type.list');
                Route::post('/create', 'create')->name('management-app.account-type.create');
                Route::post('/show', 'show')->name('management-app.account-type.show');
                Route::post('/edit', 'edit')->name('management-app.account-type.edit');
            });
        });
        Route::group(['prefix' => 'scheduler'], function () {
            Route::controller(SchedulerController::class)->group(function () {
                Route::get('/', 'index')->name('management-app.scheduler');
                Route::post('/', 'list')->name('management-app.scheduler.list');
                Route::post('/create', 'create')->name('management-app.scheduler.create');
                Route::post('/edit', 'edit')->name('management-app.scheduler.edit');
                Route::post('/detail', 'detail')->name('management-app.scheduler.detail');
            });
        });
        Route::group(['prefix' => 'management-surat-kuasa'], function () {
            Route::controller(SuratKuasaController::class)->group(function () {
                Route::get('/', 'index')->name('management-app.surat-kuasa');
                Route::post('/', 'list')->name('management-app.surat-kuasa.list');
                Route::get('/create-page', 'createPage')->name('management-app.surat-kuasa.create-page');
                Route::post('/create', 'create')->name('management-app.surat-kuasa.create');
                Route::get('/show/{id}', 'show')->name('management-app.surat-kuasa.show');
                Route::get('/edit/{id}', 'edit')->name('management-app.surat-kuasa.edit');
                Route::post('/edit', 'update')->name('management-app.surat-kuasa.update');
                Route::delete('/delete/{id}', 'destroy')->name('management-app.surat-kuasa.delete');
            });
        });

        Route::group(['prefix' => 'role-management'], function () {
            Route::controller(RoleManagementController::class)->group(function () {
                Route::get('/', 'index')->name('management-app.role-management');
                Route::post('/', 'list')->name('management-app.role-management.list');
                Route::post('/create', 'create')->name('management-app.role-management.create');
                Route::post('/show', 'show')->name('management-app.role-management.show');
                Route::post('/edit', 'edit')->name('management-app.role-management.edit');
                Route::get('/show/permission/{roleId}', 'showPermission')->name('management-app.role-management.show-permission');
                Route::post('/access/permission', 'roleAccessPermission')->name('management-app.role-management.access-permission');
                Route::post('/access/role-permission', 'roleUpdatePermission')->name('management-app.role-management.access.update-permission');
            });
        });
    });
    Route::group(['prefix' => 'pbb'], function () {
        Route::controller(DaftarTpbbController::class)->group(function () {
            Route::get('/daftar-tpbb', 'index')->name('pbb.daftar-tpbb');
            Route::post('/daftar-tpbb', 'list')->name('pbb.daftar-tpbb.list');
            Route::get('/daftar-tpbb/show/{id}', 'show')->name('pbb.daftar-tpbb.show');
        });
    });

    Route::prefix('log-activity')->group(function () {
        Route::get('/', [LogActivityController::class, 'index'])->name('log.activity');
        Route::post('/', [LogActivityController::class, 'list'])->name('log.activity-list');
    });

    //samsat
    Route::group(['prefix' => 'bjb-t-samsat'], function() {
        Route::controller(RegistrasiSamsatController::class)->group(function () {
            Route::get('/registrasi-samsat', 'index')->name('bjb-t-samsat.registrasi-samsat');
            Route::post('/registrasi-samsat/cek-nopol', 'cekNopol')->name('bjb-t-samsat.registrasi-samsat.cek-nopol');
            Route::post('/simulasi', 'simulasiTsamsat')->name('bjb-t-samsat.registrasi-samsat.simulasi');
            Route::post('/registrasi-samsat', 'registrasiTsamsat')->name('bjb-t-samsat.registrasi-samsat.regist');
        });
        Route::controller(ListTabunganController::class)->group(function () {
            Route::get('/list-tabungan', 'index')->name('bjb-t-samsat.list-tabungan');
            Route::post('/list-tabungan', 'list')->name('bjb-t-samsat.list-tabungan.list');
            Route::get('/list-tabungan/show/{id}', 'show')->name('bjb-t-samsat.list-tabungan.show');
            Route::get('/list-tabungan/export', 'export')->name('bjb-t-samsat.list-tabungan.export');
        });
        Route::controller(BjbSamsatPembatalanController::class)->group(function () {
            Route::get('/pembatalan-samsat', 'index')->name('bjb-t-samsat.pembatalan');
            Route::post('/pembatalan-samsat/detail', 'detailPembatalan')->name('bjb-t-samsat.pembatalan.detail');
            Route::post('/pembatalan-samsat/update', 'updatePembatalan')->name('bjb-t-samsat.pembatalan.update');
        });

        Route::controller(BjbSamsatSuratKuasaController::class)->group(function () {
            Route::get('/surat-kuasa', 'index')->name('bjb-t-samsat.surat-kuasa');
            Route::post('/surat-kuasa/detail', 'detail')->name('bjb-t-samsat.surat-kuasa.detail');
            Route::post('/surat-kuasa/generate-docx','generateDocx')->name('bjb-t-samsat.surat-kuasa.generate-docx');
        });
    });

    Route::group(['prefix' => 'approval-samsat'], function () {
        Route::controller(ApprovalSamsatController::class)->group(function () {
            Route::get('/', 'index')->name('approval-samsat');
            Route::post('/', 'list')->name('approval-samsat.list');
            Route::post('/update-registrasi', 'approvaRegistrasilUpdate')->name('approval-samsat.update-approve-registrasi');
            Route::post('/update-pembatalan', 'approvalPembatalanUpdate')->name('approval-samsat.update-approve-pembatalan');
            Route::post('/update-pembatalan-aro', 'approvalPembatalanAroUpdate')->name('approval-samsat.update-approve-pembatalan-aro');
            Route::post('/reject', 'rejectUpdate')->name('approval-samsat.update-reject');
            Route::post('/check-user', 'checkUser')->name('approval-samsat.check-user');
        });
    });

    Route::group(['prefix' => 'download-manager-samsat'], function() {
        Route::controller(DownloadManagerSamsatController::class)->group(function () {
            Route::get('/', 'index')->name('download-manager.samsat');
            Route::post('/', 'list')->name('download-manager.list.samsat');
            Route::get('/download/{params}', 'download')->name('download-manager.download.samsat');
        });
    });

    Route::group(['prefix' => 'laporan-samsat'], function () {
        Route::controller(LaporanRegistrasiController::class)->group(function () {
            Route::get('/registrasi', 'index')->name('laporan-samsat.registrasi');
            Route::post('/registrasi', 'list')->name('laporan-samsat.registrasi-list');
            Route::post('/registrasi/export', 'export')->name('laporan-samsat.registrasi-export');
        });
        Route::controller(LaporanSamsatPembatalanController::class)->group(function () {
            Route::get('/pembatalan', 'index')->name('laporan-samsat.pembatalan');
            Route::post('/pembatalan', 'list')->name('laporan-samsat.pembatalan-list');
            Route::post('/pembatalan/export', 'export')->name('laporan-samsat.pembatalan-export');
        });
    });

    Route::group(['prefix' => 'management-app'], function () {
         Route::group(['prefix' => 'management-surat-kuasa'], function () {
             Route::controller(ManagementAppSuratKuasaController::class)->group(function () {
                 Route::get('/', 'index')->name('management-app.surat-kuasa-samsat');
                 Route::post('/', 'list')->name('management-app.surat-kuasa-samsat.list');
                 Route::get('/create-page', 'createPage')->name('management-app.surat-kuasa-samsat.create-page');
                 Route::post('/create', 'create')->name('management-app.surat-kuasa-samsat.create');
                 Route::get('/show/{id}', 'show')->name('management-app.surat-kuasa-samsat.show');
                 Route::get('/edit/{id}', 'edit')->name('management-app.surat-kuasa-samsat.edit');
                 Route::post('/edit', 'update')->name('management-app.surat-kuasa-samsat.update');
                 Route::delete('/delete/{id}', 'destroy')->name('management-app.surat-kuasa-samsat.delete');
             });
         });

         Route::group(['prefix' => 'role-management'], function () {
             Route::controller(RoleManagementController::class)->group(function () {
                 Route::get('/', 'index')->name('management-app.role-management');
                 Route::post('/', 'list')->name('management-app.role-management.list');
                 Route::post('/create', 'create')->name('management-app.role-management.create');
                 Route::post('/show', 'show')->name('management-app.role-management.show');
                 Route::post('/edit', 'edit')->name('management-app.role-management.edit');
                 Route::get('/show/permission/{roleId}', 'showPermission')->name('management-app.role-management.show-permission');
                 Route::post('/access/permission', 'roleAccessPermission')->name('management-app.role-management.access-permission');
                 Route::post('/access/role-permission', 'roleUpdatePermission')->name('management-app.role-management.access.update-permission');
             });
         });
     });
});
