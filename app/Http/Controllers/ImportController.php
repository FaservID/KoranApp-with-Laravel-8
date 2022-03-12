<?php

namespace App\Http\Controllers;

use App\Imports\CustomerImport;
use App\Imports\KoranImport;
use App\Imports\ManageKoranImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function importKoranHarian(Request $request)
    {
        Excel::import(new ManageKoranImport, $request->file('excelKoranMasuk'));

        return redirect()->back()->with('pesan', 'Data Berhasil Di Import');
    }

    public function importKoran(Request $request)
    {
        Excel::import(new KoranImport, $request->file('excelKoran'));

        return redirect()->back()->with('pesan', 'Data Berhasil Di Import');
    }

    public function importCustomer(Request $request)
    {
        Excel::import(new CustomerImport, $request->file('excelCustomer'));

        return redirect()->back()->with('pesan', 'Data Berhasil Di Import');
    }
}
