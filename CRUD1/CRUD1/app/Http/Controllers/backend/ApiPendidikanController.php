<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Pendidikan;
use Illuminate\Http\Request;

class ApiPendidikanController extends Controller
{
    // Mendapatkan semua data pendidikan
    public function getAll(){
        $pendidikan = Pendidikan::all();
        return response()->json($pendidikan, 201);
    }

     // Mendapatkan data pendidikan berdasarkan ID
    public function getPen($id){
        $pendidikan = Pendidikan::find($id);

        return response()->json($pendidikan, 200);
    }

     // Membuat data pendidikan baru
    public function createPen(Request $request){
        Pendidikan::create($request->all());

        return response()->json([
            'status' => 'ok',
            'message' => 'Pendidikan berhasil ditambahkan'
        ], 201);
    }

    // Memperbarui data pendidikan berdasarkan ID
    public function updatePen($id, Request $request){
        $data = Pendidikan::find($id);
        $data_form = $request->all();
        $data->update($request->all());
        $data->save();

        return response()->json($data_form, 201);
    }

     // Menghapus data pendidikan berdasarkan ID
    public function deletePen($id){
        Pendidikan::destroy($id);

        return response()->json([
            'status' => 'ok',
            'message' => 'Pendidikan berhasil dihapus'
        ], 201);
    }
}
