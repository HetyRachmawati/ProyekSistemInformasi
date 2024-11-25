@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

<div class="section-header mb-4 mt-4 bg-red-800">
    <h1 class="h3 mb-2 text-gray-800">Report Activity SI BEM : Dashboard</h1>
</div> 

<div class="row">
    @include('layouts.dashboard') 
</div>

<div class="row">
    @include('layouts.sidebaruser') 
</div>

@endsection
