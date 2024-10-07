@extends('template.main')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="mb-4">
        <h5 class="m-0 font-weight-bold">Daftar Permohonan Proses</h5>
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
                                <a class="btn btn-primary btn-sm mb-2" href="{{ route('permohonanproses.show', ['id' => $item->id]) }}">Detail</a>
                                <form action="{{ route('permohonan.changeStatus', $item->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="status" value="Permohonan Ditolak">
                                    <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                                </form>  
                                <hr>
                                <form class="mb-2" action="{{ route('permohonan.changeStatus', ['id' => $item->id]) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <input type="hidden" name="status" value="Permohonan Diterima">
                                    <button type="submit" class="btn btn-success btn-sm">Pindah ke Selesai</button>
                                </form>
                                <br>                              
                            
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
