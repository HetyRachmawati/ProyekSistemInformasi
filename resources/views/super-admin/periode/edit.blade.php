@extends('layouts.app')
@section('title', 'Edit Periode')
@section('content')

<!-- Page Heading -->
<section class="section">
  <div class="section-header">
    <h1>Edit Periode</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Periode</a></div>
      <div class="breadcrumb-item">Edit Periode</div>
    </div>
  </div>

  <div class="section-body">
    <h2 class="section-title">Edit Periode</h2>
    <p class="section-lead">Formulir untuk mengedit periode.</p>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Edit Data Periode</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('super-admin.periode.update', $periode->id) }}" method="POST" onsubmit="confirmEdit(event)">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="tahun_periode">Tahun Periode</label>
                <input type="text" name="tahun_periode" id="tahun_periode" class="form-control" value="{{ old('tahun_periode', $periode->tahun_periode) }}" required>
                @error('tahun_periode')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('super-admin.periode.index') }}" class="btn btn-secondary">Kembali</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
