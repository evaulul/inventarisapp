<?php

namespace App\Http\Controllers;
use App\Models\pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\facades\db;

class PegawaiController extends Controller
{
    public function index()
    {
        $judul = "Data Pegawai";
        $data = pegawai::all();
        return view('administrator.pegawai.tampil', compact('judul', 'data'));
    }

    public function create()
    {
        $judul = "Tambah Data Pegawai";
        return view('administrator.pegawai.input', compact('judul'));
    }

    public function store(Request $request)
    {
        DB::table('pegawais')->insert([
            'namapegawai'=> $request->namapegawai,
            'nip'=> $request->nip,
            'alamat'=> $request->alamat
        ]);
        return redirect('/pegawai');
    }

    public function edit(string $id)
    {
        $judul = "Edit Data Pegawai";
        $data = DB::table('pegawais')->where('idpegawai',$id)->get();
        return view('administrator.pegawai.edit',['pegawais' => $data], compact('judul'));
    }

    public function update(Request $request)
    {
        DB::table('pegawais')->where('idpegawai',$request->idpegawai)->update([
            'namapegawai'=> $request->namapegawai,
            'nip'=> $request->nip,
            'alamat'=> $request->alamat
        ]);
        return redirect('/pegawai');
    }

    public function destroy(string $id)
    {
        DB::table('pegawais')->where('idpegawai',$id)->delete();
        
        return redirect('/pegawai');
    }
}