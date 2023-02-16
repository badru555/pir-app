@extends('layout')
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
                    <h2 class="mb-0">Create Invoice {{ $quotation->client->client }}</h2>

                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>

                        <li class="breadcrumb-item">
                            <a href="#">Invoices</a>
                        </li>

                        <li class="breadcrumb-item active">

                            Create

                        </li>

                    </ol>

                </div>
            </div>

        </div>
    </div>

    <div class="container page__container page-section">

        <form action="/invoices" method="POST">
            @csrf

            <div class="row mb-32pt">
                <div class="col-lg-12 d-flex align-items-center">
                    <div class="flex" style="max-width: 100%">

                        <div class="form-group">
                            <label class="form-label" for="invoiceref">No Invoice:</label>
                            <input type="text" class="form-control" id="invoiceref" name="invoiceref"
                                value="{{ $invoiceref }}" readonly>
                            <input type="hidden" name="quotation_id" value="{{ $quotation->id }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="job">Billing Job:</label>
                            <input type="text" class="form-control" id="job" name="job">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="note">Billing Note:</label>
                            <input type="text" class="form-control" id="note" name="note">
                        </div>
                        <div class="form-group">
                            <label class="form-label d-block">Payment:</label>
                            <div class="custom-control custom-radio d-inline">
                                <input class="custom-control-input" type="radio" id="is_prepaid1" name="is_prepaid"
                                    value="1">
                                <label class="custom-control-label" for="is_prepaid1">
                                    Pre-paid
                                </label>
                            </div>
                            <div class="custom-control custom-radio d-inline ml-3">
                                <input class="custom-control-input" type="radio" id="is_prepaid0" name="is_prepaid"
                                    value="0">
                                <label class="custom-control-label" for="is_prepaid0">
                                    Post-paid
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Overdue Date</label>
                            <input id="overdue" name="overdue" type="hidden" class="form-control flatpickr-input"
                                data-toggle="flatpickr" placeholder="select date...">
                        </div>

                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-primary btn-rounded float-right">Create</button>
        </form>

    </div>
@endsection
@section('script')
    <script src="/assets/vendor/flatpickr/flatpickr.min.js"></script>
    <script src="/assets/js/flatpickr.js"></script>
    <script>
        $("#begindate,#enddate").flatpickr({
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#reportingreport'), {
                toolbar: ['bold', 'italic', 'link', 'bulletedList', 'numberedList']
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#feeoption'), {
                toolbar: ['bold', 'italic', 'link', 'bulletedList', 'numberedList']
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#additional'), {
                toolbar: ['bold', 'italic', 'link', 'bulletedList', 'numberedList']
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#payment'), {
                toolbar: ['bold', 'italic', 'link', 'bulletedList', 'numberedList']
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        $(document).ready(function() {
            $('input[type="checkbox"]').each(function() {
                $(this).prop('checked', false);
            });
            $('#sosmed').click(function() {
                if ($(this).is(':checked')) {
                    $('#socmedlis').removeClass('d-none');
                } else {
                    $('#socmedlis').addClass('d-none');

                }
            });
            $('#konven').click(function() {
                if ($(this).is(':checked')) {
                    $('#medmon').removeClass('d-none');
                } else {
                    $('#medmon').addClass('d-none');

                }
            });
        });
    </script>
@endsection
