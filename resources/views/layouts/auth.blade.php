<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') - Loncey Biz</title>
    <meta name="Description" content="Loncey Biz">
    <meta name="author" content="Lonceytech">
    <meta name="robots" content="noindex">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/images/brand-logos/favicon.ico') }}" type="image/x-icon">

    <!-- Main Theme Js -->
    <script src="{{ asset('assets/js/authentication-main.js') }}"></script>

    <!-- Bootstrap Css -->
    <link id="style" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" >

    <!-- Style Css -->
    <link href="{{ asset('assets/css/styles.min.css') }}" rel="stylesheet" >

    <!-- Custom Style Css -->
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" >

    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" >

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

</head>

<body>

    {{-- @include('layouts.inc.switcher') --}}

    <div class="container">
        <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                <div class="my-5 d-flex justify-content-center">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('assets/images/lonceybiz/loncey-logo.png') }}" alt="logo" class="desktop-logo">
                        <img src="{{ asset('assets/images/lonceybiz/loncey-logo.png') }}" alt="logo" class="desktop-dark">
                    </a>
                </div>
        {{ $slot }}
            </div>
        </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Show Password JS -->
    <script src="{{ asset('assets/js/show-password.js') }}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <script>
        $(document).ready(function() {
            const notyf = new Notyf();

            function createNotification(type, message) {
                notyf.open({
                    type,
                    message,
                    duration: 5000,
                    ripple: false,
                    dismissible: true,
                    position: {
                        x: 'right',
                        y: 'top'
                    }
                });
            }

            @if (Session::has('error'))
                createNotification('error', '{{ Session::get('error') }}');
            @elseif (Session::has('success'))
                createNotification('success', '{{ Session::get('success') }}');
            @elseif (Session::has('warning'))
                createNotification('warning', '{{ Session::get('warning') }}');
            @endif

            Livewire.on('alert', data => {
                const {
                    type,
                    message
                } = data[0];
                createNotification(type, message);
            });
        });



    </script>

</body>

</html>
