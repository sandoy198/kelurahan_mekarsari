@php
    $isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Pengaduan Menu')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card" >
                <div class="card-header">
                    <h5 class="card-title">Pengaduan Menu</h5>
                </div>
              <div class="card-body">
                    <div class="table-responsive text-nowrap">
                      <table class="table table-bordered ">
                        <thead class="text-center">
                          <tr class="text-nowrap">
                            <th class="col-1">#</th>
                            <th class="col">Table heading</th>
                            <th class="col-1">Status</th>
                            <th class="col-2" colspan="2" >Action</th>
                          </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                          <tr>
                            <th scope="row">1</th>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
