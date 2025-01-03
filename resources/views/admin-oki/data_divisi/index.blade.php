{{-- @extends('layouts.app')
@section('title', 'Data Divisi')
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Data Divisi Polinema</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Modules</a></div>
            <div class="breadcrumb-item">DataTables</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Data Divisi</h2>
        <p class="section-lead">Berikut adalah data Divisi yang terdaftar di BEM Polinema PSDKU Kediri.</p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Divisi</h4>
                        @if(auth()->user()->role === 'AdminOki')
                            <a href="{{ route('admin-oki.data_divisi.create') }}" class="btn btn-primary ml-auto" title="Tambah Data Divisi Baru">
                                <i class="fas fa-plus"></i> Tambah Data
                            </a>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Divisi</th>
                                        <th class="text-center">Nama OKI</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($dataDivisi as $index => $item)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_divisi }}</td>
                                        <td>{{ $item->dataOki->nama_oki }}</td>
                                        <td>
                                            @if(auth()->user()->role === 'AdminOki')
                                                <a href="{{ route('admin-oki.data_divisi.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('admin-oki.data_divisi.destroy', $item->id) }}" method="POST" class="d-inline"  onsubmit="return confirmDelete(event);">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            @else
                                                <span class="text-muted">Akses terbatas</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada data Divisi yang tersedia.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection --}}


@extends('layouts.app')
@section('title', 'Data Divisi')
@section('content')

<!-- Main Content -->
<section class="section">
    <div class="section-header">
        <h1>Data Divisi</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Data Divisi</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Daftar Divisi</h2>
        <p class="section-lead">
            Data divisi yang terdaftar pada sistem.
        </p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Divisi</h4>
                        <a href="{{ route('admin-oki.data_divisi.create') }}" class="btn btn-primary ml-auto" title="Tambah Data Divisi Baru">
                            <i class="fas fa-plus"></i> Tambah Data
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Divisi</th>
                                        <th class="text-center">Nama OKI</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dataDivisi as $index => $divisi)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration}}</td>
                                            <td class="text-center">{{ $divisi->nama_divisi }}</td>
                                            <td class="text-center">
                                                {{ $divisi->dataOki ? $divisi->dataOki->nama_oki : '-' }}
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin-oki.data_divisi.edit', $divisi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('admin-oki.data_divisi.destroy', $divisi->id) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(event);">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" >Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $dataDivisi->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
