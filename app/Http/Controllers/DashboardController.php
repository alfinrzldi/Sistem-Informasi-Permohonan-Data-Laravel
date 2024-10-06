<?php
namespace App\Http\Controllers;

use App\Models\Permohonan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung jumlah user
        $Users = User::count();

        // Kirimkan data ke view
        return view('dashboard', compact('Users'));
    }
}
?>