@extends('layouts.app')
@section('title', 'Tambah Data Divisi')
@section('content')

<!-- Page Heading -->
<section class="section">
  <div class="section-header">
    <h1>Tambah Data Divisi</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Modules</a></div>
      <div class="breadcrumb-item">Tambah Data Divisi</div>
    </div>
  </div>

  <div class="section-body">
    <h2 class="section-title">Tambah Data Divisi</h2>
    <p class="section-lead">
      Formulir untuk menambahkan data Divisi yang terdaftar di BEM Polinema PSDKU Kediri.
    </p>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Kelola Data Divisi</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('admin-oki.data_divisi.store') }}" method="POST" onsubmit="confirmSave(event)">
              @csrf
              <div class="form-group">
                <label>Nama Divisi</label>
                <input type="text" name="nama_divisi" class="form-control" required>
              </div>
              
              <div class="form-group">
                <label>Nama OKI</label>
                <select name="id_oki" class="form-control" required>
                  <option value="" disabled selected>Pilih OKI</option>
                  @foreach($dataOki as $oki)
                    <option value="{{ $oki->id }}">{{ $oki->nama_oki }}</option>
                  @endforeach
                </select>
              </div>
            
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin-oki.data_divisi.index') }}" class="btn btn-secondary">Kembali</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
