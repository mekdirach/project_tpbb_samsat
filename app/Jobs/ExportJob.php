<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\DaftarTpbbExport;
use App\Models\MpDownloadManager;
use App\Exports\LaporanBlokirExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Queue\SerializesModels;
use App\Models\Views\VPbbLaporanBlokir;
use Illuminate\Support\Facades\Session;
use App\Exports\LaporanPembatalanExport;
use App\Models\Views\VPbbDaftarTabungan;
use Illuminate\Queue\InteractsWithQueue;
use App\Exports\LaporanPendaftaranExport;
use App\Models\Views\VPbbLaporanTransaksi;
use App\Models\Views\VPbbLaporanPembatalan;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Exports\LaporanTransaksiGagalExport;
use App\Models\Views\VPbbLaporanPendaftaran;
use App\Exports\LaporanTransaksiSuksesExport;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ExportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $parameter;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($value)
    {
        $this->parameter = $value;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $request        = $this->parameter['request'];
        $type           = $this->parameter['type'];
        $count          = $this->parameter['count'];
        $export_type    = $request['type'];
        $date           = date('Ymd - hms');

        if($export_type == '1'){
            if(strtolower($type) == 'daftar-tpbb'){
                $fileName   = 'daftar-tpbb-' . $date . '.xlsx';
            }else if(strtolower($type) == 'pendaftaran'){
                $fileName   = 'laporan-pendaftaran-'. $date . '.xlsx';
            }else if(strtolower($type) == 'pembatalan'){
                $fileName   = 'laporan-pembatalan-'. $date . '.xlsx';
            }else if(strtolower($type) == 'blokir'){
                $fileName   = 'laporan-blokir-'. $date . '.xlsx';
            }else if(strtolower($type) == 'transaksi-sukses'){
                $fileName   = 'laporan-transaksi-sukses-' . $date . '.xlsx';
            }else if(strtolower($type) == 'transaksi-gagal'){
                $fileName   = 'laporan-transaksi-gagal-' . $date . '.xlsx';
            }
        }else{
            if(strtolower($type) == 'daftar-tpbb'){
                $fileName   = 'daftar-tpbb-' . $date . '.pdf';
            }else if(strtolower($type) == 'pendaftaran'){
                $fileName   = 'laporan-pendaftaran-'. $date . '.pdf';
            }else if(strtolower($type) == 'pembatalan'){
                $fileName   = 'laporan-pembatalan-'. $date . '.pdf';
            }else if(strtolower($type) == 'blokir'){
                $fileName   = 'laporan-blokir-'. $date . '.pdf';
            }else if(strtolower($type) == 'transaksi-sukses'){
                $fileName   = 'laporan-transaksi-sukses-' . $date . '.pdf';
            }else if(strtolower($type) == 'transaksi-gagal'){
                $fileName   = 'laporan-transaksi-gagal-' . $date . '.pdf';
            }
        }

        $extension = explode('.', $fileName);
        $dm = new MpDownloadManager();
        $dm->branch_code    = $request['session_kode_cabang'];
        $dm->counted_record = $count;
        $dm->document_type  = $type;
        $dm->path           = "app\\";
        $dm->filename       = $fileName;
        $dm->extension_file = '.' . $extension[1];
        $dm->save();

        if($export_type == '1'){
            //excel
            if(strtolower($type) == 'pendaftaran'){
                $action = Excel::store(new LaporanPendaftaranExport($request), $fileName);
            }else if(strtolower($type) == 'pembatalan'){
                $action = Excel::store(new LaporanPembatalanExport($request), $fileName);
            }else if(strtolower($type) == 'blokir'){
                $action = Excel::store(new LaporanBlokirExport($request), $fileName);
            }else if(strtolower($type) == 'transaksi-sukses'){
                $action = Excel::store(new LaporanTransaksiSuksesExport($request), $fileName);
            }else if(strtolower($type) == 'transaksi-gagal'){
                $action = Excel::store(new LaporanTransaksiGagalExport($request), $fileName);
            }else if(strtolower($type) == 'daftar-tpbb'){
                $action = Excel::store(new DaftarTpbbExport($request), $fileName);
            }
        }else{
            //pdf
            ini_set('max_execution_time', '300');
            ini_set('memory_limit', '256M');
              if(strtolower($type) == 'pendaftaran'){
                $records = $this->getLaporanPendaftaran($request);

                $rangeDate = (object)[
                  'start_date'    => date("d-m-Y", strtotime($request['mStart'])),
                  'end_date'      => date("d-m-Y", strtotime($request['mEnd'])),
                ];
                $detailPdf = [
                  'judul' => 'Laporan Registrasi Menabung dan Auto Blokir Menabung Pajak Bumi dan Bangunan',
                ];
                $pdf = Pdf::loadView("/exports/pdf/laporan-pendaftaran", compact('records', 'rangeDate', 'detailPdf'))->setPaper('a3', 'landscape');
                $content = $pdf->download()->getOriginalContent();
                file_put_contents(storage_path('app/'.$fileName), $content);
              }else if(strtolower($type) == 'pembatalan'){
                $records = $this->getLaporanPembatalan($request);

                $rangeDate = (object)[
                  'start_date'    => date("d-m-Y", strtotime($request['mStart'])),
                  'end_date'      => date("d-m-Y", strtotime($request['mEnd'])),
                ];
                $detailPdf = [
                  'judul' => 'Laporan Pembatalan Proses Autodebet Menabung Pajak Bumi dan Bangunan',
                ];
                $pdf = Pdf::loadView("/exports/pdf/laporan-pembatalan", compact('records', 'rangeDate', 'detailPdf'))->setPaper('a3', 'landscape');
                $content = $pdf->download()->getOriginalContent();
                file_put_contents(storage_path('app/'.$fileName), $content);
              }else if(strtolower($type) == 'blokir'){
                $records = $this->getLaporanBlokir($request);

                $rangeDate = (object)[
                  'start_date'    => date("d-m-Y", strtotime($request['mStart'])),
                  'end_date'      => date("d-m-Y", strtotime($request['mEnd'])),
                ];
                $detailPdf = [
                  'judul' => 'Laporan Blokir Proses Autodebet Menabung Pajak Bumi dan Bangunan',
                ];
                $pdf = Pdf::loadView("/exports/pdf/laporan-blokir", compact('records', 'rangeDate', 'detailPdf'))->setPaper('a3', 'landscape');
                $content = $pdf->download()->getOriginalContent();
                file_put_contents(storage_path('app/'.$fileName), $content);
              }else if(strtolower($type) == 'transaksi-sukses'){
                $records = $this->getLaporanTransaksiSukses($request);

                $rangeDate = (object)[
                  'start_date'    => date("d-m-Y", strtotime($request['mStart'])),
                  'end_date'      => date("d-m-Y", strtotime($request['mEnd'])),
                ];
                $detailPdf = [
                  'judul' => 'Laporan Pembayaran Sukses Proses Autodebet Menabung Pajak Bumi dan Bangunan',
                ];
                $pdf = Pdf::loadView("/exports/pdf/laporan-transaksi-sukses", compact('records', 'rangeDate', 'detailPdf'))->setPaper('a3', 'landscape');
                $content = $pdf->download()->getOriginalContent();
                file_put_contents(storage_path('app/'.$fileName), $content);
              }else if(strtolower($type) == 'transaksi-gagal'){
                $records = $this->getLaporanTransaksiGagal($request);

                $rangeDate = (object)[
                  'start_date'    => date("d-m-Y", strtotime($request['mStart'])),
                  'end_date'      => date("d-m-Y", strtotime($request['mEnd'])),
                ];
                $detailPdf = [
                  'judul' => 'Laporan Pembayaran Gagal Proses Autodebet Menabung Pajak Bumi dan Bangunan',
                ];
                $pdf = Pdf::loadView("/exports/pdf/laporan-transaksi-gagal", compact('records', 'rangeDate', 'detailPdf'))->setPaper('a3', 'landscape');
                $content = $pdf->download()->getOriginalContent();
                file_put_contents(storage_path('app/'.$fileName), $content);
              }else if(strtolower($type) == 'daftar-tpbb'){
                $records = $this->getDaftarTpbb($request);

                // $rangeDate = (object)[
                //   'start_date'    => date("d-m-Y", strtotime($request['mStart'])),
                //   'end_date'      => date("d-m-Y", strtotime($request['mEnd'])),
                // ];
                $detailPdf = [
                  'judul' => 'Daftar T-PBB',
                ];
                $pdf = Pdf::loadView("/exports/pdf/daftar-tpbb", compact('records', 'detailPdf'))->setPaper('a3', 'landscape');
                $content = $pdf->download()->getOriginalContent();
                file_put_contents(storage_path('app/'.$fileName), $content);
              }
        }
    }

    public function getLaporanPendaftaran($request) {
        $branch = isset($request['mBranch']) ? $request['mBranch'] : null;
        $pemda = isset($request['mPemda']) ? $request['mPemda'] : null;
        $nop = isset($request['mNop']) ? $request['mNop'] : null;
        $nama = isset($request['mNama']) ? $request['mNama'] : null;
        $norek = isset($request['mNorek']) ? $request['mNorek'] : null;
        $start = isset($request['mStart']) ? $request['mStart'] : null;
        $end = isset($request['mEnd']) ? $request['mEnd'] : null;

        $records = VPbbLaporanPendaftaran::orderBy('pbb_c_reg_date', 'asc');

        if ($branch && $branch != 'ALL') {
            $records->where('pbb_c_created_office', $branch);
        }

        if($pemda){
            $records->where('mp_p_id', $pemda);
        }

        if($nop){
            $records->where('pbb_c_nop', $nop);
        }

        if($nama){
            $search = $nama;
            $records->where(function($records) use($search){
                $records->where('pbb_c_nop_name', 'ilike', "%$search%");
            });
        }

        if($norek){
            $records->where('pbb_c_src_extacc', $norek);
        }

        if($start){
            $records->where('pbb_c_reg_date', '>=', "$start 00:00:00");
        }

        if($end){
            $records->where('pbb_c_reg_date', '<=', "$end 23:59:59");
        }

        return $records->get();
    }

    public function getLaporanPembatalan($request) {
        $branch = isset($request['mBranch']) ? $request['mBranch'] : null;
        $pemda = isset($request['mPemda']) ? $request['mPemda'] : null;
        $nop = isset($request['mNop']) ? $request['mNop'] : null;
        $nama = isset($request['mNama']) ? $request['mNama'] : null;
        $norek = isset($request['mNorek']) ? $request['mNorek'] : null;
        $start = isset($request['mStart']) ? $request['mStart'] : null;
        $end = isset($request['mEnd']) ? $request['mEnd'] : null;

        $records = VPbbLaporanPembatalan::orderBy('pbb_c_reg_date', 'asc');

        if ($branch && $branch != 'ALL') {
            $records->where('pbb_c_created_office', $branch);
        }

        if($pemda){
            $records->where('mp_p_id', $pemda);
        }

        if($nop){
            $records->where('pbb_c_nop', $nop);
        }

        if($nama){
            $search = $nama;
            $records->where(function($records) use($search){
                $records->where('pbb_c_nop_name', 'ilike', "%$search%");
            });
        }

        if($norek){
            $records->where('pbb_c_src_extacc', $norek);
        }

        if($start){
            $records->where('pbb_c_reg_date', '>=', "$start 00:00:00");
        }

        if($end){
            $records->where('pbb_c_reg_date', '<=', "$end 23:59:59");
        }

        return $records->get();
    }

    public function getLaporanBlokir($request) {
        $branch = isset($request['mBranch']) ? $request['mBranch'] : null;
        $pemda = isset($request['mPemda']) ? $request['mPemda'] : null;
        $nop = isset($request['mNop']) ? $request['mNop'] : null;
        $nama = isset($request['mNama']) ? $request['mNama'] : null;
        $norek = isset($request['mNorek']) ? $request['mNorek'] : null;
        $start = isset($request['mStart']) ? $request['mStart'] : null;
        $end = isset($request['mEnd']) ? $request['mEnd'] : null;

        $records      = VPbbLaporanBlokir::orderBy('mp_pbb_ab_tgl_blokir', 'asc');

        if ($branch && $branch != 'ALL') {
            $records->where('pbb_c_created_office', $branch);
        }

        if($pemda){
            $records->where('mp_p_id', $pemda);
        }

        if($nop){
            $records->where('mp_pbb_ab_nop', $nop);
        }

        if($nama){
            $search = $nama;
            $records->where(function($records) use($search){
                $records->where('mp_pbb_cl_nop_name', 'ilike', "%$search%");
            });
        }

        if($norek){
            $records->where('mp_pbb_ab_src_extacc', $norek);
        }

        if($start){
            $records->where('mp_pbb_ab_tgl_blokir', '>=', "$start 00:00:00");
        }

        if($end){
            $records->where('mp_pbb_ab_tgl_blokir', '<=', "$end 23:59:59");
        }

        return $records->get();
    }

    public function getLaporanTransaksiSukses($request) {
        $branch = isset($request['mBranch']) ? $request['mBranch'] : null;
        $pemda = isset($request['mPemda']) ? $request['mPemda'] : null;
        $nop = isset($request['mNop']) ? $request['mNop'] : null;
        $nama = isset($request['mNama']) ? $request['mNama'] : null;
        $norek = isset($request['mNorek']) ? $request['mNorek'] : null;
        $start = isset($request['mStart']) ? $request['mStart'] : null;
        $end = isset($request['mEnd']) ? $request['mEnd'] : null;

        $records      = VPbbLaporanTransaksi::where('mp_pbb_tp_rc', '0000')
        ->orderBy('mp_pbb_tp_tgl_pembayaran', 'asc');

        if ($branch && $branch != 'ALL') {
            $records->where('pbb_c_created_office', $branch);
        }

        if($pemda){
            $records->where('mp_p_id', $pemda);
        }

        if($nop){
            $records->where('pbb_c_nop', $nop);
        }

        if($nama){
            $search = $nama;
            $records->where(function($records) use($search){
                $records->where('pbb_c_nop_name', 'ilike', "%$search%");
            });
        }

        if($norek){
            $records->where('pbb_c_src_extacc', $norek);
        }

        if($start){
            $records->where('mp_pbb_tp_tgl_pembayaran', '>=', "$start 00:00:00");
        }

        if($end){
            $records->where('mp_pbb_tp_tgl_pembayaran', '<=', "$end 23:59:59");
        }

        return $records->get();
    }

    public function getLaporanTransaksiGagal($request) {
        $branch = isset($request['mBranch']) ? $request['mBranch'] : null;
        $pemda = isset($request['mPemda']) ? $request['mPemda'] : null;
        $nop = isset($request['mNop']) ? $request['mNop'] : null;
        $nama = isset($request['mNama']) ? $request['mNama'] : null;
        $norek = isset($request['mNorek']) ? $request['mNorek'] : null;
        $start = isset($request['mStart']) ? $request['mStart'] : null;
        $end = isset($request['mEnd']) ? $request['mEnd'] : null;

        $records      = VPbbLaporanTransaksi::where('mp_pbb_tp_rc', '<>', '0000')
        ->orderBy('mp_pbb_tp_tgl_pembayaran', 'asc');

        if ($branch && $branch != 'ALL') {
            $records->where('pbb_c_created_office', $branch);
        }

        if($pemda){
            $records->where('mp_p_id', $pemda);
        }

        if($nop){
            $records->where('pbb_c_nop', $nop);
        }

        if($nama){
            $search = $nama;
            $records->where(function($records) use($search){
                $records->where('pbb_c_nop_name', 'ilike', "%$search%");
            });
        }

        if($norek){
            $records->where('pbb_c_src_extacc', $norek);
        }

        if($start){
            $records->where('mp_pbb_tp_tgl_pembayaran', '>=', "$start 00:00:00");
        }

        if($end){
            $records->where('mp_pbb_tp_tgl_pembayaran', '<=', "$end 23:59:59");
        }

        return $records->get();
    }

    public function getDaftarTpbb($request) {
        $branch = isset($request['mBranch']) ? $request['mBranch'] : null;
        $pemda = isset($request['mPemda']) ? $request['mPemda'] : null;
        $nop = isset($request['mNop']) ? $request['mNop'] : null;
        $nama = isset($request['mNama']) ? $request['mNama'] : null;
        $norek = isset($request['mNorek']) ? $request['mNorek'] : null;

        $records      = VPbbDaftarTabungan::orderBy('mp_p_id', 'asc');

        if($branch && $branch != 'ALL'){
            $records->where('pbb_c_created_office', $branch);
        }

        if($pemda){
            $records->where('mp_p_id', $pemda);
        }

        if($nop){
            $records->where('pbb_c_nop', $nop);
        }

        if($nama){
            $search = $nama;
            $records->where(function($records) use($search){
                $records->where('pbb_c_nop_name', 'ilike', "%$search%");
            });
        }

        if($norek){
            $records->where('pbb_c_src_extacc', $norek);
        }

        return $records->get();
    }
}
