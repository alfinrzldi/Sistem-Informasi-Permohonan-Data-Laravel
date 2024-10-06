@extends('template.main')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold">DAFTAR USER</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Role</th>
                            <th>Aksi</th> <!-- Tambahkan kolom aksi -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->nama }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->telepon }}</td>
                            <td>{{ $user->role == 1 ? 'User' : 'Admin' }}</td>
                            <td>
                                <!-- Tombol Detail -->
                                <a href="{{ route('users.show', ['email' => $user->email]) }}" class="btn btn-info btn-sm">Detail</a>
                                
                                <!-- Tombol Edit -->
                                <a href="{{ route('users.edit', ['email' => $user->email]) }}" class="btn btn-warning btn-sm">Edit</a>
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
