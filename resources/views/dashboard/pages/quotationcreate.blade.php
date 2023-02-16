@extends('layout')
@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>

    <link type="text/css" href="/assets/css/flatpickr.css" rel="stylesheet">
    <link type="text/css" href="/assets/css/flatpickr-airbnb.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link type="text/css" href="/assets/css/select2.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    <style>
        .tagify {
            width: 100%;
            background-color: white;
        }
    </style>
@endsection
@section('content')
    <div class="pt-32pt">
        <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
            <div class="flex d-flex flex-column flex-sm-row align-items-center">

                <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                    <h2 class="mb-0">Create Form</h2>

                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>

                        <li class="breadcrumb-item">

                            <a href="/quotations">Quotations</a>

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

        <form action="/quotations" method="POST">
            @csrf

            <div class="row mb-32pt">
                <div class="col-lg-4">
                    <div class="page-separator">
                        <div class="page-separator__text">Client Info</div>
                    </div>
                    <p class="card-subtitle text-70 mb-16pt mb-lg-0">
                        Client detail filling form.
                    </p>
                </div>
                <div class="col-lg-8 d-flex align-items-center">
                    <div class="flex" style="max-width: 100%">
                        <div class="form-group">
                            <label class="form-label" for="client_id">Client:</label> <br>
                            <select name="client_id" id="client_id" class="form-control" style="width: 100%">
                                <option></option>
                                @foreach ($clients as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->client }}
                                        </optio>
                                @endforeach
                            </select>

                        </div>

                        <div class="form-group">
                            <label class="form-label d-block">Scope of Work:</label>
                            <div class="custom-control custom-checkbox d-inline">
                                <input class="custom-control-input" type="checkbox" id="sosmed" name="sosmed">
                                <label class="custom-control-label" for="sosmed">
                                    Social Media Listening
                                </label>
                            </div>
                            <div class="custom-control custom-checkbox d-inline ml-3">
                                <input class="custom-control-input" type="checkbox" id="konven" name="konven">
                                <label class="custom-control-label" for="konven">
                                    Conventional Media Monitoring
                                </label>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="row mb-32pt">
                <div class="col-lg-4">
                    <div class="page-separator">
                        <div class="page-separator__text">Quotation Info</div>
                    </div>
                    <p class="card-subtitle text-70 mb-16pt mb-lg-0">
                        Quotataion Information.
                    </p>
                </div>
                <div class="col-lg-8 d-flex align-items-center">
                    <div class="flex" style="max-width: 100%">
                        <div class="form-group">
                            <label class="form-label">Starting Date</label>
                            <input id="begindate" name="begindate" type="hidden" class="form-control flatpickr-input"
                                data-toggle="flatpickr" placeholder="select date...">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Ending Date</label>
                            <input id="enddate" name="enddate" type="hidden" class="form-control flatpickr-input"
                                data-toggle="flatpickr" placeholder="select date...">
                        </div>


                        <div class="form-group">
                            <label class="form-label" for="department">Department:</label>
                            <select name="department" id="department" class="form-control">
                                <option selected disabled>Select</option>
                                @foreach ($departments as $item)
                                    <option value="{{ $item->id }}">{{ $item->department }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-32pt d-none" id="socmedlis">
                <div class="col-lg-4">
                    <div class="page-separator">
                        <div class="page-separator__text">Scope of Work:<br>Social Media Listening</div>
                    </div>
                    <p class="card-subtitle text-70 mb-16pt mb-lg-0">
                        Scope of Work Social Media Listening Details
                    </p>
                </div>
                <div class="col-lg-8 d-flex align-items-center">
                    <div class="flex" style="max-width: 100%">
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="with_socmed_keywords">
                                <label class="custom-control-label" for="with_socmed_keywords">
                                    <label class="form-label" for="with_socmed_keywords">
                                        Keywords to be Monitored:
                                    </label>
                                </label>
                            </div>
                            <div id="target" class="d-none">
                                <input type="text" id="keywords" name="keywords" class="tagify"
                                    placeholder="press tab to add more">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="with_socmed_accounts">
                                <label class="custom-control-label" for="with_socmed_accounts">
                                    <label class="form-label" for="with_socmed_accounts">
                                        Official Account to be Monitored:
                                    </label>
                                </label>
                            </div>
                            <div id="target" class="d-none">
                                <input type="text" id="officialaccount" name="accounts" class="tagify"
                                    placeholder="press tab to add more">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="flatpickrSample05">Online Cutoff</label>
                            <input id="flatpickrSample05" type="text" class="form-control"
                                placeholder="Flatpickr time example" data-toggle="flatpickr"
                                data-flatpickr-enable-time="true" data-flatpickr-no-calendar="true"
                                data-flatpickr-alt-format="H:i" data-flatpickr-date-format="H:i:s" value="09:00:00"
                                name="onlinecutoff">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="with_socmed_postcategories">
                                <label class="custom-control-label" for="with_socmed_postcategories">
                                    <label class="form-label" for="with_socmed_postcategories">
                                        Post Categories:
                                    </label>
                                </label>
                            </div>
                            <div id="target" class="d-none">
                                <input type="text" id="postcategories" name="postcategories" class="tagify"
                                    placeholder="press tab to add more">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Channels:</label>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="fb" name="channels[]"
                                    value="facebook">
                                <label class="custom-control-label" for="fb">
                                    Facebook
                                </label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="ig" name="channels[]"
                                    value="instagram">
                                <label class="custom-control-label" for="ig">
                                    Instagram
                                </label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="ln" name="channels[]"
                                    value="linkedin">
                                <label class="custom-control-label" for="ln">
                                    LinkedIn
                                </label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="ti" name="channels[]"
                                    value="tiktok">
                                <label class="custom-control-label" for="ti">
                                    Tiktok
                                </label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="tw" name="channels[]"
                                    value="twitter">
                                <label class="custom-control-label" for="tw">
                                    Twitter
                                </label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="yt" name="channels[]"
                                    value="youtube">
                                <label class="custom-control-label" for="yt">
                                    Youtube
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="reportingreport">Reporting Report</label>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="with_socmed_dailyreport"
                                    value="1" name="socmed_reports[]">
                                <label class="custom-control-label" for="with_socmed_dailyreport">
                                    <label class="form-label" for="with_socmed_dailyreport">
                                        Daily Report
                                    </label>
                                </label>
                            </div>
                            {{-- <label class="form-label">Semester Report:</label> --}}
                            <div class="d-none ml-3" id="target">
                                <div class="form-group">
                                    <label class="form-label d-block">Language Delivery:</label>
                                    <div class="custom-controls-stacked">
                                        <div class="custom-control custom-radio d-inline">
                                            <input id="sm_language0" name="sm_dailyreportlanguage" type="radio"
                                                class="custom-control-input" value="1">
                                            <label for="sm_language0" class="custom-control-label">English</label>
                                        </div>
                                        <div class="custom-control custom-radio d-inline ml-3">
                                            <input id="sm_language1" name="sm_dailyreportlanguage" type="radio"
                                                class="custom-control-input" value="2">
                                            <label for="sm_language1" class="custom-control-label">Indonesian</label>
                                        </div>
                                        <div class="custom-control custom-radio d-inline ml-3">
                                            <input id="sm_language" name="sm_dailyreportlanguage" type="radio"
                                                class="custom-control-input" value="3">
                                            <label for="sm_language" class="custom-control-label">Dual (English and
                                                Indonesian)</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="flatpickrSample05">Time Delivery</label>
                                    <input id="flatpickrSample05" type="text" class="form-control"
                                        placeholder="Flatpickr time example" data-toggle="flatpickr"
                                        data-flatpickr-enable-time="true" data-flatpickr-no-calendar="true"
                                        data-flatpickr-alt-format="H:i" data-flatpickr-date-format="H:i:s"
                                        value="11:30:00" name="sm_dailyreporttime">
                                </div>
                                <div class="form-group">
                                    <label class="form-label d-block">Analysis include:</label>
                                    @foreach ($socmedreporttypes as $item)
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox"
                                                id="sm_daily{{ $item->id }}" name="dailyreports[]"
                                                value="{{ $item->id }}">
                                            <label class="custom-control-label" for="sm_daily{{ $item->id }}">
                                                {{ $item->type }}
                                            </label>
                                        </div>
                                    @endforeach
                                    <div id="sm_dailyreportnotes">
                                        <div class="custom-control custom-checkbox sm_dailynote">
                                            <input class="custom-control-input" type="checkbox" id="sm_newdailynote1"
                                                name="sm_newdailynote1">
                                            <label class="custom-control-label" for="sm_newdailynote1">
                                                <input type="text" class="form-control-flush"
                                                    placeholder="new note..." size="70" name="sm_newdailyreports[]">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <label class="custom-control-label">
                                            <span class="badge badge-success" id="sm_addsocmeddailynote">add note</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="with_socmed_monthlyreport"
                                    value="2" name="socmed_reports[]">
                                <label class="custom-control-label" for="with_socmed_monthlyreport">
                                    <label class="form-label" for="with_socmed_monthlyreport">
                                        Monthly Report
                                    </label>
                                </label>
                            </div>
                            {{-- <label class="form-label">Semester Report:</label> --}}
                            <div class="d-none ml-3" id="target">
                                <div class="form-group">
                                    <label class="form-label d-block">Time Delivery:</label>
                                    <div class="custom-controls-stacked">
                                        <div class="custom-control custom-radio mb-2">
                                            <input id="monthlydelivery" name="monthlyreporttimedelivery" type="radio"
                                                class="custom-control-input" value="1">
                                            <label for="monthlydelivery" class="custom-control-label">
                                                on
                                                <select name="" id="">
                                                    <option value="">Monday</option>
                                                    <option value="">Tuesday</option>
                                                    <option value="">Wednesday</option>
                                                    <option value="">Thursday</option>
                                                    <option value="">Friday</option>
                                                </select>
                                                every
                                                <select name="" id="">
                                                    <option value="">the first week</option>
                                                    <option value="">the second week</option>
                                                    <option value="">the third week</option>
                                                    <option value="">the last week</option>
                                                </select>
                                                of following month
                                            </label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="monthlydelivery2" name="monthlyreporttimedelivery" type="radio"
                                                class="custom-control-input" value="1">
                                            <label for="monthlydelivery2" class="custom-control-label">
                                                on
                                                <input type="number" min="1" max="30" value="1">
                                                following month
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label d-block">Analysis include:</label>
                                    @foreach ($socmedreporttypes as $item)
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox"
                                                id="sm_monthly{{ $item->id }}" name="monthlyreports[]"
                                                value="{{ $item->id }}">
                                            <label class="custom-control-label" for="sm_monthly{{ $item->id }}">
                                                {{ $item->type }}
                                            </label>
                                        </div>
                                    @endforeach
                                    <div id="sm_monthlyreportnotes">
                                        <div class="custom-control custom-checkbox sm_monthlynote">
                                            <input class="custom-control-input" type="checkbox" id="sm_newmonthlynote1"
                                                name="sm_newmonthlynote1">
                                            <label class="custom-control-label" for="sm_newmonthlynote1">
                                                <input type="text" class="form-control-flush"
                                                    placeholder="new note..." size="70"
                                                    name="sm_newmonthlyreports[]">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <label class="custom-control-label">
                                            <span class="badge badge-success" id="sm_addsocmedmonthlynote">add note</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="with_socmed_semesterreport"
                                    value="3" name="socmed_reports[]">
                                <label class="custom-control-label" for="with_socmed_semesterreport">
                                    <label class="form-label" for="with_socmed_semesterreport">
                                        semester Report
                                    </label>
                                </label>
                            </div>
                            {{-- <label class="form-label">Semester Report:</label> --}}
                            <div class="d-none ml-3" id="target">

                                @foreach ($socmedreporttypes as $item)
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox"
                                            id="sm_semester{{ $item->id }}" name="semesterreports[]"
                                            value="{{ $item->id }}">
                                        <label class="custom-control-label" for="sm_semester{{ $item->id }}">
                                            {{ $item->type }}
                                        </label>
                                    </div>
                                @endforeach
                                <div id="sm_semesterreportnotes">
                                    <div class="custom-control custom-checkbox sm_semesternote">
                                        <input class="custom-control-input" type="checkbox" id="sm_newsemesternote1"
                                            name="sm_newsemesternote1">
                                        <label class="custom-control-label" for="sm_newsemesternote1">
                                            <input type="text" class="form-control-flush" placeholder="new note..."
                                                size="70" name="sm_newsemesterreports[]">
                                        </label>
                                    </div>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <label class="custom-control-label">
                                        <span class="badge badge-success" id="sm_addsocmedsemesternote">add note</span>
                                    </label>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
            <div class="row mb-32pt d-none" id="medmon">
                <div class="col-lg-4">
                    <div class="page-separator">
                        <div class="page-separator__text">Scope of Work:<br>Media Monitoring</div>
                    </div>
                    <p class="card-subtitle text-70 mb-16pt mb-lg-0">
                        Scope of Work Media Monitoring Details
                    </p>
                </div>
                <div class="col-lg-8 d-flex align-items-center">
                    <div class="d-none">
                        <div class="issuepane">
                            <div class="form-group">
                                <label class="form-label" for="issues[]" id="issuelabel">Issue #1</label>
                                <input type="text" class="form-control" name="issues[]" id="issues[]">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="subissues[]" id="subissueslabel">Sub Issues #1
                                    (add with tab)</label>
                                <input type="text" class="tagify" name="subissues[]" id="subissuesinput">
                            </div>
                        </div>
                    </div>
                    <div class="flex" style="max-width: 100%">

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="with_medmon_directmention">
                                <label class="custom-control-label" for="with_medmon_directmention">
                                    <label class="form-label" for="with_medmon_directmention">
                                        Direct Mentions:
                                    </label>
                                </label>
                            </div>
                            <div id="target" class="d-none">
                                <input name="directmention" id="directmention" class="tagify"
                                    placeholder="press tab to add more">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="with_medmon_partnermention">
                                <label class="custom-control-label" for="with_medmon_partnermention">
                                    <label class="form-label" for="with_medmon_partnermention">
                                        Partner Mentions:
                                    </label>
                                </label>
                            </div>
                            <div id="target" class="d-none">
                                <input name="partnermention" id="partnermention" class="tagify"
                                    placeholder="press tab to add more">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="with_medmon_industry">
                                <label class="custom-control-label" for="with_medmon_industry">
                                    <label class="form-label" for="with_medmon_industry">
                                        Industry:
                                    </label>
                                </label>
                            </div>
                            <div id="target" class="d-none">
                                <input name="industry" id="industry" class="tagify"
                                    placeholder="press tab to add more">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="with_medmon_competitor">
                                <label class="custom-control-label" for="with_medmon_competitor">
                                    <label class="form-label" for="with_medmon_competitor">
                                        Competitor:
                                    </label>
                                </label>
                            </div>
                            <div id="target" class="d-none">
                                <input name="competitor" id="competitor" class="tagify"
                                    placeholder="press tab to add more">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="with_medmon_spokesperson">
                                <label class="custom-control-label" for="with_medmon_spokesperson">
                                    <label class="form-label" for="with_medmon_spokesperson">
                                        Spokes Person:
                                    </label>
                                </label>
                            </div>
                            <div id="target" class="d-none">
                                <input name="spokesperson" id="spokesperson" class="tagify"
                                    placeholder="press tab to add more">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="with_medmon_project">
                                <label class="custom-control-label" for="with_medmon_project">
                                    <label class="form-label" for="with_medmon_project">
                                        Project:
                                    </label>
                                </label>
                            </div>
                            <div id="target" class="d-none">
                                <input name="project" id="project" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label d-block">Analysis:</label>
                            <div class="custom-controls-stacked">
                                <div class="custom-control custom-checkbox d-inline">
                                    <input id="analysis1" name="analysis[]" type="checkbox" class="custom-control-input"
                                        value="1">
                                    <label for="analysis1" class="custom-control-label">Quantitative</label>
                                </div>
                                <div class="custom-control custom-checkbox d-inline ml-3">
                                    <input id="analysis0" name="analysis[]" type="checkbox" class="custom-control-input"
                                        value="2">
                                    <label for="analysis0" class="custom-control-label">Qualitative</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label d-block">PR Value Calculations:</label>
                            <div class="custom-controls-stacked">
                                <div class="custom-control custom-radio d-inline">
                                    <input id="prvalue1" name="prvaluecalculation" type="radio"
                                        class="custom-control-input" value="1">
                                    <label for="prvalue1" class="custom-control-label">Yes</label>
                                </div>
                                <div class="custom-control custom-radio d-inline ml-3">
                                    <input id="prvalue0" name="prvaluecalculation" type="radio"
                                        class="custom-control-input" value="0">
                                    <label for="prvalue0" class="custom-control-label">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label d-block">Language Delivery:</label>
                            <div class="custom-controls-stacked">
                                <div class="custom-control custom-radio d-inline">
                                    <input id="language0" name="languagedelivery" type="radio"
                                        class="custom-control-input" value="1">
                                    <label for="language0" class="custom-control-label">English</label>
                                </div>
                                <div class="custom-control custom-radio d-inline ml-3">
                                    <input id="language1" name="languagedelivery" type="radio"
                                        class="custom-control-input" value="2">
                                    <label for="language1" class="custom-control-label">Indonesian</label>
                                </div>
                                <div class="custom-control custom-radio d-inline ml-3">
                                    <input id="language" name="languagedelivery" type="radio"
                                        class="custom-control-input" value="3">
                                    <label for="language" class="custom-control-label">Dual (English and
                                        Indonesian)</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="flatpickrSample05">Online Cutoff</label>
                            <input id="flatpickrSample05" type="text" class="form-control"
                                placeholder="Flatpickr time example" data-toggle="flatpickr"
                                data-flatpickr-enable-time="true" data-flatpickr-no-calendar="true"
                                data-flatpickr-alt-format="H:i" data-flatpickr-date-format="H:i:s" value="09:00:00"
                                name="onlinecutoff">
                        </div>
                        <div class="form-group">
                            <label class="form-label d-block">Online Dashboard:</label>
                            <div class="custom-controls-stacked">
                                <div class="custom-control custom-radio d-inline">
                                    <input id="onlinedashboard1" name="onlinedashboard" type="radio"
                                        class="custom-control-input" value="1">
                                    <label for="onlinedashboard1" class="custom-control-label">Yes</label>
                                </div>
                                <div class="custom-control custom-radio d-inline ml-3">
                                    <input id="onlinedashboard0" name="onlinedashboard" type="radio"
                                        class="custom-control-input" value="0">
                                    <label for="onlinedashboard0" class="custom-control-label">No</label>
                                </div>
                            </div>
                        </div>
                        <div id="issuepanearea">
                            <div>
                                <div class="form-group">
                                    <label class="form-label" for="issues[]" id="issuelabel">Issue #1</label>
                                    <input type="text" class="form-control" name="issues[]" id="issues[]">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="subissues[]" id="subissueslabel">Sub Issues #1</label>
                                    <input type="text" class="tagify" name="subissues[]" id="subissues"
                                        placeholder="press tab to add more">
                                    {{-- <textarea name="subissues[]" id="subissues[]" rows="2" class="form-control"></textarea> --}}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {{-- <span class="badge badge-pill badge-success">Add Issue</span> --}}
                            <button type="button" id="removeissue"
                                class="btn btn-sm btn-outline-danger btn-rounded d-none">
                                <span class="material-icons">remove</span>
                            </button>
                            <button type="button" id="addissue" class="btn btn-sm btn-outline-success btn-rounded">
                                <span class="material-icons">add</span>
                            </button>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="reportingreport">Reporting Report</label>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="with_medmon_dailyreport"
                                    value="1" name="medmon_reports[]">
                                <label class="custom-control-label" for="with_medmon_dailyreport">
                                    <label class="form-label" for="with_medmon_dailyreport">
                                        Daily Report
                                    </label>
                                </label>
                            </div>
                            <div class="d-none ml-3" id="target">
                                <div class="form-group">
                                    <label class="form-label d-block">Language Delivery:</label>
                                    <div class="custom-controls-stacked">
                                        <div class="custom-control custom-radio d-inline">
                                            <input id="language0" name="dailyreportlanguage" type="radio"
                                                class="custom-control-input" value="1">
                                            <label for="language0" class="custom-control-label">English</label>
                                        </div>
                                        <div class="custom-control custom-radio d-inline ml-3">
                                            <input id="language1" name="dailyreportlanguage" type="radio"
                                                class="custom-control-input" value="2">
                                            <label for="language1" class="custom-control-label">Indonesian</label>
                                        </div>
                                        <div class="custom-control custom-radio d-inline ml-3">
                                            <input id="language" name="dailyreportlanguage" type="radio"
                                                class="custom-control-input" value="3">
                                            <label for="language" class="custom-control-label">Dual (English and
                                                Indonesian)</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="flatpickrSample05">Time Delivery</label>
                                    <input id="flatpickrSample05" type="text" class="form-control"
                                        placeholder="Flatpickr time example" data-toggle="flatpickr"
                                        data-flatpickr-enable-time="true" data-flatpickr-no-calendar="true"
                                        data-flatpickr-alt-format="H:i" data-flatpickr-date-format="H:i:s"
                                        value="11:30:00" name="dailyreporttime">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="with_medmon_monthlyreport"
                                    value="2" name="medmon_reports[]">
                                <label class="custom-control-label" for="with_medmon_monthlyreport">
                                    <label class="form-label" for="with_medmon_monthlyreport">
                                        Monthly Report
                                    </label>
                                </label>
                            </div>
                            <div class="d-none ml-3" id="target">
                                <div class="form-group">
                                    <label class="form-label d-block">Language Delivery:</label>
                                    <div class="custom-controls-stacked">
                                        <div class="custom-control custom-radio d-inline">
                                            <input id="medmon_monthlylanguage0" name="medmon_monthlyreportlanguage"
                                                type="radio" class="custom-control-input" value="1">
                                            <label for="medmon_monthlylanguage0"
                                                class="custom-control-label">English</label>
                                        </div>
                                        <div class="custom-control custom-radio d-inline ml-3">
                                            <input id="medmon_monthlylanguage1" name="medmon_monthlyreportlanguage"
                                                type="radio" class="custom-control-input" value="2">
                                            <label for="medmon_monthlylanguage1"
                                                class="custom-control-label">Indonesian</label>
                                        </div>
                                        <div class="custom-control custom-radio d-inline ml-3">
                                            <input id="medmon_monthlylanguage2" name="medmon_monthlyreportlanguage"
                                                type="radio" class="custom-control-input" value="3">
                                            <label for="medmon_monthlylanguage2" class="custom-control-label">Dual
                                                (English and
                                                Indonesian)</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label d-block">Time Delivery:</label>
                                    <div class="custom-controls-stacked">
                                        <div class="custom-control custom-radio mb-2">
                                            <input id="monthlydelivery" name="monthlyreporttimedelivery" type="radio"
                                                class="custom-control-input" value="1">
                                            <label for="monthlydelivery" class="custom-control-label">
                                                on
                                                <select name="" id="">
                                                    <option value="">Monday</option>
                                                    <option value="">Tuesday</option>
                                                    <option value="">Wednesday</option>
                                                    <option value="">Thursday</option>
                                                    <option value="">Friday</option>
                                                </select>
                                                every
                                                <select name="" id="">
                                                    <option value="">the first week</option>
                                                    <option value="">the second week</option>
                                                    <option value="">the third week</option>
                                                    <option value="">the last week</option>
                                                </select>
                                                of following month
                                            </label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="monthlydelivery2" name="monthlyreporttimedelivery" type="radio"
                                                class="custom-control-input" value="1">
                                            <label for="monthlydelivery2" class="custom-control-label">
                                                on
                                                <input type="number" min="1" max="30" value="1">
                                                following month
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label d-block">Options</label>
                                    @foreach ($reporttypes as $item)
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox"
                                                id="mr{{ $item->id }}" name="monthlyreports[]"
                                                value="{{ $item->id }}">
                                            <label class="custom-control-label" for="mr{{ $item->id }}">
                                                {{ $item->type }}
                                            </label>
                                        </div>
                                    @endforeach
                                    <div id="monthlyreportnotes">
                                        <div class="custom-control custom-checkbox monthlynote">
                                            <input class="custom-control-input" type="checkbox" id="newmonthlynote1"
                                                name="newmonthlynote1">
                                            <label class="custom-control-label" for="newmonthlynote1">
                                                <input type="text" class="form-control-flush"
                                                    placeholder="new note..." size="70" name="newmonthlyreports[]">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <label class="custom-control-label">
                                            <span class="badge badge-success" id="addmonthlynote">add note</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="with_medmon_semesterreport"
                                    value="3" name="medmon_reports[]">
                                <label class="custom-control-label" for="with_medmon_semesterreport">
                                    <label class="form-label" for="with_medmon_semesterreport">
                                        Semester Report
                                    </label>
                                </label>
                            </div>
                            {{-- <label class="form-label">Semester Report:</label> --}}
                            <div class="d-none ml-3" id="target">
                                <div class="form-group">
                                    <label class="form-label d-block">Language Delivery:</label>
                                    <div class="custom-controls-stacked">
                                        <div class="custom-control custom-radio d-inline">
                                            <input id="language0" name="semesterreportlanguage" type="radio"
                                                class="custom-control-input" value="1">
                                            <label for="language0" class="custom-control-label">English</label>
                                        </div>
                                        <div class="custom-control custom-radio d-inline ml-3">
                                            <input id="language1" name="semesterreportlanguage" type="radio"
                                                class="custom-control-input" value="2">
                                            <label for="language1" class="custom-control-label">Indonesian</label>
                                        </div>
                                        <div class="custom-control custom-radio d-inline ml-3">
                                            <input id="language" name="semesterreportlanguage" type="radio"
                                                class="custom-control-input" value="3">
                                            <label for="language" class="custom-control-label">Dual (English and
                                                Indonesian)</label>
                                        </div>
                                    </div>
                                </div>
                                @foreach ($reporttypes as $item)
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="sr{{ $item->id }}"
                                            name="semesterreports[]" value="{{ $item->id }}">
                                        <label class="custom-control-label" for="sr{{ $item->id }}">
                                            {{ $item->type }}
                                        </label>
                                    </div>
                                @endforeach
                                <div id="semesterreportnotes">
                                    <div class="custom-control custom-checkbox semesternote">
                                        <input class="custom-control-input" type="checkbox" id="newsmtnote1"
                                            name="newsmtnote1">
                                        <label class="custom-control-label" for="newsmtnote1">
                                            <input type="text" class="form-control-flush" placeholder="new note..."
                                                size="70" name="newsemesterreports[]">
                                        </label>
                                    </div>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <label class="custom-control-label">
                                        <span class="badge badge-success" id="addsemesternote">add note</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label d-block">Select Media Subject:</label>
                            @php
                                $percolumn = ceil(count($mediasubjects) / 3);
                            @endphp
                            <div class="row">
                                @foreach ($mediasubjects as $item)
                                    @if ($loop->first)
                                        <div class="col-3">
                                    @endif
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input mediasubjects" type="checkbox"
                                            id="mediasubject{{ $loop->iteration }}" name="mediasubject[]"
                                            value="{{ $item->media_subject_list }}">
                                        <label class="custom-control-label" for="mediasubject{{ $loop->iteration }}">
                                            {{ $item->media_subject_list }}
                                        </label>
                                    </div>
                                    @if ($loop->iteration == $percolumn)
                            </div>
                            <div class="col-3">
                            @elseif ($loop->iteration == 2 * $percolumn)
                            </div>
                            <div class="col-3">
                            @elseif ($loop->last)
                            </div>
                            @endif
                            @endforeach
                        </div>

                    </div>
                    <div id="mediatypepane" class="d-none">
                        @foreach ($mediatypes as $item)
                            <div class="form-group">
                                <label class="form-label" for="media_{{ strtolower($item) }}">Media
                                    {{ $item }}:</label> <br>
                                <select name="medialist[]" id="media_{{ strtolower($item) }}" class="form-control"
                                    multiple="multiple" style="width: 100%">
                                    <option selected disabled>loading...</option>
                                </select>
                                @if (in_array($item, ['Television', 'Radio']))
                                    <div class="form-text">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox"
                                                id="byrequest{{ strtolower($item) }}"
                                                name="byrequest{{ strtolower($item) }}" value="1">
                                            <label class="custom-control-label" for="byrequest{{ strtolower($item) }}">
                                                By request
                                            </label>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

    </div>
    <div class="row mb-32pt">
        <div class="col-lg-4">
            <div class="page-separator">
                <div class="page-separator__text">Terms and Conditions</div>
            </div>
            <p class="card-subtitle text-70 mb-16pt mb-lg-0">
                Terms and conditions
            </p>
        </div>
        <div class="col-lg-8 d-flex align-items-center">
            <div class="flex" style="max-width: 100%">
                <div class="form-group">
                    <label class="form-label" for="client">Professional Fee Option</label>
                    {{-- <textarea name="feeoption" id="feeoption" rows="2" class="form-control"></textarea> --}}
                </div>
                <div class="form-group">
                    <label class="form-label d-block">Billing Payment:</label>
                    <div class="custom-controls-stacked">
                        <div class="custom-control custom-radio d-inline">
                            <input id="billingduration0" name="billingduration" type="radio"
                                class="custom-control-input" value="1">
                            <label for="billingduration0" class="custom-control-label">Monthly</label>
                        </div>
                        <div class="custom-control custom-radio d-inline ml-3">
                            <input id="billingduration1" name="billingduration" type="radio"
                                class="custom-control-input" value="2">
                            <label for="billingduration1" class="custom-control-label">Quarter</label>
                        </div>
                        <div class="custom-control custom-radio d-inline ml-3">
                            <input id="billingduration2" name="billingduration" type="radio"
                                class="custom-control-input" value="3">
                            <label for="billingduration2" class="custom-control-label">Semester</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label d-block">Currency:</label>
                    <div class="custom-controls-stacked">
                        <div class="custom-control custom-radio d-inline">
                            <input id="currency1" name="currency" type="radio" class="custom-control-input"
                                value="1">
                            <label for="currency1" class="custom-control-label">IDR</label>
                        </div>
                        <div class="custom-control custom-radio d-inline ml-3">
                            <input id="currency0" name="currency" type="radio" class="custom-control-input"
                                value="0">
                            <label for="currency0" class="custom-control-label">USD</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="price">Price:</label>
                    <input type="text" class="form-control" id="price" name="price">
                </div>
                <div class="form-group">
                    <label class="form-label" for="client">Additionnal <span class="badge badge-primary"
                            id="newadditional"> +</span></label>
                    {{-- <textarea name="additional" id="additional" rows="2" class="form-control"></textarea> --}}
                </div>
                <div class="form-group">
                    <div class="flex">
                        <div class="form-row">
                            <div class="col-3">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input mediasubjects" type="checkbox"
                                        id="additional_translation" name="additional_translation" value="1">
                                    <label class="custom-control-label" for="additional_translation">
                                        Full Translation per Page
                                    </label>
                                </div>
                            </div>
                            <div class="col-3">
                                <input type="text" class="form-control" placeholder="Price" id="price0">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group" id="additional">
                    <div class="flex" style="max-width: 100%">
                        <div class="form-row newadditionalpane">
                            <div class="col-3">
                                <input type="text" class="form-control" placeholder="Service">
                            </div>
                            <div class="col-3">
                                <input type="text" class="form-control" placeholder="Price" id="price1">
                            </div>
                            <div class="col-3">
                                <select name="additionalbillingduration[]" id="additionalbillingduration1"
                                    class="form-control">
                                    <option selected disabled>Billing Method</option>
                                    <option value="0">Monthly</option>
                                    <option value="1">Quarter</option>
                                    <option value="2">Semester</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="client">Payment Terms</label>
                    {{-- <textarea name="payment" id="payment" rows="2" class="form-control"></textarea> --}}
                </div>

                <div class="form-group">
                    <label class="form-label" for="billingdate">Monthly Billing Date:</label>
                    <div class="row">
                        <div class="col-3">
                            <input type="number" class="form-control" id="billingdate" name="billingdate"
                                min="1" max="31">
                        </div>
                        <div class="col-8">
                            <p class="my-1">of the following month</p>
                        </div>
                    </div>
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

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>

    <script>
        // function formatState(state) {
        //     if (!state.id) {
        //         return state.text;
        //     }
        //     var baseUrl = "/user/pages/images/flags";
        //     var $state = $(
        //         '<span><img src="' + baseUrl + '/' + state.element.value.toLowerCase() + '.png" class="img-flag" /> ' +
        //         state.text + '</span>'
        //     );
        //     return $state;
        // };
        $(document).ready(function() {
            // QUOTATION DETAIL
            // input client
            $('#client_id').select2({
                placeholder: 'Select client...'
            });

            // input price
            $("#price").keyup(function(event) {
                // skip for arrow keys
                if (event.which >= 37 && event.which <= 40) return;

                // format number
                $(this).val(function(index, value) {
                    return value
                        .replace(/\D/g, "")
                        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                });
            });
            $("#price1").keyup(function(event) {
                // skip for arrow keys
                if (event.which >= 37 && event.which <= 40) return;

                // format number
                $(this).val(function(index, value) {
                    return value
                        .replace(/\D/g, "")
                        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                });
            });


            // CONVENTIONAL MEDIA MONITORING
            var directmention = document.querySelector('input[name=directmention]');
            new Tagify(directmention, {
                originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
            });
            var partnermention = document.querySelector('input[name=partnermention]');
            new Tagify(partnermention, {
                originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
            });
            var industry = document.querySelector('input[name=industry]');
            new Tagify(industry, {
                originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
            });
            var competitor = document.querySelector('input[name=competitor]');
            new Tagify(competitor, {
                originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
            });
            var spokesperson = document.querySelector('input[name=spokesperson]');
            new Tagify(spokesperson, {
                originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
            });
            var subissues = document.querySelector('#subissues');
            new Tagify(subissues, {
                originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
            });

            // add/remove issue button
            var currentpane = 1,
                cursm_dailynote = 1,
                cursm_monthlynote = 1,
                cursm_semesternote = 1,
                cursmtnote = 1,
                curmonthlynote = 1;
            $("#addissue").click(function() {
                currentpane++;
                $(".issuepane:first").clone().appendTo("#issuepanearea")
                    .find("#issuelabel").text("Issue #" + currentpane)
                    .end()
                    .find("#subissueslabel").text("Sub Issues #" + currentpane)
                    .end()
                    .find("#subissuesinput").attr('id', 'subissues' + currentpane)
                    .end()
                    .find(":input").val("")
                    .end();
                var subissues = document.querySelector('#subissues' + currentpane);
                new Tagify(subissues, {
                    originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(
                        ',')
                });
                if (currentpane == 2) {
                    $("#removeissue").removeClass('d-none');
                }
            });
            $("#removeissue").click(function() {
                $(".issuepane:last").remove();
                currentpane--;
                if (currentpane < 2) {
                    $("#removeissue").addClass('d-none');
                }
            });

            $("#sm_addsocmeddailynote").click(function() {
                cursm_dailynote++;
                $(".sm_dailynote:first").clone().appendTo("#sm_dailyreportnotes")
                    .find(":checkbox").prop({
                        'checked': false,
                        'id': 'sm_newdailynote' + cursm_dailynote
                    }).end()
                    .find(".custom-control-label").prop('for', 'sm_newdailynote' + cursm_dailynote)
                    .end()
                    .find(":input").val("")
                    .end();
            });
            $("#sm_addsocmedmonthlynote").click(function() {
                cursm_monthlynote++;
                $(".sm_monthlynote:first").clone().appendTo("#sm_monthlyreportnotes")
                    .find(":checkbox").prop({
                        'checked': false,
                        'id': 'sm_newmonthlynote' + cursm_monthlynote
                    }).end()
                    .find(".custom-control-label").prop('for', 'sm_newmonthlynote' + cursm_monthlynote)
                    .end()
                    .find(":input").val("")
                    .end();
            });
            $("#sm_addsocmedsemesternote").click(function() {
                cursm_semesternote++;
                $(".sm_semesternote:first").clone().appendTo("#sm_semesterreportnotes")
                    .find(":checkbox").prop({
                        'checked': false,
                        'id': 'sm_newsemesternote' + cursm_semesternote
                    }).end()
                    .find(".custom-control-label").prop('for', 'sm_newsemesternote' + cursm_semesternote)
                    .end()
                    .find(":input").val("")
                    .end();
            });
            $("#addsemesternote").click(function() {
                cursmtnote++;
                $(".semesternote:first").clone().appendTo("#semesterreportnotes")
                    .find(":checkbox").prop({
                        'checked': false,
                        'id': 'newsmtnote' + cursmtnote
                    }).end()
                    .find(".custom-control-label").prop('for', 'newsmtnote' + cursmtnote)
                    .end()
                    .find(":input").val("")
                    .end();
            });
            $("#addmonthlynote").click(function() {
                curmonthlynote++;
                $(".monthlynote:first").clone().appendTo("#monthlyreportnotes")
                    .find(":checkbox").prop({
                        'checked': false,
                        'id': 'newmonthlynote' + curmonthlynote
                    }).end()
                    .find(".custom-control-label").prop('for', 'newmonthlynote' + curmonthlynote)
                    .end()
                    .find(":input").val("")
                    .end();
            });


            // input media list multiple
            var mediasubjects_selected = [];
            var mediasubjects = $(".mediasubjects").change(function() {
                if (mediasubjects.filter(':checked').length > 0) {

                    mediasubjects_selected = [];
                    mediasubjects.filter(':checked').each(function() {
                        mediasubjects_selected.push($(this).val());
                    });
                    var subjects_selected = mediasubjects_selected.join(',');
                    newMediaList(subjects_selected);
                    $('#mediatypepane').removeClass('d-none');
                } else {
                    $('#mediatypepane').addClass('d-none');
                }
            });
            const mediatypes = <?= json_encode($mediatypes) ?>;

            // replace with new data
            function newMediaList(subjects) {
                mediatypes.forEach(element => {
                    var options = [];
                    var mediatype = element.toLowerCase();
                    $.ajax({
                        type: 'GET', //THIS NEEDS TO BE GET
                        url: '/getmedialist/' + mediatype + '/' + subjects,
                        dataType: 'json',
                        success: function(data) {
                            $.each(data, function(index, item) {
                                options.push({
                                    text: item.text,
                                    id: item.id
                                });
                            });
                            $('#media_' + mediatype).empty().select2({
                                placeholder: 'Type media names...',
                                data: options
                            });
                        },
                        error: function() {
                            console.log(data);
                        }
                    });
                });

            }

            // TERM AND CONDTION
            // additional
            $("#price0").keyup(function(event) {
                // skip for arrow keys
                if (event.which >= 37 && event.which <= 40) return;

                // format number
                $(this).val(function(index, value) {
                    return value
                        .replace(/\D/g, "")
                        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                });
            });
            var curadditionalpane = 1;
            $("#newadditional").click(function() {
                curadditionalpane++;
                $(".newadditionalpane:first").clone().appendTo("#additional")
                    .find("#additionalbillingduration1").attr('id', 'additionalbillingduration' +
                        curadditionalpane)
                    .end()
                    .find("#price1").attr('id', 'price' +
                        curadditionalpane)
                    .end()
                    .find(":input").val("")
                    .end();
                $("#price" + curadditionalpane).keyup(function(event) {
                    // skip for arrow keys
                    if (event.which >= 37 && event.which <= 40) return;

                    // format number
                    $(this).val(function(index, value) {
                        return value
                            .replace(/\D/g, "")
                            .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    });
                });
            });

            // SOCIAL MEDIA MONITORING
            var keywords = document.querySelector('input[name=keywords]');
            new Tagify(keywords, {
                originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
            });
            var officialaccount = document.querySelector('input[name=accounts]');
            new Tagify(officialaccount, {
                originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
            });
            var postcategories = document.querySelector('input[name=postcategories]');
            new Tagify(postcategories, {
                originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
            });


            var isoption = [
                '#with_spokesperson',
                '#with_socmed_keywords',
                '#with_socmed_accounts',
                '#with_socmed_postcategories',
                '#with_socmed_dailyreport',
                '#with_socmed_monthlyreport',
                '#with_socmed_semesterreport',
                '#with_medmon_directmention',
                '#with_medmon_partnermention',
                '#with_medmon_industry',
                '#with_medmon_competitor',
                '#with_medmon_spokesperson',
                '#with_medmon_project',
                '#with_medmon_dailyreport',
                '#with_medmon_monthlyreport',
                '#with_medmon_semesterreport'
            ];
            $(isoption.join(',')).change(function() {
                if (this.checked) {
                    $(this).parent().next('#target').removeClass('d-none');
                } else {
                    $(this).parent().next('#target').addClass('d-none');
                }
            });


        });
    </script>

    <script>
        $("#begindate,#enddate").flatpickr({
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });
    </script>
    <script>
        // ClassicEditor
        //     .create(document.querySelector('#reportingreport'), {
        //         toolbar: ['bold', 'italic', 'link', 'bulletedList', 'numberedList']
        //     })
        //     .catch(error => {
        //         console.error(error);
        //     });
        // ClassicEditor
        //     .create(document.querySelector('#feeoption'), {
        //         toolbar: ['bold', 'italic', 'link', 'bulletedList', 'numberedList']
        //     })
        //     .catch(error => {
        //         console.error(error);
        //     });
        // ClassicEditor
        //     .create(document.querySelector('#additional'), {
        //         toolbar: ['bold', 'italic', 'link', 'bulletedList', 'numberedList']
        //     })
        //     .catch(error => {
        //         console.error(error);
        //     });
        // ClassicEditor
        //     .create(document.querySelector('#payment'), {
        //         toolbar: ['bold', 'italic', 'link', 'bulletedList', 'numberedList']
        //     })
        //     .catch(error => {
        //         console.error(error);
        //     });
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
