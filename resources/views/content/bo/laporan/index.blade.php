@php
    $isNavbar = true;

    use Carbon\Carbon;
    Carbon::setLocale('id');

@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'laporan')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Reports</h5>
                    </div>
                    <div class="card-body">
                        <form action="/BO/Laporan" method="post" id="myForm">
                            @csrf
                            <input type="hidden" name="subaction" id="subaction" value="">

                            <div class="mb-4 row">
                                <label for="html5-date-input" class="col-md-2 col-form-label">Start Date</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="date" name="start_date" id="start_date"
                                        value="{{ old('start_date') }}">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="html5-date-input" class="col-md-2 col-form-label">End Date</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="date" name="end_date" id="end_date">
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="html5-date-input" class="col-md-2 col-form-label">status</label>
                                <div class="col-md-10">
                                    <select id="status" name="status" class="form-select">
                                        <option value="" {{ old('status') == '' ? 'selected' : '' }}>
                                            Consolidate</option>
                                        <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending
                                        </option>
                                        <option value="Selesai" {{ old('status') == 'Selesai' ? 'selected' : '' }}>Selesai
                                        </option>
                                        <option value="Reject" {{ old('status') == 'Reject' ? 'selected' : '' }}>Reject
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <input class="btn btn-primary" type="submit"
                                onclick="document.forms[0].subaction.value = 'search'" value="search">
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col text-center">
                                <h6 class="m-0 font-weight-bold text-primary">Total Data: {{ $data['totalData'] }}</h6>
                            </div>
                        </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered " id="test">
                                <thead class="text-center">
                                    <tr class="text-nowrap">
                                        <th class="col-1">#</th>
                                        <th class="col-2">Nomor Pengaduan</th>
                                        <th class="col-2">Tanggal Pengaduan</th>
                                        <th class="col">Detail</th>
                                        <th class="col-1">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @php
                                        $counter = 1;
                                    @endphp
                                    @if (!empty($data['pengaduanList']))
                                        @foreach ($data['pengaduanList'] as $item)
                                            <tr>
                                                <th scope="row">{{ $counter++ }}</th>
                                                <td> <a
                                                        href="Pengaduan/Detail/{{ $item['pengaduan_id'] }}">{{ $item['nomor_pengaduan'] }}</a>
                                                </td>
                                                <td> {{ Carbon::parse($item['created_at'])->translatedFormat('l,d F Y') }}
                                                </td>
                                                <td> {{ $item['detail'] }}</td>
                                                <td> {{ $item['status'] }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('page-script')

<script src="https://cdn.datatables.net/v/bs5/dt-2.1.8/b-3.1.2/b-colvis-3.1.2/b-html5-3.1.2/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#test').DataTable({
                layout: {
                    topStart: {
                        buttons: [
                             'csv'
                        ]
                    },
                    bottomEnd: {
                        paging: {
                            firstLast: false
                        }
                    }
                }
            });
        });
    </script>
@endsection
