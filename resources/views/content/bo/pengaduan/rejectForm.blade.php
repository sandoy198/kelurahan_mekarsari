@php
    $isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Pengaduan Menu')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Reject Pengaduan</h5>
                    </div>
                    <div class="card-body">
                        <div class="col-xxl">
                            <div class="card mb-4">
                                <form action="/BO/Pengaduan/Approve" method="post">
                                    @csrf
                                    <input type="hidden" name="pengaduan_id" value="{{ $pengaduan['pengaduan_id'] }}">
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="detail">Message</label>
                                            <div class="col-sm-10">
                                                <textarea id="detail" class="form-control" name="detail" placeholder="Masukan Detail !"
                                                    aria-label="Masukan Detail !" aria-describedby="basic-icon-default-message2"></textarea>
                                            </div>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Send</button>
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
