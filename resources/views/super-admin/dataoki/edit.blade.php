@extends('layouts.app')
@section('title', 'Edit Data OKI')
@section('content')

<!-- Page Heading -->
<section class="section">
  <div class="section-header">
    <h1>Edit Data OKI</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Modules</a></div>
      <div class="breadcrumb-item">Edit Data OKI</div>
    </div>
  </div>

  <div class="section-body">
    <h2 class="section-title">Edit Data OKI</h2>
    <p class="section-lead">
      Formulir untuk mengedit data OKI yang terdaftar di BEM Polinema PSDKU Kediri.
    </p>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Edit Data OKI</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('super-admin.data_oki.update', $dataOki->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label>Nama OKI</label>
                <input type="text" name="nama_oki" class="form-control" value="{{ $dataOki->nama_oki }}" required>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
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
