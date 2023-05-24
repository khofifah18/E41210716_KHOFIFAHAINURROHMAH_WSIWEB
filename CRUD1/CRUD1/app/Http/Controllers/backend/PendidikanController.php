<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Pendidikan;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    // Menampilkan halaman daftar data pendidikan
    public function index(){
        $pendidikan = Pendidikan::get();
        return view('backend.pendidikan.index', compact('pendidikan'));
    }

    // Menampilkan halaman form tambah data pendidikan
    public function create(){
        $pendidikan = null;
        return view('backend.pendidikan.create', compact('pendidikan'));
    }
    
    // Menyimpan data pendidikan baru ke dalam database
    public function store(Request $request){
        Pendidikan::create($request->all());

        return redirect()->route('pendidikan.index')->with('success', 'Data Pendidikan baru telah berhasil disimpan.');
    }
    
    // Menampilkan halaman form edit data pendidika
    public function edit(Pendidikan $pendidikan){
        return view('backend.pendidikan.create', compact('pendidikan'));
   }
    
   // Mengupdate data pendidikan yang ada dalam database
   public function update(Request $request, Pendidikan $pendidikan){
        $pendidikan->update($request->all());

        return redirect()->route('pendidikan.index')->with('success', 'Pendidikan berhasil diperbaharui.');
   }

   // Menghapus data pendidikan dari database
   public function destroy(Pendidikan $pendidikan){
        $pendidikan->delete();
        return redirect()->route('pendidikan.index')->with('success', 'Data Pendidikan berhasil dihapus');
   }
}
