@extends('questionare.layout')
@section('content')
    <main>
        <div id="application_container">
            @if (session()->has('message'))
                {!! session('message') !!}
            @endif
            <div class="row">
                @foreach ($applications as $item)
                    <div class="col-3">
                        <div class="card">
                            <img src="{{ $item->image != null ? '/storage/' . $item->image : 'https://via.placeholder.com/200x140?text=Aplikasi' }}"
                                class="card-img-top" alt="{{ $item->name }}" height="140">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                <p class="card-text">{{ $item->description }}<br><a
                                        href="{{ $item->link }}">{{ $item->link }}</a></p>
                                <a href="/survey/{{ $item->id }}" class="btn btn-sm btn-primary float-right">Lakukan
                                    Survey
                                    ></a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div><!-- /Row -->
        </div><!-- /Form_container -->
    </main>
@endsection
