<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;

class ValidasiPengembalianController extends Controller
{
    public function validasiadmin($id_peminjaman)
    {
        $peminjaman = Peminjaman::findOrFail($id_peminjaman);
        $peminjaman->status_peminjaman = 'Divalidasi';
        $peminjaman->save();
        return redirect()->back()->with('success', 'Status peminjaman berhasil divalidasi.');
    }

    public function pengembalianadmin()
    {
        $judul = "Pengembalian";
        $data = Peminjaman::where('status_peminjaman', 'Divalidasi')->get();        
        return view('administrator.peminjaman.pengembalian', compact('judul', 'data'));
    }

    public function kembalikanadmin($id_peminjaman)
    {
        $peminjaman = Peminjaman::findOrFail($id_peminjaman);
        $peminjaman->tanggal_kembali = now();
        $peminjaman->status_peminjaman = 'Dikembalikan';
        $peminjaman->save();
        return redirect()->back()->with('success', 'Peminjaman berhasil dikembalikan.');
    }

    public function kembalikanoperator($id_peminjaman)
    {
        $peminjaman = Peminjaman::findOrFail($id_peminjaman);
        $peminjaman->tanggal_kembali = now();
        $peminjaman->status_peminjaman = 'Dikembalikan';
        $peminjaman->save();
        return redirect()->back()->with('success', 'Peminjaman berhasil dikembalikan.');
    }

    public function validasikp($id_peminjaman)
    {
        $peminjaman = Peminjaman::findOrFail($id_peminjaman);
        $peminjaman->status_peminjaman = 'Divalidasi';
        $peminjaman->save();
        return redirect()->back()->with('success', 'Status peminjaman berhasil divalidasi.');
    }
}