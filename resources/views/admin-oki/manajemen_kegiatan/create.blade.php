@extends('layouts.app')
@section('title', 'Admin Oki Tambah Manajemen Kegiatan') 
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Tambah Manajemen Kegiatan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Modules</a></div>
            <div class="breadcrumb-item">Tambah Manajemen Kegiatan</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Tambah Manajemen Kegiatan</h2>
        <p class="section-lead">Formulir untuk menambahkan kegiatan yang terdaftar di BEM Polinema PSDKU Kediri.</p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Kelola Manajemen Kegiatan</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin-oki.manajemen_kegiatan.store') }}" method="POST" enctype="multipart/form-data" onsubmit="confirmSave(event)">
                            @csrf
                            <div class="form-group">
                                <label for="nama_kegiatan">Nama Kegiatan</label>
                                <input type="text" name="nama_kegiatan" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="id_oki">Nama OKI</label>
                                <select name="id_oki" class="form-control" required>
                                    <option value="">Pilih OKI</option>
                                    @foreach($dataOki as $oki)
                                        <option value="{{ $oki->id }}">{{ $oki->nama_oki }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tgl_kegiatan">Tanggal Kegiatan</label>
                                <input type="date" name="tgl_kegiatan" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="proposal_kegiatan">Proposal Kegiatan (PDF, Max 5MB)</label>
                                <input type="file" name="proposal_kegiatan" class="form-control" accept=".pdf" required>
                            </div>

                            <!-- Umpan Balik (Hanya SuperAdmin yang bisa mengisi) -->
                            <div class="form-group">
                                <label for="umpan_balik">Umpan Balik</label>
                                <textarea name="umpan_balik" class="form-control" rows="4" readonly></textarea>
                            </div>

                            <!-- Status Proposal (Hanya Diproses, default, tidak bisa diubah oleh AdminOki) -->
                            <input type="hidden" name="status_proposal" value="diproses">

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('admin-oki.manajemen_kegiatan.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
