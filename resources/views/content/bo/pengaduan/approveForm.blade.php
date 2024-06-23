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
                        <h5 class="card-title">Approve Pengaduan</h5>
                    </div>
                    <div class="card-body">
                        <div class="col-xxl">
                            <div class="card mb-4">
                                <form>
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-phone">Phone
                                                No</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="basic-default-phone"
                                                    class="form-control phone-mask" placeholder="658 799 8941"
                                                    aria-label="658 799 8941" aria-describedby="basic-default-phone" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label"
                                                for="basic-default-message">Message</label>
                                            <div class="col-sm-10">
                                                <textarea id="basic-default-message" class="form-control" placeholder="Hi, Do you have a moment to talk Joe?"
                                                    aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2"></textarea>
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
