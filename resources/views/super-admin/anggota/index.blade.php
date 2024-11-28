@extends('layouts.app')

@section('title', 'Data Anggota')

@section('content')


<section class="section">
    <div class="section-header">
        <h1>Data Anggota</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('super-admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="{{ route('super-admin.anggota.index') }}">Data Anggota</a></div>
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
                            <h4>Data Keanggotaan</h4>
                            <div class="card-header-action">
                                <a href="{{ route('super-admin.anggota.create') }}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i> Tambah Anggota
                                </a>                                                    
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>                                 
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama Lengkap</th>
                                            <th class="text-center">NIM</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
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
                                                    <a href="{{ route('super-admin.anggota.edit', $anggota->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                    <form action="{{ route('super-admin.anggota.destroy', $anggota->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(event);">
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
