<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template Laporan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('storage/css/custom.css') }}">
</head>
<body>
    <header class="card mb-3 small-card">
        <div class="card-body " style="color: #7f1d1d;">
                <h5 class="text-bold text-center text-sm-left d-block d-sm-inline-block mb-0">
                    DASHBOARD SISTEM REPORT SI BEM
                </h5>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center text-muted">
                    Home
                </span>
        </div>
    </header>    
    
    <div class="container">
        <!-- Main Content -->
        <div class="row">
            <div class="col-12">
                @include('layouts.data.data') 
            </div>
        </div>
        
        <div class="row mt-4">
            <!-- Courses Section -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Courses</h4>
                        <form id="searchForm" class="mb-4">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter to search courses" name="search" id="searchInput">
                            </div>
                        </form>

                        <!-- Course Cards -->
                        <div class="template-demo">
                            <div class="card mb-3">
                                <div class="row no-gutters p-3">
                                    <div class="col-md-4">
                                        <img src="/storage/thumbnails/uHZ4zqyMes1sVt81rRFc7yC95eSfFUkiRwynEmZz.png" 
                                            class="course-image img-fluid" alt="Template LPJ Kegiatan SAN 2024">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Template Laporan Oki 2024</h5>
                                            <p class="card-text"><small class="text-muted">Created at: 06 Jul 2024</small></p>
                                            <p class="card-text">Template ini tentunya sebagai dasar kalian untuk menyusun laporan yang ada di OKI POLINEMA Periode 2024/2025</p>
                                            <a class="btn btn-primary" href="https://lms.senyumanaknusantara.com/dashboard/course/template-lpj-kegiatan-san-2024">See course</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Announcements Section -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Announcements</h4>
                        <p>There's no announcement</p>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    @include('layouts.data.report') 
                </div>
            </div>
        </div>
    </div>
</body>
</html>
