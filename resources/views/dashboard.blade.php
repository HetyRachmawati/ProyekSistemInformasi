@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

<div class="row mt-5">
    @include('layouts.dashboard') 
</div>

<div class="row">
    @include('layouts.sidebaruser') 
</div>

@endsection
