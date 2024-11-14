@extends('layouts.app')
@section('title', 'Manajemen Laporan - Admin Oki')
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Manajemen Laporan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Modules</a></div>
            <div class="breadcrumb-item">Manajemen Laporan</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Daftar Laporan</h2>
        <p class="section-lead">Berikut adalah data laporan yang terdaftar di BEM Polinema PSDKU Kediri.</p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Laporan</h4>
                        <a href="{{ route('admin-oki.report.create') }}" class="btn btn-primary ml-auto" title="Tambah Laporan">
                            <i class="fas fa-plus"></i> Tambah Laporan
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
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
                                    @foreach($reports as $report)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $report->manajemen->nama_kegiatan }}</td> <!-- Nama Kegiatan -->
                                        <td>{{ $report->dataOki->nama_oki }}</td> <!-- Nama OKI -->
                                        <td>{{ \Carbon\Carbon::parse($report->tgl_pelaksanaan)->format('d-m-Y') }}</td> <!-- Tanggal Pelaksanaan -->
                                        <td>
                                            <!-- Status Laporan -->
                                            @if($report->status == 'belum selesai')
                                                <span class="badge badge-warning">Belum Selesai</span>
                                            @elseif($report->status == 'selesai')
                                                <span class="badge badge-success">Selesai</span>
                                            @elseif($report->status == 'ditolak')
                                                <span class="badge badge-danger">Ditolak</span>
                                            @endif
                                        </td>
                                        <td>
                                            <!-- Action Buttons -->
                                            <a href="{{ route('admin-oki.report.show', $report->id) }}" class="btn btn-info btn-sm" title="Lihat Laporan">
                                                <i class="fas fa-eye"></i> Lihat
                                            </a>                                            
                                            <a href="{{ route('admin-oki.report.edit', $report->id) }}" class="btn btn-warning btn-sm" title="Edit Laporan">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('admin-oki.report.destroy', $report->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus laporan ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus Laporan">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        {{ $reports->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
