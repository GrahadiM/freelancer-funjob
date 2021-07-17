<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use App\Models\User;
use App\Models\KategoriJasa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class JasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jasas = Jasa::orderBy('id', 'DESC')->paginate(10);
        return view('jasa.index', compact('jasas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $kategoris = KategoriJasa::all();
        return view('jasa.create', compact('users', 'kategoris'));
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
            'name' => 'required',
            'user_id' => 'required',
            'kategori_id' => 'required',
            // 'image' => 'nullable|image|mimes:jpg,png,jpeg',
            'price' => 'required',
            'desc' => 'required',
        ]);

        Jasa::create([
            'name' => $request->name,
            'slug'  => Str::slug($request->name),
            'user_id' => $request->user_id,
            'kategori_id' => $request->kategori_id,
            'image' => 'avatar-s-1.png',
            'price' => $request->price,
            'desc' => $request->desc,
            'status' => 'non-active',
        ]);
        return redirect()->route('jasa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function show(Jasa $jasa)
    {
        $jasa = Jasa::find($jasa->id);
        return view('jasa.show', compact('jasa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function edit(Jasa $jasa)
    {
        $jasa = Jasa::find($jasa->id);
        return view('jasa.update', compact('jasa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jasa $jasa)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'status' => 'required',
            'desc' => 'required',
        ]);

        $jasa = Jasa::find($jasa->id);
        $jasa->update([
            'name' => $request->name,
            'price' => $request->price,
            'status' => $request->status,
            'desc' => $request->desc,
        ]);
        return redirect()->route('jasa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jasa $jasa)
    {
        $jasa = Jasa::find($jasa->id);
        $jasa->delete();
        return redirect()->route('jasa.index');
    }
}
