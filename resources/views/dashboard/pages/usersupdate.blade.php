@extends('dashboard.layout')
@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>

    <link type="text/css" href="/assets/css/flatpickr.css" rel="stylesheet">
    <link type="text/css" href="/assets/css/flatpickr-airbnb.css" rel="stylesheet">
@endsection
@section('content')
    <div class="pt-32pt">
        <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
            <div class="flex d-flex flex-column flex-sm-row align-items-center">

                <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                    <h2 class="mb-0">Edit Akun</h2>

                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>

                        <li class="breadcrumb-item">
                            <a href="#">Pengguna</a>
                        </li>

                        <li class="breadcrumb-item active">

                            Edit

                        </li>

                    </ol>

                </div>
            </div>

        </div>
    </div>

    <div class="container page__container page-section">

        <form action="/users/{{ $user->id }}" method="POST">
            @method('put')
            @csrf

            <div class="row mb-32pt">
                <div class="col-md-6 d-flex align-items-center">
                    <div class="flex" style="max-width: 100%">
                        <div class="form-group">
                            <label class="form-label" for="name">Nama Lengkap:</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username"
                                value="{{ $user->username }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email">Email:</label>
                            <input type="Email" class="form-control" id="email" name="email"
                                value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="password">Password Baru:</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="confirm_password">Konfirmasi Password Baru:</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                        </div>

                        <button type="submit" class="btn btn-outline-primary btn-rounded">Perbarui</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
