<?php

namespace App\Http\Controllers;

use App\Models\KategoriJasa;
use Illuminate\Http\Request;

class KategoriJasaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:1']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = KategoriJasa::orderBy('name', 'ASC')->paginate(10);
        return view('kategori.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriJasa  $kategoriJasa
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriJasa $kategoriJasa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriJasa  $kategoriJasa
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriJasa $kategoriJasa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KategoriJasa  $kategoriJasa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KategoriJasa $kategoriJasa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriJasa  $kategoriJasa
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriJasa $kategoriJasa)
    {
        //
    }
}
