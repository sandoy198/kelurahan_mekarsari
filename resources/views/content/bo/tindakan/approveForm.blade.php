@php
    $isNavbar = false;
    $pengaduan = $data['pengaduan'];
    $divisi = $data['divisi'];
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
                                <div class="card-body">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="mb-0">Detail Pengaduan</h5>
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

                                    <form action="/BO/Tindakan/Approve" method="post">
                                        @csrf
                                        <input type="hidden" name="pengaduan_id" value="{{$pengaduan['pengaduan_id']}}">
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-message">Hasil Tindakan</label>
                                            <div class="col-sm-10">
                                                <textarea name="detail" id="basic-default-message" class="form-control"
                                                    placeholder="Jelaskan secara singkat Tindakan yang dikerjakan"
                                                    aria-label="Jelaskan secara singkat Tindakan yang dikerjakan" aria-describedby="basic-icon-default-message2"
                                                    ></textarea>
                                            </div>
                                        </div>
                                            <div class="row justify-content-end">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Selesai</button>
                                                <button type="button" onclick="confirmCancel()"
                                                    class="btn btn-secondary">Cancel</button>
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
    <script>
        function changedivisi() {
            var divisi = document.getElementById('divisi').value;

            fetch('/getUserByDivision', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        'divisi': divisi
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    const secondSelect = document.getElementById("users");
                    secondSelect.innerHTML = "";

                    const defaultOption = document.createElement("option");
                    defaultOption.value = "";
                    defaultOption.textContent = "Pilih Dibawah";
                    defaultOption.hidden = true;
                    secondSelect.appendChild(defaultOption);

                    data.forEach(option => {
                        optionElement = document.createElement("option");
                        optionElement.value = option.id;
                        optionElement.textContent = option.name;
                        secondSelect.appendChild(optionElement);
                    });

                })
                .catch(error => console.error('Error:', error));

        }
    </script>
@endsection
