@extends('layouts.app')
@section('title', 'Data OKI')
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Data OKI Polinema</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Modules</a></div>
            <div class="breadcrumb-item">DataTables</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Data OKI</h2>
        <p class="section-lead">Berikut adalah data OKI yang terdaftar di BEM Polinema PSDKU Kediri.</p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data OKI</h4>
                        @if(auth()->user()->role === 'SuperAdmin')
                            <a href="{{ route('super-admin.data_oki.create') }}" class="btn btn-primary ml-auto" title="Tambah Data OKI Baru">
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
                                        <th class="text-center">Nama OKI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($dataOki as $index => $item)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_oki }}</td>
                                    
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Tidak ada data OKI yang tersedia.</td>
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
