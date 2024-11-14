@extends('layouts.app')
@section('title', 'Manajemen Kegiatan - Super Admin')
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
                        <h4>Manajemen Kegiatan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
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
                                            @endif
                                        </td>
                                        <td>
                                            @if($item->proposal_kegiatan)
                                                <a href="{{ asset('storage/' . $item->proposal_kegiatan) }}" class="btn btn-info btn-sm" target="_blank">
                                                    <i class="fas fa-eye"></i> Lihat Proposal
                                                </a>
                                            @else
                                                <span>No Proposal</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if(Auth::user()->role === 'SuperAdmin')
                                                <!-- Tombol Edit Umpan Balik -->
                                                <a href="{{ route('super-admin.manajemen_kegiatan.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i> Edit Umpan Balik
                                                </a>
                                            @else
                                                <span>{{ $item->umpan_balik ?? 'Tidak ada umpan balik' }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <!-- Tombol Setujui dengan form POST -->
                                            <form action="{{ route('super-admin.manajemen_kegiatan.setujui', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm" title="Setujui Proposal" onclick="return confirm('Yakin ingin menyetujui proposal ini?');">
                                                    <i class="fas fa-check"></i> Setujui
                                                </button>
                                            </form>
                                        
                                            <!-- Tombol Tolak dengan form POST -->
                                            <form action="{{ route('super-admin.manajemen_kegiatan.tolak', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" title="Tolak Proposal" onclick="return confirm('Yakin ingin menolak proposal ini?');">
                                                    <i class="fas fa-times"></i> Tolak
                                                </button>
                                            </form>
                                        </td>                                                                    
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination -->
                        {{ $manajemenKegiatan->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
