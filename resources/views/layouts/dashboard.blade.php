<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template Laporan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('storage/css/custom.css') }}">
    <style>
        .card {
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .card-body {
            border-radius: 5px;
        }

        .card:hover {
            border-color: #9B1C1C;
        }

        .custom-width {
            width: 100% !important; 
            overflow-x: auto !important; 
            max-width: 100vw !important; 
        }

        .custom-width table {
            min-width: 1100px !important; 
        }

    </style>
</head>
<body>
    <header class="card small-card">
        <div class="card-body" style="color: #7f1d1d;">
            <h5 class="text-bold text-center text-sm-left d-block d-sm-inline-block mb-0">
                DASHBOARD SISTEM REPORT SI BEM
            </h5>
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

                        <!-- Course Cards -->
                        <div class="template-demo">
                            <div class="card mb-3">
                                <div class="row no-gutters p-3">
                                    <div class="col-md-4">
                                        <img src="/storage/img/icon.png"
                                             class="course-image img-fluid" alt="Template LPJ Kegiatan SAN 2024">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Kementerian Sekretaris Kabinet</h5>
                                            <p class="card-text">Buku Panduan Birokrasi dan Template dapat diakses pada link berikut</p>
                                            <a class="btn btn-primary" href="{{ route('course') }}">See course</a>
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

               <!-- Main Content -->
               <div class="row">
                <div class="col-12"> 
                    @include('layouts.data.report')
                </div>
            </div>            
      

        </div>
    </div>

</body>
</html>
