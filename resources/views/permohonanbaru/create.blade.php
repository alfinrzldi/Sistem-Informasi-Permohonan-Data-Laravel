@extends('template.main')

@section('content')

<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <div class="container-fluid" style="padding-left: 20px; padding-right: 20px;">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <h6 class="card-title mb-0 font-weight-bold">Masukkan Permohonan Baru</h6>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" action="{{ route('permohonanbaru.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <!-- Kolom Pertama -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="perusahaan" class="form-label">Nama Perusahaan</label>
                                            <input type="text" name="perusahaan" id="perusahaan" class="form-control" placeholder="Masukkan nama perusahaan" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama Pemohon</label>
                                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama pemohon" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email pemohon" required>
                                        </div>

                                        <div class="mb-3"> 
                                            <label for="telepon" class="form-label">Nomor Telepon</label>
                                            <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Masukkan nomor telepon" required>
                                        </div>
                                    </div>

                                    <!-- Kolom Kedua -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="identitas" class="form-label">Nomor Identitas</label>
                                            <input name="identitas" id="identitas" class="form-control" placeholder="Masukkan nomor identitas" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="jenis_info" class="form-label">Jenis Informasi</label>
                                            <input type="text" name="jenis_info" id="jenis_info" class="form-control" placeholder="Masukkan jenis informasi" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="tujuan_info" class="form-label">Tujuan Informasi</label>
                                            <input type="text" name="tujuan_info" id="tujuan_info" class="form-control" placeholder="Masukkan tujuan informasi" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="data" class="form-label">File Data</label>
                                            <input type="file" name="data" id="data" class="form-control-file" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="jam_masuk" class="form-label">Jam Masuk</label>
                                            <input type="date" name="jam_masuk" id="jam_masuk" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="jam_keluar" class="form-label">Jam Keluar</label>
                                            <input type="date" name="jam_keluar" id="jam_keluar" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-info">Simpan</button>
                                </div>
                            </form>
                        </div> <!-- card-body -->
                    </div> <!-- card -->
                </div> <!-- col -->
            </div> <!-- row -->
        </div> <!-- container-fluid -->
    </div> <!-- content -->
</div> <!-- content-wrapper -->

@endsection
