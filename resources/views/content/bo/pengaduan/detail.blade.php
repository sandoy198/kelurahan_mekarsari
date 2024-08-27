@php
    $isNavbar = false;
    $pengaduan = $data['pengaduan'];
    $tindakan = $data['tindakan'];

    use Carbon\Carbon;
    Carbon::setLocale('id');

@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Pengaduan Menu')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Detail Pengaduan</h5>
                    </div>
                    <div class="card-body">
                        <div class="col-xxl">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="mb-0">Detail Pengaduan</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <label class="col text-end " for="basic-default-name">{{Carbon::parse($pengaduan['created_at'])->translatedFormat('l,d F Y')}}</label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="basic-default-name"
                                                placeholder="John Doe" readonly value="{{ $pengaduan['nama'] }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-company">Nomor
                                            KTP</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="basic-default-company"
                                                placeholder="36***********." readonly value="{{ $pengaduan['no_ktp'] }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-company">Nomor
                                            Telepon</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="basic-default-company"
                                                placeholder="08***********" readonly value="{{ $pengaduan['no_hp'] }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                                <input type="text" id="basic-default-email" class="form-control"
                                                    placeholder="john.doe" aria-label="john.doe"
                                                    aria-describedby="basic-default-email2" readonly
                                                    value="{{ $pengaduan['email'] }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-message">Detail</label>
                                        <div class="col-sm-10">
                                            <textarea id="basic-default-message" class="form-control"
                                                placeholder="Jelaskan secara singkat laporan yang ingin dikerjakan"
                                                aria-label="Jelaskan secara singkat laporan yang ingin dikerjakan" aria-describedby="basic-icon-default-message2"
                                                readonly>{{ $pengaduan['detail'] }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="formFile" class="col-form-label col-sm-2 ">Foto Laporan</label>
                                        <div class="col-sm-10">
                                            <a
                                                href="{{ route('download.image', ['pengaduan_id' => $pengaduan['pengaduan_id']]) }}">{{ $pengaduan['foto_nama'] }}</a>
                                        </div>
                                    </div>
                                    <hr class="my-4 mx-n4">

                                    {{-- bikin table disini untuk loping tindakan --}}

                                    <div class="table-responsive text-nowrap mb-3">
                                        <table class="table table-bordered ">
                                            <thead class="text-center">
                                                <tr class="text-nowrap">
                                                    <th class="col-1">#</th>
                                                    <th class="col-2">Divisi Tujuan</th>
                                                    <th class="col-1">Penanggung Jawab</th>
                                                    <th class="col-1">Foto Pengerjaan</th>
                                                    <th class="col">Detail</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                @php
                                                    $counter = 1;
                                                @endphp
                                                @if (!empty($tindakan))
                                                    @foreach ($tindakan as $item)
                                                        <tr>
                                                            <th scope="row">{{ $counter++ }}</th>
                                                            <td> {{ $item['divisiName'] }}</td>
                                                            <td> {{ $item->user['name'] }}</td>
                                                            <td> <a href="{{ route('download.tindakan.image', ['tindakan_id' => $item['pengaduan_id']]) }}">{{ $item['foto_nama'] }}</a></td>
                                                            <td> {{ $item['detail'] }}</td>
                                                        </tr>
                                                    @endforeach

                                                @endif
                                            </tbody>
                                        </table>
                                    </div>


                                    <form action="/BO/Pengaduan/Approve" method="post">
                                        @csrf
                                        <input type="hidden" name="pengaduan_id"
                                            value="{{ $pengaduan['pengaduan_id'] }}">
                                        <div class="row justify-content-center">
                                            <div class="col">
                                                <button type="button" onclick="window.history.back();"
                                                    class="btn btn-secondary">Back</button>
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
    </div>
    </div>
@endsection

@section('page-script')

@endsection
