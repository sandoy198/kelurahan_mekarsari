@php
    $isNavbar = true;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card" >
              <div class="card-body">
                <h5 class="card-title">Kelurahan Mekarsari Backoffice</h5>
                <h6 class="card-subtitle mb-2 text-muted ">Dashboard Backoffice</h6>
                <p class="card-text">Selamat datang di dashboard backoffice Kelurahan Mekarsari</p>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
