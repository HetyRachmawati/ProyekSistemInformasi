@extends('layouts.app')
@section('title', 'Edit Laporan - Admin Oki')
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Edit Laporan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Modules</a></div>
            <div class="breadcrumb-item">Edit Laporan</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Form Edit Laporan</h2>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Edit Laporan</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin-oki.report.update', $report->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        
                            <div class="row">
                                <!-- Kolom Kiri -->
                                <div class="col-md-6">
                                    <!-- Dropdown untuk memilih OKI -->
                                    <div class="form-group">
                                        <label for="id_oki">Nama OKI</label>
                                        <select name="id_oki" class="form-control" required>
                                            @foreach($dataOki as $oki)
                                                <option value="{{ $oki->id }}" {{ $oki->id == $report->id_oki ? 'selected' : '' }}>
                                                    {{ $oki->nama_oki }} <!-- Nama OKI, pastikan kolom ini ada pada model DataOki -->
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                        
                                    <div class="form-group">
                                        <label for="id_kegiatan">Nama Kegiatan</label>
                                        <select name="id_kegiatan" class="form-control" required>
                                            @foreach($manajemenKegiatan as $kegiatan)
                                                <option value="{{ $kegiatan->id }}" {{ $kegiatan->id == $report->id_kegiatan ? 'selected' : '' }}>
                                                    {{ $kegiatan->nama_kegiatan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                        
                                    <div class="form-group">
                                        <label for="manfaat">Manfaat</label>
                                        <textarea name="manfaat" class="form-control" rows="4" required>{{ $report->manfaat }}</textarea>
                                    </div>
                        
                                    <div class="form-group">
                                        <label for="hasil_pelaksanaan">Hasil Pelaksanaan</label>
                                        <textarea name="hasil_pelaksanaan" class="form-control" rows="4" required>{{ $report->hasil_pelaksanaan }}</textarea>
                                    </div>
                        
                                    <div class="form-group">
                                        <label for="saran">Saran</label>
                                        <textarea name="saran" class="form-control" rows="4" required>{{ $report->saran }}</textarea>
                                    </div>
                                </div>
                        
                                <!-- Kolom Kanan -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="evaluasi">Evaluasi</label>
                                        <textarea name="evaluasi" class="form-control" rows="4" required>{{ $report->evaluasi }}</textarea>
                                    </div>
                        
                                    <div class="form-group">
                                        <label for="tgl_pelaksanaan">Tanggal Pelaksanaan</label>
                                        <input type="date" name="tgl_pelaksanaan" class="form-control" value="{{ old('tgl_pelaksanaan', $report->tgl_pelaksanaan) }}" required>
                                    </div>
                        
                                    <div class="form-group">
                                        <label for="file_lpj">File LPJ</label>
                                        <input type="file" name="file_lpj" class="form-control">
                                        @if($report->file_lpj)
                                            <a href="{{ asset('storage/' . $report->file_lpj) }}" target="_blank">Lihat File</a>
                                        @endif
                                    </div>
                        
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control" required>
                                            <option value="belum selesai" {{ $report->status == 'belum selesai' ? 'selected' : '' }}>Belum Selesai</option>
                                            <option value="selesai" {{ $report->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update Laporan</button>
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
