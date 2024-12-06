@extends('layouts.app')
@section('title', 'Tambah Data Kategori')
@section('content')

<!-- Page Heading -->
<section class="section">
  <div class="section-header">
    <h1>Tambah Data Kategori</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Modules</a></div>
      <div class="breadcrumb-item">Tambah Data Kategori</div>
    </div>
  </div>

  <div class="section-body">
    <h2 class="section-title">Tambah Data Kategori</h2>
    <p class="section-lead">
      Formulir untuk menambahkan data Kategori.
    </p>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Kelola Data Kategori</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('super-admin.kategori.store') }}" method="POST" onsubmit="confirmSave(event)">
            @csrf
    <div class="form-group">
        <label for="nama_kategori">Nama Kategori</label>
        <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required>
        @error('nama_kategori')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('super-admin.kategori.index') }}" class="btn btn-secondary">Kembali</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
