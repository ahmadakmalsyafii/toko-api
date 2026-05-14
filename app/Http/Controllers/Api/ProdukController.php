<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();

        return response()->json([
            'code' => 200,
            'status' => true,
            'data' => $produk
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_produk' => 'required|string|unique:produks',
            'image_url' => 'required|string',
            'nama_produk' => 'required|string',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code' => 400,
                'status' => false,
                'data' => $validator->errors()
            ], 400);
        }

        $produk = Produk::create($request->all());

        return response()->json([
            'code' => 200,
            'status' => true,
            'data' => $produk
        ], 200);
    }

    public function show($id)
    {
        $produk = Produk::find($id);

        if (!$produk) {
            return response()->json([
                'code' => 404,
                'status' => false,
                'data' => 'Produk tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'code' => 200,
            'status' => true,
            'data' => $produk
        ], 200);
    }

    // Mengubah data produk [cite: 237]
    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);

        if (!$produk) {
            return response()->json([
                'code' => 404,
                'status' => false,
                'data' => 'Produk tidak ditemukan'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'kode_produk' => 'string|unique:produks,kode_produk,'.$id,
            'image_url' => 'string',
            'nama_produk' => 'string',
            'deskripsi' => 'string',
            'harga' => 'integer',
            'stok' => 'integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code' => 400,
                'status' => false,
                'data' => $validator->errors()
            ], 400);
        }

        $produk->update($request->all());

        return response()->json([
            'code' => 200,
            'status' => true,
            'data' => $produk
        ], 200);
    }


    public function destroy($id)
    {
        $produk = Produk::find($id);

        if (!$produk) {
            return response()->json([
                'code' => 404,
                'status' => false,
                'data' => 'Produk tidak ditemukan'
            ], 404);
        }

        $produk->delete();

        return response()->json([
            'code' => 200,
            'status' => true,
            'data' => true
        ], 200);
    }

}
