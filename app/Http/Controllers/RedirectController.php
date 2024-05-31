<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function cek() {
        if (auth()->user()->role_id === 1) {
            // jika user superadmin
            return redirect()->intended('/administrator');
        } if (auth()->user()->role_id === 2) {
            // jika user superadmin
            return redirect()->intended('/operator');
        } else {
            // jika user pegawai
            return redirect()->intended('/kepalagudang');
        }
    }
}