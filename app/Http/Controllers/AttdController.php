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
use Illuminate\Support\Facades\Storage;

class AttdController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function hamilAttd(Request $request)
    {
        $user_id = Auth::user()->id;

        $now = Carbon::now();
        $tahun = $now->year;
        $bulan = $now->month;
        $hari = $now->day;

        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10000',

        ]);

        $filenameWithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $filenameToStore = $filename . '_' . time() . '.' . $extension;

        $path = $request->file('image')->storeAs('public/camera', $filenameToStore);


        $save = new Attend();

        $save->user_id = $user_id;
        $save->image = $filenameToStore;
        $save->tahun = $tahun;
        $save->bulan = $bulan;
        $save->hari = $hari;

        $save->save();

        return Redirect()->back()->with('success', 'Data sudah terkirim');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function remajaAttd(Request $request)
    {
        $user_id = Auth::user()->id;

        $now = Carbon::now();
        $tahun = $now->year;
        $bulan = $now->month;
        $hari = $now->day;

        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10000',

        ]);

        $filenameWithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $filenameToStore = $filename . '_' . time() . '.' . $extension;

        $path = $request->file('image')->storeAs('public/camera', $filenameToStore);


        $save = new Attend();

        $save->user_id = $user_id;
        $save->image = $filenameToStore;
        $save->tahun = $tahun;
        $save->bulan = $bulan;
        $save->hari = $hari;

        $save->save();

        return Redirect()->back()->with('success', 'Data sudah terkirim');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function arvAttd(Request $request)
    {
        $user_id = Auth::user()->id;

        $now = Carbon::now();
        $tahun = $now->year;
        $bulan = $now->month;
        $hari = $now->day;

        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10000',

        ]);

        $filenameWithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $filenameToStore = $filename . '_' . time() . '.' . $extension;

        $path = $request->file('image')->storeAs('public/camera', $filenameToStore);


        $save = new Attend();

        $save->user_id = $user_id;
        $save->image = $filenameToStore;
        $save->tahun = $tahun;
        $save->bulan = $bulan;
        $save->hari = $hari;

        $save->save();

        return Redirect()->back()->with('success', 'Data sudah terkirim');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function oatAttd(Request $request)
    {
        $user_id = Auth::user()->id;

        $now = Carbon::now();
        $tahun = $now->year;
        $bulan = $now->month;
        $hari = $now->day;

        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10000',

        ]);

        $filenameWithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $filenameToStore = $filename . '_' . time() . '.' . $extension;

        $path = $request->file('image')->storeAs('public/camera', $filenameToStore);


        $save = new Attend();

        $save->user_id = $user_id;
        $save->image = $filenameToStore;
        $save->tahun = $tahun;
        $save->bulan = $bulan;
        $save->hari = $hari;

        $save->save();

        return Redirect()->back()->with('success', 'Data sudah terkirim');
    }

    public function hamilAttdShow($user_id, $id)
    {
        $month = Carbon::now()->month;
        $absens = Attend::where('user_id', $user_id)->where('hari', $id)->where('bulan', $month)->first();
        // dd($absens->image);
        return view('hamil.HamilAttend')
            ->with('absens', $absens);
    }

    public function remajaAttdShow($user_id, $id)
    {
        $month = Carbon::now()->month;
        $absens = Attend::where('user_id', $user_id)->where('hari', $id)->where('bulan', $month)->first();
        // dd($absens->image);
        return view('remaja.RemajaAttend')
            ->with('absens', $absens);
    }

    public function oatAttdShow($user_id, $id)
    {
        $month = Carbon::now()->month;
        $absens = Attend::where('user_id', $user_id)->where('hari', $id)->where('bulan', $month)->first();
        // dd($absens->image);
        return view('oat.OatAttend')
            ->with('absens', $absens);
    }

    public function arvAttdShow($user_id, $id)
    {
        $month = Carbon::now()->month;
        $absens = Attend::where('user_id', $user_id)->where('hari', $id)->where('bulan', $month)->first();
        // dd($absens->image);
        return view('arv.ArvAttend')
            ->with('absens', $absens);
    }
}
