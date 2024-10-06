@extends('template.main')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="mb-4">
        <h5 class="m-0 font-weight-bold">Permohonan Proses</h5>
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
                                <a class="btn btn-primary btn-sm" href="{{ route('permohonanproses.show', ['id' => $item->id]) }}">Detail</a>
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
