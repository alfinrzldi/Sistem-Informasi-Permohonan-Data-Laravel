<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $table = 'survey'; // Tentukan nama tabel
    protected $fillable = [
        'sangat_puas',
        'puas',
        'baik',
        'kurang_baik',
    ];
}
