<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index()
	{
	$pesanan = Pesanan::latest()->paginate(10);
	return view('pesanan.index', compact('pesanan'));
	}
	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create()
	{
	return view('pesanan.create');
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

	'menu' => 'required',
	'jumlah' => 'required',
	'total' => 'required'
	]);
	
	$pesanan = Pesanan::create([
	'menu' => $request->menu,
	'jumlah' => $request->jumlah,
	'total' => $request->total
	]);
	
	if($pesanan){
	//redirect dengan pesan sukses
	return redirect()->route('pesanan.index')->with(['success' => 'Data Berhasil Disimpan!']);
	}else{
	//redirect dengan pesan error
	return
	
	
	
	
	
	
	
	
	
	
	
	
	
	redirect()->route('pesanan.index')->with(['error' => 'Data Gagal Disimpan!']);
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
	public function edit(pesanan $pesanan)
	{
	return view('pesanan.edit', compact('pesanan'));
	}
	
	/**
	* Update the specified resource in storage.
	*
	* @param \Illuminate\Http\Request $request
	* @param int $id
	* @return \Illuminate\Http\Response
	*/
	public function update(Request $request, pesanan $pesanan)
	{
	$this->validate($request, [
    'menu' => 'required',
    'jumlah' => 'required',
	'total' => 'required'
	]);
	
	$pesanan->update([
    'menu' => $request->menu,
    'jumlah' => $request->jumlah,
    'total' =>$request->total
	]);
	
	if($pesanan) {
	//redirect dengan pesan sukses
	return redirect()->route('pesanan.index')->with(['success' => 'Data Berhasil Diupdate!']);
	}else{
	//redirect dengan pesan error
	return
	
	
	
	
	
	
	
	
	
	
	
	
	
	redirect()->route('pesanan$pesanan.index')->with(['error' => 'Data Gagal Diupdate!']);
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
	
	$pesanan = Pesanan::findOrFail($id);
	
	if($pesanan){
	//redirect dengan pesan sukses
	return redirect()->route('pesanan$pesanan.index')->with(['success' => 'Data Berhasil Dihapus!']);
	}else{
	//redirect dengan pesan error
	return redirect()->route('pesanan$pesanan.index')->with(['error' => 'Data Gagal Dihapus!']);
	}
    }
}