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

class OatController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function oatHome(): View
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
        return view('oat.oatHome')
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
    public function adminOat(): View
    {
        return view('oat.adminOat');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminOatShow($user_id): View
    {
        $Partch = PartcOat::where('user_id', $user_id)->first();
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

        return view('oat.adminOatShow')
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

    public function adminOatAttend($user_id, $id): View
    {
        $month = Carbon::now()->month;
        $image = Attend::where('user_id', $user_id)->where('bulan', $month)->where('hari', $id)->first();
        // dd($absens->image);
        return view('oat.adminOatAttend')
            ->with('image', $image);
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
}
