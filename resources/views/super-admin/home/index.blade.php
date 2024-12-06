@extends('layouts.app')
@section('title', 'Data Home')
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Data Home</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('super-admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item active">Data Home</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Data Home</h2>
        <p class="section-lead">
            Berikut Ini Adalah Data Home yang ada di BEM Polinema PSDKU Kediri.
        </p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Home</h4>
                        <a href="{{ route('super-admin.home.create') }}" class="btn btn-primary ml-auto">
                            <i class="fas fa-plus"></i> Tambah Data
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Kategori</th>
                                        <th>Gambar</th>
                                        <th>Link</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($homes as $home)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $home->judul }}</td>
                                            <td>{{ $home->deskripsi }}</td>
                                            <td>{{$home->kategori->nama_kategori}}</td>
                                            <td>
                                                @if($home->gambar)
                                                    <a href="{{ asset('uploads/' . $home->gambar) }}" target="_blank">
                                                        <img src="{{ asset('uploads/' . $home->gambar) }}" alt="Image" style="width: 100px; height: auto;">
                                                    </a>
                                                @else
                                                    Tidak ada gambar
                                                @endif
                                            </td>
                                            <td>
                                                @if($home->link_template)
                                                    <a href="{{ $home->link_template }}" target="_blank">Lihat Link</a>
                                                @else
                                                    Tidak ada link
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('super-admin.home.edit', $home->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('super-admin.home.destroy', $home->id) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(event);">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </form>                                             
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data yang tersedia</td>
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
