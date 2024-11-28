@extends('layouts.app')

@section('title', 'Dashboard Admin Oki')

@section('content')
<div class="section mb-4">
    <h1 class="h3 mb-2 text-gray-800">Ini Dashboard Admin Oki</h1>
</div>

<div class="row">
    @include('layouts.dashboard') 
</div>

<div class="row">
    @include('layouts.sidebaroki') 
</div>

@endsection
