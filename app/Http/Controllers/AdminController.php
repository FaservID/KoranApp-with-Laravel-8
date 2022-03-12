<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Koran;
use App\Models\ManageKoran;
use App\Models\Order;
use App\Models\User;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Validator;
use Laravel\Ui\Presets\React;
use PhpParser\Node\Expr\FuncCall;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        //Do your magic here
    }

    public function samplePage1()
    {
        $user = User::find(1);
        $data = [
            'koran' => Koran::all(),
            'notifications' => $user->unreadNotifications, //FOR NOTIFICATIONS
            'paket' => Paket::all(),
            'getNewOrder' => Customer::where('val_id', 0)->count(),
        ];
        return view('admin.samplePage', $data);
    }

    public function samplePage2()
    {
        $data = [
            'koran' => Koran::all(),
            'notifications' => auth()->user()->unreadNotifications, //FOR NOTIFICATIONS
            'paket' => Paket::all(),
            'getNewOrder' => Customer::where('val_id', 0)->count(),

        ];
        return view('admin.samplePage2', $data);
    }

    public function index()
    {
        $notifications = auth()->user()->unreadNotifications;
        $jenis_koran = Koran::all();
        $custs = Customer::all();
        //AMBIL DATA STATISTIK
        $dataKoran = [];
        $dataCusts = [];
        foreach ($jenis_koran as $jk) {
            $dataKoran[] = $jk->nama_koran;
        }

        foreach ($custs as $cust) {
            $dataCusts[] = $cust->status_langganan;
        }
        $data = [
            'koran' => Koran::count(),
            'customers' => Customer::count(),
            'koranharian' => ManageKoran::count(),
            'user' => User::count(),
            'reqorder' => Customer::where('val_id', 0)->count(),
            'kompas' => ManageKoran::where('id_koran', 1)->sum('koran_masuk'),
            'sripos' => ManageKoran::where('id_koran', 2)->sum('koran_masuk'),
            'tribun' => ManageKoran::where('id_koran', 3)->sum('koran_masuk'),
            'sumeks' => ManageKoran::where('id_koran', 4)->sum('koran_masuk'),
            'palpos' => ManageKoran::where('id_koran', 5)->sum('koran_masuk'),
            'hrmuba' => ManageKoran::where('id_koran', 6)->sum('koran_masuk'),
            'radar' => ManageKoran::where('id_koran', 7)->sum('koran_masuk'),
            'palpres' => ManageKoran::where('id_koran', 8)->sum('koran_masuk'),
            'medias' => ManageKoran::where('id_koran', 9)->sum('koran_masuk'),
            'suara' => ManageKoran::where('id_koran', 10)->sum('koran_masuk'),
            'getNewOrder' => Customer::where('val_id', 0)->count(),

        ];
        return view('admin.home', compact('notifications', 'dataKoran', 'dataCusts'), $data);
    }

    //KORAN
    public function koran()
    {
        $data = [
            'koran' => Koran::all(),
            'notifications' => auth()->user()->unreadNotifications, //FOR NOTIFICATIONS
            'getNewOrder' => Customer::where('val_id', 0)->count(),

        ];
        return view('admin.koran', $data);
    }

    public function tambahKoran(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_koran' => 'required',
            'nama_koran' => 'required',
            'harga' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', 'Form Input Tidak Boleh Kosong')->withErrors([
                'kode_koran' => 'Kode Koran Tidak Boleh Kosong',
                'nama_koran' => 'Nama Koran Tidak Boleh Kosong',
                'harga' => 'Harga Tidak Boleh Kosong',
            ]);
        }
        $file = $request->logo_brand;
        $fileName = $request->nama_koran . '.' . $file->extension();
        $file->move(public_path('foto/koran/'), $fileName);

        $koran = new Koran();
        $koran->kode_koran = $request->kode_koran;
        $koran->nama_koran = $request->nama_koran;
        $koran->harga = $request->harga;
        $koran->logo_brand = $fileName;
        $koran->save();
        return redirect()->back()->with('pesan', 'Data Berhasil Ditambahkan');
    }

    public function editKoran(Request $request, $id_koran)
    {
        $koran = Koran::find($id_koran);

        if ($request->logo_brand <> "") {
            $file = $request->logo_brand;
            $fileName = $request->nama_koran . '.' . $file->extension();
            $file->move(public_path('foto/koran/'), $fileName);
            $koran->kode_koran = $request->kode_koran;
            $koran->nama_koran = $request->nama_koran;
            $koran->harga = $request->harga;
            $koran->logo_brand = $fileName;
            $koran->update();
        } else {
            $koran->kode_koran = $request->kode_koran;
            $koran->nama_koran = $request->nama_koran;
            $koran->harga = $request->harga;
            $koran->update();
        }
        return redirect()->back()->with('pesan', 'Data Berhasil Diubah');
    }

    public function deleteKoran(Request $request, $id_koran)
    {
        $koran = Koran::findOrFail($id_koran);
        $koran->delete();
        return redirect()->back()->with('pesan', 'Data Berhasil Dihapus');
    }

    // Customer 
    public function customers()
    {
        $data = [
            'notifications' => auth()->user()->unreadNotifications, //FOR NOTIFICATION
            'custs' => Customer::join('pakets', 'pakets.id_paket', '=', 'customers.id_paket')->where('val_id', 1)->orderBy('tanggal_langganan', 'desc')->get(),
            'getNewOrder' => Customer::where('val_id', 0)->count(),

        ];
        return view('admin.customer', $data);
    }

    public function addCust()
    {
        $data = [
            'notifications' => auth()->user()->unreadNotifications, //FOR NOTIFICATION
            'custs' => Customer::join('pakets', 'pakets.id_paket', '=', 'customers.id_paket')->where('val_id', 1)->get(),
            'getNewOrder' => Customer::where('val_id', 0)->count(),
            'koran' => Koran::all(),
            'paket' => paket::all()
        ];
        return view('admin.addCustomer', $data);
    }

    public function createCust(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',

            'alamat' => 'required',
            'id_paket' => 'required',
            'items' => 'required',
            'qty' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', 'Form Input Tidak Boleh Kosong')->withErrors([
                'nama' => 'Nama Tidak Boleh Kosong',

                'alamat' => 'Alamat Tidak Boleh Kosong',
                'id_paket' => 'Paket Tidak Boleh Kosong',
            ]);
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
        $customer = new Customer();
        $customer->nama = $request->nama;
        $customer->alamat = $request->alamat;
        $customer->email = $request->email;
        $customer->id_paket = $request->id_paket;
        $customer->val_id = 1;
        $customer->phone = $request->phone;
        $customer->status_langganan = 'aktif';
        $customer->tanggal_langganan = $request->tanggal_langganan;
        $customer->prices = $grandtotal;
        $customer->save();

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
        return redirect()->route('customers')->withToastSuccess('Berhasil Menambahan Customer!');
    }

    public function editCust($id_cust)
    {
        $data = [
            'notifications' => auth()->user()->unreadNotifications, //FOR NOTIFICATION
            'koran' => Koran::all(),
            'paket' => Paket::all(),
            'getNewOrder' => Customer::where('val_id', 0)->count(), //GET LABEL MENU
            'orders' => Order::join('korans', 'korans.id_koran', '=', 'orders.item')->get(), //ORDER
        ];
        $customers = Customer::where('id_cust', $id_cust)->first();
        return view('admin.editCustomer', $data, compact('customers'));
    }

    public function updateCust($id_cust, Request $request)
    {
        // dd($request->all());
        // $cust = Customer::findOrFail($id_cust);
        $data = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'phone' => $request->phone,
            'id_paket' => $request->id_paket,
            'tanggal_langganan' => $request->tanggal_langganan
        ];
        Customer::where('id_cust', $id_cust)->update($data);
        $id = $request->id;
        foreach ($request->id_order as $key => $value) {

            // $data2 = array(
            //     'item' => $request->items[$key],
            //     'qty' => $request->qty[$key]
            // );
            Order::where('id', $id[$key])->update([
                // 'id_order' => $request->id_order,
                'item' => $request->items[$key],
                'qty' => $request->qty[$key]
            ]);
        }
        $getJumlahAwal = Order::where('id_order', $id_cust)->get();
        $x = [];
        foreach ($getJumlahAwal as $dataAwal) {
            $x[] = $dataAwal->qty;
        }
        $i = count($x);
        $getJumlah = count($request->qty);
        if (count($request->id) > $i) {
            foreach ($request->id_order as $key => $value) {
                $cust = new Order();
                Order::updateOrCreate([
                    'item' => $request->items[$key],
                    'qty' => $request->qty[$key]
                ]);
            }
        }

        return redirect()->back()->withToastSuccess('Berhasil Mengubah Customer!');
    }

    public function deleteCust($id_cust)
    {
        Customer::where('id_cust', $id_cust)->delete();
        Order::where('id_order', $id_cust)->delete();
        return redirect()->back()->withToastSuccess('Berhasil Menghapus Customer!');
    }

    public function reqOrder()
    {
        $data = [
            'notifications' => auth()->user()->unreadNotifications, //FOR NOTIFICATION
            'custs' => Customer::join('pakets', 'pakets.id_paket', '=', 'customers.id_paket')->where('val_id', 0)->get(),
            'korans' => Order::join('korans', 'korans.id_koran', '=', 'orders.item')->get(),
            'getNewOrder' => Customer::where('val_id', 0)->count(),

        ];

        // if()
        return view('admin.requestOrder', $data);
    }

    public function accOrder($id_cust)
    {
        $id = [
            'val_id' => 1,
            'status_langganan' => 'aktif'

        ];
        Customer::where('id_cust', $id_cust)->update($id);
        return redirect()->back()->withToastSuccess('Data Berhasil Di Verifikasi!');
    }

    public function decOrder($id_cust)
    {
        Customer::where('id_cust', $id_cust)->delete();
        return redirect()->back()->withToastSuccess('Data Gagal Tervalidasi!');
    }

    // MANAGEMENT KORAN
    public function koranManage()
    {
        $data = [
            'notifications' => auth()->user()->unreadNotifications, //FOR NOTIFICATION
            'stocks' => ManageKoran::join('korans', 'korans.id_koran', '=', 'manage_korans.id_koran')->orderBy('tanggal_masuk', 'desc')->get(),
            'koran' => Koran::all(),
            'getNewOrder' => Customer::where('val_id', 0)->count(),

        ];
        return view('admin.manage_koran', $data);
    }

    public function addKoranManage()
    {
        $data = [
            'notifications' => auth()->user()->unreadNotifications, //FOR NOTIFICATION
            'stocks' => ManageKoran::join('korans', 'korans.id_koran', '=', 'manage_korans.id_koran')->get(),
            'koran' => Koran::all(),
            'getNewOrder' => Customer::where('val_id', 0)->count(),

        ];
        return view('admin.addManageKoran', $data);
    }

    public function createKoranManage(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'tanggal_masuk' => 'required',
        //     'id_koran' => 'required',
        //     'koran_masuk' => 'required',
        // ]);
        $randNumber = random_int(100000, 999999);
        $data = $request->all();
        if (count($data['items']) > 0) {
            foreach ($data['items'] as $item => $value) {
                $data2 = array(
                    'id_input' => $randNumber,
                    'tanggal_masuk' => $request->tanggal_masuk,
                    'id_koran' => $data['items'][$item],
                    'id_user' => auth()->user()->id,
                    'koran_masuk' => $data['koran_masuk'][$item],
                );
                ManageKoran::create($data2);
            }
        }
        return redirect()->route('koranManage')->with('pesan', 'Data Berhasil Ditambahkan');
    }

    public function editKoranManage($id_input)
    {
        $data = [
            'notifications' => auth()->user()->unreadNotifications, //FOR NOTIFICATION
            'stocks' => ManageKoran::where('id_input', $id_input)->join('korans', 'korans.id_koran', '=', 'manage_korans.id_koran')->get(),
            'koran' => Koran::all(),
            'getNewOrder' => Customer::where('val_id', 0)->count(), //GET LABEL MENU
        ];
        $stock = ManageKoran::where('id_input', $id_input)->first();
        return view('admin.editManageKoran', $data, compact('stock'));
    }

    public function updateKoranManage($id_input, Request $request)
    {
        $id = $request->id;
        foreach ($request->id_input as $key => $value) {
            $data = array(
                'koran_terkirim' => $request->koran_terkirim[$key],
                'koran_sisa' => $request->koran_sisa[$key]
            );
            ManageKoran::where('id', $id[$key])->update($data);
        }
        return redirect()->route('koranManage')->withToastSuccess('Data Berhasil Diupdate!');
    }

    public function deleteKoranHarian($id)
    {
        $koran = ManageKoran::findOrFail($id);
        $koran->delete();
        return redirect()->back()->withToastSuccess('Data Berhasil Dihapus!');
    }

    //PROFILE
    public function profile()
    {
        $data = [
            'notifications' => auth()->user()->unreadNotifications, //FOR NOTIFICATION
            'stocks' => ManageKoran::join('korans', 'korans.id_koran', '=', 'manage_korans.id_koran')->get(),
            'koran' => Koran::all(),
            'getNewOrder' => Customer::where('val_id', 0)->count(),

        ];
        return view('admin.profile', $data);
    }

    public function updateProfil($id, Request $request)
    {

        $user = User::find($id);
        if (request()->foto <> "") {
            $file = request()->foto;
            $fileName = request()->id . '.' . $file->extension();
            $file->move(public_path('foto/'), $fileName);
            $user->name = $request->name;
            $user->alamat = $request->alamat;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->foto = $fileName;
            $user->update();
        } else {
            $user->name = $request->name;
            $user->alamat = $request->alamat;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->update();
        }
        return redirect()->route('profile')->with('pesan', 'Data Berhasil Diperbarui');
    }

    //PAKET 
    public function paket()
    {
        $data = [
            'notifications' => auth()->user()->unreadNotifications, //FOR NOTIFICATION
            'getNewOrder' => Customer::where('val_id', 0)->count(), //GET LABEL MENU
            'pakets' => Paket::all(),
        ];
        return view('admin.paket', $data);
    }

    public function addPaket(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'paket' => 'required',
            'total_hari' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', 'Form Input Tidak Boleh Kosong')->withErrors([
                'paket' => 'Paket tidak boleh kosong',
                'total_hari' => 'total hari tidak boleh kosong'
            ]);
        }
        $paket = new Paket();
        $paket->paket = $request->paket;
        $paket->total_hari = $request->total_hari;
        $paket->save();
        return redirect()->back()->withToastSuccess('Data Berhasil Ditambahkan!');
    }

    public function deletePaket($id_paket)
    {
        Paket::where('id_paket', $id_paket)->delete();
        return redirect()->back()->withToastSuccess('Data Berhasil Dihapus!');
    }

    public function editPaket($id_paket, Request $request)
    {

        $data = [
            'paket' => $request->paket,
            'total_hari' => $request->total_hari
        ];
        Paket::where('id_paket', $id_paket)->update($data);
        return redirect()->back()->with('pesan', 'Data Berhasil Diubah!');
    }

    //MANAGEMENT USERS
    // ADD USER
    // DELETE USER
    public function getUsers()
    {
        $notifications = auth()->user()->unreadNotifications;
        $data = [
            'notifications' => auth()->user()->unreadNotifications,
            'users' => User::all(),
            'getNewOrder' => Customer::where('val_id', 0)->count(),

        ];
        return view('manager.users', $data);
    }

    // NOTIFICATION
    // READ ALL NOTIFICATION
    // MARK AS READ
    public function markAsRead()
    {
        $user = User::find(1);
        $user->unreadNotifications->markAsRead();
        return redirect()->back();
    }

    //TAGIHAN
    public function tagihan()
    {
        $data = [
            'notifications' => auth()->user()->unreadNotifications,
            'getNewOrder' => Customer::where('val_id', 0)->count(),
            'customers' => Customer::where('val_id', 1)->join('pakets', 'pakets.id_paket', '=', 'customers.id_paket')->get(),
            'date' => Carbon::now()->format('d M Y')
        ];

        return view('admin.tagihan', $data);
    }
}
