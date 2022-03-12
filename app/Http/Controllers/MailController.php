<?php

namespace App\Http\Controllers;

use App\Mail\TagihanMail;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class MailController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function kirimTagihan(Request $request)
    {
        $emails = $request->email;
        $name = $request->nama;
        if ($emails == null) {
            return back()->with('toast_error', 'Tidak ada email yang dipilih');
        }
        $customers = Customer::where('val_id', 1)->get();
        // dd($emails);
        $details = [
            'title' => 'Tagihan Koran Bulan ',
            'body' => 'Lorem lorem lorem dolor sit amer',
            'customers' => Customer::where('val_id', 1)->get()
        ];
        foreach ($emails as $email) {
            foreach ($customers as $cust) {
                if ($email == $cust->email) {
                    $data = [
                        'nama' => $cust->nama,
                        'price' => $cust->prices,
                        'bulan' => Carbon::now()->isoFormat('MMMM')
                    ];
                    Mail::to($email)->send(new TagihanMail($details, $data));
                }
            }
        }
        return redirect()->back()->withToastSuccess('Berhasil mengirim tagihan!');
    }
}
