@extends('layouts.app') 

@section('title', 'Dashboard Super Admin')

@section('content')
<div class="section-header mb-4">
    <h1 class="h3 mb-2 text-gray-800">Ini Dashboard Super Admin</h1>
</div>

<div class="row">
    @include('layouts.dashboard') 
</div>

<div class="row">
    @include('layouts.sidebarbem') 
</div>

@endsection
