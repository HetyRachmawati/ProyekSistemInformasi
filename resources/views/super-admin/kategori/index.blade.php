@extends('layouts.app') 
@section('title', 'Data Kategori') 
@section('content')  

<section class="section">
    <div class="section-header">
        <h1>Data Kategori Template</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">
                <a href="{{ route('super-admin.dashboard') }}">Dashboard</a>
            </div>
            <div class="breadcrumb-item">
                <a href="{{ route('super-admin.kategori.index') }}">Data Kategori</a>
            </div>
            <div class="breadcrumb-item">Data Kategori Template</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Data Kategori Template</h2>
        <p class="section-lead">Berikut adalah data Kategori Template.</p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Kategori Template</h4>
                        @if(auth()->user()->role === 'SuperAdmin')
                            <a href="{{ route('super-admin.kategori.create') }}" class="btn btn-primary ml-auto" title="Tambah Data Kategori Baru">
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
                                        <th class="text-center">Nama Kategori</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($categories as $k)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $k->nama_kategori }}</td>
                                            <td>
                                                @if(auth()->user()->role === 'SuperAdmin')
                                                    <a href="{{ route('super-admin.kategori.edit', $k->id) }}" class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <form action="{{ route('super-admin.kategori.destroy', $k->id) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(event);">
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
                                            <td colspan="3" class="text-center">Tidak ada data Kategori yang tersedia.</td>
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

@endsection
