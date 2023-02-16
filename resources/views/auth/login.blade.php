<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Lato:400,700%7CRoboto:400,500%7CExo+2:600&display=swap"
        rel="stylesheet">

    <!-- Preloader -->
    <link type="text/css" href="/assets/vendor/spinkit.css" rel="stylesheet">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="/assets/vendor/perfect-scrollbar.css" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="/assets/css/material-icons.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link type="text/css" href="/assets/css/fontawesome.css" rel="stylesheet">

    <!-- Preloader -->
    <link type="text/css" href="/assets/css/preloader.css" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="/assets/css/app.css" rel="stylesheet">

</head>

<body class="layout-sticky layout-sticky-subnav ui ">

    <div class="preloader">
        <div class="sk-chase">
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
        </div>
    </div>

    <div class="pt-32pt pt-sm-64pt pb-32pt">
        <div class="container page__container">
            <form action="/login" class="col-md-5 p-0 mx-auto" method="post">
                @csrf
                <div class="d-block text-center">
                    <img src="/assets/logo.png" alt="logo Explicar" width="80%">
                </div>
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="form-group">
                    <label class="form-label" for="username">Username:</label>
                    <input id="username" name="username" type="text" class="form-control"
                        placeholder="Your username ...">
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">Password:</label>
                    <input id="password" name="password" type="password" class="form-control"
                        placeholder="Your password ...">
                    {{-- <p class="text-right"><a href="reset-password.html" class="small">Forgot your password?</a></p> --}}
                </div>
                <div class="text-center">
                    <button class="btn btn-success" type="reset">Reset</button>
                    <button class="btn btn-primary" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
    <!-- jQuery -->
    <script src="/assets/vendor/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="/assets/vendor/popper.min.js"></script>
    <script src="/assets/vendor/bootstrap.min.js"></script>

    <!-- Perfect Scrollbar -->
    <script src="/assets/vendor/perfect-scrollbar.min.js"></script>

    <!-- DOM Factory -->
    <script src="/assets/vendor/dom-factory.js"></script>

    <!-- MDK -->
    <script src="/assets/vendor/material-design-kit.js"></script>

    <!-- App JS -->
    <script src="/assets/js/app.js"></script>

    <!-- Preloader -->
    <script src="/assets/js/preloader.js"></script>

    <!-- List.js -->
    <script src="/assets/vendor/list.min.js"></script>
    <script src="/assets/js/list.js"></script>

    <!-- Tables -->
    <script src="/assets/js/toggle-check-all.js"></script>
    <script src="/assets/js/check-selected-row.js"></script>

    <!-- App Settings (safe to remove) -->
    <!-- <script src="/assets/js/app-settings.js"></script> -->
</body>

</html>
