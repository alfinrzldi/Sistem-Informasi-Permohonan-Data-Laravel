@extends('template.main')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="mb-4">
        <a href="{{ route('permohonanbaru.create') }}">
            <button class="mb-3 p-3 font-weight-bold" style="border-radius: 20px; color: rgb(255, 255, 255); background-color: rgb(106, 160, 240); border-width: 1px; border-color: rgb(196, 196, 196);">
                Buat Permohonan Baru
            </button>
        </a>
    </div>  

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold">Permohonan Baru</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Pemohon</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Jam Masuk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama Pemohon</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Jam Masuk</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->status ?? 'Menunggu' }}</td>
                            <td>{{ $item->jam_masuk }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('permohonanbaru.show', ['id' => $item->id]) }}">Detail</a>
                                
                                <a class="btn btn-warning btn-sm" href="{{ route('permohonanbaru.edit', ['id' => $item->id]) }}">Edit</a>
                                
                                <form action="{{ route('permohonan.destroy', ['id' => $item->id]) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                                <hr>
                                <form action="{{ route('permohonan.changeStatus', ['id' => $item->id]) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <input type="hidden" name="status" value="permohonan_proses">
                                    <button type="submit" class="btn btn-success btn-sm">Pindah ke Proses</button>
                                </form>
                            
                                <!-- Tombol untuk memindahkan ke Selesai -->
                                <form action="{{ route('permohonan.changeStatus', ['id' => $item->id]) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <input type="hidden" name="status" value="permohonan_selesai">
                                    <button type="submit" class="btn btn-success btn-sm">Pindah ke Selesai</button>
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
