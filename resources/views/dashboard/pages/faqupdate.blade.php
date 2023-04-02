@extends('dashboard.layout')
@section('content')
    <div class="pt-32pt">
        <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
            <div class="flex d-flex flex-column flex-sm-row align-items-center">

                <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                    <h2 class="mb-0">Tambah FAQ</h2>

                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>

                        <li class="breadcrumb-item">
                            <a href="#">FAQs</a>
                        </li>

                        <li class="breadcrumb-item active">

                            Tambah

                        </li>

                    </ol>

                </div>
            </div>

        </div>
    </div>

    <div class="container page__container page-section">

        <form action="/faqs/{{ $faq->id }}" method="POST">
            @csrf
            @method('put')

            <div class="row mb-32pt">
                <div class="col-md-6 d-flex align-items-center">
                    <div class="flex" style="max-width: 100%">
                        @if (session()->has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label class="form-label" for="question">Pertanyaan:</label>
                            <textarea name="question" id="question" rows="2" class="form-control">{{ $faq->question }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="answer">Jawaban:</label>
                            <textarea name="answer" id="answer" rows="3" class="form-control">{{ $faq->answer }}</textarea>
                        </div>


                        <button type="submit" class="btn btn-outline-primary btn-rounded">Buat Baru</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
