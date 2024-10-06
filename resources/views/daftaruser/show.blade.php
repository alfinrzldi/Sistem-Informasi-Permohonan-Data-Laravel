@extends('template.main')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold">DETAIL USER</h6>
        </div>
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $user->nama }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Telepon:</strong> {{ $user->telepon }}</p>
            <p><strong>Role:</strong> {{ $user->role == 1 ? 'User' : 'Admin' }}</p>
            <a href="{{ route('users.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection
