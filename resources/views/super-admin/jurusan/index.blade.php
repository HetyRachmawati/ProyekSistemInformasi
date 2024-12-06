@extends('layouts.app')
@section('title', 'Data Jurusan')
@section('content')
<!-- Main Content -->
<section class="section">
    <div class="section-header">
        <h1>Daftar Jurusan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Jurusan</a></div>
            <div class="breadcrumb-item">Daftar Jurusan</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Daftar Jurusan</h2>
        <p class="section-lead">Halaman ini menampilkan daftar semua jurusan yang tersedia.</p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Data Jurusan</h4>
                        <div class="card-header-action">
                            <a href="{{ route('super-admin.jurusan.create') }}" class="btn btn-primary ml-auto" title="Tambah Data Divisi Baru">
                                <i class="fas fa-plus"></i> Tambah Data
                            </a>
                    </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Jurusan</th>
                                        <th class="text-center">Dibuat Pada</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jurusans as $key => $jurusan)
                                    <tr>
                                        <td class="text-center">{{ $key + 1 }}</td>
                                        <td class="text-center">{{ $jurusan->nama_jurusan }}</td>
                                        <td class="text-center">{{ $jurusan->created_at->format('d M Y') }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('super-admin.jurusan.edit', $jurusan->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('super-admin.jurusan.destroy', $jurusan->id) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(event);">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
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
