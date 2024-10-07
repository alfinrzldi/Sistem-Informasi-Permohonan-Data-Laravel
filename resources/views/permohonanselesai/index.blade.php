@extends('template.main')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="mb-4">
        <h5 class="m-0 font-weight-bold">Daftar Permohonan Selesai</h5>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Pemohon</th>
                            <th>Perusahaan</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Jam Masuk</th>
                            <th>Jam Keluar</th>
                            <th>Aksi</th>
                            <th>Unggah File</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->perusahaan }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->jam_masuk }}</td>
                            <td>{{ $item->jam_keluar }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm mb-2" href="{{ route('permohonanselesai.show', ['id' => $item->id]) }}">Detail</a>
                                <br>
                                <form action="{{ route('permohonan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus permohonan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                                @if ($item->file_path)
                                <a href="{{ asset('storage/' . $item->file_path) }}" class="btn btn-info btn-sm mt-2" download>Download File</a>
                            @endif
                                <hr>
                                <form action="{{ route('permohonan.changeStatus', ['id' => $item->id]) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <input type="hidden" name="status" value="permohonan_proses">
                                    <button type="submit" class="btn btn-success btn-sm">Kembalikan Ke Proses</button>
                                </form>
                                
                            </td>
                            <td>
                                <form action="{{ route('permohonanselesai.upload') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}"> <!-- Hidden input untuk mengirimkan ID -->
                                    <div class="form-group">
                                        <input type="file" name="file" class="form-control form-control-sm file-input" style="
                                            .file-input {
    height: 30px; /* Ubah sesuai kebutuhan */
    padding: 2px 5px; /* Ubah padding sesuai kebutuhan */
    font-size: 12px; /* Ubah ukuran font sesuai kebutuhan */
}
    .btn-sm {
    padding: 5px 10px; /* Sesuaikan padding untuk ukuran lebih kecil */
    font-size: 12px;   /* Ubah ukuran font tombol */
}
                                            "> <!-- Tambahkan class khusus -->
                                    </div>
                                    <button type="submit" class="btn btn-success btn-sm">Upload</button> <!-- Tombol Upload dengan ukuran kecil -->
                                </form>
                                
                                
                                <!-- Tombol download (ditampilkan jika file sudah ada) -->
   
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
