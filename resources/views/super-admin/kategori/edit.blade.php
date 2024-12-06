@extends('layouts.app')
@section('title', 'Edit Data Kategori')
@section('content')

<!-- Page Heading -->
<section class="section">
  <div class="section-header">
    <h1>Edit Data Kategori</h1>
    <div class="section-header-breadcrumb">
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ route('super-admin.dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('super-admin.kategori.index') }}">Data Kategori</a></div>
      <div class="breadcrumb-item">Edit Data Kategori</div>
    </div>
  </div>

  <div class="section-body">
    <h2 class="section-title">Edit Data Kategori</h2>
    <p class="section-lead">
      Formulir untuk mengedit data Kategori.
    </p>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Edit Data Kategori</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('super-admin.kategori.update', $kategori->id) }}" method="POST" onsubmit="confirmEdit(event)">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
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