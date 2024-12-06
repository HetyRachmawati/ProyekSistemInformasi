<section id="dashboard-overview" class="mb-4">
    <div class="row g-3">
        <!-- Data Oki -->
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="fas fa-building"></i> 
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h5>Data Oki</h5>
                    </div>
                    <div class="card-body">
                    {{ $data['data_oki'] }}
                    </div>
                </div>
            </div>
        </div>
        <!-- Data Divisi -->
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-layer-group"></i> 
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h5>Data Divisi</h5>
                    </div>
                    <div class="card-body">
                    {{ $data['data_divisi'] }}
                    </div>
                </div>
            </div>
        </div>
        <!-- Reports -->
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-file-alt"></i> 
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h5>Reports</h5>
                    </div>
                    <div class="card-body">
                    {{ $data['reports'] }}
                    </div>
                </div>
            </div>
        </div>
        <!-- Data Manajemen -->
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-user-cog"></i> 
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h5>Data Manajemen</h5>
                    </div>
                    <div class="card-body">
                    {{ $data['kegiatan'] }}
                    </div>
                </div>
            </div>
        </div>
        <!-- Member List -->
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info"> 
                    <i class="fas fa-users"></i> 
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h5>Member List</h5>
                    </div>
                    <div class="card-body">
                    {{ $data['anggota'] }}
                    </div>
                </div>
            </div>
        </div>

       <!-- Jurusan -->
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger"> 
                    <i class="fas fa-graduation-cap"></i> 
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h5>Jurusan</h5>
                    </div>
                    <div class="card-body">
                        {{ $data['jurusan'] }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>