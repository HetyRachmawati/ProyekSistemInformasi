@extends('layouts.app')
@section('title', 'Detail Laporan - Admin Oki')
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Detail Laporan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Modules</a></div>
            <div class="breadcrumb-item">Detail Laporan</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Laporan untuk Kegiatan: {{ $report->manajemen->nama_kegiatan }}</h2>
        <p class="section-lead">Berikut adalah detail laporan yang terdaftar di BEM Polinema PSDKU Kediri.</p>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detail Laporan</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Kolom Kiri -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_kegiatan"><strong>Nama Kegiatan</strong></label>
                                    <p>{{ $report->manajemen->nama_kegiatan }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="nama_oki"><strong>Nama OKI</strong></label>
                                    <p>{{ $report->dataOki->nama_oki }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="tgl_pelaksanaan"><strong>Tanggal Pelaksanaan</strong></label>
                                    <p>{{ \Carbon\Carbon::parse($report->tgl_pelaksanaan)->format('d-m-Y') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="status"><strong>Status</strong></label>
                                    <p>
                                        @if($report->status == 'belum selesai')
                                            <span class="badge badge-warning">Belum Selesai</span>
                                        @elseif($report->status == 'selesai')
                                            <span class="badge badge-success">Selesai</span>
                                        @elseif($report->status == 'ditolak')
                                            <span class="badge badge-danger">Ditolak</span>
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <!-- Kolom Kanan -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="manfaat"><strong>Manfaat</strong></label>
                                    <p>{{ $report->manfaat }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="hasil_pelaksanaan"><strong>Hasil Pelaksanaan</strong></label>
                                    <p>{{ $report->hasil_pelaksanaan }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="evaluasi"><strong>Evaluasi</strong></label>
                                    <p>{{ $report->evaluasi }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="saran"><strong>Saran</strong></label>
                                    <p>{{ $report->saran }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- File LPJ di bawah -->
                        <div class="form-group">
                            <label for="file_lpj"><strong>File LPJ</strong></label>
                            @if($report->file_lpj)
                                <p>
                                    <a href="{{ asset('storage/' . $report->file_lpj) }}" class="btn btn-info btn-sm" target="_blank">
                                        <i class="fas fa-eye"></i> Lihat File
                                    </a>
                                </p>
                            @else
                                <p>Tidak ada file LPJ.</p>
                            @endif
                        </div>

                        <!-- Tombol Kembali -->
                        <div class="form-group">
                            <a href="{{ route('admin-oki.report.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
