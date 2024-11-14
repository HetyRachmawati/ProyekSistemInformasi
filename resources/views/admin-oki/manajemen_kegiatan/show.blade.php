@extends('layouts.app')
@section('title', 'Detail Manajemen Kegiatan')
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Detail Manajemen Kegiatan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Modules</a></div>
            <div class="breadcrumb-item">Detail Manajemen Kegiatan</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Detail Manajemen Kegiatan</h2>
        <p class="section-lead">Berikut adalah detail kegiatan yang terdaftar di BEM Polinema PSDKU Kediri.</p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $manajemenKegiatan->nama_kegiatan }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_kegiatan">Nama Kegiatan</label>
                            <input type="text" class="form-control" value="{{ $manajemenKegiatan->nama_kegiatan }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="id_oki">Nama OKI</label>
                            <input type="text" class="form-control" value="{{ $manajemenKegiatan->dataOki->nama_oki }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="tgl_kegiatan">Tanggal Kegiatan</label>
                            <input type="date" class="form-control" value="{{ $manajemenKegiatan->tgl_kegiatan }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="proposal_kegiatan">Proposal Kegiatan</label>
                            <input type="text" class="form-control" value="{{ $manajemenKegiatan->proposal_kegiatan }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="umpan_balik">Umpan Balik</label>
                            <textarea class="form-control" rows="4" readonly>{{ $manajemenKegiatan->umpan_balik ?? 'Belum ada umpan balik' }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="status_proposal">Status Proposal</label>
                            <input type="text" class="form-control" value="{{ $manajemenKegiatan->status_proposal }}" readonly>
                        </div>

                        <a href="{{ route('admin-oki.manajemen_kegiatan.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
