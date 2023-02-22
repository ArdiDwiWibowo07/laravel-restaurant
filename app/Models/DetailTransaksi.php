<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $table = 'detailtransaksi';

    protected $fillable = [
        'kode_relasi',
        'kode_transaksi',
        'kode_menu',
        'jumlah',
        'subtotal'
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'kode_menu', 'id');
    }
}
