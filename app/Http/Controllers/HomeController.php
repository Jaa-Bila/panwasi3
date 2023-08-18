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
        return view('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome(): View
    {
        $admin = Auth::user()->email;
        $hamil = PartcHamil::all();
        $remaja = PartcRemaja::all();
        $arv = PartcArv::all();
        $oat = PartcOat::all();
        return view('admin.adminHome')
            ->with('admin', $admin)
            ->with('hamil', $hamil)
            ->with('remaja', $remaja)
            ->with('arv', $arv)
            ->with('oat', $oat);
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminarvHome(): View
    {
        $admin = Auth::user()->email;
        $hamil = PartcHamil::all();
        $remaja = PartcRemaja::all();
        $arv = PartcArv::all();
        $oat = PartcOat::all();
        return view('admin-arv.admin-arvHome')
            ->with('admin', $admin)
            ->with('hamil', $hamil)
            ->with('remaja', $remaja)
            ->with('arv', $arv)
            ->with('oat', $oat);
    }

    /**
     * Display a registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminarvRegister()
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
    public function adminarvStore(Request $request)
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome(): View
    {
        return view('managerHome');
    }
}
