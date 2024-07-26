@extends('admin.layouts.index')

@section('content')
    <div class="collapse show dash-content" id="dashtoggle">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center center-content-between">
                        <h4 class="mb-0">Laporan / Aparatur !</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">

                            </ol>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="page-content">

        <div class="page-body">
            <div class="container">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="/presensi/cetaklaporan" target="_blank" method="POST"">
                                @csrf

                                <div>
                                    <div class="form-floating">
                                        <select name="bulan" id="bulan" class="form-control">
                                            <option value=""> Bulan</option>
                                            @for ($i = 1; $i <= 12; $i++)
                                                <option value="{{ $i }}" *
                                                    {{ date('m') == $i ? 'selected' : '' }}>
                                                    {{ $namabulan[$i] }}</option>
                                            @endfor
                                        </select>
                                        <label for="floatingSelect">Pilih Bulan</label>
                                    </div>
                                </div>
                                <div class=mt-2>
                                    <div class="form-floating">
                                        <select name="tahun" id="tahun" class="form-control">
                                            <option value="">Tahun</option>
                                            @php
                                                $tahunmulai = 2023;
                                                $tahunsekarang = date('Y');
                                            @endphp
                                            @for ($tahun = $tahunmulai; $tahun <= $tahunsekarang; $tahun++)
                                                <option value="{{ $tahun }}" *
                                                    {{ date('Y') == $tahun ? 'selected' : '' }}>
                                                    {{ $tahun }}
                                                </option>
                                            @endfor
                                        </select>
                                        <label for="floatingSelect">Pilih Tahun</label>
                                    </div>
                                </div>

                                <div class=mt-2>
                                    <div class="form-floating">
                                        <select name="nik" id="nik" class="form-select">
                                            <option>Pilih Aparatur</option>
                                            @foreach ($karyawan as $d)
                                                <option value="{{ $d->nik }}">{{ $d->nama_lenkap }}</option>
                                            @endforeach
                                        </select>
                                        <label for="floatingSelect">Pilih Karyawan</label>
                                    </div>
                                </div>

                                <div class=mt-2>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-floating">
                                                <button type="submit" name="cetak" class="btn btn-primary w-100"> <svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-printer">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                                                        <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                                                        <path
                                                            d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" />
                                                    </svg>
                                                    Cetak</button>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-floating">
                                                <button type="submit" name="exportexcel" class="btn btn-success w-100"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-file-spreadsheet">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                                        <path
                                                            d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                                        <path d="M8 11h8v7h-8z" />
                                                        <path d="M8 15h8" />
                                                        <path d="M11 11v7" />
                                                    </svg>
                                                    Expor ke Excel</button>
                                            </div>

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
@endsection
