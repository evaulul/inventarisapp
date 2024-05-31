<?php

namespace App\Http\Controllers;

use App\Models\inventaris;
use App\Models\jenis;
use App\Models\ruang;
use App\Models\petugas;
use App\Models\User;
use Illuminate\Support\Facades\db;

use Illuminate\Http\Request;

class inventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $judul = "Data Inventaris";
        $data = inventaris::all();
        foreach ($data as $d) {
            $d->d_keterangan = $d->keterangan > 0 ? 'Tersedia' : 'Tidak Tersedia';
        }
        return view('administrator.inventaris.tampil',  compact('judul', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $judul = "Tambah Data Inventaris";
        $data = inventaris::all();
        $jenis = jenis::all();
        $ruang = ruang::all();
        $petugas = User::all();
        $detail_jenis = $jenis->map(function ($item) {
            return [
                'idjenis' => $item->idjenis,
                'namajenis' => $item->namajenis
            ];
        });
        $detail_ruang = $ruang->map(function ($item) {
            return [
                'idruang' => $item->idruang,
                'namaruang' => $item->namaruang
            ];
        });
        $level_id_3 = $petugas->filter(function ($item) {
            return $item->role_id === 3;
        });
        $detail_petugas = $level_id_3->map(function ($item) {
            return [
                'id' => $item->id,
                'nama' => $item->nama
            ];
        });
        foreach ($data as $d) {
            $d->keterangan = $d->keterangan > 0 ? 'Tersedia' : 'Tidak Tersedia';
        }
        return view('administrator.inventaris.input', compact('judul', 'data', 'detail_jenis', 'detail_ruang', 'detail_petugas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('inventaris')->insert([
            'nama'=> $request->nama,
            'kondisi'=> $request->kondisi,
            'keterangan'=> $request->keterangan,
            'jumlah'=> $request->jumlah,
            'id_jenis'=> $request->id_jenis,
            'tanggal_register'=> $request->tanggal_register,
            'id_ruang'=> $request->id_ruang,
            'kode_inventaris'=> $request->kode_inventaris,
            'id_petugas'=> $request->id_petugas
        ]);
        return redirect('/inventaris');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $judul = "Edit Data Inventaris";
       $data = DB::table('inventaris')->where('id_inventaris',$id)->get();
       $jenis = jenis::all();
       $ruang = ruang::all();
       $petugas = User::all();
       $detail_jenis = $jenis->map(function ($item) {
           return [
               'idjenis' => $item->idjenis,
               'namajenis' => $item->namajenis
           ];
       });
       $detail_ruang = $ruang->map(function ($item) {
           return [
               'idruang' => $item->idruang,
               'namaruang' => $item->namaruang
           ];
       });
       $level_id_3 = $petugas->filter(function ($item) {
           return $item->role_id === 3;
       });
       $detail_petugas = $level_id_3->map(function ($item) {
           return [
               'id' => $item->id,
               'nama' => $item->nama
           ];
       });
       foreach ($data as $d) {
           $d->keterangan = $d->keterangan > 0 ? 'Tersedia' : 'Tidak Tersedia';
       }
       return view('administrator.inventaris.edit',['inventaris' => $data], compact('judul', 'detail_jenis', 'detail_ruang', 'detail_petugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        DB::table('inventaris')->where('id_inventaris',$request->id_inventaris)->update([
            'nama'=> $request->nama,
            'kondisi'=> $request->kondisi,
            'keterangan'=> $request->keterangan,
            'jumlah'=> $request->jumlah,
            'id_jenis'=> $request->id_jenis,
            'tanggal_register'=> $request->tanggal_register,
            'id_ruang'=> $request->id_ruang,
            'kode_inventaris'=> $request->kode_inventaris,
            'id_petugas'=> $request->id_petugas
        ]);
        return redirect('/inventaris');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('inventaris')->where('id_inventaris',$id)->delete();
        
        return redirect('/inventaris');
    }
}