<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Menentukan primary key
    protected $primaryKey = 'id'; // Ubah primary key menjadi 'id'

    // Mengatur agar kolom primary key adalah incrementing
    public $incrementing = true; // Set menjadi true karena 'id' adalah auto-increment

    // Mengatur tipe data primary key
    protected $keyType = 'int'; // Ubah tipe key menjadi 'int' karena 'id' adalah integer

    // Daftar kolom yang dapat diisi
    protected $fillable = ['email', 'nama', 'telepon', 'role', 'password'];

    // Jika ingin menggunakan email sebagai kunci untuk autentikasi, Anda bisa menambahkan method ini
    public function getAuthIdentifierName()
    {
        return 'email';
    }
}
