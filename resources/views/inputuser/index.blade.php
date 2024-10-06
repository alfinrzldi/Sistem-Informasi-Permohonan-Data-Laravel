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
            <h6 class="m-0 font-weight-bold">INPUT USER</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST" onsubmit="return validateForm()">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email" required>
                </div>

                <div class="mb-3">
                    <label for="telepon" class="form-label">Handphone</label>
                    <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Masukkan nomor handphone" required>
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="1">User</option>
                        <option value="2">Admin</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password (Password minimal 8 karakter)</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function validateForm() {
        var password = document.getElementById("password").value;
        if (password.length < 8) {
            alert("Password harus minimal 8 karakter.");
            return false; // Mencegah form terkirim jika validasi gagal
        }
        return true; // Lanjutkan submit form jika validasi berhasil
    }
</script>

@endsection
