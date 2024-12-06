@extends('layouts.app')
@section('title', 'Data Report')
@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Data Report Oki Polinema</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Data Divisi Oki</a></div>
                <div class="breadcrumb-item">Data Oki</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data Report</h2>
            <p class="section-lead">Berikut adalah data Report Oki yang terdaftar di BEM Polinema PSDKU Kediri.</p>
    
            <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-header d-flex align-items-center justify-content-between">
                          <h4>Data Report Activity</h4>
                          <div class="d-flex align-items-center">
                              
                              <!-- Label Filter Bulan -->
                              <h4 class="mr-2 mb-0">Filter:</h4>
                              <select id="filterMonth" class="form-control mr-2">
                                  <option value="">Pilih Bulan</option>
                                  @foreach(range(1, 12) as $month)
                                      <option value="{{ $month }}">{{ \Carbon\Carbon::create()->month($month)->format('F') }}</option>
                                  @endforeach
                              </select>
          
                              <!-- Label Filter Tahun -->
                              <select id="filterYear" class="form-control mr-2">
                                  <option value="">Pilih Tahun</option>
                                  @for($year = 2020; $year <= date('Y'); $year++)
                                      <option value="{{ $year }}">{{ $year }}</option>
                                  @endfor
                              </select>
          
                              <!-- Tombol "Tambah Laporan" -->
                              <a href="{{ route('admin-oki.report.create') }}" class="btn btn-primary" title="Tambah Laporan">
                                  <i class="fas fa-plus"></i> Tambah Laporan
                              </a>
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
                                            <th class="text-center">Tanggal Pelaksanaan</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="reportTable">
                                        @foreach($reports as $report)
                                            <tr class="text-center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $report->manajemen->nama_kegiatan }}</td>
                                                <td>{{ $report->dataOki->nama_oki }}</td>
                                                <td data-date="{{ $report->tgl_pelaksanaan }}">
                                                    {{ \Carbon\Carbon::parse($report->tgl_pelaksanaan)->format('d-m-Y') }}
                                                </td>
                                                <td>
                                                    @if($report->status == 'belum selesai')
                                                        <span class="badge badge-warning">Belum Selesai</span>
                                                    @elseif($report->status == 'selesai')
                                                        <span class="badge badge-success">Selesai</span>
                                                    @elseif($report->status == 'ditolak')
                                                        <span class="badge badge-danger">Ditolak</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin-oki.report.show', $report->id) }}" class="btn btn-info btn-sm" title="Lihat Laporan">
                                                        <i class="fas fa-eye"></i> Lihat
                                                    </a>                                            
                                                    <a href="{{ route('admin-oki.report.edit', $report->id) }}" class="btn btn-warning btn-sm" title="Edit Laporan">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <form action="{{ route('admin-oki.report.destroy', $report->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(event);">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
      // Generate opsi tahun dari 2020 hingga saat ini
window.onload = function() {
    const filterYear = document.getElementById('filterYear');
    const currentYear = new Date().getFullYear();
    for (let year = 2020; year <= currentYear; year++) {
        const option = document.createElement('option');
        option.value = year;
        option.textContent = year;
        filterYear.appendChild(option);
    }
};

// Event listener untuk filter
document.getElementById('filterMonth').addEventListener('change', filterReports);
document.getElementById('filterYear').addEventListener('change', filterReports);

function filterReports() {
    const month = document.getElementById('filterMonth').value;
    const year = document.getElementById('filterYear').value;
    const rows = document.querySelectorAll('#reportTable tr');

    rows.forEach(row => {
        const dateCell = row.querySelector('[data-date]');
        const date = new Date(dateCell.dataset.date);
        const matchesMonth = month ? date.getMonth() + 1 == month : true;
        const matchesYear = year ? date.getFullYear() == year : true;

        if (matchesMonth && matchesYear) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

    </script>
@endsection
