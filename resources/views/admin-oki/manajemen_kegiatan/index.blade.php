@extends('layouts.app')

@section('title', 'Data Oki')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Manajemen Kegiatan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Modules</a></div>
            <div class="breadcrumb-item">Manajemen Kegiatan</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Daftar Manajemen Kegiatan</h2>
        <p class="section-lead">Berikut adalah data Manajemen Kegiatan yang ada di BEM Polinema PSDKU Kediri.</p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Majemen Kegiatan</h4>
                        <a href="{{ route('admin-oki.manajemen_kegiatan.create') }}" class="btn btn-primary ml-auto" title="Tambah Kegiatan Baru">
                            <i class="fas fa-plus"></i> Tambah Kegiatan
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Kegiatan</th>
                                        <th class="text-center">Nama OKI</th>
                                        <th class="text-center">Status Proposal</th>
                                        <th class="text-center">Proposal Kegiatan</th>
                                        <th class="text-center">Umpan Balik</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($manajemenKegiatan as $item)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_kegiatan }}</td>
                                        <td>{{ $item->dataOki->nama_oki }}</td>
                                        <td>
                                            @if($item->status_proposal == 'diproses')
                                                <span class="badge badge-warning">Diproses</span>
                                            @elseif($item->status_proposal == 'disetujui')
                                                <span class="badge badge-success">Disetujui</span>
                                            @elseif($item->status_proposal == 'ditolak')
                                                <span class="badge badge-danger">Ditolak</span>
                                            @else
                                                <span class="badge badge-secondary">Status Tidak Diketahui</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($item->proposal_kegiatan)
                                                <a href="{{ asset('storage/' . $item->proposal_kegiatan) }}" class="btn btn-info btn-sm" download>
                                                    <i class="fas fa-download"></i> Download Proposal
                                                </a>
                                            @else
                                                <span>No Proposal</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->umpan_balik ?? 'Tidak ada umpan balik' }}</td>
                                        <td>
                                            <a href="{{ route('admin-oki.manajemen_kegiatan.edit', $item->id) }}" class="btn btn-warning btn-sm" title="Edit Feedback">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('admin-oki.manajemen_kegiatan.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(event);">
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
