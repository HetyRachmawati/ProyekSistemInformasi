@extends('layouts.app')
@section('title', 'Manajemen Laporan - Super Admin')
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
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4>Data Laporan</h4>
                        <div class="d-flex align-items-center">
                            <!-- Filter Bulan -->
                            <h4 class="mr-2 mb-0">Filter:</h4>
                            <select id="filterMonth" class="form-control mr-3">
                                <option value="">Pilih Bulan</option>
                                @foreach(range(1, 12) as $month)
                                    <option value="{{ $month }}">{{ \Carbon\Carbon::create()->month($month)->format('F') }}</option>
                                @endforeach
                            </select>

                            <!-- Filter Tahun -->
                            <select id="filterYear" class="form-control mr-3">
                                <option value="">Pilih Tahun</option>
                                @for($year = 2020; $year <= date('Y'); $year++)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Kegiatan</th>
                                        <th class="text-center">Nama OKI</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Tanggal Pelaksanaan</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="reportTableBody">
                                    @foreach($reports as $report)
                                    <tr class="text-center report-row" 
                                        data-month="{{ \Carbon\Carbon::parse($report->tgl_pelaksanaan)->month }}" 
                                        data-year="{{ \Carbon\Carbon::parse($report->tgl_pelaksanaan)->year }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $report->manajemen->nama_kegiatan }}</td>
                                        <td>{{ $report->dataOki->nama_oki }}</td>
                                        <td>
                                            @if($report->status == 'selesai')
                                                <span class="badge badge-success">Selesai</span>
                                            @else
                                                <span class="badge badge-warning">Belum Selesai</span>
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($report->tgl_pelaksanaan)->format('d-m-Y') }}</td>
                                        <td>
                                            <a href="{{ route('super-admin.report.show', $report->id) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i> Lihat
                                            </a>
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

<script>
    document.getElementById('filterMonth').addEventListener('change', filterReports);
    document.getElementById('filterYear').addEventListener('change', filterReports);

    function filterReports() {
        const selectedMonth = document.getElementById('filterMonth').value;
        const selectedYear = document.getElementById('filterYear').value;
        const rows = document.querySelectorAll('.report-row');

        rows.forEach(row => {
            const rowMonth = row.getAttribute('data-month');
            const rowYear = row.getAttribute('data-year');

            if ((selectedMonth === "" || rowMonth === selectedMonth) &&
                (selectedYear === "" || rowYear === selectedYear)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
</script>

@endsection
