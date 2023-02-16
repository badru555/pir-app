@extends('dashboard.layout')
@section('content')
    <div class="container page__container page-section pb-0">
        <h1 class="h2 mb-0">Aplikasi</h1>
        <ol class="breadcrumb m-0 p-0">
            <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
            <li class="breadcrumb-item active">Daftar Aplikasi</li>
        </ol>
    </div>

    <div class="container-fluid page__container page-section">


        <div class="page-separator">
            <div class="page-separator__text">Aplikasi</div>
        </div>

        <div class="row card-group-row">
            @foreach ($applications as $item)
                <div class="col-md-6 col-lg-4 col-xl-3 card-group-row__col">

                    <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card"
                        data-toggle="popover" data-trigger="click" data-original-title="" title=""
                        data-domfactory-upgraded="overlay">

                        <img src="{{ $item->image != null ? '/storage/' . $item->image : 'https://via.placeholder.com/200x140?text=Aplikasi' }}"
                            alt="" class="card-img-top js-image" data-position="left" data-height="140"
                            height="140">

                        <div class="card-body flex">
                            <div class="d-flex">
                                <div class="flex">
                                    <a class="card-title" href="{{ $item->link }}">{{ $item->name }}</a>
                                    <small
                                        class="text-50 font-weight-bold mb-4pt">{{ substr($item->description, 0, 40) . ' ...' }}</small>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="row justify-content-between">
                                <div class="col-auto d-flex align-items-center">
                                    <p class="flex text-50 lh-1 mb-0"><small>{{ $item->survey_count }}
                                            @choice('survey|surveys', $item->survey_count)</small></p>
                                </div>
                                <div class="col-auto d-flex align-items-center">
                                    <span class="material-icons icon-16pt text-50 mr-4pt">apps</span>
                                    <p class="flex text-50 lh-1 mb-0">
                                        <small>{{ $item->applicationplatform->platform }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="popoverContainer d-none">
                        <div class="media">
                            <div class="media-left mr-12pt">
                                <img src="{{ $item->image != null ? '/storage/' . $item->image : 'https://via.placeholder.com/200x140?text=Aplikasi' }}"
                                    width="40" height="40" alt="Angular" class="rounded">
                            </div>
                            <div class="media-body">
                                <div class="card-title mb-0">{{ $item->name }}</div>
                                <p class="lh-1 mb-0">
                                    <span class="text-50 small">added</span>
                                    <span
                                        class="text-50 small font-weight-bold">{{ $item->created_at->format('d M Y') }}</span>
                                </p>
                            </div>
                        </div>

                        <p class="my-16pt text-70">{{ $item->description }}</p>


                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="d-flex align-items-center mb-4pt">
                                    <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                    <p class="flex text-50 lh-1 mb-0"><small>12 Survey</small></p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="material-icons icon-16pt text-50 mr-4pt">apps</span>
                                    <p class="flex text-50 lh-1 mb-0">
                                        <small>{{ $item->applicationplatform->platform }}</small>
                                    </p>
                                </div>
                            </div>
                            <div class="col text-right">
                                <a href="/applications/{{ $item->id }}" class="btn btn-primary">Lihat Detail</a>
                            </div>
                        </div>

                    </div>

                </div>
            @endforeach


        </div>

    </div>
@endsection
@section('script')
@endsection
