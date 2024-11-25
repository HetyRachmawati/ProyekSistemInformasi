<?php

use App\Http\Controllers\DataOkiController;
use App\Http\Controllers\DataDivisiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserReportController;
use App\Http\Controllers\ManajemenKegiatanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;

Route::get('/', function () {
    return view('welcome');
});


// Edit Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
});


// ANGGOTA
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', CheckRole::class . ':User'])->group(function () {
    Route::prefix('reports')->group(function () {
        Route::get('/', [UserReportController::class, 'index'])->name('report');
        Route::get('/{id}', [UserReportController::class, 'show'])->name('report-show');
    });
});

// MemberList
Route::middleware(['auth'])->group(function () {
    Route::get('/memberlist', [AnggotaController::class, 'showMemberList'])->name('memberlist');
});



// SUPER ADMIN
Route::middleware(['auth', CheckRole::class . ':SuperAdmin'])->group(function () {
    
    // Dashboard 
    Route::get('/super-admin/dashboard', function () {
        return view('super-admin.dashboard');
    })->name('super-admin.dashboard');
    
    // Data Oki 
    Route::prefix('super-admin/dataoki')->group(function () {
        Route::get('/', [DataOkiController::class, 'index'])->name('super-admin.data_oki.index'); // List view
        Route::get('/create', [DataOkiController::class, 'create'])->name('super-admin.data_oki.create'); // Create form
        Route::post('/', [DataOkiController::class, 'store'])->name('super-admin.data_oki.store'); // Store data
        Route::get('/{dataOki}/edit', [DataOkiController::class, 'edit'])->name('super-admin.data_oki.edit'); // Edit form
        Route::put('/{dataOki}', [DataOkiController::class, 'update'])->name('super-admin.data_oki.update'); // Update data
        Route::delete('/{dataOki}', [DataOkiController::class, 'destroy'])->name('super-admin.data_oki.destroy'); // Delete data
    });

    // Data Divisi 
    Route::prefix('super-admin/data_divisi')->group(function () {
        Route::get('/', [DataDivisiController::class, 'index'])->name('super-admin.data_divisi.index');
        Route::get('/create', [DataDivisiController::class, 'create'])->name('super-admin.data_divisi.create');
        Route::post('/', [DataDivisiController::class, 'store'])->name('super-admin.data_divisi.store');
        Route::get('/{dataDivisi}', [DataDivisiController::class, 'show'])->name('super-admin.data_divisi.show');
        Route::get('/{dataDivisi}/edit', [DataDivisiController::class, 'edit'])->name('super-admin.data_divisi.edit');
        Route::put('/{dataDivisi}', [DataDivisiController::class, 'update'])->name('super-admin.data_divisi.update');
        Route::delete('/{dataDivisi}', [DataDivisiController::class, 'destroy'])->name('super-admin.data_divisi.destroy');
    });

    // Manajemen Kegiatan
    Route::prefix('super-admin/manajemen')->group(function() {
        Route::get('manajemen-kegiatan', [ManajemenKegiatanController::class, 'index'])->name('super-admin.manajemen_kegiatan.index');
        Route::put('manajemen-kegiatan/{id}/update-umpan-balik', [ManajemenKegiatanController::class, 'updateUmpanBalik'])->name('super-admin.manajemen_kegiatan.update-umpan-balik');
        Route::get('manajemen-kegiatan/{id}/edit', [ManajemenKegiatanController::class, 'edit'])->name('super-admin.manajemen_kegiatan.edit');
        Route::post('manajemen-kegiatan/setujui/{id}', [ManajemenKegiatanController::class, 'setujui'])->name('super-admin.manajemen_kegiatan.setujui');
        Route::post('manajemen-kegiatan/tolak/{id}', [ManajemenKegiatanController::class, 'tolak'])->name('super-admin.manajemen_kegiatan.tolak');
    });

    // Report 
    Route::prefix('super-admin/report')->group(function () {
        Route::get('/', [ReportController::class, 'index'])->name('super-admin.report.index');
        Route::get('{id}', [ReportController::class, 'show'])->name('super-admin.report.show');
    });

    // Anggota
    Route::prefix('super-admin/anggota')->group(function () {
        Route::get('/', [AnggotaController::class, 'index'])->name('super-admin.anggota.index');
        Route::get('create', [AnggotaController::class, 'create'])->name('super-admin.anggota.create');
        Route::post('store', [AnggotaController::class, 'store'])->name('super-admin.anggota.store');
        Route::get('edit/{user}', [AnggotaController::class, 'edit'])->name('super-admin.anggota.edit');
        Route::put('update/{user}', [AnggotaController::class, 'update'])->name('super-admin.anggota.update');
        Route::delete('destroy/{user}', [AnggotaController::class, 'destroy'])->name('super-admin.anggota.destroy');
    });

       
    // Home
    Route::prefix('super-admin/home')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('super-admin.home.index');
        Route::get('/create', [HomeController::class, 'create'])->name('super-admin.home.create');
        Route::post('/', [HomeController::class, 'store'])->name('super-admin.home.store');
        Route::get('/{home}/edit', [HomeController::class, 'edit'])->name('super-admin.home.edit');
        Route::put('/{home}', [HomeController::class, 'update'])->name('super-admin.home.update');
        Route::delete('/{home}', [HomeController::class, 'destroy'])->name('super-admin.home.destroy');
    });
    
    
});


// ROUTE ADMIN OKI 
Route::middleware(['auth', CheckRole::class . ':AdminOki'])->group(function () {
    
    // Dashboard 
    Route::get('/admin-oki/dashboard', function () {
        return view('admin-oki.dashboard');
    })->name('admin-oki.dashboard');
    
    // Data Oki
    Route::prefix('admin-oki/dataoki')->group(function () {
        Route::get('/', [DataOkiController::class, 'index'])->name('admin-oki.data_oki.index'); // List view
    });

    // Data Divisi
    Route::prefix('admin-oki/data_divisi')->group(function () {
        Route::get('/', [DataDivisiController::class, 'index'])->name('admin-oki.data_divisi.index');
        Route::get('/create', [DataDivisiController::class, 'create'])->name('admin-oki.data_divisi.create');
        Route::post('/', [DataDivisiController::class, 'store'])->name('admin-oki.data_divisi.store');
        Route::get('/{dataDivisi}', [DataDivisiController::class, 'show'])->name('admin-oki.data_divisi.show');
        Route::get('/{dataDivisi}/edit', [DataDivisiController::class, 'edit'])->name('admin-oki.data_divisi.edit');
        Route::put('/{dataDivisi}', [DataDivisiController::class, 'update'])->name('admin-oki.data_divisi.update');
        Route::delete('/{dataDivisi}', [DataDivisiController::class, 'destroy'])->name('admin-oki.data_divisi.destroy');
    });

    // Manajemen Kegiatan
    Route::prefix('admin-oki/manajemen')->group(function () {
        Route::get('manajemen-kegiatan', [ManajemenKegiatanController::class, 'index'])->name('admin-oki.manajemen_kegiatan.index');
        Route::get('manajemen-kegiatan/create', [ManajemenKegiatanController::class, 'create'])->name('admin-oki.manajemen_kegiatan.create');
        Route::post('manajemen-kegiatan', [ManajemenKegiatanController::class, 'store'])->name('admin-oki.manajemen_kegiatan.store');
        Route::get('manajemen-kegiatan/{id}/edit', [ManajemenKegiatanController::class, 'edit'])->name('admin-oki.manajemen_kegiatan.edit');
        Route::put('manajemen-kegiatan/{id}', [ManajemenKegiatanController::class, 'update'])->name('admin-oki.manajemen_kegiatan.update');
        Route::delete('manajemen-kegiatan/{id}', [ManajemenKegiatanController::class, 'destroy'])->name('admin-oki.manajemen_kegiatan.destroy');
    });    

    // Data report
    Route::prefix('admin-oki/report')->group(function () {
        Route::get('/', [ReportController::class, 'index'])->name('admin-oki.report.index');
        Route::get('create', [ReportController::class, 'create'])->name('admin-oki.report.create');
        Route::post('/', [ReportController::class, 'store'])->name('admin-oki.report.store');
        Route::get('admin-oki/report/{id}', [ReportController::class, 'show'])->name('admin-oki.report.show');
        Route::get('{id}/edit', [ReportController::class, 'edit'])->name('admin-oki.report.edit');
        Route::put('admin-oki/report/{id}', [ReportController::class, 'update'])->name('admin-oki.report.update');
        Route::delete('admin-oki/report/{id}', [ReportController::class, 'destroy'])->name('admin-oki.report.destroy');
    });

    // Anggota
    Route::prefix('admin-oki/anggota')->group(function () {
        Route::get('/', [AnggotaController::class, 'index'])->name('admin-oki.anggota.index');
        Route::get('create', [AnggotaController::class, 'create'])->name('admin-oki.anggota.create');
        Route::post('store', [AnggotaController::class, 'store'])->name('admin-oki.anggota.store');
        Route::get('edit/{user}', [AnggotaController::class, 'edit'])->name('admin-oki.anggota.edit');
        Route::put('update/{user}', [AnggotaController::class, 'update'])->name('admin-oki.anggota.update');
        Route::delete('destroy/{user}', [AnggotaController::class, 'destroy'])->name('admin-oki.anggota.destroy');
    });
    
});



// Route::middleware(['auth', CheckRole::class . ':AdminOki'])->group(function () {
    
//     // Read-only routes for AdminOki on DataDivisi
//     Route::prefix('admin-oki/datadivisi')->group(function () {
//         Route::get('/', [DataDivisiController::class, 'index'])->name('admin-oki.datadivisi.index'); // List view
//         Route::get('/{dataDivisi}', [DataDivisiController::class, 'show'])->name('admin-oki.datadivisi.show'); // Show details
//     });
// });

// Rute Anggota
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'checkrolemiddleware:Anggota'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';