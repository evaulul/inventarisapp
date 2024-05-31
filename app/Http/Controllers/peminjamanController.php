<?php

namespace App\Http\Controllers;

use App\Models\DetailPinjam;
use App\Models\Inventaris;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function indexadmin()
    {
        $judul = "Peminjaman";
        $data = Peminjaman::where('status_peminjaman', 'Proses Validasi')->get();        
        return view('administrator.peminjaman.tampil', compact('judul', 'data'));
    }

    public function createadmin()
    {
        $judul = "Peminjaman";
        $inventaris = Inventaris::all();
        $data = $inventaris->map(function ($item) {
            return [
                'id_inventaris' => $item->id_inventaris,
                'nama' => $item->nama
            ];
        });
        return view('administrator.peminjaman.input', compact('judul', 'data'));
    }

    public function storeadmin(Request $request)
    {
        $idBarang = $request->input('id_inventaris');
        $jumlahDipinjam = $request->input('jumlah');
        $barang = Inventaris::find($idBarang);
        $barang->jumlah -= $jumlahDipinjam;
        $barang->save();

        
        $tanggalPinjam = now();
        $tanggalKembali = $tanggalPinjam->copy()->addWeek();

        $peminjaman = Peminjaman::create([
            'tanggal_pinjam' => $tanggalPinjam->toDateString(),
            'tanggal_kembali' => $tanggalKembali->toDateString(),
            'status_peminjaman' => "Proses Validasi",
            'id_pegawai' => $request->id_pegawai,
        ]);
        $request->validate([
            'id_inventaris' => 'required',
            'id_pegawai' => 'required', 
        ]);
        DetailPinjam::create([
            'id_peminjaman' => $peminjaman->id_peminjaman,
            'id_inventaris' => $request->id_inventaris,
            'jumlah' =>  $request->jumlah,
        ]);
        return redirect()->back()->with('Peminjaman berhasil ditambahkan.');
    }

    public function indexoperator()
    {
        $judul = "Peminjaman";
        $data = Peminjaman::where('status_peminjaman', 'Divalidasi')->get();        
        return view('operator.peminjaman.tampil', compact('judul', 'data'));
    }

    public function createoperator()
    {
        $judul = "Peminjaman";
        $inventaris = Inventaris::all();
        $data = $inventaris->map(function ($item) {
            return [
                'id_inventaris' => $item->id_inventaris,
                'nama' => $item->nama
            ];
        });
        return view('operator.peminjaman.input', compact('judul', 'data'));
    }

    public function storeoperator(Request $request)
    {
        $idBarang = $request->input('id_inventaris');
        $jumlahDipinjam = $request->input('jumlah');
        $barang = Inventaris::find($idBarang);
        $barang->jumlah -= $jumlahDipinjam;
        $barang->save();

        $tanggalPinjam = now();
        $tanggalKembali = $tanggalPinjam->copy()->addWeek();

        $peminjaman = Peminjaman::create([
            'tanggal_pinjam' => $tanggalPinjam->toDateString(),
            'tanggal_kembali' => $tanggalKembali->toDateString(),
            'status_peminjaman' => "Proses Validasi",
            'id_pegawai' => $request->id_pegawai,
        ]);
        $request->validate([
            'id_inventaris' => 'required',
            'id_pegawai' => 'required', 
        ]);
        DetailPinjam::create([
            'id_peminjaman' => $peminjaman->id_peminjaman,
            'id_inventaris' => $request->id_inventaris,
            'jumlah' =>  $request->jumlah,
        ]);
        
        return redirect()->back()->with('Peminjaman berhasil ditambahkan.');    
    }

    public function indexkepalagudang()
    {
        $judul = "Peminjaman";
        $data = Peminjaman::where('status_peminjaman', 'Proses Validasi')->get();        
        return view('kepalagudang.peminjaman.tampil', compact('judul', 'data'));
    }
}