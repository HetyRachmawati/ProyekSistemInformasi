@extends('layouts.app')

@section('title', 'Data Anggota')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Data Anggota</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('super-admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="{{ route('super-admin.anggota.index') }}">Data Anggota</a></div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Daftar Anggota</h2>
        <p class="section-lead">
            Berikut Ini Adalah Data Anggota yang Terdaftar di BEM Polinema PSDKU Kediri.
        </p>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>List Anggota</h4>
                        <div class="card-header-action">
                            <a href="{{ route('super-admin.anggota.create') }}" class="btn btn-primary">Tambah Anggota</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Lengkap</th>
                                    <th>NIM</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($anggotas as $anggota) <!-- Menggunakan $anggota yang dipaginate -->
                                    <tr>
                                        <td>{{ $anggota->id }}</td>
                                        <td>{{ $anggota->nama_lengkap }}</td>
                                        <td>{{ $anggota->nim }}</td>
                                        <td>{{ $anggota->email }}</td>
                                        <td>{{ $anggota->status_keaktifan }}</td>
                                        <td>
                                            <a href="{{ route('super-admin.anggota.edit', $anggota->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('super-admin.anggota.destroy', $anggota->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(event);">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Paginasi -->
                        <div class="d-flex justify-content-center">
                            {{ $anggotas->links() }} <!-- Menampilkan pagination -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Script konfirmasi penghapusan -->
<script>
    function confirmDelete(event) {
        event.preventDefault(); // Mencegah pengiriman form secara default
        var form = event.target;
        var result = confirm('Apakah Anda yakin ingin menghapus anggota ini?');
        if (result) {
            form.submit(); // Lanjutkan pengiriman form jika dikonfirmasi
        }
    }
</script>

@endsection
