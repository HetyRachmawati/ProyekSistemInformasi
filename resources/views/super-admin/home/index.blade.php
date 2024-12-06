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
                      <tr>
                        <th class="text-center">
                          No
                        </th>
                        <th class="text-center">Judul</th>
                        <th class="text-center">Deskripsi</th>
                        <th class="text-center">Kategori</th>
                        <th class="text-center">Gambar</th>
                        <th class="text-center">Link</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($homes as $index => $home)
                          <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td class="text-center">{{ $home->judul }}</td>
                            <td class="text-center">{{ $home->deskripsi ?? 'Tidak ada deskripsi' }}</td>
                            <td class="text-center">{{ $home->kategori->nama ?? 'Tidak ada kategori' }}</td>
                            <td class="text-center">
                              @if($home->gambar)
                                <img src="{{ asset('uploads/' . $home->gambar) }}" alt="Gambar {{ $home->judul }}" width="50">
                              @else
                                <span>Tidak ada gambar</span>
                              @endif
                            </td>
                            <td class="text-center">
                              @if($home->link_template)
                                <a href="{{ $home->link_template }}" target="_blank">Lihat Link</a>
                              @else
                                <span>Tidak ada link</span>
                              @endif
                            </td>
                            <td class="text-center">
                              <a href="{{ route('super-admin.home.edit', $home->id) }}" class="btn btn-primary btn-sm">Edit</a>
                              <form action="{{ route('super-admin.home.destroy', $home->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
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
          </div>
        </div>
      </div>
    </section>


    @endsection