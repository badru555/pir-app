@extends('dashboard.layout')
@section('head')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link type="text/css" href="/assets/css/select2.css" rel="stylesheet">

    <script src="//cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>

    <style>
        .inside-card {
            position: absolute;
            left: 1;
            top: 0;
        }
    </style>
@endsection
@section('script')
    <script>
        CKEDITOR.replace('surveyresult', {
            language: 'in',
            toolbar: [{
                    name: 'clipboard',
                    items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']
                },
                {
                    name: 'editing',
                    items: ['Find', 'Replace', '-', 'SelectAll', '-', 'Scayt']
                },
                {
                    name: 'insert',
                    items: ['Table']
                },
                '/',
                {
                    name: 'styles',
                    items: ['Styles', 'Format']
                },
                {
                    name: 'basicstyles',
                    items: ['Bold', 'Italic', 'Strike', '-', 'RemoveFormat']
                },
                {
                    name: 'paragraph',
                    items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
                }
            ]
        });
        CKEDITOR.replace('planning', {
            language: 'in',
            toolbar: [{
                    name: 'clipboard',
                    items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']
                },
                {
                    name: 'editing',
                    items: ['Find', 'Replace', '-', 'SelectAll', '-', 'Scayt']
                },
                {
                    name: 'insert',
                    items: ['Table']
                },
                '/',
                {
                    name: 'styles',
                    items: ['Styles', 'Format']
                },
                {
                    name: 'basicstyles',
                    items: ['Bold', 'Italic', 'Strike', '-', 'RemoveFormat']
                },
                {
                    name: 'paragraph',
                    items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
                }
            ]
        });
    </script>

    <div class="d-none">
        <div id="addto_activitypane">
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
        <div id="addto_riskpane">
            <div class="card bg-light riskcard">
                <div class="card-body">
                    <div class="form-group">
                        <label for="project_risk" class="col-form-label">Resiko:</label>
                        <input type="text" class="form-control" id="project_risk">
                    </div>
                    <div id="migitasipane"></div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-sm btn-rounded btn-info float-right add_migitasi">
                        + tambah migitasi kontrol
                    </button>
                </div>
            </div>
        </div>
        <div id="addto_migitasipane">
            <div class="card text-white bg-secondary">
                <div class="card-body">
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="migitasi" class="col-form-label">Migitasi Kontrol:</label>
                                <textarea class="form-control" id="migitasi"></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="isdone" class="col-form-label">Status:</label>
                                <select id="isdone" class="form-control">
                                    <option value="1">Selesai</option>
                                    <option value="0">Belum Selesai</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="note" class="col-form-label">Keterangan:</label>
                                <textarea class="form-control" id="note"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="form-modal">
            <div class="form-group">
                <label for="risk" class="col-form-label">Resiko:</label>
                <input type="text" class="form-control" id="risk">
            </div>
            <div id="activitypane"></div>
        </div>
        <div id="form-modal-project">
            <div class="form-group">
                <label for="project" class="col-form-label">Aktivitas Proyek:</label>
                <input type="text" class="form-control" id="project">
            </div>
            <div id="riskpane"></div>
        </div>
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
    <div class="modal" id="add_project_modal" tabindex="-1" aria-labelledby="add_project_modalLabel"
        aria-hidden="true">
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

                    </div>
                    <button class="btn btn-sm btn-rounded btn-warning float-right" id="add_risk">
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

            $("#application_id").change(function() {
                console.log('changed');
                if ($('#application_id').val() !== '') {
                    console.log($('#application_id').val());
                    var application_id = $('#application_id').val();
                    loadBatchList(application_id);
                    $('#batch').removeClass('d-none');
                } else {
                    $('#batch').addClass('d-none');
                }
            });

            // replace with new data
            function loadBatchList(application_id) {

                var options = [];
                $.ajax({
                    type: 'GET', //THIS NEEDS TO BE GET
                    url: '/getbatchlist/' + application_id,
                    dataType: 'json',
                    success: function(data) {
                        $.each(data, function(index, item) {
                            options.push({
                                text: item.text,
                                id: item.id
                            });
                        });
                        $('#batch_id').empty().select2({
                            placeholder: 'Pilih batch...',
                            data: options
                        });
                    },
                    error: function(req, err) {
                        console.log('Error: ' + err);
                    }
                });


            }

            // RISK
            var modalbody = $('#form-modal').clone().html();
            var modalbodyproject = $('#form-modal-project').clone().html();
            var activityform = $('#addto_activitypane').clone().html();
            var riskform = $('#addto_riskpane').clone().html();
            var migitasiform = $('#addto_migitasipane').clone().html();
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
                var index = $('#risks' + fase + ' li').length;
                $('.modal-body #activitypane').append(activityform).end()
                    .find('.modal-body #activitypane #activitycontrol')
                    .attr('name', 'activity[' + fase + '][][]').end()
                    .find('.modal-body #activitypane #observation')
                    .attr('name', 'observation[' + fase + '][][]').end()
                    .find('.modal-body #activitypane #status')
                    .attr('name', 'status[' + fase + '][][]').end();
            });
            $('#add_risk_tolist').on('click', function(e) {
                e.preventDefault();
                var fase = $('#content #fase').val();
                var number = $('#risks' + fase + ' li').length;
                number = number + 1;

                var number_activities = $('.modal-body #activitypane .card').length;

                var risk = $('#content #risk').val();
                var inputrisk = '<input type="text" class="form-control-flush" value="' + risk +
                    '" readonly name="observation_risk[' + fase + '][]"> (' +
                    number_activities +
                    ' aktivitas kontrol)'
                $('#risks' + fase).append('<li>Resiko ' + number + ': ' + inputrisk +
                    ' <a class="badge badge-danger delete' + fase + number + '">delete</a></li>').find(
                    '.delete' + fase + number).on(
                    'click',
                    function() {
                        $(this).parent().remove();
                        $('.activitypane' + fase + number).remove();
                        console.log('deleting activitypane' + fase + number);
                    }).end();

                var activitypane = $('.modal-body #activitypane').addClass('activitypane' + fase + number)
                    .clone();
                $('#activitycontrolform').append(activitypane);
                $('.modal-body #content').empty();
                $('#add_risk_modal').modal('hide');
            });

            // PROJECT
            $('#add_project_modal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var modal = $(this);
                var fase = button.data('fase');
                modal.find('.modal-body-project #content').html(modalbodyproject);
                modal.find('.modal-body-project #content').append('<input type="hidden" value="' + fase +
                    '" id="fase">');
            });
            // --- level 2
            $('.modal-body-project #add_risk').on('click', function() {
                var fase = $('.modal-body-project #content #fase').val();
                var i = $('.modal-body-project #riskpane .riskcard').length;
                var number = $('#projects' + fase + ' li').length;
                $('.modal-body-project #riskpane').append(riskform).end()
                    .find('.card:last').attr('id', 'riskitem' + i).end()
                    .find('input#project_risk:last').attr('name', 'project_risk[' + fase + '][][]').end()
                    .find('.add_migitasi:last').on('click', function() {
                        $('.modal-body-project #riskitem' + i + ' #migitasipane').append(
                            migitasiform);
                        var selectform = $(this).parent().prev().find('#migitasipane');
                        selectform.find('#migitasi:last').attr('name', 'migitasi[' + fase +
                            '][][][]');
                        selectform.find('#isdone:last').attr('name', 'isdone[' + fase +
                            '][][][]');
                        selectform.find('#note:last').attr('name', 'note[' + fase +
                            '][][][]');
                    }).end();
            });
            $('#add_project_tolist').on('click', function(e) {
                e.preventDefault();
                var fase = $('.modal-body-project #content #fase').val();
                // -- level 1 : project
                var index = $('#projects' + fase + ' li').length;
                number = index + 1;
                var number_risk = $('.modal-body-project #riskpane .riskcard').length;
                var risk = $('.modal-body-project #project').val();
                var inputrisk = '<input type="text" class="form-control-flush" value="' + risk +
                    '" readonly name="projects[' + fase + '][]"> (' + number_risk +
                    ' potensi resiko)'
                $('#projects' + fase).append('<li>Aktivitas Proyek ' + number + ': ' + inputrisk +
                        ' <a class="badge badge-danger deleteproject' + fase + index + '">delete</a></li>')
                    .find(
                        '.deleteproject' + fase + index).on(
                        'click',
                        function() {
                            $(this).parent().remove();
                            $('.riskpane' + fase + index).remove();
                            console.log('deleting riskpane' + fase + index);
                        }).end();

                // --- level 2 : potensi resiko of project ---- level 3 : imigasi
                var activitypane = $('.modal-body-project #riskpane').addClass('riskpane' + fase + index)
                    .clone();
                $('#projects' + fase + 'risk').append(activitypane);

                $('.modal-body-project #content').empty();
                $('#add_project_modal').modal('hide');
            });

            // $('.deletelist').on('click', function() {
            //     $(this).parent().remove();
            //     console.log('neng jelek');
            // });
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

        <form action="/applicationdocuments" method="POST" enctype="multipart/form-data">
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
                        <div class="form-group d-none" id="batch">
                            <label class="form-label" for="batch_id">Batch:</label> <br>
                            <select name="batch_id" id="batch_id" class="form-control" style="width: 100%"></select>
                        </div>
                        {{-- <div class="form-group">
                            <label class="form-label" for="batch">Batch (PIR ke ...):</label>
                            <input type="number" class="form-control" id="batch" name="batch" min="1"
                                max="10">
                        </div> --}}

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
                            <ul id="risks0"></ul>
                            <div class="form-control btn btn-sm btn-outline-warning btn-rounded" data-fase="0"
                                data-toggle="modal" data-target="#add_risk_modal">
                                Tambah Resiko</div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="batch">Fase QA Principal:</label>
                            <ul id="risks1"></ul>
                            <div class="form-control btn btn-sm btn-outline-warning btn-rounded" data-fase="1"
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
                            <label class="form-label" for="batch">Tahap Blueprint:</label>
                            <ul id="projects0"></ul>
                            <div id="projects0risk" class="d-none"></div>
                            <div class="form-control btn btn-sm btn-outline-success btn-rounded" data-fase="0"
                                data-toggle="modal" data-target="#add_project_modal">
                                Tambah Aktivitas Proyek
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="batch">Tahap Pengembangan / Pelaksanaan UAT:</label>
                            <ul id="projects1"></ul>
                            <div id="projects1risk" class="d-none"></div>
                            <div class="form-control btn btn-sm btn-outline-success btn-rounded" data-fase="1"
                                data-toggle="modal" data-target="#add_project_modal">
                                Tambah Aktivitas Proyek
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="batch">Tahap System Go-Live:</label>
                            <ul id="projects2"></ul>
                            <div id="projects2risk" class="d-none"></div>
                            <div class="form-control btn btn-sm btn-outline-success btn-rounded" data-fase="2"
                                data-toggle="modal" data-target="#add_project_modal">
                                Tambah Aktivitas Proyek
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="batch">Tahap Post Go-Live:</label>
                            <ul id="projects3"></ul>
                            <div id="projects3risk" class="d-none"></div>
                            <div class="form-control btn btn-sm btn-outline-success btn-rounded" data-fase="3"
                                data-toggle="modal" data-target="#add_project_modal">
                                Tambah Aktivitas Proyek
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-32pt">
                <div class="col-lg-3">
                    <div class="page-separator">
                        <div class="page-separator__text">Lain-lain</div>
                    </div>
                    <p class="card-subtitle text-70 mb-16pt mb-lg-0">
                        Form informasi lain.
                    </p>
                </div>
                <div class="col-lg-9 d-flex align-items-center">
                    <div class="flex" style="max-width: 100%">
                        <div class="form-group">
                            <div class="form-group">
                                <label class="form-label" for="surveyresult">Hasil Survey:</label>
                                <textarea name="surveyresult" id="surveyresult" rows="3" class="form-control"></textarea>
                            </div>
                            {{-- <div class="custom-file">
                                <input type="file" id="surveyresult_image" name="surveyresult_image"
                                    class="custom-file-input">
                                <label for="surveyresult_image" class="custom-file-label">Tambahkan Hasil Survey</label>
                            </div> --}}
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" id="pentestresult_image" name="pentestresult_image"
                                    class="custom-file-input">
                                <label for="pentestresult_image" class="custom-file-label">Tambahkan Hasil Pentest</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="planning">Rencana Perbaikan Kedepan:</label>
                            <textarea name="planning" id="planning" rows="3" class="form-control"></textarea>
                        </div>

                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-rounded float-right">Unggah</button>
        </form>


    </div>
@endsection
