@php
    $isNavbar = true;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Pengaduan Menu')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Pengaduan Menu</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered ">
                                <thead class="text-center">
                                    <tr class="text-nowrap">
                                        <th class="col-1">#</th>
                                        <th class="col-2">Nomor Pengaduan</th>
                                        <th class="col">Detail</th>
                                        <th class="col-1">Status</th>
                                        <th class="col-2" colspan="2">Action</th>
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
                                                <td>  <a href="Pengaduan/Detail/{{ $item['pengaduan_id'] }}">{{ $item['nomor_pengaduan'] }}</a></td>
                                                <td> {{ $item['detail'] }}</td>
                                                <td> {{ $item['status'] }}</td>
                                                @if ( $item['status']=='Pending')
                                                    <td align="center"> <a class="bx bxs-check-square" href="Pengaduan/Approve/{{ $item['pengaduan_id'] }}"></a></td>
                                                    <td align="center"> <a class="bx bxs-x-square  " href="Pengaduan/Reject/{{ $item['pengaduan_id'] }}"></a></td>
                                                @elseif ($item['status']=='Proses')
                                                    <td align="center"> <a class="bx bxs-check-square" href="Tindakan/Approve/{{ $item['pengaduan_id'] }}"></a></td>
                                                    <td align="center"> <a class="bx bxs-x-square  " href="Tindakan/Reject/{{ $item['pengaduan_id'] }}"></a></td>
                                                @elseif ($item['status']=='Reject Tindakan')
                                                    <td align="center"> <a class="bx bxs-check-square" href="Pengaduan/Approve/{{ $item['pengaduan_id'] }}"></a></td>
                                                    <td align="center"> <a class="bx bxs-x-square  " href="Pengaduan/Reject/{{ $item['pengaduan_id'] }}"></a></td>
                                                @else
                                                    <td align="center"> </td>
                                                    <td align="center"> </td>
                                                @endif
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
