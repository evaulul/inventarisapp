<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function admin()
    {
        $title = "Beranda";
        $isi = "Haii Easy Inventory Disini :)";
        return view('administrator.beranda', ['title' => $title, 'isi' => $isi]);
    }

    public function operator()
    {
        $title = "Beranda";
        $isi = "Haii Easy Inventory Disini :)";
        return view('operator.beranda', ['title' => $title, 'isi' => $isi]);
    }

    public function kepalagudang()
    {
        $title = "Beranda";
        $isi = "Selamat datang di halaman ini";
        return view('kepalagudang.beranda', ['title' => $title, 'isi' => $isi]);
    }
}
