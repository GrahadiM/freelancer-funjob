<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Kota;
use App\Models\Status;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

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

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request, [
            "name" => "required|string",
            "email" => "required|email|unique:users,id," . $id,
            "password" => "required",
            "image" => "required|mimes:jpeg,jpg,png",
            "gender" => "required",
            "phone" => "required|numeric"
        ]);

    	$user = User::where('id', Auth::user()->id)->first();

        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $filename = time() . "." . $file->getClientOriginalExtension();

            $file->move('image/profile', $filename);

            // File::delete('assets/image/profile' . $user->image);

            // Jika user mengganti passwornya password 

            if ($user->password != $request->password) {
                $user->update([
                    "name" => $request->name,
                    "email" => $request->email,
                    "password" => Hash::make($request->password),
                    "kota_id" => $request->kota_id,
                    "kecamatan_id" => $request->kecamatan_id,
                    "image" => $filename,
                    "gender" => $request->gender,
                    "phone" => $request->phone
                ]);
            } else {
                // Jika user tidak mengganti passwordnya
                $user->update([
                    "name" => $request->name,
                    "email" => $request->email,
                    "password" => $request->password,
                    "kota_id" => $request->kota_id,
                    "kecamatan_id" => $request->kecamatan_id,
                    "image" => $filename,
                    "gender" => $request->gender,
                    "phone" => $request->phone
                ]);
            }
        }
    	
    	return redirect('profile');
    }
}
