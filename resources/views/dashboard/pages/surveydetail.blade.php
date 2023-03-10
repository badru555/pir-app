@extends('dashboard.layout')
@section('content')
    <div class="container page__container page-section pb-0">
        <h1 class="h2 mb-0">Surveys</h1>
        <ol class="breadcrumb m-0 p-0">
            <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
            <li class="breadcrumb-item active">Daftar Surveys</li>
        </ol>
    </div>

    <div class="container-fluid page__container page-section">


        <div class="page-separator">
            <div class="page-separator__text">Surveys &nbsp; <a href="/surveyexport/{{ $surveys[0]->application_id }}"
                    class="btn btn-sm btn-outline-primary">export excel</a></div>
        </div>

        {{-- <a class="btn btn-sm btn-rounded btn-primary mb-2" href="/users/create">Tambah Baru</a> --}}
        <div class="card mb-lg-32pt">

            <div class="table-responsive" data-toggle="lists" data-lists-sort-by="js-lists-values-date"
                data-lists-sort-desc="true"
                data-lists-values='["js-lists-values-name", "js-lists-values-value", "js-lists-values-time", "js-lists-values-advice"]'>

                <table class="table mb-0 thead-border-top-0 table-nowrap">
                    <thead>
                        <tr>
                            <th style="width: 24px;">
                                #
                            </th>

                            <th style="width: 400px;">
                                <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-name">Nama</a>
                            </th>

                            <th style="width: 100px;">
                                <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-value">Nilai
                                    Kepuasan</a>
                            </th>
                            <th style="width: 200px;">
                                <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-time">Waktu
                                    Survey</a>
                            </th>
                            <th style="width: 500px;">
                                <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-advice">Saran</a>
                            </th>


                            {{-- <th style="width: 24px;"></th> --}}
                        </tr>
                    </thead>
                    <tbody class="list" id="employees">
                        @foreach ($surveys as $key => $item)
                            <tr>
                                <td>
                                    <div class="media flex-nowrap align-items-center" style="white-space: nowrap;">
                                        {{ $surveys->firstItem() + $key }}
                                    </div>
                                </td>
                                <td>
                                    <div class="media flex-nowrap align-items-center js-lists-values-name"
                                        style="white-space: nowrap;">
                                        {{ $item->respondent->name }}
                                    </div>
                                </td>
                                <td>
                                    <div class="media flex-nowrap align-items-center js-lists-values-answer"
                                        style="white-space: nowrap;">
                                        {{ $item->ans1 + $item->ans2 + $item->ans3 + $item->ans4 + $item->ans5 + $item->ans6 + $item->ans7 + $item->ans8 + $item->ans9 + $item->ans10 + $item->ans11 + $item->ans12 + $item->ans13 + $item->ans14 + $item->ans15 + $item->ans16 + $item->ans17 + $item->ans18 + $item->ans19 + $item->ans20 }}
                                    </div>
                                </td>
                                <td>
                                    <div class="media flex-nowrap align-items-center js-lists-values-time"
                                        style="white-space: nowrap;">
                                        {{ $item->created_at->format('d M Y H:m') }}
                                    </div>
                                </td>
                                <td>
                                    <div class="media flex-nowrap align-items-center js-lists-values-advice"
                                        style="white-space: nowrap;">
                                        {{ $item->idea }}
                                    </div>
                                </td>



                                {{-- <td class="text-right">
                                    <!-- Default dropleft button -->
                                    <div class="btn-group dropleft">
                                        <a class="text-50" href="#" id="dropdownMenuLink" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="/quotationdraft/{{ $item->id }}">
                                                View Draft
                                            </a>
                                            <a class="dropdown-item" href="/invoices/create/{{ $item->id }}">
                                                Proceed to Invoice
                                            </a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>

                                </td> --}}
                            </tr>
                        @endforeach

                        {{-- <tr>

                            <td>

                                <div class="media flex-nowrap align-items-center" style="white-space: nowrap;">
                                    <div class="avatar avatar-sm mr-8pt">

                                        <span class="avatar-title rounded-circle">BN</span>

                                    </div>
                                    <div class="media-body">

                                        <div class="d-flex align-items-center">
                                            <div class="flex d-flex flex-column">
                                                <p class="mb-0"><strong class="js-lists-values-name">Billy
                                                        Nunez</strong></p>
                                                <small class="js-lists-values-email text-50">annabell.kris@yahoo.com</small>
                                            </div>

                                            <div class="d-flex align-items-center ml-24pt">
                                                <i class="material-icons text-20 icon-16pt">link</i>
                                                <small class="ml-4pt"><strong class="text-50">2</strong></small>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </td>

                            <td>

                                <div class="media flex-nowrap align-items-center" style="white-space: nowrap;">
                                    <div class="avatar avatar-sm mr-8pt">
                                        <span class="avatar-title rounded bg-light text-black-100">Ds</span>
                                    </div>
                                    <div class="media-body">
                                        <div class="d-flex flex-column">
                                            <small class="js-lists-values-department"><strong>Design</strong></small>
                                            <small class="js-lists-values-location text-50">UX
                                                Designer</small>
                                        </div>
                                    </div>
                                </div>

                            </td>

                            <td>
                                <div class="d-flex flex-column">
                                    <small class="js-lists-values-status text-50 mb-4pt">Probation</small>
                                    <span class="indicator-line rounded bg-warning"></span>
                                </div>
                            </td>

                            <td>
                                <small class="js-lists-values-type text-50">Temporary</small>
                            </td>

                            <td>
                                <small class="js-lists-values-phone text-50">239-721-3649</small>
                            </td>

                            <td>
                                <small class="js-lists-values-date text-50">19/02/2019</small>
                            </td>
                            <td class="text-right">
                                <a href="" class="text-50"><i class="material-icons">more_vert</i></a>
                            </td>
                        </tr> --}}

                    </tbody>
                </table>
            </div>

            <div class="card-footer p-8pt">

                {{ $surveys->links('dashboard.layout.pagination') }}

            </div>

        </div>

    </div>
@endsection
@section('script')
    <script>
        $('.table-responsive').on('show.bs.dropdown', function() {
            $('.table-responsive').css("overflow", "inherit");
        });

        $('.table-responsive').on('hide.bs.dropdown', function() {
            $('.table-responsive').css("overflow", "auto");
        })
    </script>
@endsection
