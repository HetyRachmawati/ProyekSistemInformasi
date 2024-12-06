     @extends('layouts.app')
     @section('title', 'Data Periode')
     @section('content')
     
     <!-- Main Content -->
     <section class="section">
         <div class="section-header">
             <h1>Daftar Periode</h1>
             <div class="section-header-breadcrumb">
                 <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                 <div class="breadcrumb-item"><a href="#">Periode</a></div>
                 <div class="breadcrumb-item">Daftar Periode</div>
             </div>
         </div>
     
         <div class="section-body">
             <h2 class="section-title">Daftar Periode</h2>
             <p class="section-lead">Halaman ini menampilkan daftar semua periode yang tersedia.</p>
     
             <div class="row">
                 <div class="col-12">
                     <div class="card">
                         <div class="card-header">
                             <h4>Data Periode</h4>
                             <a href="{{ route('super-admin.periode.create') }}" class="btn btn-primary ml-auto">
                                 <i class="fas fa-plus"></i> Tambah Periode
                             </a>
                         </div>
                         <div class="card-body">
                             @if (session('success'))
                                 <div class="alert alert-success">
                                     {{ session('success') }}
                                 </div>
                             @endif
     
                             <div class="table-responsive">
                                 <table class="table table-striped" id="table-1">
                                     <thead>
                                         <tr>
                                             <th class="text-center">No</th>
                                             <th class="text-center">Tahun Periode</th>
                                             <th class="text-center">Dibuat Pada</th>
                                             <th class="text-center">Aksi</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         @foreach($periodes as $index => $periode)
                                             <tr class="text-center">
                                                 <td>{{ $loop->iteration }}</td>
                                                 <td>{{ $periode->tahun_periode }}</td>
                                                 <td>{{ $periode->created_at->format('d M Y') }}</td>
                                                 <td>
                                                     <a href="{{ route('super-admin.periode.edit', $periode->id) }}" class="btn btn-warning btn-sm">
                                                         <i class="fas fa-edit"></i> Edit
                                                     </a>
                                                     <form action="{{ route('super-admin.periode.destroy', $periode->id) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(event);">
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
     