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
        $data->jam_masuk = $request->jam_masuk;
        $data->jam_keluar = $request->jam_keluar;
    
        // Set kolom data ke string kosong
        $data->data = ''; // Atau null, jika kolom diperbolehkan null
    
        // Set status default ke 'Menunggu'
        $data->status = 'Menunggu';
        
        $data->save();
        
        return redirect()->route('permohonanbaru.index')->with('success', 'Permohonan berhasil dibuat.');
    }
    
    public function showByEmail($email)
{
    // Ambil data berdasarkan email
    $data = DataMasuk::where('email', $email)->first();

    // Cek apakah data ditemukan
    if (!$data) {
        return redirect()->route('permohonanselesai.index')->with('error', 'Data tidak ditemukan.');
    }

    // Tampilkan view detail dengan data yang ditemukan
    return view('permohonans.user.detail', compact('data'));
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
        'status' => 'required|in:Menunggu,Permohonan Dalam Proses,Permohonan Diterima, Permohonan Ditolak',
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

public function upload(Request $request)
{
    $request->validate([
        'id' => 'required|exists:data_masuk,id', // Pastikan ID dikirim melalui request
        'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,jpg,png|max:2048',
    ]);

    // Proses upload file
    if ($request->file('file')->isValid()) {
        $file = $request->file('file');
        $path = $file->store('uploads', 'public');

        // Simpan informasi file ke dalam database
        $data = DataMasuk::findOrFail($request->id);
        $data->file_path = $path;
        $data->save();
    }

    return redirect()->route('permohonanselesai.index')->with('success', 'File berhasil diunggah.');
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
    
    // Pastikan status permohonan adalah 'Permohonan Diterima'
    if ($data->status != 'Permohonan Diterima') {
        abort(404); // Atau redirect ke halaman lain dengan pesan error
    }

    return view('permohonanselesai.detail', compact('data'));
}



public function showTolak($id)
{
    // Gunakan model yang benar, yaitu DataMasuk
    $data = DataMasuk::findOrFail($id);
    
    // Pastikan status permohonan adalah 'selesai'
    if ($data->status != 'Permohonan Ditolak') {
        abort(404); // Atau redirect ke halaman lain dengan pesan error
    }

    return view('permohonantolak.detail', compact('data'));
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
    $data = DataMasuk::where('status', 'Permohonan Diterima')->get();

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

public function permohonanTolak()
{
    // Mengambil semua data dengan status 'Permohonan Ditolak'
    $data = DataMasuk::where('status', 'Permohonan Ditolak')->get();

    // Menampilkan data pada view 'permohonantolak.index'
    return view('permohonantolak.index', compact('data'));
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