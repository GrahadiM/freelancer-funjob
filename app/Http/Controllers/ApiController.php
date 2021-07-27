<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use App\Models\KategoriJasa;
use App\Models\Kecamatan;
use App\Models\Komentar;
use App\Models\Kota;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function register(Request $request)
    {
        $plainPassword = $request->password;
        $password = bcrypt($request->password);
        $request->request->add(['password' => $password]);
        // create the user account 
        $created = User::create($request->all());

        $request->request->add(['password' => $plainPassword]);
        return $this->login($request);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $input = $request->only('email', 'password');
        if (!$token = auth()->attempt($input)) {
            return response()->json([
                'message' => 'Invalid Email or Password',
            ], 401);
        }
        $user = auth()->user();

        return response()->json([
            'success' => true,
            'token' => $token,
            'data' => $user
        ]);
    }

    public function detailUser($id)
    {
        $user = User::with('kota', 'kecamatan', 'status')->find($id);
        return response()->json($user);
    }

    public function showKota()
    {
        $kota = Kota::all();
        return response()->json($kota);
    }

    public function showKecamatan()
    {
        $data = Kecamatan::all();
        return response()->json($data);
    }

    public function showJasa()
    {
        $data = Jasa::with('user.kota', 'user.kecamatan', 'user.status', 'kategori')->get();
        return response()->json($data);
    }

    public function topJasa()
    {
        $data = Jasa::limit(3)->with('user.kota', 'user.kecamatan', 'user.status', 'kategori')->get();
        return response()->json($data);
    }

    public function showCategory()
    {
        $data = KategoriJasa::all();
        return response()->json($data);
    }

    public function getCategoryJasa($categoryId)
    {
        $data = Jasa::with('user.kota', 'user.kecamatan', 'user.status', 'kategori')
            ->where('kategori_id', '=', $categoryId)
            ->get();

        return response()->json($data);
    }

    public function getRecentJasa($userId)
    {
        $data = Jasa::with('kategori', 'user', 'user.kota', 'user.kecamatan')
            ->where('user_id', '=', $userId)
            ->get();

        return response()->json($data);
    }

    public function getOneJasa($id)
    {
        $data = Jasa::with('kategori', 'user.kota', 'user.status', 'user.kecamatan')
            ->where('id', '=', $id)
            ->get();

        return response()->json($data);
    }

    public function storePesanan(Request $request)
    {
        $pesanan = Pesanan::create($request->all());
        return response()->json([
            'message' => 'success',
            'data' => $pesanan
        ]);
    }

    public function getPesanan($userId)
    {
        $pesanan = Pesanan::with('jasa', 'jasa.user', 'jasa.user.kota', 'jasa.user.kecamatan', 'jasa.kategori')->where('user_id', '=', $userId)->get();
        return response()->json($pesanan);
    }

    public function storeKomentar(Request $request)
    {
        $comment = Komentar::create($request->all());
        return response()->json($comment);
    }

    public function getKomentar($jasaId)
    {
        $data = Komentar::with('user')->where('jasa_id', '=', $jasaId)->get();
        return response()->json($data);
    }
}
