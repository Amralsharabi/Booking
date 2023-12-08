<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Favicons -->
    <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <link rel="stylesheet" href="{{asset('assets/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    {{-- <link href="assets/vendor/bootstrap/css/bootstrap.rtl.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}">
    <!-- <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"> -->
    <link rel="stylesheet" href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/swiper/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/stylea_form.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/print.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}">

    
    <script src="{{asset('assets/js/print.min.js')}}"></script>
    <style>
        @media (max-width: 1200px){
            .wrapper{
                    margin-top: 23% !important;
                }
        }
        @media (max-height: 1400px ){
            @media (max-width: 767px ){
                .btn{
                    border-radius: 50px;
                    width: 80%;
                    margin-bottom: 10px;
                }
                .wrapper{
                    margin-top: 36% !important;
                }
            }
        }
        .sec{
            background-color: transparent !important;
        }
        .input_mar{
            margin-bottom: 10px;
        }
        .input_mar label {
            width: 5%;
            margin-left: 20px;
            font-size: 20px;
        }
        .btn{
            border-radius: 50px;
            font-size: 20px;
        }
        .index-btn-wrapper{
            text-align: center;
        }
        .hr-m{
            margin-bottom: 10px;
            
        }
        .img-head{
            width: 100%;
            max-height: 120px;
        }
        .wrapper{
            margin-top: 15%;
        }
        .form-control{
            color: white !important;
        }.shadownext:hover{
            box-shadow: 0 0 20px;
            /* background-color: #6ea8ff; */
        }.shadoback{
            box-shadow: 0px 0px 10px;
        }
    </style>
    @yield('style')
</head>
<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <img src="{{asset('assets/img/head.png')}}" class="img-head" ><br><br>
        <div class="container d-flex align-items-center">
            <a href="#" class="logo "><img src="{{asset('assets/img/logo_630x631.png')}}" alt="" class="img-fluid"></a>
            <h1 class="logo me-auto"><a href="#">الإستمارة الإلكترونية</a></h1>
        <nav id="navbar" class="navbar " dir="rtl">
            <ul>
            <li><a href="{{route('profiles.index')}}" class="bx bx-user-circle" style="font-size: 40px !important ;"></a></li>
            <li><a class="nav-link scrollto active" href="/home">الرئيسية</a></li>
            <li class="dropdown" dir="rtl"><a class="nav-link scrollto " href="#">الخدمات <i class="bi bi-chevron-down"></i></a>
                <ul >
                  <li class="dropdown" ><a href="#services"><span>بطاقة</span> <i class="bi bi-chevron-left"></i></a>
                    <ul style="left: -100%">
                        <li class="dropdown"><a  href="#services"><span>شخصية</span><i class="bi bi-chevron-left"></i></a>
                            <ul style="left: -100%">
                                <li><a class="scrollto" href="{{url('index_card_pers')}}">جديد</a></li>
                                <li><a class="scrollto" href="{{route('cardDamagedRenewal.index')}}">بدل تالف / فاقد /تجديد</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a  href="{{route('FamilyCard.index')}}"><span>عائلية</span></a>
                            <ul style="left: -100%">
                                {{-- <li><a class="scrollto" href="{{route('FamilyCard.index')}}">جديد</a></li> --}}
                                {{-- <li><a class="scrollto" href="{{route('cardDamagedRenewal.index')}}">بدل تالف / فاقد /تجديد</a></li> --}}
                            </ul>
                        </li>
                    </ul>
                  </li>
                  <li class="dropdown"><a href="#services"><span>قيد</span> <i class="bi bi-chevron-left"></i></a>
                    <ul style="left: -100%">
                      <li><a class="scrollto" href="{{route('birthRestriction.index')}}">ميلاد</a></li>
                      <li><a class="scrollto" href="{{route('logMarriage.index')}}">زواج</a></li>
                      <li><a class="scrollto" href="{{route('logDivorce.index')}}">طلاق</a></li>
                      <li><a class="scrollto" href="{{route('correctionInstRevConstr.index')}}">تصحيح او تثبيت او ابطال قيد</a></li>
                    </ul>
                  </li>
                  <li><a href="{{route('deathStatement.index')}}">بيان وشهادة وفاة</a></li>
                </ul>
              </li>
              <li><a class="nav-link   scrollto" href="{{route('demand_mang.index')}}">إدارة الحجز</a></li>
            <li><a class="nav-link scrollto" href="{{route('help')}}">مساعدة</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
    @yield('nav')
    </header>
    <!-- End Header -->
    @yield('body')
    <!-- <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script> -->
    <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/swiper/script.js')}}"></script>
    <!-- Template Main JS File -->
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('assets/js/scr.js')}}"></script>
    <script src="{{asset('assets/js/moment.min.js')}}"></script>
    <script src="{{asset('assets/vendor/cheatsheet.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-hijri-datetimepickermin.js')}}"></script>
    <script src="{{asset('assets/js/print.min.js')}}"></script>

    <script type="text/javascript">
        $(function () {
            initDefault();
        });
        function initDefault() {
            $("#hijri-picker").hijriDatePicker({
                hijri:true,
                showSwitcher:false
            });
        }
        var gregorianDateField = document.getElementById('gregorian-date');
        var hijriDateField = document.getElementById('hijri-picker');
        gregorianDateField.addEventListener('change', function() {
            var gregorianDate = moment(this.value);
            var hijriDate = gregorianDate.format('iYYYY/iM/iD');
            hijriDateField.value = hijriDate;
        });
       
    </script>
    @yield('js')
</body>
</html>