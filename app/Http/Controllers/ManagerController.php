<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Koran;
use App\Models\ManageKoran;
use App\Models\NotificationModel;
use App\Models\Order;
use App\Models\User;
use App\Models\Paket;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
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
            $dataKoran[] = $jk->jenis_koran;
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
        return view('manager.home', compact('notifications', 'dataKoran', 'dataCusts'), $data);
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

    public function addUsers(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
        ]);
        $user = new User();
        if (Request()->foto <> "") {
            $file = Request()->file('foto');
            $fileName = Request()->email . '.' . $file->extension();
            $file->move(public_path('foto/'), $fileName);
        } else {
            $fileName = 'noImage.png';
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->level = $request->level;
        $user->password = Hash::make($request->password);
        $user->foto = $fileName;
        $user->save();
        return redirect()->route('getUsers')->with('pesan', 'User Berhasil Didaftarkan');
    }

    public function editUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->hasFile('foto')) {
            $file = Request()->file('foto');
            $fileName = Request()->email . '.' . $file->extension();
            $file->move(public_path('foto/'), $fileName);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->level = $request->level;
            $user->foto = $fileName;
            $user->update();
        } else {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->level = $request->level;
            $user->update();
        }
        return redirect()->route('getUsers')->with('pesan', 'User Berhasil Diupdate');
    }

    public function destroyUser($id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('getUsers')->with('pesan', 'User Berhasil Dihapus');
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
        return view('manager.profile', $data);
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
        return redirect()->route('mgProfile')->with('pesan', 'Data Berhasil Diperbarui');
    }

    // KORAN
    public function getKoran()
    {
        $data = [
            'notifications' => auth()->user()->unreadNotifications, //FOR NOTIFICATION
            'koran' => Koran::all(),
            'getNewOrder' => Customer::where('val_id', 0)->count(),

        ];
        return view('manager.koran', $data);
    }

    //getDataKoran
    public function getKoranHarian()
    {

        $data = [
            'notifications' => auth()->user()->unreadNotifications,
            'stocks' => ManageKoran::join('korans', 'korans.id_koran', '=', 'manage_korans.id_koran')->orderBy('tanggal_masuk', 'desc')->get(),
            'typesNp' => Koran::all(),
            'koran_masuk' => ManageKoran::sum('koran_masuk'),
            'koran_terkirim' => ManageKoran::sum('koran_terkirim'),
            'koran_sisa' => ManageKoran::sum('koran_sisa'),
            'getNewOrder' => Customer::where('val_id', 0)->count(),

        ];
        return view('manager.manage_koran', $data);
    }

    //getCustomers
    public function getCusts()
    {
        $data = [
            'notifications' => auth()->user()->unreadNotifications, //FOR NOTIFICATION
            'npCustomers' => Customer::join('pakets', 'pakets.id_paket', '=', 'customers.id_paket')->where('val_id', 1)->get(),
            'getNewOrder' => Customer::where('val_id', 0)->count(),
            'korans' => Order::join('korans', 'korans.id_koran', '=', 'orders.item')->get()
        ];
        return view('manager.customers', $data);
    }

    //get Request ORDER
    public function getReqOrder()
    {
        $data = [
            'notifications' => auth()->user()->unreadNotifications, //FOR NOTIFICATION
            'custs' => Customer::join('pakets', 'pakets.id_paket', '=', 'customers.id_paket')->where('val_id', 0)->get(),
            'korans' => Order::join('korans', 'korans.id_koran', '=', 'orders.item')->get(),
            'getNewOrder' => Customer::where('val_id', 0)->count(),

        ];
        return view('manager.requestOrder', $data);
    }

    //read Notification
    public function readNotify($notifiable_id)
    {
        // $getid = NotificationModel::findOrFail($id);
        $getDate = Carbon::now()->translatedFormat('Y-m-d h-m-s');
        $data = [
            'read_at' => $getDate,
        ];
        // $getid->update($data);
        NotificationModel::where('notifiable_id', $notifiable_id)->update($data);
        return redirect()->back();
    }

    //GET PAKET
    public function getPaket()
    {
        $data = [
            'notifications' => auth()->user()->unreadNotifications, //FOR NOTIFICATION
            'getNewOrder' => Customer::where('val_id', 0)->count(),
            'pakets' => Paket::all()
        ];
        return view('manager.paket', $data);
    }

    public function getAllPaketPdf()
    {
        $pakets = Paket::all();
        return view('reports.laporan-paket', compact('pakets'));
    }
}
