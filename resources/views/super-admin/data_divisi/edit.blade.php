@extends('layouts.app')
@section('title', 'Edit Data Divisi')
@section('content')

<!-- Page Heading -->
<section class="section">
  <div class="section-header">
    <h1>Edit Data Divisi</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a href="{{ route('super-admin.dashboard') }}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{ route('super-admin.data_divisi.index') }}">Data Divisi</a></div>
      <div class="breadcrumb-item">Edit Data Divisi</div>
    </div>
  </div>

  <div class="section-body">
    <h2 class="section-title">Edit Data Divisi</h2>
    <p class="section-lead">
      Formulir untuk mengedit data Divisi yang terdaftar di BEM Polinema PSDKU Kediri.
    </p>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Edit Data Divisi</h4>
          </div>
          <div class="card-body">
<<<<<<< HEAD
            <form action="{{ route('super-admin.data_divisi.update', $dataDivisi->id) }}" method="POST"  onsubmit="confirmEdit(event)">
=======
            <form action="{{ route('super-admin.data_divisi.update', $dataDivisi->id) }}" method="POST" onsubmit="confirmEdit(event)">
>>>>>>> cb28d7b2697c4d65dc0a4676577cdda3eced1a75
              @csrf
              @method('PUT')
              <div class="form-group">
                <label>Nama Divisi</label>
                <input type="text" name="nama_divisi" class="form-control" value="{{ $dataDivisi->nama_divisi }}" required>
              </div>
              
              <div class="form-group">
                <label>Nama OKI</label>
                <select name="id_oki" class="form-control" required>
                  <option value="" disabled>Pilih OKI</option>
                  @foreach($dataOki as $oki)
                    <option value="{{ $oki->id }}" {{ $dataDivisi->id_oki == $oki->id ? 'selected' : '' }}>
                      {{ $oki->nama_oki }}
                    </option>
                  @endforeach
                </select>
              </div>
            
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('super-admin.data_divisi.index') }}" class="btn btn-secondary">Kembali</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
