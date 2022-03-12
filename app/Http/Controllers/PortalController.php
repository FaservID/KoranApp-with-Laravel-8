<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Koran;
use App\Models\Customer;
use App\Models\Order;
use App\Models\User;
use App\Notifications\Pesanan;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class PortalController extends Controller
{

    public function index()
    {
        $data = [
            'koran' => Koran::all(),
            'paket' => paket::all()
        ];
        return view('home', $data);
    }

    public function store()
    {
        $koran = Koran::all();
        $paket = Paket::all();
        return view('order', compact('paket', 'koran'));
    }

    public function order(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'id_paket' => 'required',
            'items' => 'required',
            'qty' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', 'Form Input Tidak Boleh Kosong');
        }
        // GET PAKET
        $getPaket = $request->id_paket;
        $paket = Paket::all();
        foreach ($paket as $pkt) {
            if ($getPaket == $pkt->id_paket)
                $varPaket = $pkt->total_hari;
        }

        $korans = Koran::all();
        $getKoran = $request->items;
        $getQty = $request->qty;
        $quantity = array();
        // dd($getKoran, $getQty);
        $harga = array();
        $quantity = array();
        $total = array();
        $len = count($getQty);
        foreach ($getKoran as $koran) {
            foreach ($korans as $item) {
                if ($koran == $item->id_koran) {
                    foreach ($getQty as $qty) {
                        $quantity[] = $qty;
                    }
                    $harga[] = $item->harga;
                }
            }
        }
        for ($i = 0; $i < $len; $i++) {
            $total[] = $harga[$i] * $quantity[$i] * $varPaket;
        }
        $grandtotal = array_sum($total);
        $data = $request->all();
        $user = User::all();
        $customer = new Customer();
        $customer->nama = $request->nama;
        $customer->alamat = $request->alamat;
        $customer->email = $request->email;
        $customer->id_paket = $request->id_paket;
        $customer->val_id = 0;
        $customer->phone = $request->phone;
        $customer->tanggal_langganan = $request->tanggal_langganan;
        $customer->prices = $grandtotal;
        $customer->save();
        Notification::send($user, new Pesanan($request->nama, $request->phone, $request->email));

        if (count($data['items']) > 0) {
            foreach ($data['items'] as $item => $value) {
                $data2 = array(
                    'id_order' => $customer->id,
                    'item' => $data['items'][$item],
                    'qty' => $data['qty'][$item],
                    'id_paket' => $customer->id_paket
                );
                Order::create($data2);
            }
        }
        return redirect()->back()->withToastSuccess('Pesanan Anda Berhasil Diterima!');
    }
}
