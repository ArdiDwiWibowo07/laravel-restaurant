<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'id',
        'username',
        'no_wa',
        'nama',
        'email',
        'email_vertified_at',
        'password',
        'rember_token',
        'created_at',
        'updated_at'
    ];

    protected $primaryKey = 'id';
}
