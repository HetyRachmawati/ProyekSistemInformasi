@extends('layouts.app')
@section('title', 'Tambah Data Home')
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Tambah Data Home</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('super-admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('super-admin.home.index') }}">Data Home</a></div>
            <div class="breadcrumb-item active">Tambah Data</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Tambah Data Home</h2>
        <p class="section-lead">
            Silakan tambahkan informasi terbaru terkait Data Home yang berkaitan dengan BEM Polinema PSDKU Kediri.
        </p>
    
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Tambah Data</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('super-admin.home.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" required>
                                @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="file">File</label>
                                <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror">
                                @error('file')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                            <a href="{{ route('super-admin.home.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
