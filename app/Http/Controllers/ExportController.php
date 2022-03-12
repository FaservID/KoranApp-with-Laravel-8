<?php

namespace App\Http\Controllers;

use App\Exports\CustomerExport;
use App\Exports\KoranExport;
use App\Exports\ManageKoranExport;
use App\Exports\PaketExport;
use App\Models\Customer;
use App\Models\ManageKoran;
use App\Models\Order;
use Carbon\Carbon;
use App\Models\Koran;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportKoranHariantoExcel()
    {
        return Excel::download(new ManageKoranExport, 'Data Koran Harian.xlsx');
    }

    public function exportKoran()
    {
        return Excel::download(new KoranExport, 'Data Koran.xlsx');
    }

    public function exportCustomer()
    {
        return Excel::download(new CustomerExport, 'Data Customers.xlsx');
    }

    public function exportPaket()
    {
        return Excel::download(new PaketExport, 'Data Paket.xlsx');
    }

    public function exportKoranPdf()
    {
        $koran = Koran::all();
        return view('reports.laporan-koran', compact('koran'));
    }

    public function exportpdfKoranMasuk($tgl_awal, $tgl_akhir)
    {
        $newsPapers = ManageKoran::join('korans', 'korans.id_koran', '=', 'manage_korans.id_koran')
            ->orderBy('tanggal_masuk', 'asc')
            ->whereBetween('tanggal_masuk', [$tgl_awal, $tgl_akhir])->get();
        $koran_terkirim = ManageKoran::whereBetween('tanggal_masuk', [$tgl_awal, $tgl_akhir])->sum('koran_terkirim');
        $koran_masuk = ManageKoran::sum('koran_masuk');
        $koran_sisa = ManageKoran::sum('koran_sisa');
        $tglawal = Carbon::parse($tgl_awal)->translatedFormat('d F Y');
        $tglakhir = Carbon::parse($tgl_akhir)->translatedFormat('d F Y');
        return view('reports.laporan-koran-harian', compact('newsPapers', 'tglawal', 'tglakhir', 'koran_terkirim', 'koran_masuk', 'koran_sisa'));
    }

    public function exportpdfKoranlangganan($tgl_awal, $tgl_akhir)
    {
        $custs = Customer::join('pakets', 'pakets.id_paket', '=', 'customers.id_paket')
            ->orderBy('nama')
            ->whereBetween('tanggal_langganan', [$tgl_awal, $tgl_akhir])->where('val_id', 1)->get();

        $koran = Order::join('korans', 'korans.id_koran', '=', 'orders.item')->get();

        $tglawal = Carbon::parse($tgl_awal)->translatedFormat('d F Y');

        $tglakhir = Carbon::parse($tgl_akhir)->translatedFormat('d F Y');

        return view('reports.laporan-customer', compact('custs', 'tglawal', 'tglakhir', 'koran'));
    }
}
