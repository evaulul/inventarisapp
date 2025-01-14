<?php

namespace App\Http\Controllers;

use App\Models\jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class jenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = jenis::all();
        return view('administrator.jenis.tampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = jenis::all();
        return view('administrator.jenis.input', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('jenis')->insert([
            'namajenis'=> $request-> namajenis,
            'kodejenis' => $request-> kodejenis,
            'keterangan' => $request -> keterangan  
        ]);

        return redirect('/jenis');
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
        $data = Jenis::find($id);
        if (!$data) {
            return redirect()->back()->with('error', 'Inventaris not found.');
        }
        return view("administrator.jenis.edit", compact('data')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        DB::table('jenis')->where('idjenis', $request->idjenis)->update([
            'namajenis' => $request->namajenis,
            'kodejenis' => $request->kodejenis,
            'keterangan' => $request->keterangan, 
        ]);
    
        return redirect('/jenis');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('jenis')->where('idjenis',$id)->delete();
        return redirect('/jenis');
    }
}
