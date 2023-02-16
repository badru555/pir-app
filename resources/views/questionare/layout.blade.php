<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="MAVIA - Register, Reservation, Questionare, Reviews form wizard">
    <meta name="author" content="Ansonika">
    <title>Aplikasi</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="/assets/questionare/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon"
        href="/assets/questionare/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72"
        href="/assets/questionare/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
        href="/assets/questionare/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
        href="/assets/questionare/img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap"
        rel="stylesheet">

    <!-- BASE CSS -->
    <link href="/assets/questionare/css/animate.min.css" rel="stylesheet">
    <link href="/assets/questionare/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/questionare/css/menu.css" rel="stylesheet">
    <link href="/assets/questionare/css/style.css" rel="stylesheet">
    <link href="/assets/questionare/css/responsive.css" rel="stylesheet">
    <link href="/assets/questionare/css/icon_fonts/css/all_icons_min.css" rel="stylesheet">
    <link href="/assets/questionare/css/skins/square/grey.css" rel="stylesheet">

    <!-- COLOR CSS -->
    <link href="/assets/questionare/css/color_3.css" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="/assets/questionare/css/date_time_picker.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="/assets/questionare/css/custom.css" rel="stylesheet">

    <script src="/assets/questionare/js/modernizr.js"></script>
    <!-- Modernizr -->
    <style>
        /* .card-img-top {
            flex-shrink: 0;
            width: 100%;
        } */
    </style>

</head>

<body>
    <div id="preloader">
        <div data-loader="circle-side"></div>
    </div><!-- /Preload -->
    <div id="loader_form">
        <div data-loader="circle-side-2"></div>
    </div><!-- /loader_form -->
    @yield('content')

    <footer id="home" class="clearfix">
        <p>© {{ date('Y') }} PIR App</p>
        <ul>
            <li><a href="/" class="animated_link">Home</a></li>
            <li><a href="/application" class="animated_link">Application</a></li>
            <li><a href="/login" class="animated_link">Login</a></li>
        </ul>
    </footer>
    <!-- end footer-->

    <div class="cd-overlay-nav">
        <span></span>
    </div>
    <!-- cd-overlay-nav -->

    <div class="cd-overlay-content">
        <span></span>
    </div>
    <!-- cd-overlay-content -->

    {{-- <a href="#0" class="cd-nav-trigger">Menu<span class="cd-icon"></span></a> --}}

    <!-- Modal terms -->
    <div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="termsLabel">Terkait Survey</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Survey ini dilakukan untuk memberikan penilaian terhadap kinerja aplikasi yang berjalan di Peruri
                        dan menjadi saran untuk perbaikan
                        aplikasi kedepannya agar selalu sesuai dengan kebutuhan penggunanya.
                        Survey Anda sangat berguna demi keberlangsungan aplikasi yang sesuai dengan kebutuhan pekerjaan
                        kita di Perusahaan.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn_1" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Modal info -->
    <div class="modal fade" id="more-info" tabindex="-1" role="dialog" aria-labelledby="more-infoLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="more-infoLabel">Frequently asked questions</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Lorem ipsum dolor sit amet, in porro albucius qui, in <strong>nec quod novum accumsan</strong>,
                        mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus,
                        pro ne quod dicunt sensibus.</p>
                    <p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam
                        dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt
                        sensibus. Lorem ipsum dolor sit amet, <strong>in porro albucius qui</strong>, in nec quod novum
                        accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum
                        sanctus, pro ne quod dicunt sensibus.</p>
                    <p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam
                        dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt
                        sensibus.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn_1" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- SCRIPTS -->
    <!-- Jquery-->
    <script src="/assets/questionare/js/jquery-3.6.1.min.js"></script>
    <!-- Common script -->
    <script src="/assets/questionare/js/common_scripts.js"></script>
    <!-- Wizard script -->
    <script src="/assets/questionare/js/questionare_wizard_func.js"></script>
    <!-- Menu script -->
    <script src="/assets/questionare/js/velocity.min.js"></script>
    <script src="/assets/questionare/js/main.js"></script>
    <!-- Theme script -->
    <script src="/assets/questionare/js/functions.js"></script>


</body>

</html>
