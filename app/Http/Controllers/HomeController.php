<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    public function index(Request $request)
    {
        if (auth()->user()->status_id == 1){
            if (auth()->user()->role_id == 1){
                $art = User::where('role_id', '2')->get();
                $klien = User::where('role_id', '3')->get();
                $users = User::where('role_id', '2')->latest()->paginate(10);
                $pesanan = DB::table('pesanans')->get();
                $komentar = DB::table('komentars')->get();
                return view('admin.home', compact('art', 'klien', 'pesanan', 'komentar', 'users'));
            } elseif (auth()->user()->role_id == 2) { 
                // $art = User::where('role_id', '2')->get();
                // $klien = User::where('role_id', '3')->get();
                // $user = Auth::user();
                // return view('admin.dashboard', compact('art', 'klien', 'user'));
                if (auth()->user()->status_id == 1){
                    return redirect()->route('jasa.index');
                }
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('/login');
            } else {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('/login');
            }
        }elseif (auth()->user()->status_id == 2){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login');
        }else{
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login');
        }
    }

    public function edit(User $user, $id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $statuses = Status::all();
        return view('admin.home-edit', compact('user', 'roles', 'statuses'));
    }

    public function update(Request $request, User $user, $id)
    {
        $request->validate([
            'role_id' => 'required',
            'status_id' => 'required',
        ]);

        $user = User::find($id);
        $user->update([
            'role_id' => $request->role_id,
            'status_id' => $request->status_id,
        ]);
        return redirect()->route('home');
    }
}
