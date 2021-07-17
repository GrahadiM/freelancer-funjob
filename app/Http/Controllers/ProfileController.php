<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Role;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $roles = Role::all();
        $statuses = Status::all();
        $kotas = Kota::all();
        $kecamatans = Kecamatan::all();
    	return view('profile.index', compact('user', 'roles', 'statuses', 'kotas', 'kecamatans'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        // $this->validate($request, [
        //     'phone'  => 'required',
        // ]);

    	$user = User::where('id', Auth::user()->id)->first();
    	$user->update([
            $user->name = $request->name,
            $user->status_id = $request->status_id,
            $user->phone = $request->phone,
            $user->gender = $request->gender,
            $user->kota_id = $request->kota_id,
            $user->kecamatan_id = $request->kecamatan_id,
        ]);

    	// $user->name = $request->name;
    	// $user->status_id = $request->status_id;
    	// $user->phone = $request->phone;
    	// $user->gender = $request->gender;
    	// $user->kota_id = $request->kota_id;
    	// $user->kecamatan_id = $request->kecamatan_id;
    	// $user->update($request->all());
    	
    	return redirect('profile');
    }
}
