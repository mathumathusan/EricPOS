@include('layouts.inc.mainhead')
</head>

<body>
<!-- Start Switcher -->
@include('layouts.inc.switcher')
<!-- End Switcher -->

<!-- Loader -->
@include('layouts.inc.loader')
<!-- Loader -->

    <div class="page">

         <!-- app-header -->
        @include('layouts.inc.header')
        <!-- /app-header -->

        <!-- Start::app-sidebar -->
        @include('layouts.inc.sidebar')
        <!-- End::app-sidebar -->

        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">

                <!-- Page Header -->
                @include('layouts.inc.page-header')
                <!-- Page Header Close -->

                {{ $slot }}

            </div>
        </div>
        <!-- End::app-content -->

   @include('layouts.inc.headersearch_modal')
        <!-- Footer Start -->

        @include('layouts.inc.footer')
        <!-- Footer End -->

    </div>


    <!-- Scroll To Top -->
    <div class="scrollToTop">
        <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
    </div>
    <div id="responsive-overlay"></div>
    <!-- Scroll To Top -->

    <!-- Popper JS -->
    <script src="{{ asset('assets/libs/@popperjs/core/umd/popper.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Defaultmenu JS -->
    <script src="{{ asset('assets/js/defaultmenu.min.js') }}"></script>

    <!-- Node Waves JS-->
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

    <!-- Sticky JS -->
    <script src="{{ asset('assets/js/sticky.js') }}"></script>

    <!-- Simplebar JS -->
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/simplebar.js') }}"></script>

    <!-- Color Picker JS -->
    <script src="{{ asset('assets/libs/@simonwep/pickr/pickr.es5.min.js') }}"></script>

    <!-- Apex Charts JS -->
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    @if (request()->routeIs('dashboard'))
    <!-- HRM Dashboard JS -->
    <script src="{{ asset('assets/js/hrm-dashboard.js') }}"></script>
    @endif

    <!-- Custom-Switcher JS -->
    <script src="{{ asset('assets/js/custom-switcher.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

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

@stack('custom-script')
</body>

</html>
