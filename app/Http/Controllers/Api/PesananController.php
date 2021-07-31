<?php

namespace App\Http\Controllers\Api;

use App\Models\Pesanan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * 
     * 
     * Display a listing of the resource.
     *
     * 
     * 
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $pesanan = Pesanan::all();

        return response()->json([
            'success' => true,
            'message' => 'Daftar data teman',
            'data' => $pesanan
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $pesanan = Pesanan::create([
            'nama_makanan'=> $request->nama_makanan,
            'harga' => $request->harga,
            'stok' => $request->stok
            

            ]);

            if($pesanan)
            {
                return response()->json([
                    'success' => true,
                    'message' => 'pesanan berhasil di tambahkan',
                    'data' => $pesanan
                ], 200);
            }else{
                return response()->json([
                'success' => false,
                'message' => 'pesanan gagal di tambahkan',
                'data' => $pesanan
            ], 409);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
                $pesanan = Pesanan ::where('id', $id)->first();

                return response()->json([
                    'success' => true,
                    'message' => 'Detail data pesanan',
                    'data' => $pesanan          
                       ], 200);
    }
    public function edit($id)
    {
                $pesanan = Pesanan::where('id', $id)->first();

                return response()->json([
                    'success' => true,
                    'message' => 'Detail data pesanan',
                    'data' => $pesanan
                ], 200);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*$request->validate([
            'nama_pesanan' => 'required|unique:pesanan|max:255',
            'harga_pesanan' => 'required|numeric',
            'stok' => 'required',
        ]);*/
        $f = Pesanan::find($id)->update([
            'nama_makanan' => $request->nama_makanan,
            'harga' => $request->harga,
            'stok' => $request->stok
            
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $f
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cek = Pesanan::find($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Post Deleted',
            'data' => $cek
        ], 200);
    }
}
