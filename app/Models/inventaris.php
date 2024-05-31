<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventaris extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_inventaris';
    protected $fillable = [
        'nama', 'kondisi', 'keterangan', 'jumlah', 'id_jenis', 'tanggal_register', 'id_ruang', 'kode_inventaris', 'id_petugas'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ruang()
    {
        return $this->belongsTo(ruang::class);
    }

    public function jenis()
    {
        return $this->belongsTo(jenis::class);
    }
}