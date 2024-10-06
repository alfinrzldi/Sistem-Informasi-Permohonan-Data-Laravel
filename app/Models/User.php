<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
class User extends Model
{
    // Menentukan primary key
    protected $primaryKey = 'email';

    // Mengatur agar kolom primary key bukan incrementing
    public $incrementing = false;

    // Mengatur tipe data primary key
    protected $keyType = 'string';

    // Daftar kolom yang dapat diisi
    protected $fillable = ['email', 'nama', 'telepon', 'role', 'password'];
}

