<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class petugas extends Model
{
    use HasFactory;
    protected $primaryKey='idpetugas';
    protected $fillable=[
        'idpetugas',
        'username',
        'password',
        'namapetugas',
        'idlevel'
    ];
    public function level()
    {
        return $this->belongsTo(level::class);
    }  

    public function inventaris()
    {
        //return $this->hasMany(Inventaris::class, 'idpetugas');
    }
}