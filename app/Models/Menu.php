<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';

    protected $fillable = [
        'id',
        'nama_menu',
        'harga_satuan'
    ];

    protected $primaryKey = 'id';

    public function detailTransaksi(){
        return $this->hasMany(DetailTransaksi::class, 'kode_menu', 'id');
    }

}
