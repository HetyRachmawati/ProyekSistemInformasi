@extends('layouts.app')
@section('title', 'Tambah Data Jurusan')
@section('content')

<!-- Page Heading -->
<section class="section">
  <div class="section-header">
    <h1>Tambah Data Jurusan</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a href="{{ route('super-admin.dashboard') }}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{ route('super-admin.jurusan.index') }}">Jurusan</a></div>
      <div class="breadcrumb-item">Tambah Data Jurusan</div>
    </div>
  </div>

  <div class="section-body">
    <h2 class="section-title">Tambah Data Jurusan</h2>
    <p class="section-lead">Formulir untuk menambahkan data jurusan.</p>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Kelola Data Jurusan</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('super-admin.jurusan.store') }}" method="POST" onsubmit="confirmSave(event)">
              @csrf

              <div class="form-group">
                <label for="nama_jurusan">Nama Jurusan</label>
                <input type="text" name="nama_jurusan" id="nama_jurusan" class="form-control" value="{{ old('nama_jurusan') }}" required>
                @error('nama_jurusan')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('super-admin.jurusan.index') }}" class="btn btn-secondary">Kembali</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
