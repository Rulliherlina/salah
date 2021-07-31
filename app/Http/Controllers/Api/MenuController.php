<?php

namespace App\Http\Controllers\Api;

use App\Models\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
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

        $menu = Menu::all();

        return response()->json([
            'success' => true,
            'message' => 'Daftar data teman',
            'data' => $menu
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
     
        $menu = Menu::create([
            'nama_makanan'=> $request->nama_makanan,
            'harga' => $request->harga,
            'stok' => $request->stok
            

            ]);

            if($menu)
            {
                return response()->json([
                    'success' => true,
                    'message' => 'menu berhasil di tambahkan',
                    'data' => $menu
                ], 200);
            }else{
                return response()->json([
                'success' => false,
                'message' => 'menu gagal di tambahkan',
                'data' => $menu
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
                $menu = Menu ::where('id', $id)->first();

                return response()->json([
                    'success' => true,
                    'message' => 'Detail data menu',
                    'data' => $menu          
                       ], 200);
    }
    public function edit($id)
    {
                $menu = Menu::where('id', $id)->first();

                return response()->json([
                    'success' => true,
                    'message' => 'Detail data menu',
                    'data' => $menu
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
            'nama_menu' => 'required|unique:menu|max:255',
            'harga_menu' => 'required|numeric',
            'stok' => 'required',
        ]);*/
        $f = Menu::find($id)->update([
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
        $cek = Menu::find($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Post Deleted',
            'data' => $cek
        ], 200);
    }
}
