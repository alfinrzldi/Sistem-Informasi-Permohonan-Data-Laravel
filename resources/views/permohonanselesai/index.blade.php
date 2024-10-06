@extends('template.main')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="mb-4">
        <h5 class="m-0 font-weight-bold">Permohonan Selesai</h5>
    </div>  

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
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
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->jam_masuk }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('permohonanselesai.index', ['id' => $item->id]) }}">Detail</a>
                                <hr>
                                <form action="{{ route('permohonan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus permohonan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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
