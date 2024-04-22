<!DOCTYPE html>

<html lang="en" class="default-style">

<head>
    <title>t-Pajak</title>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900"
        rel="stylesheet">

    <!-- Icon fonts -->
    <link rel="stylesheet" href="{{ asset('vendor/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fonts/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fonts/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fonts/open-iconic.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fonts/pe-icon-7-stroke.css') }}">

    <!-- Core stylesheets -->
    <link rel="stylesheet" href="{{ asset('vendor/css/rtl/bootstrap.css') }}" class="theme-settings-bootstrap-css">
    <link rel="stylesheet" href="{{ asset('vendor/css/rtl/appwork.css') }}" class="theme-settings-appwork-css">
    <link rel="stylesheet" href="{{ asset('vendor/css/rtl/theme-corporate.css') }}" class="theme-settings-theme-css">
    <link rel="stylesheet" href="{{ asset('vendor/css/rtl/colors.css') }}" class="theme-settings-colors-css">
    <link rel="stylesheet" href="{{ asset('vendor/css/rtl/uikit.css') }}">
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}">

    @yield('styles')

    <script src="{{ asset('vendor/js/material-ripple.js') }}"></script>
    <script src="{{ asset('vendor/js/layout-helpers.js') }}"></script>

    <!-- Theme settings -->
    <!-- This file MUST be included after core stylesheets and layout-helpers.js in the <head> section -->
    <script src="{{ asset('vendor/js/theme-settings.js') }}"></script>

    <!-- Core scripts -->
    <script src="{{ asset('vendor/js/pace.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Libs -->
    <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{ asset('vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{ asset('vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css')}}">
    <link rel="stylesheet" href="{{ asset('vendor/libs/bootstrap-material-datetimepicker/bootstrap-material-datetimepicker.css')}}">
    <link rel="stylesheet" href="{{ asset('vendor/libs/timepicker/timepicker.css')}}">
    <link rel="stylesheet" href="{{ asset('vendor/libs/minicolors/minicolors.css')}}">

</head>

<body>
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-2">
        <div class="layout-inner">

            <!-- Layout sidenav -->
            @include('layouts.includes.sidenav')
            <!-- / Layout sidenav -->

            <!-- Layout container -->
            <div class="layout-container">
                <!-- Layout navbar -->
                @include('layouts.includes.navbar')
                <!-- / Layout navbar -->

                <!-- Layout content -->
                <div class="layout-content">

                    <!-- Content -->
                    <div class="container-fluid flex-grow-1 container-p-y">
                        <section class="content">
                            <div class="container-fluid">
                                @include('layouts.flash-message')
                                @include('layouts.header-content')
                                @yield('content')
                            </div>
                        </section>
                    </div>
                    <!-- / Content -->

                    <!-- Layout footer -->
                    @include('layouts.includes.footer')
                    <!-- / Layout footer -->

                </div>
                <!-- Layout content -->

            </div>
            <!-- / Layout container -->

        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-sidenav-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core scripts -->
    <script src="{{ asset('vendor/libs/popper/popper.js')}}"></script>
    <script src="{{ asset('vendor/js/bootstrap.js')}}"></script>
    <script src="{{ asset('vendor/js/sidenav.js')}}"></script>

    <!-- Libs -->
    <script src="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('vendor/libs/chartjs/chartjs.js')}}"></script>
    <script src="{{ asset('vendor/libs/moment/moment.js')}}"></script>
    <script src="{{ asset('vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{ asset('vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js')}}"></script>
    <script src="{{ asset('vendor/libs/bootstrap-material-datetimepicker/bootstrap-material-datetimepicker.js')}}"></script>
    <script src="{{ asset('vendor/libs/timepicker/timepicker.js')}}"></script>
    <script src="{{ asset('vendor/libs/minicolors/minicolors.js')}}"></script>

    <!-- Demo -->
    <script src="{{ asset('js/demo.js')}}"></script>
    <script src="{{ asset('js/dashboards_dashboard-2.js')}}"></script>
    <script src="{{ asset('js/forms_pickers.js')}}"></script>
    @yield('scripts')
    @stack('scripts')
</body>

</html>
