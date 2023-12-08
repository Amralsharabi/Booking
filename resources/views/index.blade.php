  @extends('layouts.header_footer')
  @section('title')
    الرئيسية
  @endsection
  @section('style')  
    <style>
      .img-head{
        width: 100%;
        max-height: 120px;
      }.h3_login{
        text-align: center;
        margin-bottom: 30px;
      }
      .bx-help-circle{
        text-align: left;
      }.collapsed{
        font-size: 20px !important;
      }body, .bg-img {
        background-image: linear-gradient(rgba(255, 0, 0, 0.193), rgba(0, 0, 0, 0.589)),url("./assets/img/bg.jpg") ;
        background-repeat: no-repeat;
        background-size:cover;
        background-attachment: fixed;
        border: #47b2e4 3px solid;
      }.services-wra{
        margin-top: 11px;
        margin-bottom: 5px;
      }.bg-img{
        margin-right: 3px;
      }
      @media (min-width: 992px)
      {
        .services-container .col-lg-4{
          width:33% !important;
        }
      }
    </style>
  @endsection

  @section('body')
    

    <!-- ======= Header ======= -->

    <header id="header" class="fixed-top ">
      <img src="assets/img/head.png" class="img-head" ><br><br>
      <div class="container d-flex align-items-center">
        <a href="#" class="logo"><img src="assets/img/logo_630x631.png" alt="" class="img-fluid"></a>
        <h1 class="logo"><a href="#">الإستمارة الإلكترونية</a></h1>
        <nav id="navbar" class="navbar me-auto sidebar" dir="rtl">
          <ul >
            <li><a href="{{route('profiles.index')}}" class="bx bx-user-circle nav-link scrollto" style="font-size: 40px !important ;"></a></li>
            <li><a class="nav-link scrollto active" href="/home">الرئيسية</a></li>
            <li class="dropdown" dir="rtl"><a class="nav-link scrollto " href="#services">الخدمات <i class="bi bi-chevron-down"></i></a>
              <ul >
                <li class="dropdown" ><a href="#services"><span>بطاقة</span> <i class="bi bi-chevron-left"></i></a>
                <ul style="left: -100%">
                    <li class="dropdown"><a  href="#services"><span>شخصية</span><i class="bi bi-chevron-left"></i></a>
                        <ul style="left: -100%">
                            <li><a class="scrollto" href="{{url('index_card_pers')}}">جديد</a></li>
                            <li><a class="scrollto" href="{{route('cardDamagedRenewal.index')}}">بدل تالف / فاقد /تجديد</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a  href="#services"><span>عائلية</span><i class="bi bi-chevron-left"></i></a>
                        <ul style="left: -100%">
                            <li><a class="scrollto" href="{{route('FamilyCard.index')}}">جديد</a></li>
                            <li><a class="scrollto" href="{{route('FamilyCard.index')}}">بدل تالف / فاقد /تجديد</a></li>
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
            <li><a class="nav-link   scrollto" href="#faq">أسئلة متكررة</a></li>
            <li><a class="nav-link   scrollto" href="#about"> حول النظام</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div>
      <div class="container">
        @if ($message = Session::get('success1'))
          <div class="alert alert-success alert-dismissible fade show py-10 text-center" role="alert" style="text-align:right ">
            <p>{{$message}}</p>
            <h2 class="alert-heading">لقد اكملت عملية الحاجز بنجاح</h2>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="قريب"></button>
            <hr>
            <p class="mb-0">ستصلك رسالة بموعد حضورك الى المصلحة لاكمال المعاملة</p>
          </div>
        @endif
      </div>
      <div class="container">
        @if ($message = Session::get('success'))
          <div class="alert alert-success alert-dismissible fade show py-10 text-center" role="alert" style="text-align:right ">
            <p>{{$message}}</p>
            <h2 class="alert-heading">يمكنك الان طلب اي خدمة يقدمها نظام الحجز الالكتروني لمصلحة الاحول المدنية</h2>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="قريب"></button>
            {{-- <hr>
            <p class="mb-0">ستصلك رسالة بموعد حضورك الى المصلحة لاكمال المعاملة</p> --}}
          </div>
        @endif
      </div>
      <div class="container">
        @if ($message = Session::get('add'))
          <div class="alert alert-success alert-dismissible fade show py-10 text-center" role="alert" style="text-align:right ">
            <p>{{$message}}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="قريب"></button>
          </div>
        @endif
      </div>
      <div class="container">
        @if ($message = Session::get('warning'))
          <div class="alert alert-danger alert-dismissible fade show py-10 text-center" role="alert" style="text-align:right ">
            <h1 class="alert-heading">تحذير</h1>
            {{-- <h3>{{$message}}</h3> --}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="قريب"></button>
            <hr>
            <h2 class="mb-0">{{$message}}</h2>
          </div>
        @endif
      </div>
    </header>
    <!-- End Header -->
    
    <!-- ======= home Section ======= -->
    <section id="home" class="d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1 " data-aos="fade-up" data-aos-delay="200">
            <h1 class="text-sm-center">
              @auth
              مرحباً بك
              {{ Auth::user()->name }}
              
              @else
                          مرحباً بكم
              @endauth
            </h1>
            <h2 style="text-align: center;">في نظام الحجز الإلكتروني لمصلحة الأحوال المدنية والسجل المدني</h2>
            @if (Route::has('login'))
                    <div class="d-flex justify-content-center">
                      @auth
                      @else
                      <div style="margin-right: 10px">
                        <a href="{{ route('login') }}" class="btn-get-started scrollto">تسجيل دخول</a>
                      </div>
                      <div>
                        {{-- @if (Route::has('register')) --}}
                            <a href="{{ route('register.index') }}" class="btn-outline-get-started scrollto">إنشاء حساب</a>
                        {{-- @endif --}}
                      </div>
                      @endauth
                </div>
              @endif
          </div>
          <div class="col-lg-6 order-0 order-lg-0 home-img" data-aos="zoom-in" data-aos-delay="200">
            <img src="assets/img/logo_630x631.png" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>
    </section>
    <!-- End home -->

    <main id="main">
      <!-- ======= About Us Section ======= -->
      <section id="about" class="about">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2 style="color:#47b2e4">نبذه عن النظام</h2>
          </div>
          <div class="row content">
            <div style="text-align: center;">
              <h3 style="color: white">
                نظام الإستمارة الإلكتروني هو نظام تابع لمصلحة الأحوال المدنية والسجل المدني
                  يمكن للمواطن من خلالة ان يقوم بحجز وتعبئة استمارة طلب<a href="#services" class="btn-doc "> <br>اي وثيقة </a> تصدرها مصلحة 
                  الأحوال المدنية
                <h3 style="color: white">
                  <hr size="5" color="#209dd8">
                  "هذا النظام يقوم بالحجز وتحديد موعد حضور المواطن لأكمال المعاملات
                  ولا يقوم باصدار الوثائق"
                </h3>
              </h3>
            </div>
          </div>
        </div>
      </section>
      <!-- End About Us Section -->
      {{-- <section id="faq2"></section> --}}

      <!-- ======= Services Section ======= -->
      <section id="services" class="services  section-bg">
        <div style="margin: 0px 20px 0px 20px">

          <div class="section-title">
            <h2>الــخــدمـات</h2>
            <h1>يمكنك الان طلب حجز اي خدمة من خلال الضغط على صورة الخدمة ادناه</h1>
          </div>

          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="services-flters">
                <li data-filter="*" class="filter-active">الكل</li>
                <li data-filter=".filter-card">بطاقة</li>
                <li data-filter=".filter-constraint">قيود</li>
              </ul>
            </div>
          </div>

          <div class="row services-container" data-aos="fade-up" data-aos-delay="300" id="certificate_birth">
            {{-- ميلاد --}}
            <div class="col-lg-4 col-md-5 services-item filter-constraint bg-img">
              <div class="services-wra card">
              <img src="assets/img/services/certificate_birth_380x400.jpg.png" class="img-fluid" alt="">
              </div>
              <div class="card-body"  >
                <a href="{{route('birthRestriction.index')}}" class="btn btn-primary" style="width: 100%; font-size:20px"> طـلـب قـيـد وشـهـادة مـيـلاد</a>
              </div>
            </div>

            {{-- بطاقة شخصية --}}
            <div class="col-lg-4 col-md-5 services-item filter-card bg-img" id="cardp">
              <div class="services-wra card" >
                <img src="assets/img/services/card_p_380x400.png" class="img-fluid" alt="">
              </div>
              <div class="card-body" >
                <a href="{{route('cardDamagedRenewal.index')}}" class="btn btn-primary" style="width: 40%; font-size:20px">تالف/فاقد</a>
                <a href="{{route('cardDamagedRenewal.index')}}" class="btn btn-primary" style="width: 28%; font-size:20px">تجـديد</a>
                <a href="{{url('index_card_pers')}}" class="btn btn-primary" style="width: 28%; font-size:20px">جــديــد</a>
              </div>
            </div>

            {{-- قيد زواج --}}
            <div class="col-lg-4 col-md-5 services-item filter-constraint bg-img" id="marred">
              <div class="services-wra card">
                <img src="assets/img/services/marred_copy_380x400.png" class="img-fluid" alt="">
              </div>
              <div class="card-body"  >
                <a href="{{route('logMarriage.index')}}" class="btn btn-primary" style="width: 100%; font-size:20px"> طـلـب قـيــد زواج</a>
              </div>
            </div>

            {{-- بطاقة عائلية --}}
            <div class="col-lg-4 col-md-5 services-item filter-card bg-img" id="notebook">
              <div class="services-wra card">
                <img src="assets/img/services/notebook_card_famyle_380x400.png" class="img-fluid" alt="">                
              </div>
              <div class="card-body" >
                {{-- <a href="{{route('FamilyCard.index')}}" class="btn btn-primary" style="width: 40%; font-size:30px">تالف/فاقد</a>
                <a href="{{route('FamilyCard.index')}}" class="btn btn-primary" style="width: 28%; font-size:30px">تجـديد</a> --}}
                <a href="{{route('FamilyCard.index')}}" class="btn btn-primary" style="width: 100%; font-size:20px">طلب بطاقة عائلية</a>
              </div>
            </div>

            {{-- قيد طلاق --}}
            <div class="col-lg-4 col-md-5 services-item filter-constraint bg-img" id="divorce">
              <div class="services-wra card">
                <img src="assets/img/services/divorce_copy_380x400.png" class="img-fluid" alt="">
              </div>
              <div class="card-body"  >
                <a href="{{route('logDivorce.index')}}" class="btn btn-primary" style="width: 100%; font-size:20px"> طـلــب قـيـد طــلاق</a>
              </div>
            </div>

            {{-- وفاة --}}
            <div class="col-lg-4 col-md-5 services-item filter-constraint bg-img" id="certificate_died">
              <div class="services-wra card">
                <img src="assets/img/services/certificate_died_380x400.jpg.png" class="img-fluid" alt="">
              </div>
              <div class="card-body"  >
                <a href="{{route('deathStatement.index')}}" class="btn btn-primary" style="width: 100%; font-size:20px"> طـلـب بـيـان وشـهـادة وفـاة</a>
              </div>
            </div>

            {{-- تصحيح قيد --}}
            <div class="col-lg-4 col-md-5 services-item filter-constraint bg-img" id="certificate_corct">
              <div class="services-wra card">
                <img src="assets/img/services/certificate_corct_380x400.png" class="img-fluid" alt="">
              </div>
              <div class="card-body"  >
                <a href="{{route('correctionInstRevConstr.index')}}" class="btn btn-primary" style="width: 100%; font-size:20px">طلب تصحيح-تثبيت-ابطال قيد</a>
              </div>
            </div>
            
          </div>
        </div>
      </section>
      <!-- End services Section -->

      <!-- ======= Frequently Asked Questions Section ======= -->
      <section id="faq" class="faq">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2 style="color: #47b2e4">الأسئلة المتكررة</h2>
          </div>

          <div class="faq-list">
            <ul dir="rtl">
              <li data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-help-circle icon-help"></i>
                <a data-bs-toggle="collapse" class="collapsed" data-bs-target="#faq-list-1">كــيــف اقــوم بــحــجــز اوطــلــب  خــدمــة ؟ <i class="bx bx-chevron-down icon-show" style="left: 0;"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-1" class="collapse" data-bs-parent=".faq-list">
                  <br> 1-  قم  بانشاء حساب  اذا لم يكن لديك  حساب واذا كان لديك حساب قم بتسجيل الدخول 
                  <br> 2- اذهب الى صفحة الخدمات
                  <br> 3- قم باختيار الخدمة الذي تريدها
                  <br> 4- قم بتعبئة الاستمارة كاملةً ثم قم بإرسالها
                  <br> 5- انتظر حتى يتم قبول طلبك وتحديد موعد الحضور
                </div>
              </li>

              <li data-aos="fade-up" data-aos-delay="200">
                <i class="bx bx-help-circle icon-help"></i>
                <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">كــيــف يـتم انـشـاء الـحـسـاب ؟<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                    <br> 1-  الذهاب الى الزر العلوي في الشاشة المسمى باسم أنشاء حساب
                    <br> 2- تسجيل البريد الالكتروني وإدخال كلمة المرور
                    <br> 3- تسجيل البيانات الاساسية الخاصة بالمستخدم
                    <br> 4- الظغط على زر أرسال
              </li>

              <li data-aos="fade-up" data-aos-delay="300">
                <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">كـيـف يـتـم ادارة الـطـلـبـات او الحجز ؟<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    <br> 1- الدخول الى صفحة إدارة الحجز
                    <br> 2- تستطيع التحكم بالطلبات عن طريق الظغط  على ايقونات العرض و التعديل والحذف الموجودة في مربع النص
                 </p>
                </div>
              </li>

              <li data-aos="fade-up" data-aos-delay="400">
                <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">الية الطلب وقبول الطلب ؟<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    <br> 1- عندما يتم أرسال الطلب سيقوم مدير النظام باستقبال الطلب ومراجعته وتحديد  موعد الحضور وتبليغ المستخدم بالموعد

                </div>
              </li>

              <li data-aos="fade-up" data-aos-delay="500">
                <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">كيف يتم تعدبل البيانات الاساسية ؟ <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    <br> 1- أدخال عن طريق الايقونه التي في اعلى يمين الشاشة ومن ثم الضغدط على زر طلب تعدبل البيانات
                  </p>
                </div>
              </li>

              <li data-aos="fade-up" data-aos-delay="600">
                <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-6" class="collapsed">ماهي الوثائق المطلوبة ؟ <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-6" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    <a href="{{url('/pdf')}}">اضغط هنا لعرض الوثائق المطلوبة لكل الخدمات التي تقدمها مصلحة الاحول المدنية</a>
                  </p>
                </div>
              </li>
            </ul>
          </div>

        </div>
      </section>
      <!-- End Frequently Asked Questions Section -->
      
      <!-- ======= Footer ======= -->
      <footer id="footer" dir="rtl">
        <div class="footer-top">
          <div class="container">
            <div class="row">
  
              <div class="col-lg-3 col-md-6 footer-links">
                <h4>الصفحات</h4>
                <ul>
                  <li><i class="bx bx-chevron-left"></i> <a href="#home">الرئيسية</a></li>
                  <li><i class="bx bx-chevron-left"></i> <a href="demand-mang.html">إدارة الحجز</a></li>
                  <li><i class="bx bx-chevron-left"></i> <a href="#faq">أسئلة متكررة</a></li>
                  <li><i class="bx bx-chevron-left"></i> <a href="#about">حول</a></li>
                </ul>
              </div>
  
              <div class="col-lg-3 col-md-6 footer-links">
                <h4>الخدمات</h4>
                <ul>
                  <li><i class="bx bx-chevron-left"></i> <a href="#card_p">بطاقة شخصية</a></li>
                  <li><i class="bx bx-chevron-left"></i> <a href="#notebook">بطاقة عائلية</a></li>
                  <li><i class="bx bx-chevron-left"></i> <a href="#certificate_birth">قيد ميلاد</a></li>
                  <li><i class="bx bx-chevron-left"></i> <a href="#marred">قيد زواج</a></li>
                  <li><i class="bx bx-chevron-left"></i> <a href="#divorce">قيد طلاق</a></li>
                  <li><i class="bx bx-chevron-left"></i> <a href="#certificate_died">بيان وشهادة وفاة</a></li>
                </ul>
              </div>
  
              <div class="col-lg-3 col-md-6 footer-links">
                <h4>شـبـكـتـنـا الاجـتـمـاعـيـة</h4>
                
                <div class="social-links mt-3">
                  <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                  <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                  {{-- <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                  <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                  <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> --}}
                </div>
              </div>
  
            </div>
          </div>
        </div>
  
        <div class="footer-bottom clearfix">
          <div class="copyright  ">
            &copy; Copyright <strong><span>CRA BOOKING</span></strong>. All Rights Reserved
          </div>
        </div>
      </footer>
      <!-- End Footer -->
    </main><!-- End #main -->


    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    
  @endsection