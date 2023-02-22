<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';

    protected $fillable = [
        'kode_pelanggan',
        'tanggal_daftar',
        'nama_pelanggan',
        'no_wa',
        'alamat'
    ];

    protected $primaryKey = 'kode_pelanggan';


}
