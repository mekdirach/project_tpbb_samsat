<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ha2T7vDaRQKfIkE7',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::eHnZtIKZX7QAasoB',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login.process',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-menu' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get-menu',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'logout',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/landing-page' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'landing-page',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard-samsat' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard-samsat',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.data',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/daftar-pemda' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'daftar-pemda.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'daftar-pemda.list',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/pbb/daftar-tpbb' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pbb.daftar-tpbb',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'pbb.daftar-tpbb.list',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/pbb/daftar-tpbb/export' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pbb.daftar-tpbb.export',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/pbb/registrasi-tpbb' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pbb.registrasi-tpbb',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/pbb/registrasi-tpbb/cek-norek' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pbb.registrasi-tpbb.cek-norek',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/pbb/registrasi-tpbb/cek-nop' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pbb.registrasi-tpbb.cek-nop',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/pbb/registrasi-tpbb/simulasi' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pbb.registrasi-tpbb.simulasi',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/pbb/registrasi-tpbb/registrasi' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pbb.registrasi-tpbb.registrasi',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/pbb/pembatalan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pbb.pembatalan',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/pbb/pembatalan-tpbb/detail' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pbb.pembatalan-tpbb.detail',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/pbb/pembatalan-tpbb/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pbb.pembatalan-tpbb.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/pbb/surat-kuasa' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pbb.surat-kuasa',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/pbb/surat-kuasa/detail' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pbb.surat-kuasa.detail',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/pbb/surat-kuasa/generate-docx' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pbb.surat-kuasa.generate-docx',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/approval' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'approval',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'approval.list',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/approval/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'approval.update-approve',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/approval/reject' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'approval.update-reject',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/approval/check-user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'approval.check-user',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reporting/laporan-pendaftaran' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'laporan.pendaftaran',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'laporan.pendaftaran-list',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reporting/laporan-pendaftaran/export' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'laporan.pendaftaran-export',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reporting/laporan-pembatalan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'laporan.pembatalan',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'laporan.pembatalan-list',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reporting/laporan-pembatalan/export' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'laporan.pembatalan-export',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reporting/laporan-blokir' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'laporan.blokir',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'laporan.blokir-list',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reporting/laporan-blokir/export' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'laporan.blokir-export',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reporting/laporan-transaksi-sukses' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'laporan.transaksi-sukses',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'laporan.transaksi-sukses-list',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reporting/laporan-transaksi-sukses/detail' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'laporan.transaksi-sukses-detail',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reporting/laporan-transaksi-sukses/export' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'laporan.transaksi-sukses-exort',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reporting/laporan-transaksi-gagal' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'laporan.transaksi-gagal',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'laporan.transaksi-gagal-list',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reporting/laporan-transaksi-gagal/export' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'laporan.transaksi-gagal-exort',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/download-manager' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'download-manager',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'download-manager.list',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/management-app/parameter-sistem' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.parameter-sistem',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/management-app/parameter-sistem/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.parameter-sistem.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/management-app/parameter-sistem/edit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.parameter-sistem.edit',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/management-app/provinsi' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.provinsi',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.provinsi.list',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/management-app/provinsi/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.provinsi.create',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/management-app/provinsi/show' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.provinsi.show',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/management-app/provinsi/edit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.provinsi.edit',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/management-app/pemda' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.pemda',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.pemda.list',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/management-app/pemda/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.pemda.create',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/management-app/pemda/edit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.pemda.edit',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/management-app/pemda/detail' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.pemda.detail',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/management-app/account-type' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.account-type',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.account-type.list',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/management-app/account-type/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.account-type.create',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/management-app/account-type/show' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.account-type.show',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/management-app/account-type/edit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.account-type.edit',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/management-app/scheduler' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.scheduler',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.scheduler.list',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/management-app/scheduler/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.scheduler.create',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/management-app/scheduler/edit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.scheduler.edit',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/management-app/scheduler/detail' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.scheduler.detail',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/management-app/management-surat-kuasa' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.surat-kuasa-samsat',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.surat-kuasa-samsat.list',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/management-app/management-surat-kuasa/create-page' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.surat-kuasa-samsat.create-page',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/management-app/management-surat-kuasa/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.surat-kuasa-samsat.create',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/management-app/management-surat-kuasa/edit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.surat-kuasa-samsat.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/management-app/role-management' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.role-management',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.role-management.list',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/management-app/role-management/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.role-management.create',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/management-app/role-management/show' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.role-management.show',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/management-app/role-management/edit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.role-management.edit',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/management-app/role-management/access/permission' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.role-management.access-permission',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/management-app/role-management/access/role-permission' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.role-management.access.update-permission',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/log-activity' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'log.activity',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'log.activity-list',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/bjb-t-samsat/registrasi-samsat' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bjb-t-samsat.registrasi-samsat',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'bjb-t-samsat.registrasi-samsat.regist',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/bjb-t-samsat/registrasi-samsat/cek-nopol' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bjb-t-samsat.registrasi-samsat.cek-nopol',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/bjb-t-samsat/simulasi' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bjb-t-samsat.registrasi-samsat.simulasi',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/bjb-t-samsat/list-tabungan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bjb-t-samsat.list-tabungan',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'bjb-t-samsat.list-tabungan.list',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/bjb-t-samsat/list-tabungan/export' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bjb-t-samsat.list-tabungan.export',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/bjb-t-samsat/pembatalan-samsat' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bjb-t-samsat.pembatalan',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/bjb-t-samsat/pembatalan-samsat/detail' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bjb-t-samsat.pembatalan.detail',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/bjb-t-samsat/pembatalan-samsat/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bjb-t-samsat.pembatalan.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/bjb-t-samsat/surat-kuasa' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bjb-t-samsat.surat-kuasa',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/bjb-t-samsat/surat-kuasa/detail' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bjb-t-samsat.surat-kuasa.detail',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/bjb-t-samsat/surat-kuasa/generate-docx' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bjb-t-samsat.surat-kuasa.generate-docx',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/approval-samsat' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'approval-samsat',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'approval-samsat.list',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/approval-samsat/update-registrasi' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'approval-samsat.update-approve-registrasi',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/approval-samsat/update-pembatalan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'approval-samsat.update-approve-pembatalan',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/approval-samsat/update-pembatalan-aro' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'approval-samsat.update-approve-pembatalan-aro',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/approval-samsat/reject' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'approval-samsat.update-reject',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/approval-samsat/check-user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'approval-samsat.check-user',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/download-manager-samsat' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'download-manager.samsat',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'download-manager.list.samsat',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/laporan-samsat/registrasi' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'laporan-samsat.registrasi',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'laporan-samsat.registrasi-list',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/laporan-samsat/registrasi/export' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'laporan-samsat.registrasi-export',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/laporan-samsat/pembatalan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'laporan-samsat.pembatalan',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'laporan-samsat.pembatalan-list',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/laporan-samsat/pembatalan/export' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'laporan-samsat.pembatalan-export',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/pbb/daftar\\-tpbb/show/([^/]++)(*:38)|/download\\-manager(?|/download/([^/]++)(*:84)|\\-samsat/download/([^/]++)(*:117))|/setting/kota\\-kab/([^/]++)(*:153)|/management\\-app/(?|pemda/show/([^/]++)(*:200)|management\\-surat\\-kuasa/(?|show/([^/]++)(*:249)|edit/([^/]++)(*:270)|delete/([^/]++)(*:293))|role\\-management/show/permission/([^/]++)(*:343))|/bjb\\-t\\-samsat/list\\-tabungan/show/([^/]++)(*:396))/?$}sDu',
    ),
    3 => 
    array (
      38 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pbb.daftar-tpbb.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      84 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'download-manager.download',
          ),
          1 => 
          array (
            0 => 'params',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      117 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'download-manager.download.samsat',
          ),
          1 => 
          array (
            0 => 'params',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      153 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.master.kota',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      200 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.pemda.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      249 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.surat-kuasa-samsat.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      270 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.surat-kuasa-samsat.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      293 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.surat-kuasa-samsat.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      343 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'management-app.role-management.show-permission',
          ),
          1 => 
          array (
            0 => 'roleId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      396 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bjb-t-samsat.list-tabungan.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'generated::ha2T7vDaRQKfIkE7' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'generated::ha2T7vDaRQKfIkE7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::eHnZtIKZX7QAasoB' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:295:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000079343957000000006b6e2fa2";}";s:4:"hash";s:44:"z2e0NkDKvbWxw9rAl8L4JHh92BhR/FSpYU5HRAXYeD4=";}}',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::eHnZtIKZX7QAasoB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:265:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:47:"function () {
    return \\view(\'auth.login\');
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000079343951000000006b6e2fa2";}";s:4:"hash";s:44:"HmmEARDt9uoSyQ+Q+YnzfogXrK5PkcQyFcH2rK+dVm4=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'login.process' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'login.process',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get-menu' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'get-menu',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@getMenu',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@getMenu',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'get-menu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'logout' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'landing-page' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'landing-page',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:275:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:57:"function () {
        return \\view(\'landing-page\');
    }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000079343952000000006b6e2fa2";}";s:4:"hash";s:44:"uwS8/aUXFx+P2+i5lRWTTqlonZh9ogmGY1UNnsIBgcQ=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'landing-page',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\VPbbDashboardController@index',
        'controller' => 'App\\Http\\Controllers\\VPbbDashboardController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'dashboard',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard-samsat' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard-samsat',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\VPbbDashboardController@samsat',
        'controller' => 'App\\Http\\Controllers\\VPbbDashboardController@samsat',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'dashboard-samsat',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.data' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\VPbbDashboardController@fetchData',
        'controller' => 'App\\Http\\Controllers\\VPbbDashboardController@fetchData',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'dashboard.data',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'daftar-pemda.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'daftar-pemda',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\DaftarPemda\\DaftarPemdaController@index',
        'controller' => 'App\\Http\\Controllers\\DaftarPemda\\DaftarPemdaController@index',
        'namespace' => NULL,
        'prefix' => '/daftar-pemda',
        'where' => 
        array (
        ),
        'as' => 'daftar-pemda.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'daftar-pemda.list' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'daftar-pemda',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\DaftarPemda\\DaftarPemdaController@list',
        'controller' => 'App\\Http\\Controllers\\DaftarPemda\\DaftarPemdaController@list',
        'namespace' => NULL,
        'prefix' => '/daftar-pemda',
        'where' => 
        array (
        ),
        'as' => 'daftar-pemda.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pbb.daftar-tpbb' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'pbb/daftar-tpbb',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\PBB\\DaftarTpbbController@index',
        'controller' => 'App\\Http\\Controllers\\PBB\\DaftarTpbbController@index',
        'namespace' => NULL,
        'prefix' => '/pbb',
        'where' => 
        array (
        ),
        'as' => 'pbb.daftar-tpbb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pbb.daftar-tpbb.list' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'pbb/daftar-tpbb',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\PBB\\DaftarTpbbController@list',
        'controller' => 'App\\Http\\Controllers\\PBB\\DaftarTpbbController@list',
        'namespace' => NULL,
        'prefix' => '/pbb',
        'where' => 
        array (
        ),
        'as' => 'pbb.daftar-tpbb.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pbb.daftar-tpbb.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'pbb/daftar-tpbb/show/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\PBB\\DaftarTpbbController@show',
        'controller' => 'App\\Http\\Controllers\\PBB\\DaftarTpbbController@show',
        'namespace' => NULL,
        'prefix' => '/pbb',
        'where' => 
        array (
        ),
        'as' => 'pbb.daftar-tpbb.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pbb.daftar-tpbb.export' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'pbb/daftar-tpbb/export',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\PBB\\DaftarTpbbController@export',
        'controller' => 'App\\Http\\Controllers\\PBB\\DaftarTpbbController@export',
        'namespace' => NULL,
        'prefix' => '/pbb',
        'where' => 
        array (
        ),
        'as' => 'pbb.daftar-tpbb.export',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pbb.registrasi-tpbb' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'pbb/registrasi-tpbb',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\PBB\\RegistrasiTpbbController@index',
        'controller' => 'App\\Http\\Controllers\\PBB\\RegistrasiTpbbController@index',
        'namespace' => NULL,
        'prefix' => '/pbb',
        'where' => 
        array (
        ),
        'as' => 'pbb.registrasi-tpbb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pbb.registrasi-tpbb.cek-norek' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'pbb/registrasi-tpbb/cek-norek',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\PBB\\RegistrasiTpbbController@cekNorek',
        'controller' => 'App\\Http\\Controllers\\PBB\\RegistrasiTpbbController@cekNorek',
        'namespace' => NULL,
        'prefix' => '/pbb',
        'where' => 
        array (
        ),
        'as' => 'pbb.registrasi-tpbb.cek-norek',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pbb.registrasi-tpbb.cek-nop' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'pbb/registrasi-tpbb/cek-nop',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\PBB\\RegistrasiTpbbController@cekNop',
        'controller' => 'App\\Http\\Controllers\\PBB\\RegistrasiTpbbController@cekNop',
        'namespace' => NULL,
        'prefix' => '/pbb',
        'where' => 
        array (
        ),
        'as' => 'pbb.registrasi-tpbb.cek-nop',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pbb.registrasi-tpbb.simulasi' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'pbb/registrasi-tpbb/simulasi',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\PBB\\RegistrasiTpbbController@simulasiTpbb',
        'controller' => 'App\\Http\\Controllers\\PBB\\RegistrasiTpbbController@simulasiTpbb',
        'namespace' => NULL,
        'prefix' => '/pbb',
        'where' => 
        array (
        ),
        'as' => 'pbb.registrasi-tpbb.simulasi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pbb.registrasi-tpbb.registrasi' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'pbb/registrasi-tpbb/registrasi',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\PBB\\RegistrasiTpbbController@registrasiTpbb',
        'controller' => 'App\\Http\\Controllers\\PBB\\RegistrasiTpbbController@registrasiTpbb',
        'namespace' => NULL,
        'prefix' => '/pbb',
        'where' => 
        array (
        ),
        'as' => 'pbb.registrasi-tpbb.registrasi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pbb.pembatalan' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'pbb/pembatalan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\PBB\\PembatalanController@index',
        'controller' => 'App\\Http\\Controllers\\PBB\\PembatalanController@index',
        'namespace' => NULL,
        'prefix' => '/pbb',
        'where' => 
        array (
        ),
        'as' => 'pbb.pembatalan',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pbb.pembatalan-tpbb.detail' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'pbb/pembatalan-tpbb/detail',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\PBB\\PembatalanController@detailPembatalan',
        'controller' => 'App\\Http\\Controllers\\PBB\\PembatalanController@detailPembatalan',
        'namespace' => NULL,
        'prefix' => '/pbb',
        'where' => 
        array (
        ),
        'as' => 'pbb.pembatalan-tpbb.detail',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pbb.pembatalan-tpbb.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'pbb/pembatalan-tpbb/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\PBB\\PembatalanController@updatePembatalan',
        'controller' => 'App\\Http\\Controllers\\PBB\\PembatalanController@updatePembatalan',
        'namespace' => NULL,
        'prefix' => '/pbb',
        'where' => 
        array (
        ),
        'as' => 'pbb.pembatalan-tpbb.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pbb.surat-kuasa' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'pbb/surat-kuasa',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\PBB\\SuratKuasaController@index',
        'controller' => 'App\\Http\\Controllers\\PBB\\SuratKuasaController@index',
        'namespace' => NULL,
        'prefix' => '/pbb',
        'where' => 
        array (
        ),
        'as' => 'pbb.surat-kuasa',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pbb.surat-kuasa.detail' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'pbb/surat-kuasa/detail',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\PBB\\SuratKuasaController@detail',
        'controller' => 'App\\Http\\Controllers\\PBB\\SuratKuasaController@detail',
        'namespace' => NULL,
        'prefix' => '/pbb',
        'where' => 
        array (
        ),
        'as' => 'pbb.surat-kuasa.detail',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pbb.surat-kuasa.generate-docx' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'pbb/surat-kuasa/generate-docx',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\PBB\\SuratKuasaController@generateDocx',
        'controller' => 'App\\Http\\Controllers\\PBB\\SuratKuasaController@generateDocx',
        'namespace' => NULL,
        'prefix' => '/pbb',
        'where' => 
        array (
        ),
        'as' => 'pbb.surat-kuasa.generate-docx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'approval' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'approval',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\Approval\\ApprovalController@index',
        'controller' => 'App\\Http\\Controllers\\Approval\\ApprovalController@index',
        'namespace' => NULL,
        'prefix' => '/approval',
        'where' => 
        array (
        ),
        'as' => 'approval',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'approval.list' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'approval',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\Approval\\ApprovalController@list',
        'controller' => 'App\\Http\\Controllers\\Approval\\ApprovalController@list',
        'namespace' => NULL,
        'prefix' => '/approval',
        'where' => 
        array (
        ),
        'as' => 'approval.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'approval.update-approve' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'approval/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\Approval\\ApprovalController@approvalUpdate',
        'controller' => 'App\\Http\\Controllers\\Approval\\ApprovalController@approvalUpdate',
        'namespace' => NULL,
        'prefix' => '/approval',
        'where' => 
        array (
        ),
        'as' => 'approval.update-approve',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'approval.update-reject' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'approval/reject',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\Approval\\ApprovalController@rejectUpdate',
        'controller' => 'App\\Http\\Controllers\\Approval\\ApprovalController@rejectUpdate',
        'namespace' => NULL,
        'prefix' => '/approval',
        'where' => 
        array (
        ),
        'as' => 'approval.update-reject',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'approval.check-user' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'approval/check-user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\Approval\\ApprovalController@checkUser',
        'controller' => 'App\\Http\\Controllers\\Approval\\ApprovalController@checkUser',
        'namespace' => NULL,
        'prefix' => '/approval',
        'where' => 
        array (
        ),
        'as' => 'approval.check-user',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'laporan.pendaftaran' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reporting/laporan-pendaftaran',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\Laporan\\LaporanPendaftaranController@index',
        'controller' => 'App\\Http\\Controllers\\Laporan\\LaporanPendaftaranController@index',
        'namespace' => NULL,
        'prefix' => '/reporting',
        'where' => 
        array (
        ),
        'as' => 'laporan.pendaftaran',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'laporan.pendaftaran-list' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'reporting/laporan-pendaftaran',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\Laporan\\LaporanPendaftaranController@list',
        'controller' => 'App\\Http\\Controllers\\Laporan\\LaporanPendaftaranController@list',
        'namespace' => NULL,
        'prefix' => '/reporting',
        'where' => 
        array (
        ),
        'as' => 'laporan.pendaftaran-list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'laporan.pendaftaran-export' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'reporting/laporan-pendaftaran/export',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\Laporan\\LaporanPendaftaranController@export',
        'controller' => 'App\\Http\\Controllers\\Laporan\\LaporanPendaftaranController@export',
        'namespace' => NULL,
        'prefix' => '/reporting',
        'where' => 
        array (
        ),
        'as' => 'laporan.pendaftaran-export',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'laporan.pembatalan' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reporting/laporan-pembatalan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\Laporan\\LaporanPembatalanController@index',
        'controller' => 'App\\Http\\Controllers\\Laporan\\LaporanPembatalanController@index',
        'namespace' => NULL,
        'prefix' => '/reporting',
        'where' => 
        array (
        ),
        'as' => 'laporan.pembatalan',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'laporan.pembatalan-list' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'reporting/laporan-pembatalan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\Laporan\\LaporanPembatalanController@list',
        'controller' => 'App\\Http\\Controllers\\Laporan\\LaporanPembatalanController@list',
        'namespace' => NULL,
        'prefix' => '/reporting',
        'where' => 
        array (
        ),
        'as' => 'laporan.pembatalan-list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'laporan.pembatalan-export' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'reporting/laporan-pembatalan/export',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\Laporan\\LaporanPembatalanController@export',
        'controller' => 'App\\Http\\Controllers\\Laporan\\LaporanPembatalanController@export',
        'namespace' => NULL,
        'prefix' => '/reporting',
        'where' => 
        array (
        ),
        'as' => 'laporan.pembatalan-export',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'laporan.blokir' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reporting/laporan-blokir',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\Laporan\\LaporanBlokirController@index',
        'controller' => 'App\\Http\\Controllers\\Laporan\\LaporanBlokirController@index',
        'namespace' => NULL,
        'prefix' => '/reporting',
        'where' => 
        array (
        ),
        'as' => 'laporan.blokir',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'laporan.blokir-list' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'reporting/laporan-blokir',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\Laporan\\LaporanBlokirController@list',
        'controller' => 'App\\Http\\Controllers\\Laporan\\LaporanBlokirController@list',
        'namespace' => NULL,
        'prefix' => '/reporting',
        'where' => 
        array (
        ),
        'as' => 'laporan.blokir-list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'laporan.blokir-export' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'reporting/laporan-blokir/export',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\Laporan\\LaporanBlokirController@export',
        'controller' => 'App\\Http\\Controllers\\Laporan\\LaporanBlokirController@export',
        'namespace' => NULL,
        'prefix' => '/reporting',
        'where' => 
        array (
        ),
        'as' => 'laporan.blokir-export',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'laporan.transaksi-sukses' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reporting/laporan-transaksi-sukses',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\Laporan\\LaporanTransaksiController@index_tran_sukses',
        'controller' => 'App\\Http\\Controllers\\Laporan\\LaporanTransaksiController@index_tran_sukses',
        'namespace' => NULL,
        'prefix' => '/reporting',
        'where' => 
        array (
        ),
        'as' => 'laporan.transaksi-sukses',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'laporan.transaksi-sukses-list' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'reporting/laporan-transaksi-sukses',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\Laporan\\LaporanTransaksiController@list_tran_sukses',
        'controller' => 'App\\Http\\Controllers\\Laporan\\LaporanTransaksiController@list_tran_sukses',
        'namespace' => NULL,
        'prefix' => '/reporting',
        'where' => 
        array (
        ),
        'as' => 'laporan.transaksi-sukses-list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'laporan.transaksi-sukses-detail' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'reporting/laporan-transaksi-sukses/detail',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\Laporan\\LaporanTransaksiController@detail_tran_sukses',
        'controller' => 'App\\Http\\Controllers\\Laporan\\LaporanTransaksiController@detail_tran_sukses',
        'namespace' => NULL,
        'prefix' => '/reporting',
        'where' => 
        array (
        ),
        'as' => 'laporan.transaksi-sukses-detail',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'laporan.transaksi-sukses-exort' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'reporting/laporan-transaksi-sukses/export',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\Laporan\\LaporanTransaksiController@export_laporan_tran_sukses',
        'controller' => 'App\\Http\\Controllers\\Laporan\\LaporanTransaksiController@export_laporan_tran_sukses',
        'namespace' => NULL,
        'prefix' => '/reporting',
        'where' => 
        array (
        ),
        'as' => 'laporan.transaksi-sukses-exort',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'laporan.transaksi-gagal' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reporting/laporan-transaksi-gagal',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\Laporan\\LaporanTransaksiController@index_tran_gagal',
        'controller' => 'App\\Http\\Controllers\\Laporan\\LaporanTransaksiController@index_tran_gagal',
        'namespace' => NULL,
        'prefix' => '/reporting',
        'where' => 
        array (
        ),
        'as' => 'laporan.transaksi-gagal',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'laporan.transaksi-gagal-list' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'reporting/laporan-transaksi-gagal',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\Laporan\\LaporanTransaksiController@list_tran_gagal',
        'controller' => 'App\\Http\\Controllers\\Laporan\\LaporanTransaksiController@list_tran_gagal',
        'namespace' => NULL,
        'prefix' => '/reporting',
        'where' => 
        array (
        ),
        'as' => 'laporan.transaksi-gagal-list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'laporan.transaksi-gagal-exort' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'reporting/laporan-transaksi-gagal/export',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\Laporan\\LaporanTransaksiController@export_laporan_tran_gagal',
        'controller' => 'App\\Http\\Controllers\\Laporan\\LaporanTransaksiController@export_laporan_tran_gagal',
        'namespace' => NULL,
        'prefix' => '/reporting',
        'where' => 
        array (
        ),
        'as' => 'laporan.transaksi-gagal-exort',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'download-manager' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'download-manager',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\DownloadManager\\DownloadManagerController@index',
        'controller' => 'App\\Http\\Controllers\\DownloadManager\\DownloadManagerController@index',
        'namespace' => NULL,
        'prefix' => '/download-manager',
        'where' => 
        array (
        ),
        'as' => 'download-manager',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'download-manager.list' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'download-manager',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\DownloadManager\\DownloadManagerController@list',
        'controller' => 'App\\Http\\Controllers\\DownloadManager\\DownloadManagerController@list',
        'namespace' => NULL,
        'prefix' => '/download-manager',
        'where' => 
        array (
        ),
        'as' => 'download-manager.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'download-manager.download' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'download-manager/download/{params}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\DownloadManager\\DownloadManagerController@download',
        'controller' => 'App\\Http\\Controllers\\DownloadManager\\DownloadManagerController@download',
        'namespace' => NULL,
        'prefix' => '/download-manager',
        'where' => 
        array (
        ),
        'as' => 'download-manager.download',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'setting.master.kota' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'setting/kota-kab/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\Setting\\MasterController@getKota',
        'controller' => 'App\\Http\\Controllers\\Setting\\MasterController@getKota',
        'namespace' => NULL,
        'prefix' => '/setting',
        'where' => 
        array (
        ),
        'as' => 'setting.master.kota',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.parameter-sistem' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'management-app/parameter-sistem',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\ManagementApp\\ParameterSistemController@index',
        'controller' => 'App\\Http\\Controllers\\ManagementApp\\ParameterSistemController@index',
        'namespace' => NULL,
        'prefix' => 'management-app/parameter-sistem',
        'where' => 
        array (
        ),
        'as' => 'management-app.parameter-sistem',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.parameter-sistem.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'management-app/parameter-sistem/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\ManagementApp\\ParameterSistemController@list',
        'controller' => 'App\\Http\\Controllers\\ManagementApp\\ParameterSistemController@list',
        'namespace' => NULL,
        'prefix' => 'management-app/parameter-sistem',
        'where' => 
        array (
        ),
        'as' => 'management-app.parameter-sistem.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.parameter-sistem.edit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'management-app/parameter-sistem/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\ManagementApp\\ParameterSistemController@edit',
        'controller' => 'App\\Http\\Controllers\\ManagementApp\\ParameterSistemController@edit',
        'namespace' => NULL,
        'prefix' => 'management-app/parameter-sistem',
        'where' => 
        array (
        ),
        'as' => 'management-app.parameter-sistem.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.provinsi' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'management-app/provinsi',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\ManagementApp\\MasterProvinsiController@index',
        'controller' => 'App\\Http\\Controllers\\ManagementApp\\MasterProvinsiController@index',
        'namespace' => NULL,
        'prefix' => 'management-app/provinsi',
        'where' => 
        array (
        ),
        'as' => 'management-app.provinsi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.provinsi.list' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'management-app/provinsi',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\ManagementApp\\MasterProvinsiController@list',
        'controller' => 'App\\Http\\Controllers\\ManagementApp\\MasterProvinsiController@list',
        'namespace' => NULL,
        'prefix' => 'management-app/provinsi',
        'where' => 
        array (
        ),
        'as' => 'management-app.provinsi.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.provinsi.create' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'management-app/provinsi/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\ManagementApp\\MasterProvinsiController@create',
        'controller' => 'App\\Http\\Controllers\\ManagementApp\\MasterProvinsiController@create',
        'namespace' => NULL,
        'prefix' => 'management-app/provinsi',
        'where' => 
        array (
        ),
        'as' => 'management-app.provinsi.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.provinsi.show' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'management-app/provinsi/show',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\ManagementApp\\MasterProvinsiController@show',
        'controller' => 'App\\Http\\Controllers\\ManagementApp\\MasterProvinsiController@show',
        'namespace' => NULL,
        'prefix' => 'management-app/provinsi',
        'where' => 
        array (
        ),
        'as' => 'management-app.provinsi.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.provinsi.edit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'management-app/provinsi/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\ManagementApp\\MasterProvinsiController@edit',
        'controller' => 'App\\Http\\Controllers\\ManagementApp\\MasterProvinsiController@edit',
        'namespace' => NULL,
        'prefix' => 'management-app/provinsi',
        'where' => 
        array (
        ),
        'as' => 'management-app.provinsi.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.pemda' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'management-app/pemda',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\ManagementApp\\MasterPemdaController@index',
        'controller' => 'App\\Http\\Controllers\\ManagementApp\\MasterPemdaController@index',
        'namespace' => NULL,
        'prefix' => 'management-app/pemda',
        'where' => 
        array (
        ),
        'as' => 'management-app.pemda',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.pemda.list' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'management-app/pemda',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\ManagementApp\\MasterPemdaController@list',
        'controller' => 'App\\Http\\Controllers\\ManagementApp\\MasterPemdaController@list',
        'namespace' => NULL,
        'prefix' => 'management-app/pemda',
        'where' => 
        array (
        ),
        'as' => 'management-app.pemda.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.pemda.create' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'management-app/pemda/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\ManagementApp\\MasterPemdaController@create',
        'controller' => 'App\\Http\\Controllers\\ManagementApp\\MasterPemdaController@create',
        'namespace' => NULL,
        'prefix' => 'management-app/pemda',
        'where' => 
        array (
        ),
        'as' => 'management-app.pemda.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.pemda.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'management-app/pemda/show/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\ManagementApp\\MasterPemdaController@show',
        'controller' => 'App\\Http\\Controllers\\ManagementApp\\MasterPemdaController@show',
        'namespace' => NULL,
        'prefix' => 'management-app/pemda',
        'where' => 
        array (
        ),
        'as' => 'management-app.pemda.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.pemda.edit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'management-app/pemda/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\ManagementApp\\MasterPemdaController@edit',
        'controller' => 'App\\Http\\Controllers\\ManagementApp\\MasterPemdaController@edit',
        'namespace' => NULL,
        'prefix' => 'management-app/pemda',
        'where' => 
        array (
        ),
        'as' => 'management-app.pemda.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.pemda.detail' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'management-app/pemda/detail',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\ManagementApp\\MasterPemdaController@detail',
        'controller' => 'App\\Http\\Controllers\\ManagementApp\\MasterPemdaController@detail',
        'namespace' => NULL,
        'prefix' => 'management-app/pemda',
        'where' => 
        array (
        ),
        'as' => 'management-app.pemda.detail',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.account-type' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'management-app/account-type',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\ManagementApp\\AccountTypeController@index',
        'controller' => 'App\\Http\\Controllers\\ManagementApp\\AccountTypeController@index',
        'namespace' => NULL,
        'prefix' => 'management-app/account-type',
        'where' => 
        array (
        ),
        'as' => 'management-app.account-type',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.account-type.list' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'management-app/account-type',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\ManagementApp\\AccountTypeController@list',
        'controller' => 'App\\Http\\Controllers\\ManagementApp\\AccountTypeController@list',
        'namespace' => NULL,
        'prefix' => 'management-app/account-type',
        'where' => 
        array (
        ),
        'as' => 'management-app.account-type.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.account-type.create' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'management-app/account-type/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\ManagementApp\\AccountTypeController@create',
        'controller' => 'App\\Http\\Controllers\\ManagementApp\\AccountTypeController@create',
        'namespace' => NULL,
        'prefix' => 'management-app/account-type',
        'where' => 
        array (
        ),
        'as' => 'management-app.account-type.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.account-type.show' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'management-app/account-type/show',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\ManagementApp\\AccountTypeController@show',
        'controller' => 'App\\Http\\Controllers\\ManagementApp\\AccountTypeController@show',
        'namespace' => NULL,
        'prefix' => 'management-app/account-type',
        'where' => 
        array (
        ),
        'as' => 'management-app.account-type.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.account-type.edit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'management-app/account-type/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\ManagementApp\\AccountTypeController@edit',
        'controller' => 'App\\Http\\Controllers\\ManagementApp\\AccountTypeController@edit',
        'namespace' => NULL,
        'prefix' => 'management-app/account-type',
        'where' => 
        array (
        ),
        'as' => 'management-app.account-type.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.scheduler' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'management-app/scheduler',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\ManagementApp\\SchedulerController@index',
        'controller' => 'App\\Http\\Controllers\\ManagementApp\\SchedulerController@index',
        'namespace' => NULL,
        'prefix' => 'management-app/scheduler',
        'where' => 
        array (
        ),
        'as' => 'management-app.scheduler',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.scheduler.list' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'management-app/scheduler',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\ManagementApp\\SchedulerController@list',
        'controller' => 'App\\Http\\Controllers\\ManagementApp\\SchedulerController@list',
        'namespace' => NULL,
        'prefix' => 'management-app/scheduler',
        'where' => 
        array (
        ),
        'as' => 'management-app.scheduler.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.scheduler.create' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'management-app/scheduler/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\ManagementApp\\SchedulerController@create',
        'controller' => 'App\\Http\\Controllers\\ManagementApp\\SchedulerController@create',
        'namespace' => NULL,
        'prefix' => 'management-app/scheduler',
        'where' => 
        array (
        ),
        'as' => 'management-app.scheduler.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.scheduler.edit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'management-app/scheduler/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\ManagementApp\\SchedulerController@edit',
        'controller' => 'App\\Http\\Controllers\\ManagementApp\\SchedulerController@edit',
        'namespace' => NULL,
        'prefix' => 'management-app/scheduler',
        'where' => 
        array (
        ),
        'as' => 'management-app.scheduler.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.scheduler.detail' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'management-app/scheduler/detail',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\ManagementApp\\SchedulerController@detail',
        'controller' => 'App\\Http\\Controllers\\ManagementApp\\SchedulerController@detail',
        'namespace' => NULL,
        'prefix' => 'management-app/scheduler',
        'where' => 
        array (
        ),
        'as' => 'management-app.scheduler.detail',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.surat-kuasa-samsat' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'management-app/management-surat-kuasa',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\ManagementApp\\SuratKuasaController@index',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\ManagementApp\\SuratKuasaController@index',
        'namespace' => NULL,
        'prefix' => 'management-app/management-surat-kuasa',
        'where' => 
        array (
        ),
        'as' => 'management-app.surat-kuasa-samsat',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.surat-kuasa-samsat.list' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'management-app/management-surat-kuasa',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\ManagementApp\\SuratKuasaController@list',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\ManagementApp\\SuratKuasaController@list',
        'namespace' => NULL,
        'prefix' => 'management-app/management-surat-kuasa',
        'where' => 
        array (
        ),
        'as' => 'management-app.surat-kuasa-samsat.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.surat-kuasa-samsat.create-page' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'management-app/management-surat-kuasa/create-page',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\ManagementApp\\SuratKuasaController@createPage',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\ManagementApp\\SuratKuasaController@createPage',
        'namespace' => NULL,
        'prefix' => 'management-app/management-surat-kuasa',
        'where' => 
        array (
        ),
        'as' => 'management-app.surat-kuasa-samsat.create-page',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.surat-kuasa-samsat.create' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'management-app/management-surat-kuasa/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\ManagementApp\\SuratKuasaController@create',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\ManagementApp\\SuratKuasaController@create',
        'namespace' => NULL,
        'prefix' => 'management-app/management-surat-kuasa',
        'where' => 
        array (
        ),
        'as' => 'management-app.surat-kuasa-samsat.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.surat-kuasa-samsat.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'management-app/management-surat-kuasa/show/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\ManagementApp\\SuratKuasaController@show',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\ManagementApp\\SuratKuasaController@show',
        'namespace' => NULL,
        'prefix' => 'management-app/management-surat-kuasa',
        'where' => 
        array (
        ),
        'as' => 'management-app.surat-kuasa-samsat.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.surat-kuasa-samsat.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'management-app/management-surat-kuasa/edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\ManagementApp\\SuratKuasaController@edit',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\ManagementApp\\SuratKuasaController@edit',
        'namespace' => NULL,
        'prefix' => 'management-app/management-surat-kuasa',
        'where' => 
        array (
        ),
        'as' => 'management-app.surat-kuasa-samsat.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.surat-kuasa-samsat.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'management-app/management-surat-kuasa/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\ManagementApp\\SuratKuasaController@update',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\ManagementApp\\SuratKuasaController@update',
        'namespace' => NULL,
        'prefix' => 'management-app/management-surat-kuasa',
        'where' => 
        array (
        ),
        'as' => 'management-app.surat-kuasa-samsat.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.surat-kuasa-samsat.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'management-app/management-surat-kuasa/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\ManagementApp\\SuratKuasaController@destroy',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\ManagementApp\\SuratKuasaController@destroy',
        'namespace' => NULL,
        'prefix' => 'management-app/management-surat-kuasa',
        'where' => 
        array (
        ),
        'as' => 'management-app.surat-kuasa-samsat.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.role-management' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'management-app/role-management',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\Setting\\RoleManagementController@index',
        'controller' => 'App\\Http\\Controllers\\Setting\\RoleManagementController@index',
        'namespace' => NULL,
        'prefix' => 'management-app/role-management',
        'where' => 
        array (
        ),
        'as' => 'management-app.role-management',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.role-management.list' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'management-app/role-management',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\Setting\\RoleManagementController@list',
        'controller' => 'App\\Http\\Controllers\\Setting\\RoleManagementController@list',
        'namespace' => NULL,
        'prefix' => 'management-app/role-management',
        'where' => 
        array (
        ),
        'as' => 'management-app.role-management.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.role-management.create' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'management-app/role-management/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\Setting\\RoleManagementController@create',
        'controller' => 'App\\Http\\Controllers\\Setting\\RoleManagementController@create',
        'namespace' => NULL,
        'prefix' => 'management-app/role-management',
        'where' => 
        array (
        ),
        'as' => 'management-app.role-management.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.role-management.show' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'management-app/role-management/show',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\Setting\\RoleManagementController@show',
        'controller' => 'App\\Http\\Controllers\\Setting\\RoleManagementController@show',
        'namespace' => NULL,
        'prefix' => 'management-app/role-management',
        'where' => 
        array (
        ),
        'as' => 'management-app.role-management.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.role-management.edit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'management-app/role-management/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\Setting\\RoleManagementController@edit',
        'controller' => 'App\\Http\\Controllers\\Setting\\RoleManagementController@edit',
        'namespace' => NULL,
        'prefix' => 'management-app/role-management',
        'where' => 
        array (
        ),
        'as' => 'management-app.role-management.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.role-management.show-permission' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'management-app/role-management/show/permission/{roleId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\Setting\\RoleManagementController@showPermission',
        'controller' => 'App\\Http\\Controllers\\Setting\\RoleManagementController@showPermission',
        'namespace' => NULL,
        'prefix' => 'management-app/role-management',
        'where' => 
        array (
        ),
        'as' => 'management-app.role-management.show-permission',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.role-management.access-permission' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'management-app/role-management/access/permission',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\Setting\\RoleManagementController@roleAccessPermission',
        'controller' => 'App\\Http\\Controllers\\Setting\\RoleManagementController@roleAccessPermission',
        'namespace' => NULL,
        'prefix' => 'management-app/role-management',
        'where' => 
        array (
        ),
        'as' => 'management-app.role-management.access-permission',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'management-app.role-management.access.update-permission' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'management-app/role-management/access/role-permission',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\Setting\\RoleManagementController@roleUpdatePermission',
        'controller' => 'App\\Http\\Controllers\\Setting\\RoleManagementController@roleUpdatePermission',
        'namespace' => NULL,
        'prefix' => 'management-app/role-management',
        'where' => 
        array (
        ),
        'as' => 'management-app.role-management.access.update-permission',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'log.activity' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'log-activity',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\LogActivity\\LogActivityController@index',
        'controller' => 'App\\Http\\Controllers\\LogActivity\\LogActivityController@index',
        'namespace' => NULL,
        'prefix' => '/log-activity',
        'where' => 
        array (
        ),
        'as' => 'log.activity',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'log.activity-list' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'log-activity',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\LogActivity\\LogActivityController@list',
        'controller' => 'App\\Http\\Controllers\\LogActivity\\LogActivityController@list',
        'namespace' => NULL,
        'prefix' => '/log-activity',
        'where' => 
        array (
        ),
        'as' => 'log.activity-list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bjb-t-samsat.registrasi-samsat' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'bjb-t-samsat/registrasi-samsat',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\BjbSamsat\\RegistrasiSamsatController@index',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\BjbSamsat\\RegistrasiSamsatController@index',
        'namespace' => NULL,
        'prefix' => '/bjb-t-samsat',
        'where' => 
        array (
        ),
        'as' => 'bjb-t-samsat.registrasi-samsat',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bjb-t-samsat.registrasi-samsat.cek-nopol' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'bjb-t-samsat/registrasi-samsat/cek-nopol',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\BjbSamsat\\RegistrasiSamsatController@cekNopol',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\BjbSamsat\\RegistrasiSamsatController@cekNopol',
        'namespace' => NULL,
        'prefix' => '/bjb-t-samsat',
        'where' => 
        array (
        ),
        'as' => 'bjb-t-samsat.registrasi-samsat.cek-nopol',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bjb-t-samsat.registrasi-samsat.simulasi' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'bjb-t-samsat/simulasi',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\BjbSamsat\\RegistrasiSamsatController@simulasiTsamsat',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\BjbSamsat\\RegistrasiSamsatController@simulasiTsamsat',
        'namespace' => NULL,
        'prefix' => '/bjb-t-samsat',
        'where' => 
        array (
        ),
        'as' => 'bjb-t-samsat.registrasi-samsat.simulasi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bjb-t-samsat.registrasi-samsat.regist' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'bjb-t-samsat/registrasi-samsat',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\BjbSamsat\\RegistrasiSamsatController@registrasiTsamsat',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\BjbSamsat\\RegistrasiSamsatController@registrasiTsamsat',
        'namespace' => NULL,
        'prefix' => '/bjb-t-samsat',
        'where' => 
        array (
        ),
        'as' => 'bjb-t-samsat.registrasi-samsat.regist',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bjb-t-samsat.list-tabungan' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'bjb-t-samsat/list-tabungan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\BjbSamsat\\ListTabunganController@index',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\BjbSamsat\\ListTabunganController@index',
        'namespace' => NULL,
        'prefix' => '/bjb-t-samsat',
        'where' => 
        array (
        ),
        'as' => 'bjb-t-samsat.list-tabungan',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bjb-t-samsat.list-tabungan.list' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'bjb-t-samsat/list-tabungan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\BjbSamsat\\ListTabunganController@list',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\BjbSamsat\\ListTabunganController@list',
        'namespace' => NULL,
        'prefix' => '/bjb-t-samsat',
        'where' => 
        array (
        ),
        'as' => 'bjb-t-samsat.list-tabungan.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bjb-t-samsat.list-tabungan.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'bjb-t-samsat/list-tabungan/show/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\BjbSamsat\\ListTabunganController@show',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\BjbSamsat\\ListTabunganController@show',
        'namespace' => NULL,
        'prefix' => '/bjb-t-samsat',
        'where' => 
        array (
        ),
        'as' => 'bjb-t-samsat.list-tabungan.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bjb-t-samsat.list-tabungan.export' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'bjb-t-samsat/list-tabungan/export',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\BjbSamsat\\ListTabunganController@export',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\BjbSamsat\\ListTabunganController@export',
        'namespace' => NULL,
        'prefix' => '/bjb-t-samsat',
        'where' => 
        array (
        ),
        'as' => 'bjb-t-samsat.list-tabungan.export',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bjb-t-samsat.pembatalan' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'bjb-t-samsat/pembatalan-samsat',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\BjbSamsat\\PembatalanController@index',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\BjbSamsat\\PembatalanController@index',
        'namespace' => NULL,
        'prefix' => '/bjb-t-samsat',
        'where' => 
        array (
        ),
        'as' => 'bjb-t-samsat.pembatalan',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bjb-t-samsat.pembatalan.detail' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'bjb-t-samsat/pembatalan-samsat/detail',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\BjbSamsat\\PembatalanController@detailPembatalan',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\BjbSamsat\\PembatalanController@detailPembatalan',
        'namespace' => NULL,
        'prefix' => '/bjb-t-samsat',
        'where' => 
        array (
        ),
        'as' => 'bjb-t-samsat.pembatalan.detail',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bjb-t-samsat.pembatalan.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'bjb-t-samsat/pembatalan-samsat/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\BjbSamsat\\PembatalanController@updatePembatalan',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\BjbSamsat\\PembatalanController@updatePembatalan',
        'namespace' => NULL,
        'prefix' => '/bjb-t-samsat',
        'where' => 
        array (
        ),
        'as' => 'bjb-t-samsat.pembatalan.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bjb-t-samsat.surat-kuasa' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'bjb-t-samsat/surat-kuasa',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\BjbSamsat\\SuratKuasaController@index',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\BjbSamsat\\SuratKuasaController@index',
        'namespace' => NULL,
        'prefix' => '/bjb-t-samsat',
        'where' => 
        array (
        ),
        'as' => 'bjb-t-samsat.surat-kuasa',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bjb-t-samsat.surat-kuasa.detail' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'bjb-t-samsat/surat-kuasa/detail',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\BjbSamsat\\SuratKuasaController@detail',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\BjbSamsat\\SuratKuasaController@detail',
        'namespace' => NULL,
        'prefix' => '/bjb-t-samsat',
        'where' => 
        array (
        ),
        'as' => 'bjb-t-samsat.surat-kuasa.detail',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bjb-t-samsat.surat-kuasa.generate-docx' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'bjb-t-samsat/surat-kuasa/generate-docx',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\BjbSamsat\\SuratKuasaController@generateDocx',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\BjbSamsat\\SuratKuasaController@generateDocx',
        'namespace' => NULL,
        'prefix' => '/bjb-t-samsat',
        'where' => 
        array (
        ),
        'as' => 'bjb-t-samsat.surat-kuasa.generate-docx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'approval-samsat' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'approval-samsat',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\Approval\\ApprovalController@index',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\Approval\\ApprovalController@index',
        'namespace' => NULL,
        'prefix' => '/approval-samsat',
        'where' => 
        array (
        ),
        'as' => 'approval-samsat',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'approval-samsat.list' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'approval-samsat',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\Approval\\ApprovalController@list',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\Approval\\ApprovalController@list',
        'namespace' => NULL,
        'prefix' => '/approval-samsat',
        'where' => 
        array (
        ),
        'as' => 'approval-samsat.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'approval-samsat.update-approve-registrasi' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'approval-samsat/update-registrasi',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\Approval\\ApprovalController@approvaRegistrasilUpdate',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\Approval\\ApprovalController@approvaRegistrasilUpdate',
        'namespace' => NULL,
        'prefix' => '/approval-samsat',
        'where' => 
        array (
        ),
        'as' => 'approval-samsat.update-approve-registrasi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'approval-samsat.update-approve-pembatalan' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'approval-samsat/update-pembatalan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\Approval\\ApprovalController@approvalPembatalanUpdate',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\Approval\\ApprovalController@approvalPembatalanUpdate',
        'namespace' => NULL,
        'prefix' => '/approval-samsat',
        'where' => 
        array (
        ),
        'as' => 'approval-samsat.update-approve-pembatalan',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'approval-samsat.update-approve-pembatalan-aro' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'approval-samsat/update-pembatalan-aro',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\Approval\\ApprovalController@approvalPembatalanAroUpdate',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\Approval\\ApprovalController@approvalPembatalanAroUpdate',
        'namespace' => NULL,
        'prefix' => '/approval-samsat',
        'where' => 
        array (
        ),
        'as' => 'approval-samsat.update-approve-pembatalan-aro',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'approval-samsat.update-reject' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'approval-samsat/reject',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\Approval\\ApprovalController@rejectUpdate',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\Approval\\ApprovalController@rejectUpdate',
        'namespace' => NULL,
        'prefix' => '/approval-samsat',
        'where' => 
        array (
        ),
        'as' => 'approval-samsat.update-reject',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'approval-samsat.check-user' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'approval-samsat/check-user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\Approval\\ApprovalController@checkUser',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\Approval\\ApprovalController@checkUser',
        'namespace' => NULL,
        'prefix' => '/approval-samsat',
        'where' => 
        array (
        ),
        'as' => 'approval-samsat.check-user',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'download-manager.samsat' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'download-manager-samsat',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\DownloadManager\\DownloadManagerController@index',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\DownloadManager\\DownloadManagerController@index',
        'namespace' => NULL,
        'prefix' => '/download-manager-samsat',
        'where' => 
        array (
        ),
        'as' => 'download-manager.samsat',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'download-manager.list.samsat' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'download-manager-samsat',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\DownloadManager\\DownloadManagerController@list',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\DownloadManager\\DownloadManagerController@list',
        'namespace' => NULL,
        'prefix' => '/download-manager-samsat',
        'where' => 
        array (
        ),
        'as' => 'download-manager.list.samsat',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'download-manager.download.samsat' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'download-manager-samsat/download/{params}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\DownloadManager\\DownloadManagerController@download',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\DownloadManager\\DownloadManagerController@download',
        'namespace' => NULL,
        'prefix' => '/download-manager-samsat',
        'where' => 
        array (
        ),
        'as' => 'download-manager.download.samsat',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'laporan-samsat.registrasi' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'laporan-samsat/registrasi',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\Laporan\\LaporanRegistrasiController@index',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\Laporan\\LaporanRegistrasiController@index',
        'namespace' => NULL,
        'prefix' => '/laporan-samsat',
        'where' => 
        array (
        ),
        'as' => 'laporan-samsat.registrasi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'laporan-samsat.registrasi-list' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'laporan-samsat/registrasi',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\Laporan\\LaporanRegistrasiController@list',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\Laporan\\LaporanRegistrasiController@list',
        'namespace' => NULL,
        'prefix' => '/laporan-samsat',
        'where' => 
        array (
        ),
        'as' => 'laporan-samsat.registrasi-list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'laporan-samsat.registrasi-export' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'laporan-samsat/registrasi/export',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\Laporan\\LaporanRegistrasiController@export',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\Laporan\\LaporanRegistrasiController@export',
        'namespace' => NULL,
        'prefix' => '/laporan-samsat',
        'where' => 
        array (
        ),
        'as' => 'laporan-samsat.registrasi-export',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'laporan-samsat.pembatalan' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'laporan-samsat/pembatalan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\Laporan\\LaporanPembatalanController@index',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\Laporan\\LaporanPembatalanController@index',
        'namespace' => NULL,
        'prefix' => '/laporan-samsat',
        'where' => 
        array (
        ),
        'as' => 'laporan-samsat.pembatalan',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'laporan-samsat.pembatalan-list' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'laporan-samsat/pembatalan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\Laporan\\LaporanPembatalanController@list',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\Laporan\\LaporanPembatalanController@list',
        'namespace' => NULL,
        'prefix' => '/laporan-samsat',
        'where' => 
        array (
        ),
        'as' => 'laporan-samsat.pembatalan-list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'laporan-samsat.pembatalan-export' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'laporan-samsat/pembatalan/export',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkauth',
        ),
        'uses' => 'App\\Http\\Controllers\\TSamsat\\Laporan\\LaporanPembatalanController@export',
        'controller' => 'App\\Http\\Controllers\\TSamsat\\Laporan\\LaporanPembatalanController@export',
        'namespace' => NULL,
        'prefix' => '/laporan-samsat',
        'where' => 
        array (
        ),
        'as' => 'laporan-samsat.pembatalan-export',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
