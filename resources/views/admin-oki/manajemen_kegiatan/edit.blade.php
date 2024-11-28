@extends('layouts.app')
@section('title', 'Edit Manajemen Kegiatan')
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Edit Manajemen Kegiatan</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Edit Manajemen Kegiatan</h2>
        <p class="section-lead">Formulir untuk mengedit kegiatan yang terdaftar di BEM Polinema PSDKU Kediri.</p>

        <form action="{{ route('admin-oki.manajemen_kegiatan.update', $manajemenKegiatan->id) }}" method="POST" enctype="multipart/form-data" onsubmit="confirmEdit(event)">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_kegiatan">Nama Kegiatan</label>
                <input type="text" name="nama_kegiatan" class="form-control" value="{{ $manajemenKegiatan->nama_kegiatan }}" required>
            </div>

            <div class="form-group">
                <label for="id_oki">Nama OKI</label>
                <select name="id_oki" class="form-control" required>
                    <option value="{{ $manajemenKegiatan->id_oki }}" selected>{{ $manajemenKegiatan->dataOki->nama_oki }}</option>
                    @foreach($dataOki as $oki)
                        <option value="{{ $oki->id }}">{{ $oki->nama_oki }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tgl_kegiatan">Tanggal Kegiatan</label>
                <input type="date" name="tgl_kegiatan" class="form-control" value="{{ $manajemenKegiatan->tgl_kegiatan }}" required>
            </div>

            <div class="form-group">
                <label for="proposal_kegiatan">Proposal Kegiatan</label>
                <input type="file" name="proposal_kegiatan" class="form-control">
                @if($manajemenKegiatan->proposal_kegiatan)
                    <small>File yang sudah ada: {{ $manajemenKegiatan->proposal_kegiatan }}</small>
                @endif
            </div>

            <!-- Umpan Balik - Tidak bisa diubah oleh AdminOki -->
            <div class="form-group">
                <label for="umpan_balik">Umpan Balik</label>
                <textarea name="umpan_balik" class="form-control" rows="4" readonly>{{ $manajemenKegiatan->umpan_balik }}</textarea>
            </div>

            <!-- Status Proposal - AdminOki tidak bisa mengubah status proposal -->
            <input type="hidden" name="status_proposal" value="diproses">

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin-oki.manajemen_kegiatan.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</section>

@endsection
