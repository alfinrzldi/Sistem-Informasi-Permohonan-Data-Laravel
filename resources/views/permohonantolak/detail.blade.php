@extends('template.main')

@section('content')

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <div class="container-fluid" style="padding-left: 20px; padding-right: 20px;">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <h6 class="card-title mb-0 font-weight-bold">Detail Permohonan Ditolak</h6>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal">
                                @csrf

                                <div class="row">
                                    <!-- Kolom Pertama -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="perusahaan" class="form-label">Nama Perusahaan</label>
                                            <input type="text" name="perusahaan" id="perusahaan" class="form-control" value="{{ $data->perusahaan }}" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama Pemohon</label>
                                            <input type="text" name="nama" id="nama" class="form-control" value="{{ $data->nama }}" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email Pemohon</label>
                                            <input type="email" name="email" id="email" class="form-control" value="{{ $data->email }}" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="telepon" class="form-label">Nomor Telepon</label>
                                            <input type="text" name="telepon" id="telepon" class="form-control" value="{{ $data->telepon }}" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="identitas" class="form-label">Nomor Identitas</label>
                                            <input type="text" name="identitas" id="identitas" class="form-control" value="{{ $data->identitas }}" readonly>
                                        </div>
                                    </div>

                                    <!-- Kolom Kedua -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="jenis_info" class="form-label">Jenis Informasi</label>
                                            <input type="text" name="jenis_info" id="jenis_info" class="form-control" value="{{ $data->jenis_info }}" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="tujuan_info" class="form-label">Tujuan Informasi</label>
                                            <input type="text" name="tujuan_info" id="tujuan_info" class="form-control" value="{{ $data->tujuan_info }}" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="data" class="form-label">File Data</label>
                                            @if($data->data)
                                                <p>File sebelumnya: <a href="{{ Storage::url($data->data) }}" target="_blank">{{ basename($data->data) }}</a></p>
                                            @endif
                                        </div>

                                        <div class="mb-3">
                                            <label for="jam_masuk" class="form-label">Jam Masuk</label>
                                            <input type="date" name="jam_masuk" id="jam_masuk" class="form-control" value="{{ $data->jam_masuk }}" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="jam_keluar" class="form-label">Jam Keluar</label>
                                            <input type="date" name="jam_keluar" id="jam_keluar" class="form-control" value="{{ $data->jam_keluar }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('permohonantolak.index') }}" class="btn btn-primary">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
