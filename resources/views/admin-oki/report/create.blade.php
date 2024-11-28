@extends('layouts.app')
@section('title', 'Tambah Laporan - Admin Oki')
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Tambah Laporan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Modules</a></div>
            <div class="breadcrumb-item">Tambah Laporan</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Form Tambah Laporan</h2>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Laporan Baru</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin-oki.report.store') }}" method="POST" enctype="multipart/form-data" onsubmit="confirmSave(event)">
                            @csrf
                            <div class="row">
                                <!-- Kolom Kiri -->
                                <div class="col-md-6">
                                    <!-- Dropdown untuk memilih Nama OKI -->
                                    <div class="form-group">
                                        <label for="id_oki">Nama OKI</label>
                                        <select name="id_oki" class="form-control" required>
                                            <option value="">Pilih OKI</option>
                                            @foreach($dataOki as $oki) <!-- Ambil data OKI dari controller -->
                                            <option value="{{ $oki->id }}" {{ old('id_oki') == $oki->id ? 'selected' : '' }}>
                                                {{ $oki->nama_oki }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Nama Kegiatan -->
                                    <div class="form-group">
                                        <label for="id_kegiatan">Nama Kegiatan</label>
                                        <select name="id_kegiatan" class="form-control" required>
                                            <option value="">Pilih Kegiatan</option>
                                            @foreach($manajemenKegiatan as $kegiatan)
                                            <option value="{{ $kegiatan->id }}">{{ $kegiatan->nama_kegiatan }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Manfaat -->
                                    <div class="form-group">
                                        <label for="manfaat">Manfaat</label>
                                        <textarea name="manfaat" class="form-control" rows="4" required>{{ old('manfaat') }}</textarea>
                                    </div>

                                    <!-- Hasil Pelaksanaan -->
                                    <div class="form-group">
                                        <label for="hasil_pelaksanaan">Hasil Pelaksanaan</label>
                                        <textarea name="hasil_pelaksanaan" class="form-control" rows="4" required>{{ old('hasil_pelaksanaan') }}</textarea>
                                    </div>

                                    <!-- Saran -->
                                    <div class="form-group">
                                        <label for="saran">Saran</label>
                                        <textarea name="saran" class="form-control" rows="4" required>{{ old('saran') }}</textarea>
                                    </div>
                                </div>

                                <!-- Kolom Kanan -->
                                <div class="col-md-6">
                                    <!-- Evaluasi -->
                                    <div class="form-group">
                                        <label for="evaluasi">Evaluasi</label>
                                        <textarea name="evaluasi" class="form-control" rows="4" required>{{ old('evaluasi') }}</textarea>
                                    </div>

                                    <!-- Tanggal Pelaksanaan -->
                                    <div class="form-group">
                                        <label for="tgl_pelaksanaan">Tanggal Pelaksanaan</label>
                                        <input type="date" name="tgl_pelaksanaan" class="form-control" value="{{ old('tgl_pelaksanaan') }}" required>
                                    </div>

                                    <!-- File LPJ -->
                                    <div class="form-group">
                                        <label for="file_lpj">File LPJ</label>
                                        <input type="file" name="file_lpj" class="form-control">
                                    </div>

                                    <!-- Status -->
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control" required>
                                            <option value="belum selesai" {{ old('status') == 'belum selesai' ? 'selected' : '' }}>Belum Selesai</option>
                                            <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit & Kembali Button -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan Laporan</button>
                                <a href="{{ route('admin-oki.report.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
