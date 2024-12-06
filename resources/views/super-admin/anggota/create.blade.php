@extends('layouts.app')

@section('title', 'Tambah Anggota')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Tambah Anggota</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('super-admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('super-admin.anggota.index') }}">Data Anggota</a></div>
            <div class="breadcrumb-item active">Tambah Anggota</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Form Tambah Anggota</h2>
        <p class="section-lead">Silakan isi data anggota di bawah ini.</p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Tambah Anggota</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('super-admin.anggota.store') }}" method="POST"  onsubmit="confirmSave(event)">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap') }}" required>
                                        @error('nama_lengkap')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NIM</label>
                                        <input type="text" name="nim" class="form-control" value="{{ old('nim') }}" required>
                                        @error('nim')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Organisasi (OKI)</label>
                                        <select name="id_oki" class="form-control" required>
                                            <option value="" disabled selected>Pilih OKI</option>
                                            @foreach($dataOki as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_oki }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_oki')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Divisi</label>
                                        <select name="id_divisi" class="form-control" required>
                                            <option value="" disabled selected>Pilih Divisi</option>
                                            @foreach($dataDivisi as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_divisi }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_divisi')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" required>
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No HP</label>
                                        <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}" required>
                                        @error('no_hp')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan') }}">
                                        @error('jabatan')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Periode</label>
                                        <input type="text" name="periode" class="form-control" value="{{ old('periode') }}">
                                        @error('periode')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jurusan</label>
                                        <input type="text" name="jurusan" class="form-control" value="{{ old('jurusan') }}">
                                        @error('jurusan')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Status Keaktifan</label>
                                <select name="status_keaktifan" class="form-control">
                                    <option value="aktif" {{ old('status_keaktifan') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="nonaktif" {{ old('status_keaktifan') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                </select>
                                @error('status_keaktifan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Tambah Anggota</button>
                                <a href="{{ route('super-admin.anggota.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
