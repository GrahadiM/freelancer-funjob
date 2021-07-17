<?php

namespace App\Http\Controllers;

use App\Models\From;
use App\Models\Inbox;
use App\Models\Jasa;
use App\Models\Pesanan;
use App\Models\To;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanans = Pesanan::orderBy('id', 'ASC')->paginate(10);
        return view('pesanan.index', compact('pesanans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $jasas = Jasa::all();
        return view('pesanan.create', compact('users', 'jasas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'jasa_id' => 'required',
            'start_contract' => 'required',
            'end_contract' => 'required',
            'price' => 'required',
        ]);

        Pesanan::create([
            'user_id' => $request->user_id,
            'jasa_id' => $request->jasa_id,
            'start_contract' => $request->start_contract,
            'end_contract' => $request->end_contract,
            'price' => $request->price,
            'note' => $request->note,
            'status' => 'Pending',
        ]);
        return redirect()->route('pesanan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pesanan $pesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesanan $pesanan)
    {
        $pesanan = Pesanan::find($pesanan->id);
        return view('pesanan.update', compact('pesanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        $pesanan = Pesanan::find($pesanan->id);
        $pesanan->update([
            'status' => $request->status,
        ]);
        return redirect()->route('pesanan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesanan $pesanan)
    {
        $pesanan = Pesanan::find($pesanan->id);
        $pesanan->delete();
        return redirect()->route('pesanan.index');
    }

    public function pesan()
    {
        $users = User::all();
        $pesans = Inbox::all();
        return view('inbox.inbox', compact('pesans', 'users'));
    }

    public function pesanPerson($id)
    {
        $pesan = Inbox::find($id);
        $inboxs = Inbox::all();
        $users = To::all();
        return view('inbox.person', compact('pesan', 'inboxs', 'users'));
    }

    public function pesanKirim(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'message' => 'required',
        ]);

        From::create([
            'user_id' => Auth::attempt($request->from->user_id),
            'message' => $request->from->message,
        ]);
        return redirect()->back();
    }
}
