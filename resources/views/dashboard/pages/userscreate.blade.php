@extends('dashboard.layout')
@section('content')
    <div class="pt-32pt">
        <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
            <div class="flex d-flex flex-column flex-sm-row align-items-center">

                <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                    <h2 class="mb-0">Tambah pengguna baru</h2>

                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>

                        <li class="breadcrumb-item">
                            <a href="#">Pengguna</a>
                        </li>

                        <li class="breadcrumb-item active">

                            Tambah

                        </li>

                    </ol>

                </div>
            </div>

        </div>
    </div>

    <div class="container page__container page-section">

        <form action="/users" method="POST">
            @csrf

            <div class="row mb-32pt">
                <div class="col-md-6 d-flex align-items-center">
                    <div class="flex" style="max-width: 100%">
                        @if (session()->has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label class="form-label" for="name">Full Name:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="username">Username:</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                id="username" name="username">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email">Email:</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="userrole_id">Role:</label>
                            <select name="userrole_id" id="userrole_id" class="form-control">
                                <option selected disabled>Select</option>
                                @foreach ($userroles as $item)
                                    <option value="{{ $item->id }}">{{ $item->role }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="password">Initial Password:</label>
                            <input type="text" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-outline-primary btn-rounded">Buat Baru</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
