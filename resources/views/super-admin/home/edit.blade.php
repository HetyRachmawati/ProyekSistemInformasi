@extends('layouts.app')
@section('title', 'Edit Data Home')
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Edit Data Home</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('super-admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('super-admin.home.index') }}">Data Home</a></div>
            <div class="breadcrumb-item active">Edit Data</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Edit Data Home</h2>
        <p class="section-lead">
            Perbarui informasi yang terkait dengan Data Home BEM Polinema PSDKU Kediri di bawah ini. Pastikan semua data yang dimasukkan sudah benar dan sesuai.
        </p>
    
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Edit Data</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('super-admin.home.update', $home->id) }}" method="POST" enctype="multipart/form-data" onsubmit="confirmEdit(event)">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $home->judul) }}" required>
                                @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $home->deskripsi) }}</textarea>
                                @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="id_kategori">Kategori</label>
                                <select name="id_kategori" id="id_kategori" class="form-control" required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach($categories as $kategori)
                                        <option value="{{ $kategori->id }}" {{ isset($home) && $home->id_kategori == $kategori->id ? 'selected' : '' }}>
                                            {{ $kategori->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror">
                                @if($home->gambar)
                                    <div class="mt-2">
                                        <a href="{{ asset('uploads/' . $home->gambar) }}" target="_blank">
                                            Lihat Gambar: {{ $home->gambar }}
                                        </a>
                                    </div>
                                @endif
                                @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="url" name="link_template" id="link" class="form-control @error('link_template') is-invalid @enderror" value="{{ old('link_template', $home->link_template) }}" required>
                                @error('link_template')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('super-admin.home.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection