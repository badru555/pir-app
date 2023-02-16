@extends('dashboard.layout')
@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>

    <link type="text/css" href="/assets/css/flatpickr.css" rel="stylesheet">
    <link type="text/css" href="/assets/css/flatpickr-airbnb.css" rel="stylesheet">
@endsection
@section('content')
    <div class="page-section bg-white border-bottom-2">
        <div class="container page__container">

            <div
                class="d-flex flex-column flex-md-row align-items-center align-items-md-start flex mb-16pt text-center text-md-left">

                <div class="flex">
                    <h1 class="h2 measure-lead-max mb-16pt">{{ $application->name }}</h1>


                </div>
            </div>

        </div>
    </div>
    <div class="page-section border-bottom-2">
        <div class="container page__container">

            <div class="mb-24pt">
                <a href="" class="chip chip-outline-secondary">{{ $application->applicationplatform->platform }}</a>
            </div>

            <div class="d-flex flex-column flex-md-row mb-16pt">
                <div class="mb-16pt mb-md-0 mr-md-16pt">
                    <div class="rounded p-relative o-hidden overlay overlay--primary">
                        <img class="img-fluid rounded" src="/storage/{{ $application->image }}" alt="image"
                            style="width: 200px !important;">
                        <div class="overlay__content"></div>
                    </div>
                </div>
                <div class="flex">
                    <p class="lead measure-paragraph-max">{{ $application->description }}</p>
                </div>
            </div>

            <div class="page-separator">
                <div class="page-separator__text">Dokumen Post Implementation Review <a
                        href="/applicationdocuments/create/{{ $application->id }}"
                        class="btn btn-sm btn-rounded btn-primary mx-1">unggah dokumen</a></div>
            </div>
            <div class="card table-responsive">
                <table class="table table-flush table-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Label</th>
                            <th>Tanggal Diunggah</th>
                            <th>Batch ke-</th>
                            <th>Oleh</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($application->applicationdocument as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->label }}</td>
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                <td>{{ $item->batch }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td class="text-right">
                                    <div class="d-inline-flex align-items-center">
                                        <a href="/storage/{{ $item->file }}"
                                            class="btn btn-sm btn-outline-secondary mr-16pt">Lihat dokumen<i
                                                class="icon--right material-icons">keyboard_arrow_right</i></a>
                                        <a href="/storage/{{ $item->file }}" download="{{ $item->label }}"
                                            class="btn btn-sm btn-outline-secondary">Download <i
                                                class="icon--right material-icons">file_download</i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
