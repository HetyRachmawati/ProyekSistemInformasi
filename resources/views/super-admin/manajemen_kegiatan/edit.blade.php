@extends('layouts.app')
@section('title', 'Edit Umpan Balik - Manajemen Kegiatan')
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Edit Umpan Balik</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Modules</a></div>
            <div class="breadcrumb-item"><a href="#">Manajemen Kegiatan</a></div>
            <div class="breadcrumb-item">Edit Umpan Balik</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Edit Umpan Balik untuk Kegiatan: {{ $manajemenKegiatan->nama_kegiatan }}</h2>
        <p class="section-lead">Silakan perbarui umpan balik untuk kegiatan ini.</p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Umpan Balik</h4>
                    </div>
                    <div class="card-body">
                        <!-- Form untuk mengedit umpan balik -->
                        <form action="{{ route('super-admin.manajemen_kegiatan.update-umpan-balik', $manajemenKegiatan->id) }}" method="POST" onsubmit="confirmEdit(event)">
                            @csrf
                            @method('PUT') 
                            <div class="form-group">
                                <label for="umpan_balik">Umpan Balik</label>
                                <textarea name="umpan_balik" id="umpan_balik" rows="5" class="form-control @error('umpan_balik') is-invalid @enderror" placeholder="Masukkan umpan balik">{{ old('umpan_balik', $manajemenKegiatan->umpan_balik) }}</textarea>
                                @error('umpan_balik')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary">Simpan Umpan Balik</button>
                                <a href="{{ route('super-admin.manajemen_kegiatan.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
