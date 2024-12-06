@extends('layouts.app')
@section('title', 'Tambah Data OKI')
@section('content')

<!-- Page Heading -->
<section class="section">
  <div class="section-header">
    <h1>Tambah Data OKI</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ route('super-admin.dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('super-admin.data_oki.index') }}">Data Oki</a></div>
      <div class="breadcrumb-item">Tambah Data OKI</div>
    </div>
  </div>

  <div class="section-body">
    <h2 class="section-title">Tambah Data OKI</h2>
    <p class="section-lead">
      Formulir untuk menambahkan data OKI yang terdaftar di BEM Polinema PSDKU Kediri.
    </p>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Kelola Data OKI</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('super-admin.data_oki.store') }}" method="POST" onsubmit="confirmSave(event)">
              @csrf
              <div class="form-group">
                <label>Nama OKI</label>
                <input type="text" name="nama_oki" class="form-control" required>
              </div>
            
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('super-admin.data_oki.index') }}" class="btn btn-secondary">Kembali</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
