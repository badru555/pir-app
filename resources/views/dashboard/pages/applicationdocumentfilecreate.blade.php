@extends('dashboard.layout')
@section('content')
    <div class="pt-32pt">
        <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
            <div class="flex d-flex flex-column flex-sm-row align-items-center">

                <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                    <h2 class="mb-0">Tambah Dokumen PIR Aplikasi: {{ $application->name }}</h2>

                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>

                        <li class="breadcrumb-item">

                            <a href="/applications">Dokumen PIR</a>

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

        <form action="/applicationdocuments" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row mb-32pt">
                <div class="col-lg-4">
                    <div class="page-separator">
                        <div class="page-separator__text">Detail Dokumen PIR</div>
                    </div>
                    <p class="card-subtitle text-70 mb-16pt mb-lg-0">
                        Form informasi detail dokumen.
                    </p>
                </div>
                <div class="col-lg-8 d-flex align-items-center">
                    <div class="flex" style="max-width: 100%">
                        @if (session()->has('message'))
                            <div class="alert alert-info" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <input type="hidden" name="application_id" value="{{ $application->id }}">
                        <div class="form-group">
                            <label class="form-label" for="name">Label:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="batch">Batch:</label>
                            <input type="number" class="form-control" id="batch" name="batch" min="1"
                                max="10">
                        </div>
                        <div class="form-group m-0">
                            <div class="custom-file">
                                <input type="file" id="file" name="file" class="custom-file-input">
                                <label for="file" class="custom-file-label">File Dokumen</label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-primary btn-rounded float-right">Unggah</button>
        </form>

    </div>
@endsection
