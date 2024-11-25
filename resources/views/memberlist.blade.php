@extends('layouts.app')

@section('title', 'Data Anggota')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Data Anggota</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="{{ route('memberlist') }}">Data Anggota</a></div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Daftar Anggota</h2>
        <p class="section-lead">
            Berikut adalah data anggota yang terdaftar di sistem.
        </p>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>List Anggota</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>NIM</th>
                                    <th>Jurusan</th>
                                    <th>Jabatan</th>
                                    <th>Periode</th>
                                    <th>Status Keaktifan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($anggotas as $anggota)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $anggota->nama_lengkap }}</td>
                                        <td>{{ $anggota->nim }}</td>
                                        <td>{{ $anggota->jurusan }}</td>
                                        <td>{{ $anggota->jabatan }}</td>
                                        <td>{{ $anggota->periode }}</td>
                                        <td>
                                            @if ($anggota->status_keaktifan === 'aktif')
                                                <span class="badge badge-success">Aktif</span>
                                            @else
                                                <span class="badge bg-danger">Nonaktif</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Tidak ada anggota ditemukan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Paginasi -->
                        <div class="d-flex justify-content-center">
                            {{ $anggotas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
