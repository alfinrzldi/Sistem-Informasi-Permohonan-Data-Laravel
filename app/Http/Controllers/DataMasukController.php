<?php
namespace App\Http\Controllers;

use App\Models\DataMasuk;
use Illuminate\Http\Request;

class DataMasukController extends Controller
{
    // Menampilkan daftar permohonan baru (index)
    public function index()
{
    // Mengambil data dengan status 'Menunggu'
    $data = DataMasuk::where('status', 'Menunggu')->get();
    return view('permohonanbaru.index', compact('data'));
}


    // Menampilkan form untuk membuat permohonan baru (create)
    public function create()
    {
        return view('permohonanbaru.create');
    }

    // Menyimpan data permohonan baru (store)
    public function store(Request $request)
    {
        $request->validate([
            'perusahaan' => 'required|string',
            'nama' => 'required|string',
            'email' => 'required|email',
            'telepon' => 'required|string',
            'identitas' => 'required|string',
            'jenis_info' => 'required|string',
            'tujuan_info' => 'required|string',
            'data' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'jam_masuk' => 'required|date',
            'jam_keluar' => 'required|date|after_or_equal:jam_masuk',
        ]);
    
        $data = new DataMasuk();
        $data->perusahaan = $request->perusahaan;
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->telepon = $request->telepon;
        $data->identitas = $request->identitas;
        $data->jenis_info = $request->jenis_info;
        $data->tujuan_info = $request->tujuan_info;
        $data->data = $request->file('data')->store('public/data'); 
        $data->jam_masuk = $request->jam_masuk;
        $data->jam_keluar = $request->jam_keluar;
    
        // Set status default ke 'Menunggu'
        $data->status = 'Menunggu';
    
        $data->save();
    
        return redirect()->route('permohonanbaru.index')->with('success', 'Permohonan berhasil dibuat.');
    }
    


    // Menampilkan detail permohonan (show)
    public function show($id)
{
    $data = DataMasuk::findOrFail($id);
    return view('permohonanbaru.detail', compact('data'));
}

public function edit($id)
{
    $data = DataMasuk::findOrFail($id);
    return view('permohonanbaru.edit', compact('data'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'perusahaan' => 'required|string|max:255',
        'nama' => 'required|string|max:255',
        'email' => 'required|email',
        'telepon' => 'required|string|max:20',
        'identitas' => 'required|string|max:255',
        'jenis_info' => 'required|string|max:255',
        'tujuan_info' => 'required|string|max:255',
        'status' => 'required|in:Menunggu,Permohonan Dalam Proses,Permohonan Diterima',
        'jam_masuk' => 'required|date',
        'jam_keluar' => 'required|date|after_or_equal:jam_masuk',
    ]);

    $data = DataMasuk::findOrFail($id);

    $data->update([
        'perusahaan' => $request->perusahaan,
        'nama' => $request->nama,
        'email' => $request->email,
        'telepon' => $request->telepon,
        'identitas' => $request->identitas,
        'jenis_info' => $request->jenis_info,
        'tujuan_info' => $request->tujuan_info,
        'status' => $request->status, // Menyimpan status baru
        'jam_masuk' => $request->jam_masuk,
        'jam_keluar' => $request->jam_keluar,
    ]);

    return redirect()->route('permohonanbaru.index')->with('success', 'Permohonan berhasil diperbarui.');
}



    // Menghapus permohonan (destroy)
    public function destroy($id)
{
    $data = DataMasuk::findOrFail($id);
    $data->delete();

    return redirect()->back()->with('success', 'Data permohonan berhasil dihapus.');
}

public function showProses($id)
{
    // Mengambil data permohonan yang sedang dalam proses berdasarkan ID
    $data = DataMasuk::findOrFail($id);
    
    // Pastikan status adalah 'permohonan_proses'
    if ($data->status != 'permohonan_proses') {
        abort(404); // Atau redirect ke halaman yang sesuai dengan pesan error
    }

    // Menampilkan halaman detail dengan data permohonan
    return view('permohonanproses.detail', compact('data'));
}


public function showSelesai($id)
{
    // Gunakan model yang benar, yaitu DataMasuk
    $data = DataMasuk::findOrFail($id);
    
    // Pastikan status permohonan adalah 'selesai'
    if ($data->status != 'permohonan_selesai') {
        abort(404); // Atau redirect ke halaman lain dengan pesan error
    }

    return view('permohonanselesai.detail', compact('data'));
}


public function permohonanProses()
{
    $data = DataMasuk::where('status', 'permohonan_proses')->get();

    // Mapping status agar lebih deskriptif
    $data->transform(function ($item) {
        if ($item->status == 'permohonan_proses') {
            $item->status = 'Permohonan Dalam Proses';
        } elseif ($item->status == 'permohonan_selesai') {
            $item->status = 'Permohonan Selesai';
        }
        return $item;
    });

    return view('permohonanproses.index', compact('data'));
}

public function permohonanSelesai()
{
    $data = DataMasuk::where('status', 'permohonan_selesai')->get();

    // Mapping status agar lebih deskriptif
    $data->transform(function ($item) {
        if ($item->status == 'permohonan_proses') {
            $item->status = 'Permohonan Dalam Proses';
        } elseif ($item->status == 'permohonan_selesai') {
            $item->status = 'Permohonan Selesai';
        }
        return $item;
    });

    return view('permohonanselesai.index', compact('data'));
}



public function changeStatus(Request $request, $id)
{
    $data = DataMasuk::findOrFail($id);

    $newStatus = $request->status;
    $data->status = $newStatus;
    $data->save();

    return redirect()->back()->with('success', 'Status permohonan berhasil diubah.');
}




}

?>