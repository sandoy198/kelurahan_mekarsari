@php
    $isNavbar = false;
    $isMenu = false;
    $navbarHideToggle = false;
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
                        <h5 class="card-title">Periksa Status Pengaduan</h5>
                    </div>
                    <div class="card-body">
                        <div class="col-xxl">
                            <div class="card mb-4">
                                <form action="/Pengaduan/PeriksaStatusPengaduan" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-message">Nomor
                                                Pengaduan</label>
                                            <div class="col-sm-10">
                                                <textarea id="basic-default-message" class="form-control" placeholder="24xxxxxxxx" aria-label="24xxxxxxxx"
                                                    name="nomorPengaduan" aria-describedby="basic-icon-default-message2"></textarea>
                                            </div>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="col-sm">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                                    <a href="/" class="btn btn-secondary">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @if (!empty($data['pengaduan']))
                            @php
                                $pengaduan = $data['pengaduan'];
                                $tindakan = $data['tindakan'];
                            @endphp
                                <div class="card">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="mb-0">Detail Pengaduan</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <label class="col text-end " for="basic-default-name">{{Carbon::parse($pengaduan['created_at'])->translatedFormat('l,d F Y')}}</label>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-name">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="basic-default-name"
                                                    placeholder="John Doe" value="{{$pengaduan['nama']}}" readonly />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-company">Nomor
                                                KTP</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="basic-default-company"
                                                    placeholder="36***********."  value="{{$pengaduan['no_ktp']}}" readonly/>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-company">Nomor
                                                Telepon</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="basic-default-company"
                                                    placeholder="08***********" value="{{$pengaduan['no_hp']}}" readonly />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                                            <div class="col-sm-10">
                                                <div class="input-group input-group-merge">
                                                    <input type="text" id="basic-default-email" class="form-control"
                                                        placeholder="john.doe" aria-label="john.doe"
                                                        aria-describedby="basic-default-email2" value="{{$pengaduan['email']}}" readonly />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-company">Detail</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="basic-default-company"
                                                    placeholder="08***********" value="{{$pengaduan['detail']}}" readonly />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-company">Status</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="basic-default-company"
                                                    placeholder="08***********" value="{{$pengaduan['status']}}" readonly />
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
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
@endsection
