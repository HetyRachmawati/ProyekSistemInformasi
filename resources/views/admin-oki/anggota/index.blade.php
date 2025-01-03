{{-- @extends('layouts.app')

@section('title', 'Data Anggota')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Data Anggota</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('admin-oki.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="{{ route('admin-oki.anggota.index') }}">Data Anggota</a></div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Daftar Anggota</h2>
        <p class="section-lead">
            Berikut Ini Adalah Data Anggota yang Terdaftar di BEM Polinema PSDKU Kediri.
        </p>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>List Anggota</h4>
                        <div class="card-header-action">
                            <a href="{{ route('admin-oki.anggota.create') }}" class="btn btn-primary"> <i class="fas fa-plus"></i> Tambah Data
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>NIM</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($anggotas as $anggota) <!-- Menggunakan $anggota yang dipaginate -->
                                    <tr>
                                        <td>{{ $loop->iteration }}</td> <!-- Nomor urut -->
                                        <td>{{ $anggota->nama_lengkap }}</td>
                                        <td>{{ $anggota->nim }}</td>
                                        <td>{{ $anggota->email }}</td>
                                        <td>
                                            @if ($anggota->status_keaktifan === 'aktif')
                                                <span class="badge badge-success">Aktif</span>
                                            @else
                                                <span class="badge badge-danger">Nonaktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin-oki.anggota.edit', $anggota->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('admin-oki.anggota.destroy', $anggota->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(event);">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection --}}


@extends('layouts.app')
@section('title', 'Data Oki')
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Data Anggota</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('admin-oki.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="{{ route('admin-oki.anggota.index') }}">Data Anggota</a></div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Daftar Anggota</h2>
        <p class="section-lead">
            Berikut Ini Adalah Data Anggota yang Terdaftar di BEM Polinema PSDKU Kediri.
        </p>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>List Anggota</h4>
                        <div class="card-header-action">
                            <a href="{{ route('admin-oki.anggota.create') }}" class="btn btn-primary"> <i class="fas fa-plus"></i> Tambah Data
                            </a>
                        </div>
                    </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Kegiatan</th>
                            <th class="text-center">Nama OKI</th>
                            <th class="text-center">Tanggal Pelaksanaan</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($anggotas as $anggota) 
                                <tr>
                                    <td>{{ $loop->iteration }}</td> 
                                    <td>{{ $anggota->nama_lengkap }}</td>
                                    <td>{{ $anggota->nim }}</td>
                                    <td>{{ $anggota->email }}</td>
                                    <td>
                                        @if ($anggota->status_keaktifan === 'aktif')
                                            <span class="badge badge-success">Aktif</span>
                                        @else
                                            <span class="badge badge-danger">Nonaktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin-oki.anggota.edit', $anggota->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('admin-oki.anggota.destroy', $anggota->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(event);">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </section>

@endsection
