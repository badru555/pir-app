@extends('dashboard.layout')
@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>

    <link type="text/css" href="/assets/css/flatpickr.css" rel="stylesheet">
    <link type="text/css" href="/assets/css/flatpickr-airbnb.css" rel="stylesheet">

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
@endsection
@section('script')
    <div class="modal" id="add_batch_modal" tabindex="-1" aria-labelledby="add_batch_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add_batch_modalLabel" style="cursor: default;">Tambah Jadwal PIR</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/batches" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label" for="startdate">Tanggal Mulai:</label>
                                    <input type="date" class="form-control" id="startdate" name="startdate">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label" for="enddate">Tanggal Akhir:</label>
                                    <input type="date" class="form-control" id="enddate" name="enddate">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="application_id" value="{{ $application->id }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="add_risk_tolist">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            Highcharts.chart('container', {

                title: {
                    text: 'Kepuasan Pengguna',
                    align: 'center'
                },

                credits: {
                    enabled: false
                },

                yAxis: {
                    min: 0,
                    title: {
                        text: 'Nilai'
                    },
                    allowDecimals: false,
                },

                xAxis: {
                    categories: <?= json_encode(array_keys($surveyresult_perbatch)) ?>,
                    accessibility: {
                        description: 'PIR Batches'
                    }
                },

                legend: {
                    enabled: false
                },

                series: [{
                    name: 'Nilai',
                    data: <?= json_encode(array_values($surveyresult_perbatch)) ?>
                }]

            });
        })
    </script>
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
        <div class="container-fluid page__container">

            <div class="mb-24pt">
                <a href="" class="chip chip-outline-secondary">{{ $application->applicationplatform->platform }}</a>
            </div>

            <div class="d-flex flex-column flex-md-row mb-16pt">
                <div class="mb-16pt mb-md-0 mr-md-16pt">
                    <div class="rounded p-relative o-hidden overlay overlay--primary">
                        <img class="img-fluid rounded"
                            src="{{ $application->image != null ? '/storage/' . $application->image : 'https://via.placeholder.com/100x65?text=Aplikasi' }}"
                            alt="image" style="width: 100px !important;">
                        <div class="overlay__content"></div>
                    </div>
                </div>
                <div class="flex">
                    <p class="lead measure-paragraph-max">{{ $application->description }}</p>
                </div>
            </div>

            <div class="page-separator">
                <div class="page-separator__text">Jadwal PIR <button type="button"
                        class="btn btn-sm btn-rounded btn-primary mx-1" data-toggle="modal"
                        data-target="#add_batch_modal">Tambah Batch</button></div>
            </div>
            @if (session()->has('message'))
                <div class="alert alert-info" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <div class="card table-responsive">
                <table class="table table-flush table-nowrap">
                    <thead>
                        <tr>
                            <th>Batch</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Berakhir</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($application->batch as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('d M Y', strtotime($item->startdate)) }}</td>
                                <td>{{ date('d M Y', strtotime($item->enddate)) }}</td>
                                @if ($item->applicationdocument)
                                    <td class="text-right">
                                        <div class="d-inline-flex align-items-center">
                                            <a href="/draft/{{ $item->applicationdocument->id }}"
                                                class="btn btn-sm btn-outline-secondary mr-16pt">
                                                Lihat dokumen PIR
                                                <i class="icon--right material-icons">keyboard_arrow_right</i>
                                            </a>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="page-separator mt-5">
                <div class="page-separator__text">Hasil Survey <a href="/surveylist/{{ $application->id }}"
                        class="btn btn-sm btn-success btn-rounded mx-1">Lihat Survey</a></div>
            </div>
            <div class="card">
                <div class="card-body">
                    <figure class="highcharts-figure">
                        <div id="container"></div>
                    </figure>
                </div>
            </div>


            {{-- <div class="page-separator">
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
            </div> --}}
        </div>
    </div>
@endsection
