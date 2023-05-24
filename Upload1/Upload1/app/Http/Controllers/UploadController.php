<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Image;

class UploadController extends Controller
{
    // Menampilkan halaman upload file
    public function upload(){
        return view('upload');
    }

    // Memproses upload file
    public function proses_upload(Request $request){
        $this->validate($request, [
            'file' => 'required',
            'keterangan' => 'required',
        ]);

        $file = $request->file('file');

        echo 'File Name: '.$file->getClientOriginalName().'<br>';

        echo 'File Ext: '.$file->getClientOriginalExtension().'<br>';

        echo 'File Real Path: '.$file->getRealPath().'<br>';

        echo 'File size: '.$file->getSize().'<br>';

        echo 'File Mime Type: '.$file->getMimeType().'<br>';

        $tujuan_upload = 'data_file';

        $file->move($tujuan_upload, $file->getClientOriginalName());
    }

    // Mengubah ukuran dan menyimpan file upload
    public function resize_upload(Request $request){
        $this->validate($request, [
            'file' => 'required',
            'keterangan' => 'required'
        ]);

        $path = public_path('img/logo');

        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true);
        }

        $file = $request->file('file');

        $fileName = 'img_'. uniqid() . '.' . $file->getClientOriginalExtension();

        $canvas = Image::canvas(200, 200);

        $resizeImage = Image::make($file)->resize(null, 200, function($constraint) {
            $constraint->aspectRatio();
        });

        $canvas->insert($resizeImage, 'center');

        if($canvas->save($path . '/' . $fileName)){
            return redirect(route('upload'))->with('success', 'Data berhasil ditambahkan!');
        } else {
            return redirect(route('upload'))->with('error', 'Data gagal ditambahkan');
        }
    }

    // Menampilkan halaman dropzone
    public function dropzone(){
        return view('dropzone');
    }
    // Menyimpan file yang diupload menggunakan dropzone
    public function dropzone_store(Request $request){
        $image = $request->file('file');

        $imageName = uniqid() . time() . '.' . $image->extension();
        $image->move(public_path('img/dropzone'), $imageName);
        return response()->json(['success' => $imageName]);
    }

     // Menampilkan halaman upload PDF
    public function pdf_upload(){
        return view('pdf_upload');
    }

    // Menyimpan file PDF yang diupload
    public function pdf_store(Request $request){
        $pdf = $request->file('file');

        $pdfName = 'pdf_' . uniqid() . '_' . time() . '.' . $pdf->extension();

        $pdf->move(public_path('pdf/dropzone'), $pdfName);
        return response()->json(['success' => $pdfName]);
    }
}
