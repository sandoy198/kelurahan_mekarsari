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
                        <h5 class="card-title">Membuat Pengaduan</h5>
                    </div>
                    <div class="card-body">
                        <div class="col-xxl">
                            <div class="card mb-4">
                              <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Basic Layout</h5>
                              </div>
                              <form>
                              <div class="card-body">
                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="basic-default-name" placeholder="John Doe" />
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Company</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="basic-default-company" placeholder="ACME Inc." />
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                                    <div class="col-sm-10">
                                      <div class="input-group input-group-merge">
                                        <input type="text" id="basic-default-email" class="form-control" placeholder="john.doe" aria-label="john.doe" aria-describedby="basic-default-email2" />
                                        <span class="input-group-text" id="basic-default-email2">@example.com</span>
                                      </div>
                                      <div class="form-text"> You can use letters, numbers & periods </div>
                                    </div>
                                  </div>
                                  <hr class="my-4 mx-n4">
                              </div>
                              <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Basic Layout</h5>
                              </div>
                              <div class="card-body">
                                <div class="row mb-3">
                                    <label for="formFile" class="col-form-label col-sm-2 ">Default file input example</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="formFile">
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-phone">Phone No</label>
                                    <div class="col-sm-10">
                                      <input type="text" id="basic-default-phone" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-default-phone" />
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-message">Message</label>
                                    <div class="col-sm-10">
                                      <textarea id="basic-default-message" class="form-control" placeholder="Hi, Do you have a moment to talk Joe?" aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2"></textarea>
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
