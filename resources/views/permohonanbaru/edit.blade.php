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
                            <h6 class="card-title mb-0 font-weight-bold">Edit Permohonan Baru</h6>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" action="{{ route('permohonanbaru.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <!-- Kolom Pertama -->
                                    <div class="col-md-6">

                                        <div class="mb-3">
                                            <label for="status">Status Permohonan</label>
                                            <select name="status" class="form-control" required>
                                                <option value="permohonan_baru" {{ $data->status == 'permohonan_baru' ? 'selected' : '' }}>Permohonan Baru</option>
                                                <option value="permohonan_proses" {{ $data->status == 'permohonan_proses' ? 'selected' : '' }}>Permohonan Proses</option>
                                                <option value="permohonan_selesai" {{ $data->status == 'permohonan_selesai' ? 'selected' : '' }}>Permohonan Selesai</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="perusahaan" class="form-label">Nama Perusahaan</label>
                                            <input type="text" name="perusahaan" id="perusahaan" class="form-control" value="{{ $data->perusahaan }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama Pemohon</label>
                                            <input type="text" name="nama" id="nama" class="form-control" value="{{ $data->nama }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" id="email" class="form-control" value="{{ $data->email }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="telepon" class="form-label">Nomor Telepon</label>
                                            <input type="text" name="telepon" id="telepon" class="form-control" value="{{ $data->telepon }}" required>
                                        </div>
                                    </div>

                                    <!-- Kolom Kedua -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="identitas" class="form-label">Nomor Identitas</label>
                                            <input type="text" name="identitas" id="identitas" class="form-control" value="{{ $data->identitas }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="jenis_info" class="form-label">Jenis Informasi</label>
                                            <input type="text" name="jenis_info" id="jenis_info" class="form-control" value="{{ $data->jenis_info }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="tujuan_info" class="form-label">Tujuan Informasi</label>
                                            <input type="text" name="tujuan_info" id="tujuan_info" class="form-control" value="{{ $data->tujuan_info }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="data" class="form-label">File Data</label>
                                            <input type="file" name="data" id="data" class="form-control-file">
                                            @if($data->data)
                                                <p>File sebelumnya: <a href="{{ Storage::url($data->data) }}" target="_blank">{{ basename($data->data) }}</a></p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="jam_masuk" class="form-label">Jam Masuk</label>
                                            <input type="date" name="jam_masuk" id="jam_masuk" class="form-control" value="{{ $data->jam_masuk }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="jam_keluar" class="form-label">Jam Keluar</label>
                                            <input type="date" name="jam_keluar" id="jam_keluar" class="form-control" value="{{ $data->jam_keluar }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-info">Simpan Perubahan</button>
                                    <hr>
                                    <button href="{{ route('permohonanbaru.index') }}" class="btn btn-secondary ms-2">Kembali</button>
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
