<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Favicons -->
    <link href="assets/img/favicon.ico" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
    {{-- <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"> --}}
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.rtl.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <!-- <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> -->
    <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"> -->
    <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/swiper/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/flatpickr.min.css')}}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    @yield('style')
</head>
<body>
    @yield('body')
    <!-- Vendor JS Files -->
    <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/swiper/script.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('assets/js/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-hijri-datetimepickermin.js')}}"></script>
    <script src="{{asset('assets/js/flatpickr.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('assets/js/jsencrypt.js')}}"></script>
    @yield('js')
    <script>
        $(function () {
            initDefault();
        });
        function initDefault() {
            $("#hijri-picker").hijriDatePicker({
                hijri:true,
                showSwitcher:false
            });
        }
        var gregorianDateField = document.getElementById('time_attendees');
        var hijriDateField = document.getElementById('time_attendees_hijri');
        gregorianDateField.addEventListener('change', function() {
            var gregorianDate = moment(this.value);
            var hijriDate = gregorianDate.format('iYYYY/iM/iD');
            hijriDateField.value = hijriDate;
        });
    </script>
</body>
</html>