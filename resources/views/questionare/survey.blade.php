@extends('questionare.layout')
@section('script')
    <script>
        $(document).ready(function() {
            var typingTimer;

            $('#np').keyup(function() {
                clearTimeout(typingTimer);
                var val = $(this).val();
                typingTimer = setTimeout(function() {
                    $.ajax({
                        type: "GET",
                        url: "/check_np/" + val + "/" + <?= $application->id ?>,
                        data: "data",
                        dataType: "json",
                        success: function(response) {
                            if (response.found) {
                                alert(
                                    'Anda sudah melakukan survey pada Aplikasi ini di batch yang sama!'
                                );
                                window.location = '/application';
                            }
                        }
                    });
                }, 3000);
            });
        });
    </script>
@endsection
@section('content')
    <main>
        <div id="form_container">
            <div class="row">
                <div class="col-lg-5">
                    <div id="left_form">
                        <figure><img src="/assets/questionare/img/registration_bg.svg" alt=""></figure>
                        <h2>{{ $application->name }}</h2>
                        <p>{{ $application->description }}</p>
                        <a href="#0" id="more_info" data-bs-toggle="modal" data-bs-target="#more-info"><i
                                class="pe-7s-info"></i></a>
                    </div>
                </div>
                <div class="col-lg-7">

                    <div id="wizard_container">
                        <div id="top-wizard">
                            <div id="progressbar"></div>
                        </div>
                        <!-- /top-wizard -->
                        <form action="/surveys" id="wrapped" method="POST">
                            @csrf
                            <input id="website" name="website" type="text" value="">
                            <input type="hidden" name="application_id" value="{{ $application->id }}">
                            <!-- Leave for security protection, read docs for details -->
                            <div id="middle-wizard">
                                @php($count = count($questions) + 2)
                                <div class="step">
                                    <h3 class="main_question"><strong>1/{{ $count }}</strong>Isi infomasi diri
                                    </h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control required"
                                                    placeholder="Nama Lengkap (sesuai KTP)">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /row -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="np" id="np"
                                                    class="form-control required" placeholder="NP">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="styled-select">
                                                    <select class="required" name="respondentdepartment_id">
                                                        <option disabled value="" selected="">
                                                            Pilih divisi...
                                                        </option>
                                                        @foreach ($departments as $item)
                                                            <option value="{{ $item->id }}">{{ $item->department }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /row -->
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group terms">
                                                <input name="terms" type="checkbox" class="icheck required"
                                                    value="yes">
                                                <label>Saya mengerti terkait <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#terms-txt">survey yang saya
                                                        lakukan</a></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="length" value="{{ count($questions) }}">
                                @foreach ($questions as $item)
                                    <div class="step">
                                        <h3 class="main_question">
                                            <strong>{{ $loop->iteration + 1 }}/{{ $count }}</strong>{{ $item->question }}
                                        </h3>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group radio_input">
                                                    <label>
                                                        <input type="radio" value="5"
                                                            name="response{{ $loop->iteration }}" class="icheck required">
                                                        Sangat Setuju
                                                    </label>
                                                </div>
                                                <div class="form-group radio_input">
                                                    <label>
                                                        <input type="radio" value="4"
                                                            name="response{{ $loop->iteration }}" class="icheck required">
                                                        Setuju
                                                    </label>
                                                </div>
                                                <div class="form-group radio_input">
                                                    <label>
                                                        <input type="radio" value="3"
                                                            name="response{{ $loop->iteration }}" class="icheck required">
                                                        Netral
                                                    </label>
                                                </div>
                                                <div class="form-group radio_input">
                                                    <label>
                                                        <input type="radio" value="2"
                                                            name="response{{ $loop->iteration }}" class="icheck required">
                                                        Tidak Setuju
                                                    </label>
                                                </div>
                                                <div class="form-group radio_input">
                                                    <label>
                                                        <input type="radio" value="1"
                                                            name="response{{ $loop->iteration }}" class="icheck required">
                                                        Sangat Tidak Setuju
                                                    </label>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- /row -->
                                    </div>
                                @endforeach
                                <!-- /step -->

                                <div class="submit step">
                                    <h3 class="main_question">
                                        <strong>{{ $count . '/' . $count }}</strong>Kritik dan Saran
                                    </h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea name="idea" class="form-control required" style="height:180px;"
                                                    placeholder="Hai, isi kritik dan saran kamu di sini..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /step-->
                            </div>
                            <!-- /middle-wizard -->
                            <div id="bottom-wizard">
                                <button type="button" name="backward" class="backward">Kembali </button>
                                <button type="button" name="forward" class="forward">Selanjutnya</button>
                                <button type="submit" name="process" class="submit">Serahkan</button>
                            </div>
                            <!-- /bottom-wizard -->
                        </form>
                    </div>
                    <!-- /Wizard container -->
                </div>
            </div><!-- /Row -->
        </div><!-- /Form_container -->
    </main>
@endsection
