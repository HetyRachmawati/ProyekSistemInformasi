@extends('layouts.app') {{-- Layout Utama --}}

@section('title', 'Dashboard Admin Oki')

@section('content')
<div class="section-header mb-4">
    <h1 class="h3 mb-2 text-gray-800">Ini Dashboard Admin Oki</h1>
</div>

<div class="row">
    {{-- Masukkan Sidebar di Sini --}}
    @include('layouts.sidebaroki') {{-- Memuat Sidebar dari layouts.sidebarbem --}}
</div>

@endsection
