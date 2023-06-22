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

class HamilController extends Controller
{
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
        $month = Carbon::now()->month;

        for ($i = 0; $i <= $days; $i++) {
            $cek = $absens->where('bulan', $month)->where('hari', $i);
            if ($cek->isNotEmpty()) {
                $list_hari[$i] = true;
            } else {
                $list_hari[$i] = false;
            }
        }

        // dd($month);
        return view('hamil.hamilHome')
            ->with('latestimg', $latestimg)
            ->with('days', $days)
            ->with('absens', $absens)
            ->with('i', $i)
            ->with('list_hari', $list_hari)
            ->with('user_id', $user_id);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHamil(): View
    {
        return view('hamil.adminHamil');
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
        $month = Carbon::now()->month;

        for ($i = 0; $i <= $days; $i++) {
            $cek = $absens->where('bulan', $month)->where('hari', $i);
            if ($cek->isNotEmpty()) {
                $list_hari[$i] = true;
            } else {
                $list_hari[$i] = false;
            }
        }

        return view('hamil.adminHamilShow')
            ->with('partch', $Partch)
            ->with('days', $days)
            ->with('absens', $absens)
            ->with('i', $i)
            ->with('list_hari', $list_hari)
            ->with('user_id', $user_id);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function adminHamilAttend($user_id, $id): View
    {
        $month = Carbon::now()->month;
        $image = Attend::where('user_id', $user_id)->where('bulan', $month)->where('hari', $id)->first();
        // dd($absens->image);
        return view('hamil.adminHamilAttend')
            ->with('image', $image);
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
}
