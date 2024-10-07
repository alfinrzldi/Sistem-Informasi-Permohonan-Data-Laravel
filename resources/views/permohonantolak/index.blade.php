@extends('template.main')

@section('title', 'Permohonan Ditolak')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="mb-4">
        <h5 class="m-0 font-weight-bold">Daftar Permohonan Ditolak</h5>
    </div>  

    <!-- Tampilkan pesan sukses jika ada -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

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
                            <th>Tanggal Ditolak</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->perusahaan }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td>
                                <!-- Tombol untuk menampilkan detail permohonan yang ditolak -->
                                <a class="btn btn-primary btn-sm" href="{{ route('permohonantolak.show', ['id' => $item->id]) }}">Detail</a>
                                <br>
                                <!-- Tombol untuk menghapus permohonan -->
                                <form action="{{ route('permohonan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus permohonan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mt-1">Hapus</button>
                                </form>
                                <hr>
                                <!-- Tombol untuk mengembalikan status ke 'permohonan_proses' -->
                                <form action="{{ route('permohonan.changeStatus', ['id' => $item->id]) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <input type="hidden" name="status" value="permohonan_proses">
                                    <button type="submit" class="btn btn-success btn-sm mt-1">Kembalikan Ke Proses</button>
                                </form>
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
