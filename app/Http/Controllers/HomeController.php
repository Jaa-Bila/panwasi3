<?php

namespace App\Http\Controllers;

use App\Models\Attend;
use App\Models\Desa;
use App\Models\PartcArv;
use App\Models\PartcHamil;
use App\Models\PartcOat;
use App\Models\PartcRemaja;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome(): View
    {
        return view('adminHome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHamil(): View
    {
        return view('adminHamil');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHamilShow($user_id): View
    {
        $Partch = PartcHamil::where('user_id', $user_id)->first();
        $absens = Attend::where('user_id', $user_id)->get();
        $i = 0;
        $d1 = date_create(date('Y') . '-' . date('m') . '-01'); //current month/year
        $d2 = date_create($d1->format('Y-m-t')); //get last date of the month
        $d3 = date_diff($d1, $d2);
        $days = $d3->days + 1;

        return view('adminHamilShow')
            ->with('partch', $Partch)
            ->with('absens', $absens)
            ->with('i', $i)
            ->with('days', $days);
    }

    /**
     * Display a registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminRegister()
    {
        $desas = Desa::all();
        return view('auth.register')->with('desas', $desas);
    }

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function adminStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'password' => 'required|min:5',
            'email' => 'required|email|unique:users'
        ], [
            'name.required' => 'Name field is required.',
            'password.required' => 'Password field is required.',
            'email.required' => 'Email field is required.',
            'email.email' => 'Email field must be email address.'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = User::create($validatedData);

        return back()->with('success_hamil', 'User created successfully.');
    }

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function adminReghamil(Request $request)
    {
        //validate
        $this->validate(
            $request,
            [
                'name' => 'max:120|required',
                'password' => 'max:255|required',
                'nik' => 'max:255|required',
                'alamat' => 'max:120|required',
                'notel' => 'max:255|required',
                'hamilke' => 'max:255|required',
                'hpht' => 'max:120|required',
                'hb' => 'max:255|required',
                'desa' => 'max:255|required',
            ],
            [
                'name.unique' => 'Batch PaPa sudah ada',
            ]
        );

        $cryptPass = bcrypt($request['password']);

        //get fields from signup form using $request
        $name = $request['name'];
        $nik = $request['nik'];
        $alamat = $request['alamat'];
        $notel = $request['notel'];
        $hamilke = $request['hamilke'];
        $hpht = $request['hpht'];
        $hb = $request['hb'];
        $desa = $request['desa'];

        $addHpl = 280;
        $hpl = (new Carbon($hpht))->addDays($addHpl);


        // create new user - use App\User;
        $user = new User();
        $user->name = $name;
        $user->email = $nik;
        $user->password = $cryptPass;
        $user->type = '2';

        $user->save(); //save to the db.

        // create new partc - use App\PartcHamil;
        $hamil = new PartcHamil();
        $hamil->user_id = $user->id;
        $hamil->name = $name;
        $hamil->email = $nik;
        $hamil->alamat = $alamat;
        $hamil->notel = $notel;
        $hamil->hamilke = $hamilke;
        $hamil->hpht = $hpht;
        $hamil->hpl = $hpl;
        $hamil->hb = $hb;
        $hamil->desa_id = $desa;

        $hamil->save(); //save to the db.


        return back()->with('success_hamil', 'User created successfully.');
    }

    public function adminRegrem(Request $request)
    {
        //validate
        $this->validate(
            $request,
            [
                'name' => 'max:120|required',
                'password' => 'max:255|required',
                'nik' => 'max:255|required',
                'ttl' => 'max:120|required',
                'alamat' => 'max:120|required',
                'notel' => 'max:255|required',
                'hb' => 'max:255|required',
                'desa' => 'max:255|required',
            ],
            [
                'name.unique' => 'Batch PaPa sudah ada',
            ]
        );

        $cryptPass = bcrypt($request['password']);

        //get fields from signup form using $request
        $name = $request['name'];
        $nik = $request['nik'];
        $ttl = $request['ttl'];
        $alamat = $request['alamat'];
        $notel = $request['notel'];
        $hb = $request['hb'];
        $desa = $request['desa'];

        // create new user - use App\User;
        $user = new User();
        $user->name = $name;
        $user->email = $nik;
        $user->password = $cryptPass;
        $user->type = '3';

        $user->save(); //save to the db.

        // create new partc - use App\PartcRemaja;
        $rem = new PartcRemaja();
        $rem->user_id = $user->id;
        $rem->name = $name;
        $rem->email = $nik;
        $rem->ttl = $ttl;
        $rem->alamat = $alamat;
        $rem->notel = $notel;
        $rem->hb = $hb;
        $rem->desa_id = $desa;

        $rem->save(); //save to the db.


        return back()->with('success_rem', 'User created successfully.');
    }

    public function adminRegoat(Request $request)
    {
        //validate
        $this->validate(
            $request,
            [
                'name' => 'max:120|required',
                'password' => 'max:255|required',
                'nik' => 'max:255|required',
                'start' => 'max:120|required',
                'alamat' => 'max:120|required',
                'notel' => 'max:255|required',
                'desa' => 'max:255|required',
            ],
            [
                'name.unique' => 'Batch PaPa sudah ada',
            ]
        );

        $cryptPass = bcrypt($request['password']);

        //get fields from signup form using $request
        $name = $request['name'];
        $nik = $request['nik'];
        $start = $request['start'];
        $alamat = $request['alamat'];
        $notel = $request['notel'];
        $desa = $request['desa'];

        // create new user - use App\User;
        $user = new User();
        $user->name = $name;
        $user->email = $nik;
        $user->password = $cryptPass;
        $user->type = '4';

        $user->save(); //save to the db.

        // create new partc - use App\PartcOat;
        $rem = new PartcOat();
        $rem->user_id = $user->id;
        $rem->name = $name;
        $rem->email = $nik;
        $rem->start = $start;
        $rem->alamat = $alamat;
        $rem->notel = $notel;
        $rem->desa_id = $desa;

        $rem->save(); //save to the db.

        return back()->with('success_oat', 'User created successfully.');
    }

    public function adminRegarv(Request $request)
    {
        //validate
        $this->validate(
            $request,
            [
                'name' => 'max:120|required',
                'password' => 'max:255|required',
                'nik' => 'max:255|required',
                'start' => 'max:120|required',
                'alamat' => 'max:120|required',
                'notel' => 'max:255|required',
                'desa' => 'max:255|required',
            ],
            [
                'name.unique' => 'Batch PaPa sudah ada',
            ]
        );

        $cryptPass = bcrypt($request['password']);

        //get fields from signup form using $request
        $name = $request['name'];
        $nik = $request['nik'];
        $start = $request['start'];
        $alamat = $request['alamat'];
        $notel = $request['notel'];
        $desa = $request['desa'];

        // create new user - use App\User;
        $user = new User();
        $user->name = $name;
        $user->email = $nik;
        $user->password = $cryptPass;
        $user->type = '5';

        $user->save(); //save to the db.

        // create new partc - use App\PartcOat;
        $rem = new PartcArv();
        $rem->user_id = $user->id;
        $rem->name = $name;
        $rem->email = $nik;
        $rem->start = $start;
        $rem->alamat = $alamat;
        $rem->notel = $notel;
        $rem->desa_id = $desa;

        $rem->save(); //save to the db.

        return back()->with('success_arv', 'User created successfully.');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome(): View
    {
        return view('managerHome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function hamilHome(): View
    {
        $user_id = Auth::user()->id;
        $latestimg = Attend::where('user_id', $user_id)->latest('created_at')->first();
        $absens = Attend::where('user_id', $user_id)->get();

        $i = 0;
        $d1 = date_create(date('Y') . '-' . date('m') . '-01'); //current month/year
        $d2 = date_create($d1->format('Y-m-t')); //get last date of the month
        $d3 = date_diff($d1, $d2);
        $days = $d3->days + 1;

        for ($i = 0; $i <= $days; $i++) {
            $cek = $absens->where('hari', $i);
            if (empty($cek[0])) {
                $list_hari[$i] = false;
            } else {
                $list_hari[$i] = true;
            }
        }

        // dd($absens[0]->hari);
        return view('hamilHome')
            ->with('latestimg', $latestimg)
            ->with('days', $days)
            ->with('absens', $absens)
            ->with('i', $i);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function remajaHome(): View
    {
        return view('remajaHome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function oatHome(): View
    {
        return view('oatHome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function arvHome(): View
    {
        return view('arvHome');
    }
}
