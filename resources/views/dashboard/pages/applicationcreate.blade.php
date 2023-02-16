@extends('dashboard.layout')
@section('content')
    <div class="pt-32pt">
        <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
            <div class="flex d-flex flex-column flex-sm-row align-items-center">

                <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                    <h2 class="mb-0">Tambah Aplikasi</h2>

                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>

                        <li class="breadcrumb-item">

                            <a href="/applications">Aplikasi</a>

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

        <form action="/applications" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row mb-32pt">
                <div class="col-lg-4">
                    <div class="page-separator">
                        <div class="page-separator__text">Detail Aplikasi</div>
                    </div>
                    <p class="card-subtitle text-70 mb-16pt mb-lg-0">
                        Form informasi detail aplikasi.
                    </p>
                </div>
                <div class="col-lg-8 d-flex align-items-center">
                    <div class="flex" style="max-width: 100%">
                        @if (session()->has('message'))
                            <div class="alert alert-info" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label class="form-label" for="name">Nama Aplikasi:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="link">Link:</label>
                            <input type="text" class="form-control" id="link" name="link">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="applicationplatform_id">Platform:</label>
                            <select name="applicationplatform_id" id="applicationplatform_id" class="form-control">
                                <option selected disabled>Select</option>
                                @foreach ($platforms as $item)
                                    <option value="{{ $item->id }}">{{ $item->platform }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="description">Deskripsi:</label>
                            <textarea name="description" id="description" rows="2" class="form-control"></textarea>
                        </div>
                        <div class="form-group m-0">
                            <div class="custom-file">
                                <input type="file" id="image" name="image" class="custom-file-input">
                                <label for="image" class="custom-file-label">Gambar Aplikasi</label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-primary btn-rounded float-right">Submit</button>
        </form>

    </div>
@endsection
