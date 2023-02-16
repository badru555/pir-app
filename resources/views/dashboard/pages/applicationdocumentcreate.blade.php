@extends('dashboard.layout')
@section('head')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link type="text/css" href="/assets/css/select2.css" rel="stylesheet">
    <style>
        .inside-card {
            position: absolute;
            left: 1;
            top: 0;
        }
    </style>
@endsection
@section('script')
    <div class="d-none" id="addto_activitypane">
        <div class="card bg-light">
            <div class="card-body">
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for="activitycontrol" class="col-form-label">Aktivitas Kontrol:</label>
                            <textarea class="form-control" id="activitycontrol"></textarea>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="observation" class="col-form-label">Observasi:</label>
                            <textarea class="form-control" id="observation"></textarea>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="status" class="col-form-label">Status:</label>
                            <textarea class="form-control" id="status"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-none" id="form-modal">
        <div class="form-group">
            <label for="risk" class="col-form-label">Resiko:</label>
            <input type="text" class="form-control" id="risk">
        </div>
        <div id="activitypane"></div>
    </div>
    <div class="modal" id="add_risk_modal" tabindex="-1" aria-labelledby="add_risk_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add_risk_modalLabel" style="cursor: default;">Tambah Resiko</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="content">

                    </div>
                    <button class="btn btn-sm btn-rounded btn-warning float-right" id="add_activity">+ tambah
                        aktivitas</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" id="add_risk_tolist">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="add_project_modal" tabindex="-1" aria-labelledby="add_project_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add_project_modalLabel" style="cursor: default;">Tambah Aktivitas Proyek
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-body-project">
                    <div id="content">
                        <div class="form-group">
                            <label for="project" class="col-form-label">Aktivitas Proyek:</label>
                            <input type="text" class="form-control" id="project">
                        </div>
                        <div id="projectpane"></div>
                    </div>
                    <button class="btn btn-sm btn-rounded btn-warning float-right" id="add_activity">
                        + tambah potensi resiko
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" id="add_project_tolist">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#application_id').select2({
                placeholder: 'Pilih aplikasi...'
            });
            // RISK
            var modalbody = $('#form-modal').clone().html();
            var activityform = $('#addto_activitypane').clone().html();
            $('#add_risk_modal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var modal = $(this);
                var fase = button.data('fase');
                modal.find('.modal-body #content').html(modalbody);
                modal.find('.modal-body #content').append('<input type="hidden" value="' + fase +
                    '" id="fase">');

            });
            $('.modal-body #add_activity').on('click', function() {
                var fase = $('#content #fase').val();
                $('.modal-body #activitypane').append(activityform);
                $('.modal-body #activitypane #activitycontrol').attr('name', 'activity' + fase + '[]');
                $('.modal-body #activitypane #observation').attr('name', 'observation' + fase + '[]');
                $('.modal-body #activitypane #status').attr('name', 'status' + fase + '[]');
            });
            $('#add_risk_tolist').on('click', function(e) {
                e.preventDefault();
                var fase = $('#content #fase').val();
                var number = $('#risks' + fase + ' li').length;
                number = number + 1;

                var number_activities = $('.modal-body #activitypane .card').length;

                var risk = $('#content #risk').val();
                var inputrisk = '<input type="text" class="form-control-flush" value="' + risk +
                    '" readonly name="observation_risk' + fase + '[]"> (' + number_activities +
                    ' aktivitas kontrol)'
                $('#risks' + fase).append('<li>Resiko ' + number + ': ' + inputrisk + '</li>');

                var activitypane = $('.modal-body #activitypane').clone();
                $('#activitycontrolform').append(activitypane);
                $('.modal-body #content').empty();
                $('#add_risk_modal').modal('hide');
            });
            // PROJECT
            $('#add_project_modal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var modal = $(this);
                var fase = button.data('fase');
                modal.find('.modal-body-project #content').append('<input type="hidden" value="' + fase +
                    '" id="fase">');
                console.log('shown');
            });
        });
    </script>
@endsection
@section('content')
    <div class="pt-32pt">
        <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
            <div class="flex d-flex flex-column flex-sm-row align-items-center">
                <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                    <h2 class="mb-0">Buat Dokumen PIR</h2>
                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
                        <li class="breadcrumb-item">
                            <a href="/applications">Dokumen PIR</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Buat
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container page__container page-section">

        <form action="/applicationdocuments" method="POST">
            @csrf
            <div class="row mb-32pt">
                <div class="col-lg-3">
                    <div class="page-separator">
                        <div class="page-separator__text">Detail Dokumen PIR</div>
                    </div>
                    <p class="card-subtitle text-70 mb-16pt mb-lg-0">
                        Form informasi detail dokumen.
                    </p>
                </div>
                <div class="col-lg-9 d-flex align-items-center">
                    <div class="flex" style="max-width: 100%">
                        @if (session()->has('message'))
                            <div class="alert alert-info" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label class="form-label" for="application_id">Aplikasi:</label> <br>
                            <select name="application_id" id="application_id" class="form-control" style="width: 100%">
                                <option></option>
                                @foreach ($applications as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label class="form-label" for="batch">Batch (PIR ke ...):</label>
                            <input type="number" class="form-control" id="batch" name="batch" min="1"
                                max="10">
                        </div>

                    </div>
                </div>
            </div>
            <div class="row mb-32pt">
                <div class="col-lg-3">
                    <div class="page-separator">
                        <div class="page-separator__text">Observasi Pengawasan Manajemen Proyek</div>
                    </div>
                    <p class="card-subtitle text-70 mb-16pt mb-lg-0">
                        Form Observasi Pengawasan Manajemen Proyek.
                    </p>
                </div>
                <div class="col-lg-9 d-flex align-items-center">
                    <div class="flex" style="max-width: 100%">
                        <div class="form-group">
                            <label class="form-label" for="batch">Fase Post Go-Live Support;</label>
                            <ul id="risks1"></ul>
                            <div class="form-control btn btn-sm btn-outline-warning btn-rounded" data-fase="1"
                                data-toggle="modal" data-target="#add_risk_modal">
                                Tambah Resiko</div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="batch">Fase QA Principal:</label>
                            <ul id="risks2"></ul>
                            <div class="form-control btn btn-sm btn-outline-warning btn-rounded" data-fase="2"
                                data-toggle="modal" data-target="#add_risk_modal">Tambah Resiko</div>
                        </div>
                        <div class="d-none" id="activitycontrolform"></div>
                    </div>
                </div>
            </div>
            <div class="row mb-32pt">
                <div class="col-lg-3">
                    <div class="page-separator">
                        <div class="page-separator__text">Daftar Resiko dan Kontrol</div>
                    </div>
                    <p class="card-subtitle text-70 mb-16pt mb-lg-0">
                        Form Daftar Resiko dan Kontrol.
                    </p>
                </div>
                <div class="col-lg-9 d-flex align-items-center">
                    <div class="flex" style="max-width: 100%">
                        <div class="form-group">
                            <label class="form-label" for="batch">Tahap Blueprint;</label>
                            <ul id="projects1"></ul>
                            <div class="form-control btn btn-sm btn-outline-success btn-rounded" data-fase="1"
                                data-toggle="modal" data-target="#add_project_modal">
                                Tambah Aktivitas Proyek
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-rounded float-right">Unggah</button>
        </form>


    </div>
@endsection
