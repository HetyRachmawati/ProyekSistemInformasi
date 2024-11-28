{{-- <!-- resources/views/layouts/data/reports.blade.php -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Reports</h4>
                <!-- Table to display reports -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kegiatan</th>
                            <th>Tanggal Pelaksanaan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reports as $report)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $report->manajemen->nama_kegiatan }}</td>
                                <td>{{ \Carbon\Carbon::parse($report->tgl_pelaksanaan)->format('d-m-Y') }}</td>
                                <td>{{ ucfirst($report->status) }}</td>
                                <td>
                                    <a href="{{ route('report.showDetail', $report->id) }}" class="btn btn-info">Lihat</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <!-- Pagination Links -->
                <div class="d-flex justify-content-center">
                    {{ $reports->links() }}
                </div>
            </div>
        </div>
    </div>
</div> --}}


<div> hallo </div>
