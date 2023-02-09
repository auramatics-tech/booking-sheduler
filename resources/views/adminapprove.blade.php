<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <!-- Title -->
    <title>Plase Wait !!</title>

    <!--- Internal Fontawesome css-->
    <link href="{{ url('/') }}/assets/plugins/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!---Ionicons css-->
    <link href="{{ url('/') }}/assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!---Internal Typicons css-->
    <link href="{{ url('/') }}/assets/plugins/typicons.font/typicons.css" rel="stylesheet">

    <!---Internal Feather css-->
    <link href="{{ url('/') }}/assets/plugins/feather/feather.css" rel="stylesheet">

    <!---Internal Falg-icons css-->
    <link href="{{ url('/') }}/assets/plugins/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">

    <!-- Style css -->
    <link href="{{ url('/') }}/assets/css/style.css" rel="stylesheet">

    <!-- Dark-mode css -->
    <link href="{{ url('/') }}/assets/css/style-dark.css" rel="stylesheet">

    <!---Skinmodes css-->
    <link href="{{ url('/') }}/assets/css/skin-modes.css" rel="stylesheet" />


</head>

<body class="main-body bg-primary-transparent">


    <!-- Page -->
    <div class="page">

        <!-- Main-error-wrapper -->
        <div class="main-error-wrapper  page page-h ">
            <img src="{{ url('/') }}/admin.png" style="width: 120px;height: 120px;margin-bottom: 47px;"
                alt="error">
            <h2> {{ __('dash.msgwait') }}</h2>
            <h6> {{ __('dash.msgwait1') }} </h6>
            <a class="btn btn-outline-danger" href="{{ route('edit.profile') }}">
                {{ __('dash.Profile') }}

            </a>
        </div>
        <!-- /Main-error-wrapper -->

    </div>
    <!-- End Page -->


    <!-- JQuery min js -->
    <script src="{{ url('/') }}/assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Bundle js -->
    <script src="{{ url('/') }}/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Ionicons js -->
    <script src="{{ url('/') }}/assets/plugins/ionicons/ionicons.js"></script>

    <!-- Moment js -->
    <script src="{{ url('/') }}/assets/plugins/moment/moment.js"></script>

    <!-- eva-icons js -->
    <script src="{{ url('/') }}/assets/js/eva-icons.min.js"></script>

    <!-- Rating js-->
    <script src="{{ url('/') }}/assets/plugins/rating/jquery.rating-stars.js"></script>
    <script src="{{ url('/') }}/assets/plugins/rating/jquery.barrating.js"></script>

    <!-- custom js -->
    <script src="{{ url('/') }}/assets/js/custom.js"></script>

</body>

</html>
