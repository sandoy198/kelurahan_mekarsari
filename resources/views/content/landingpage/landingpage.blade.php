@php
    $isMenu = false;
    $navbarHideToggle = false;
    $isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Welcome')

@section('content')
    <!-- Showcase -->
    <header class="bg-primary text-white text-center py-5 mb-4"
        style="background-image: url('{{ asset('assets/img/front-pages/branding/headerbackground.jpg') }}'); background-repeat: no-repeat; background-position: center; background-size: cover;">
        <div class="container">
            <h1 class="display-4">Selamat Datang di Portal Pengaduan Kelurahan Mekarsari</h1>
            <p class="lead">Tempat melaporkan dan memantau laporan masyarakat</p>
        </div>
    </header>

    <!-- Features -->
    <section id="features" class="py-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-6 mb-6">
                    <div class="card h-100">
                        <a class="card-body" href="/Pengaduan/Create">
                            <h5 class="card-title">Membuat Pengaduan</h5>
                            <p class="card-text">Laporkan setiap temuan membuat lingkungan menjadi lebih baik.</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 mb-6">
                    <div class="card h-100">
                        <a class="card-body" href="/Pengaduan/PeriksaStatusPengaduan">
                            <h5 class="card-title">Periksa Pengaduan</h5>
                            <p class="card-text">Pantau setiap laporan hingga tercapai lingkungan yang lebih baik.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About -->
    <section id="about" class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2>About Us</h2>
                    <p> Rajeg adalah sebuah kecamatan yang terletak di Kabupaten Tangerang, Provinsi Banten, Indonesia.
                        Kecamatan Rajeg memiliki luas wilayah 61.059 ha. Kecamatan Rajeg berbatasan dengan KecamatanMauk di
                        Utara dan dengan Kecamatan Pasar Kemis di selatan. </p>
                    <p>Pusat pemerintahan kecamatan ini berada di Desa Mekarsari, walaupun ada yang sudah menjadi status kelurahan, yaitu Kelurahan Sukatani.

                        Kecamatan ini terdiri dari 1 kelurahan dan 12 desa, yaitu:

                        Kelurahan Sukatani
                        Desa Jambukarya
                        Desa Daon
                        Desa Rancabango
                        Desa Rajeg Mulya
                        Desa Rajeg
                        Desa Sukamanah
                        Desa Pangarengan
                        Desa Tanjakan
                        Desa Tanjakan Mekar
                        Desa Sukasari
                        Desa Mekarsari
                        Desa Lembangsari</p>
                    </div>
                <div class="col-lg-6">
                    <img src="{{ asset('assets/img/front-pages/landing-page/aboutus.jpg') }}" class="img-fluid"
                        alt="About us">
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <div class="container">
            <p>&copy; 2024 Your Company. All rights reserved.</p>
        </div>
    </footer>
@endsection
