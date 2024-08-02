@php
    $isNavbar = false;
    $isMenu = false;
    $navbarHideToggle = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Pengaduan Menu')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Membuat Pengaduan</h5>
                    </div>
                    <div class="card-body">
                        <div class="col-xxl">
                            <div class="card mb-4">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h5 class="mb-0">Data Pelapor</h5>
                                </div>
                                <form action="/Pengaduan/Create" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-name">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="basic-default-name"
                                                    placeholder="John Doe" name="nama" value="{{ old('nama') }}" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-company">Nomor
                                                KTP</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="basic-default-company"
                                                    placeholder="36***********." name="no_ktp" value="{{ old('no_ktp') }}" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-company">Nomor
                                                Telepon</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="basic-default-company"
                                                    placeholder="08***********" name="no_hp" value="{{ old('no_hp') }}" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                                            <div class="col-sm-10">
                                                <div class="input-group input-group-merge">
                                                    <input type="email" id="basic-default-email" class="form-control"
                                                        placeholder="john.doe" aria-label="john.doe"
                                                        aria-describedby="basic-default-email2" name="email" value="{{ old('email') }}" />
                                                </div>
                                                <div class="form-text"> Gunakan email aktif agar status laporan dapat
                                                    dipantau</div>
                                            </div>
                                        </div>
                                        <hr class="my-4 mx-n4">
                                    </div>
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="mb-0">Detail Laporan</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <label for="formFile" class="col-form-label col-sm-2 ">Foto Laporan</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="file" id="formFile" name="foto" value="{{ old('foto') }}">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label"
                                                for="basic-default-message">Detail</label>
                                            <div class="col-sm-10">
                                                <textarea name="detail" id="basic-default-message" class="form-control"
                                                    placeholder="Jelaskan secara singkat laporan yang ingin dikerjakan"
                                                    aria-label="Jelaskan secara singkat laporan yang ingin dikerjakan" aria-describedby="basic-icon-default-message2">{{ old('detail') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Send</button>
                                                <button type="button" onclick="confirmCancel()"
                                                    class="btn btn-secondary">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
@endsection
