@extends('layouts.app')
@section('title', 'Edit Data Jurusan')
@section('content')

<!-- Page Heading -->
<section class="section">
  <div class="section-header">
    <h1>Edit Data Jurusan</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a href="{{ route('super-admin.dashboard') }}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{ route('super-admin.jurusan.index') }}">Jurusan</a></div>
      <div class="breadcrumb-item">Edit Data Jurusan</div>
    </div>
  </div>

  <div class="section-body">
    <h2 class="section-title">Edit Data Jurusan</h2>
    <p class="section-lead">Formulir untuk mengedit data jurusan.</p>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Edit Data Jurusan</h4>
          </div>
          <div class="card-body">
            <!-- Update Form -->
            <form action="{{ route('super-admin.jurusan.update', $jurusan->id) }}" method="POST" onsubmit="confirmEdit(event)">
              @csrf
              @method('PUT')

              <div class="form-group">
                <label for="nama_jurusan">Nama Jurusan</label>
                <input type="text" id="nama_jurusan" name="nama_jurusan" class="form-control" value="{{ old('nama_jurusan', $jurusan->nama_jurusan) }}" required>
                @error('nama_jurusan')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
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
