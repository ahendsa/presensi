@extends('layouts.presensi')
@section('header')
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="/" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"</ion-icon>
            </a>
        </div>
        <div class="pageTitle">Edit Profile</div>
        <div class="right"></div>
    </div>
@endsection

@section('content')
    <div class="row" style="margin-top:4rem">
        <div class="class col">
            @php
                $messagesucces = Session::get('success');
                $messageerror = Session::get('error');
            @endphp

            @if (Session::get('success'))
                <div class="alert alert-success">
                    {{ $messagesucces }}
                </div>
            @endif

            @if (Session::get('error'))
                <div class="alert alert-danger">
                    {{ $messageerror }}
                </div>
            @endif
        </div>

    </div>
    <form action="/presensi/{{ $karyawan->nik }}/updateprofile" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="col">
            <div class="form-group boxed">
                <div class="input-wrapper">
                    <input type="text" class="form-control" value="{{ $karyawan->nama_lenkap }}" name="nama_lenkap"
                        placeholder="Nama Lengkap" autocomplete="off">
                </div>
            </div>
            <div class="form-group boxed">
                <div class="input-wrapper">
                    <input type="text" class="form-control" value="{{ $karyawan->no_hp }}" name="no_hp"
                        placeholder="No. HP" autocomplete="off">
                </div>
            </div>
            <div class="form-group boxed">
                <div class="input-wrapper">
                    <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off">
                </div>
            </div>
            <div class="custom-file-upload" id="fileUpload1">
                <input type="file" name="foto" id="fileuploadInput" accept=".png, .jpg, .jpeg">
                <label for="fileuploadInput">
                    <span>
                        <strong>
                            <ion-icon name="cloud-upload-outline" role="img" class="md hydrated"
                                aria-label="cloud upload outline"></ion-icon>
                            <i>Tap to Upload</i>
                        </strong>
                    </span>
                </label>
            </div>
            <div class="form-group boxed">
                <div class="input-wrapper">
                    <button type="submit" class="btn btn-primary btn-block">
                        <ion-icon name="refresh-outline"></ion-icon>
                        Update
                    </button>
                </div>
            </div>
        </div>
    </form>
    <div class="col">
        <div class="form-group boxed">
            <div class="input-wrapper">
                <a href="/proseslogout" class="fab">
                    <button class="btn btn-danger btn-block">
                        <ion-icon name="plus-outline"></ion-icon>
                        Logout
                    </button>
            </div>
        </div>
    </div>
@endsection
