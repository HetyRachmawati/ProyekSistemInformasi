    @extends('layouts.app')

    @section('title', 'Edit Profil')

    @section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Profil</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active">Edit Profil</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Edit Profil</h2>
            <p class="section-lead">Silakan ubah data profil Anda di bawah ini.</p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Edit Profil</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('super-admin.anggota.update', $anggota->id) }}" method="POST" onsubmit="confirmEdit(event)">
                                @csrf
                                @method('PUT')  
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $anggota->nama_lengkap) }}" required>
                                            @error('nama_lengkap')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>NIM</label>
                                            <input type="text" name="nim" class="form-control" value="{{ old('nim', $anggota->nim) }}" required>
                                            @error('nim')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" value="{{ old('email', $anggota->email) }}" required>
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control">
                                            <small>Isi jika ingin mengubah password</small>
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>No HP</label>
                                            <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $anggota->no_hp) }}" required>
                                            @error('no_hp')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jabatan</label>
                                            <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan', $anggota->jabatan) }}"/>
                                            @error('jabatan')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Organisasi (OKI)</label>
                                            <select name="id_oki" class="form-control">
                                                <option value="" disabled>Pilih OKI</option>
                                                @foreach($dataOki as $item)
                                                    <option value="{{ $item->id }}" {{ $anggota->id_oki == $item->id ? 'selected' : '' }}>{{ $item->nama_oki }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_oki')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Divisi</label>
                                            <select name="id_divisi" class="form-control">
                                                <option value="" disabled>Pilih Divisi</option>
                                                @foreach($dataDivisi as $item)
                                                    <option value="{{ $item->id }}" {{ $anggota->id_divisi == $item->id ? 'selected' : '' }}>{{ $item->nama_divisi }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_divisi')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jurusan</label>
                                            <select name="id_jurusan" class="form-control" required>
                                                <option value="" disabled selected>Pilih Jurusan</option>
                                                @foreach($jurusans as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('id_jurusan', $anggota->id_oki) == $item->id ? 'selected' : '' }}>
                                                        {{ $item->nama_jurusan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('id_jurusan')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Periode</label>
                                            <select name="id_periode" class="form-control" required>
                                                <option value="" disabled selected>Pilih Periode</option>
                                                @foreach($periodes as $item)
                                                    <option value="{{ $item->id }}" 
                                                        {{ old('id_periode', $anggota->id_periode) == $item->id ? 'selected' : '' }}>
                                                        {{ $item->tahun_periode }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('id_periode')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>                            
                                

                                <div class="form-group">
                                    <label>Status Keaktifan</label>
                                    <select name="status_keaktifan" class="form-control">
                                        <option value="aktif" {{ $anggota->status_keaktifan == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="nonaktif" {{ $anggota->status_keaktifan == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                    </select>
                                    @error('status_keaktifan')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    <a href="{{ route('super-admin.anggota.index') }}" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection

