@extends('dashboard.layout')
@section('content')
    <div class="container page__container page-section pb-0">
        <h1 class="h2 mb-0">Dokumen PIR</h1>
        <ol class="breadcrumb m-0 p-0">
            <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
            <li class="breadcrumb-item active">Daftar Dokumen</li>
        </ol>
    </div>

    <div class="container-fluid page__container page-section">
        <div class="page-separator">
            <div class="page-separator__text">Dokumen</div>
        </div>

        {{-- <a class="btn btn-sm btn-rounded btn-primary mb-2" href="/users/create">Tambah Baru</a> --}}
        <div class="card mb-lg-32pt">
            @if (session()->has('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <div class="table-responsive" data-toggle="lists" data-lists-sort-by="js-lists-values-date"
                data-lists-sort-desc="true" data-lists-values='["js-lists-values-question", "js-lists-values-answer"]'>

                <table class="table mb-0 thead-border-top-0 table-nowrap">
                    <thead>
                        <tr>
                            <th style="width: 24px;">
                                #
                            </th>

                            <th style="width: 200px;">
                                <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-question">Label</a>
                            </th>

                            <th style="width: 500px;">
                                <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-answer">By</a>
                            </th>


                            <th style="width: 24px;"></th>
                        </tr>
                    </thead>
                    <tbody class="list" id="employees">
                        @php
                            $temp_appid = 0;
                            $i = 0;
                        @endphp
                        @foreach ($applicationdocuments as $key => $item)
                            @if ($temp_appid != $item->application_id)
                                @php
                                    $i = 1;
                                @endphp
                            @endif
                            <tr>
                                <td>
                                    <div class="media flex-nowrap align-items-center" style="white-space: nowrap;">
                                        {{ $applicationdocuments->firstItem() + $key }}
                                    </div>
                                </td>
                                <td>
                                    <div class="media flex-nowrap align-items-center js-lists-values-question"
                                        style="white-space: nowrap;">
                                        {{ $item->application->name . ' ' . $item->created_at->format('Y') . ' Batch ' . $i++ }}
                                    </div>
                                </td>
                                <td>
                                    <div class="media flex-nowrap align-items-center js-lists-values-answer"
                                        style="white-space: nowrap;">
                                        {{ $item->user->name }}
                                    </div>
                                </td>



                                <td class="text-right">
                                    <!-- Default dropleft button -->
                                    <div class="btn-group dropleft">
                                        <a class="text-50" href="#" id="dropdownMenuLink" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="/draft/{{ $item->id }}">
                                                View Draft
                                            </a>
                                            <form action="/applicationdocuments/{{ $item->id }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="dropdown-item" type="submit"
                                                    onclick="return confirm('Apakah anda yakin?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                            @php
                                $temp_appid = $item->application_id;
                            @endphp
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

                {{ $applicationdocuments->links('dashboard.layout.pagination') }}

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
