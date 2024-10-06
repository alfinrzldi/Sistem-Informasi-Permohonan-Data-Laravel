<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMasuk extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'data_masuk';

    // Kolom-kolom yang bisa diisi
    protected $fillable = [
        'perusahaan',
        'nama',
        'email',
        'telepon',
        'identitas',
        'jenis_info',
        'tujuan_info',
        'data',
        'jam_masuk',
        'jam_keluar',
    ];
}

?>