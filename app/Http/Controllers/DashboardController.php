<?php
namespace App\Http\Controllers;

use App\Models\DataMasuk;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung jumlah user
        $users = User::count();

        // Menghitung jumlah permohonan berdasarkan status
        $permohonanDiterima = DataMasuk::where('status', 'Permohonan Diterima')->count();
        $permohonanProses = DataMasuk::where('status', 'Permohonan_proses')->count();
        $permohonanDitolak = DataMasuk::where('status', 'Permohonan Ditolak')->count();

        // Kirimkan data ke view
        return view('dashboard', compact('users', 'permohonanDiterima', 'permohonanProses', 'permohonanDitolak'));
    }
}
?>
