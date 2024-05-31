<?php

namespace App\Http\Controllers;

use App\Models\level;
use App\Models\petugas;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::with('role')->get();$data = DB::table('users')
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->select('users.*', 'roles.role_name')
        ->get();
        return view('administrator.petugas.tampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $level = Role::all();
        $data  = $level->map(function($item){
            return[
                'id' => $item->id,
                'role_name' =>$item->role_name
            ];
        });

        return view('administrator.petugas.input', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('users')->insert([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role_id' =>$request->role_id
        ]);

        return redirect('/petugas');
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
        $data = DB::table('users')->where('id', $id)->get();
        $level = Role::all();
        $detail_level = $level->map(function($item){
            return[
                'id' => $item->id,
                'role_name' => $item->role_name
            ];
        });
        return view("administrator.petugas.edit",['petugas' => $data], compact( 'detail_level'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        DB::table('users')->where('id',$request->id)->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' =>Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);

        return redirect('/petugas');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect('/petugas');
    }
}