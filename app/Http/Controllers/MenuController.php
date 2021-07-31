<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index()
	{
	$menu = Menu::latest()->paginate(10);
	return view('menu.index', compact('menu'));
	}
	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create()
	{
	return view('menu.create');
	}
	
	/**
	* Store a newly created resource in storage.
	*
	* @param \Illuminate\Http\Request $request
	* @return \Illuminate\Http\Response
	*/
	public function store(Request $request)
	{
	$this->validate($request, [

	'nama_makanan' => 'required',
	'harga' => 'required',
	'stok' => 'required'
	]);
	
	$menu = Menu::create([
	'nama_makanan' => $request->nama_makanan,
	'harga' => $request->harga,
	'stok' => $request->stok
	]);
	
	if($menu){
	//redirect dengan pesan sukses
	return redirect()->route('menu.index')->with(['success' => 'Data Berhasil Disimpan!']);
	}else{
	//redirect dengan pesan error
	return redirect()->route('menu.index')->with(['error' => 'Data Gagal Disimpan!']);
	}
	}
	
	/**
	* Display the specified resource.
	*
	* @param int $id
	* @return \Illuminate\Http\Response
	*/
	public function show($id)
	{
	//
	}
	
	/**
	* Show the form for editing the specified resource.
	*
	* @param int $id
	* @return \Illuminate\Http\Response
	*/
	public function edit(menu $menu)
	{
	return view('menu.edit', compact('menu'));
	}
	
	/**
	* Update the specified resource in storage.
	*
	* @param \Illuminate\Http\Request $request
	* @param int $id
	* @return \Illuminate\Http\Response
	*/
	public function update(Request $request, menu $menu)
	{
	$this->validate($request, [
    'nama_makanan' => 'required',
    'harga' => 'required',
	'stok' => 'required'
	]);
	
	$menu->update([
    'nama_makanan' => $request->nama_makanan,
    'harga' => $request->harga,
    'stok' =>$request->stok
	]);
	
	if($menu) {
	//redirect dengan pesan sukses
	return redirect()->route('menu.index')->with(['success' => 'Data Berhasil Diupdate!']);
	}else{
	//redirect dengan pesan error
	return redirect()->route('menu.index')->with(['error' => 'Data Gagal Diupdate!']);
	}
	}
	
	/**
	* Remove the specified resource from storage.
	*
	* @param int $id
	* @return \Illuminate\Http\Response
	*/
	public function destroy($id)
	{
	
	$menu = Menu::findOrFail($id);
	
	if($menu){
	//redirect dengan pesan sukses
	return redirect()->route('menu.index')->with(['success' => 'Data Berhasil Dihapus!']);
	}else{
	//redirect dengan pesan error
	return redirect()->route('menu.index')->with(['error' => 'Data Gagal Dihapus!']);
	}
    }
}