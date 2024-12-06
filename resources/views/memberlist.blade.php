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
                        <h4>Member List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Lengkap</th>
                                        <th class="text-center">NIM</th>
                                        <th class="text-center">Jurusan</th>
                                        <th class="text-center">Jabatan</th>
                                        <th class="text-center">Periode</th>
                                        <th class="text-center">Status Keaktifan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($anggotas as $anggota) 
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td> 
                                        <td class="text-center">{{ $anggota->nama_lengkap }}</td>
                                        <td class="text-center">{{ $anggota->nim }}</td>
                                        <td class="text-center">
                                            {{ $anggota->jurusan ? $anggota->jurusan->nama_jurusan : '-' }}
                                        </td>                                        <td class="text-center">{{ $anggota->jabatan }}</td>
                                        <td class="text-center">
                                            {{ $anggota->periode ? $anggota->periode->tahun_periode : '-' }}
                                        </td>                                        
                                        <td class="text-center">
                                            @if ($anggota->status_keaktifan === 'aktif')
                                                <span class="badge badge-success">Aktif</span>
                                            @else
                                                <span class="badge badge-danger">Nonaktif</span>
                                            @endif
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
