@extends('layouts.header_footer')
@section('title')
  إدارة الطلبات
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
    body, .bg-img {
        background-image: linear-gradient(rgba(255, 0, 0, 0.193), rgba(0, 0, 0, 0.589)),url("./assets/img/bg.jpg") ;
        background-repeat: no-repeat;
        background-size:cover;
        background-attachment: fixed;
        border: #47b2e4 4px solid;
      }
    .mt{
      margin-top: 150px;
    }
    .services #services-flters li {
      color: white;
    }
    .section-title {
    padding-bottom: 0px;
    }
    .services ul{
      padding-left: 0px;
    }
    .flatpickr-calendar{
      direction: rtl;
    }
  </style>
@endsection

@section('body')
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <img src="assets/img/head.png" class="img-head" ><br><br>
    <div class="container d-flex align-items-center">
      <a href="#" class="logo"><img src="assets/img/logo_630x631.png" alt="" class="img-fluid"></a>
        <h1 class="logo "><a href="#">الإستمارة الإلكترونية</a></h1>
      <nav id="navbar" class="navbar me-auto" dir="rtl">
        <ul>
          <li><a href="{{route('profiles.index')}}" class="bx bx-user-circle" style="font-size: 40px !important ;"></a></li>
          <li><a class="nav-link scrollto active text-warning" href="/home">الرئيسية</a></li>
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
          <li><a class="nav-link scrollto" href="{{route('help')}}">مساعدة</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>
  <!-- End Header -->

  <!-- ======= demand-mang Section ======= -->
  
    <section class="demand-mang mt container mb-5">

        <div class="section-title text-white">
          <h2 class="text-white">إدارة الطلبات</h2>
        </div>
        
        <div class="row" data-aos="fade-up" data-aos-delay="150">
          <div class="services">
            <ul id="services-flters" class="d-flex justify-content-center text-center" dir="rtl">
              <li data-filter="*" class="filter-active" style="margin-left: 4px;"> كل الطلبات </li>
              <li data-filter=".filter-mo"> طلبات قيد المعالجة </li>
              <li data-filter=".filter-mqbol" style="margin-right: 4px; margin-left: 4px;"> الطلبات المقبولة</li>
              <li data-filter=".filter-mr" style="margin-right: 4px;"> الطلبات المرفوضة </li>
            </ul>
            <div class="w-100" style="display: flex; justify-content: center;">
              @if ($message = Session::get('deleted'))
                <div class="alert alert-danger alert-dismissible fade show text-center col-sm-6" role="alert">
                  {{$message}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="قريب"></button>
                </div>
              @endif
              @if ($message = Session::get('updated'))
                <div class="alert alert-success col-sm-6 alert-dismissible fade show text-center" role="alert">
                  {{$message}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="قريب"></button>
                </div>
              @endif
              @if ($message = Session::get('time_attendees_no'))
                <div class="alert alert-danger col-sm-6 alert-dismissible fade show text-center" role="alert">
									<strong>اكتمل عدد الطلبات المسموح بها لل<span style="color: black; margin: 0px 5px 0px 5px;">{{$message}}</span>     حدد يوماً اخراً     </strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="قريب"></button>
                </div>
              @endif
              @if ($message = Session::get('edit_time_attendees'))
                <div class="alert alert-success col-sm-6 alert-dismissible fade show text-center" role="alert">
                  {{$message}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="قريب"></button>
                </div>
              @endif
              @if ($message = Session::get('holiday'))
                <div class="alert alert-danger col-sm-6 alert-dismissible fade show text-center" role="alert">
                  {{$message}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="قريب"></button>
                </div>
              @endif
              @foreach ($errors->all() as $error)
                  <div style="width: 100%; display: flex; justify-content: center;">
                      <div class="alert alert-danger alert-dismissible fade show text-center col-md-6 col-sm-12" role="alert">
                          {{$error}}
                          <button type="button" class="btn-close" style="left: 0" data-bs-dismiss="alert" aria-label="قريب"></button>
                      </div><br>
                  </div>
              @endforeach
            </div>
          </div>
        </div>
        <div class="row services-container" dir="rtl">

          {{-- تعديل الطلب --}}
          <div class="modal fade" id="cardpersonanews-edit-time_attendees" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true" style="margin-top:5%; margin-right:17%; width:64%;">
            <div class="modal-dialog" dir="rtl">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="staticBackdropLiveLabel">طلب تعديل موعد ومكان الحضور</h2>
                  <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                </div>
                <div class="modal-body">
                  <form action="{{url('ChangeTimeAttendeesController/update')}}" method="post">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="encrypted_id" id="encrypted_id" >
                    <input type="hidden" name="type" id="type" >
                    <table>
                      <tr class="text-center">
                        <td><p>رقم الطلب المراد تعديله</p></td>
                        <td><p id="id_show" style="margin-right: 5px"></p></td>
                      </tr>
                    </table>
                    <div class="form-group">
                      <label for="">التاريخ</label>
                      <input type="date" name="time_attendees" id="time_attendees" style="font-size:medium;" class="form-control">
                      <input type="hidden" name="time_attendees_hijri" id="time_attendees_hijri" style="font-size:medium;" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="">المحافظة</label>
                      <select class="form-select text-black" style="background-position: left 0.75rem center; font-size:medium;" name="province_id" id="province_id" required>
                        {{-- <option value="1">s</option> --}}
                          @foreach ($provinces as $province)
                              <option value="{{$province->id}}">{{$province->na_prov}}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">المديرية</label>
                      <select class="form-select text-black" style="background-position: left 0.75rem center; font-size:medium;" name="directorate_id" id="directorate_id" required>
                        @foreach ($directorates as $directorate)
                          <option value="{{$directorate->id}}">{{$directorate->na_dire}}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">المركز</label>
                      <select class="form-select text-black" style="background-position: left 0.75rem center; font-size:medium;" name="center_id" id="center_id" required>
                          @foreach ($card_version_centers as $card_version_center)
                              <option value="{{$card_version_center->id}}">{{$card_version_center->na_center}}</option>
                          @endforeach
                      </select>
                    </div>
                    
                    <div class="modal-footer justify-content-center">
                      <button type="submit" class="btn btn-primary" id="send-id"  style="font-size:15px">إرسال</button>
                      <div class="btn btn-secondary" data-bs-dismiss="modal"  style="font-size:15px ">إغلاق</div>
                    </div> 
                  </form>
                </div>
              </div>
            </div>
          </div>

          {{-- حذف الطلب --}}
          <div class="modal fade" id="cardpersonanews-delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true" style="margin-top:15%; margin-right:17%; width:64%;">
            <div class="modal-dialog" dir="rtl">
              <div class="modal-content">
                <div class="modal-header" style="background-color: rgba(255, 0, 0, 0.823)">
                  <h2 class="modal-title text-white" id="staticBackdropLiveLabel">تحذير</h2>
                  <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                </div>
                <div class="modal-body">
                  <table>
                    <tr>
                      <td>
                        <h2 style="margin-left: 5px">هل انت متاكد من حذف الطلب رقم : </h2>
                      </td>
                      <td>
                        <h2 id="id_show"></h2>
                      </td>
                    </tr>
                  </table>
                  <div class="modal-footer justify-content-center">
                    <form action="{{route('delete.card.pers')}}" method="POST">
                      @method('DELETE')
                      @csrf
                      <input type="hidden" name="encrypted_id" id="encrypted_id">
                      <input type="hidden" name="type" id="type">
                      <button type="submit" class="btn btn-danger"  style="font-size:15px">حــذف</button>
                      <div class="btn btn-secondary" data-bs-dismiss="modal"  style="font-size:15px ">إغلاق</div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

          {{-- طلبات بطاقة شخصية جديد --}}
          @foreach ($cardPersonaNews as $cardPersonaNew)
            
            <div class="col-md-3 col-sm-6 services-item
                @if ($cardPersonaNew->requeststatu->id == '1')
                  filter-mo
                @elseif($cardPersonaNew->requeststatu->id == '2')
                  filter-mqbol
                @endif mt-4 mt-xl-4">
                <div class="icon-box text-right" data-aos="zoom-in" data-aos-delay="100">
                  <div class="icon"><i class="bx bx-file"></i></div>
                  <h4><a href="">بطاقة شخصية جـديد</a></h4>
                  <p>رقم الطلب : {{$cardPersonaNew->id}}</p>
                  <p>الحالة : 
                    @if ($cardPersonaNew->request_statu_id == 2)
                      {{'تم تحديد موعد الحضور'.' '.$cardPersonaNew->time_attendees}}</p>
                    @else
                      {{$cardPersonaNew->requeststatu->na_req_status}}</p>
                    @endif
                  <p>  {{$cardPersonaNew->created_at->format('Y-m-d')}} : تاريخ الطلب </p>
                  <p>  {{$cardPersonaNew->updated_at->format('Y-m-d')}} : تاريخ التعديل </p>
                  <div class="icon display-6 py-4 mb-0">
                    <span>
                      <a href="{{route('show.card.pers', encrypt($cardPersonaNew->id))}}" class="bx bx-show"></a>
                      @if ($cardPersonaNew->request_statu_id == "1")
                        <a href="{{route('edit.card.pers', encrypt($cardPersonaNew->id))}}" class="bx bx-edit text-success"></a>
                      @elseif ($cardPersonaNew->request_statu_id == "2")
                        @if ($cardPersonaNew->time_attendees == now()->format('Y-m-d'))
                          @if (now()->format('A') == 'PM')
                          <a href="" class="bx bx-edit text-success"
                            data-id_show="{{$cardPersonaNew->id}}"
                            data-type="بطاقة شخصية جـديد"
                            data-encrypted_id="{{encrypt($cardPersonaNew->id)}}"
                            data-province_id="{{$cardPersonaNew->province_id}}"
                            data-na_prov="{{$cardPersonaNew->province->na_prov}}"
                            data-directorate_id="{{$cardPersonaNew->directorate_id}}"
                            data-na_dire="{{$cardPersonaNew->directorate->na_dire}}"
                            data-center_id="{{$cardPersonaNew->center_id}}"
                            data-time_attendees="{{$cardPersonaNew->time_attendees}}"
                            data-time_attendees_hijri="{{$cardPersonaNew->time_attendees_hijri}}"
                            data-bs-toggle="modal"
                            data-bs-target="#cardpersonanews-edit-time_attendees"></a>
                          @endif
                          @elseif ($cardPersonaNew->time_attendees < now())
                          
                          @else
                          <a href="" class="bx bx-edit text-success"
                            data-id_show="{{$cardPersonaNew->id}}"
                            data-type="بطاقة شخصية جـديد"
                            data-encrypted_id="{{encrypt($cardPersonaNew->id)}}"
                            data-province_id="{{$cardPersonaNew->province_id}}"
                            data-na_prov="{{$cardPersonaNew->province->na_prov}}"
                            data-directorate_id="{{$cardPersonaNew->directorate_id}}"
                            data-na_dire="{{$cardPersonaNew->directorate->na_dire}}"
                            data-center_id="{{$cardPersonaNew->center_id}}"
                            data-time_attendees="{{$cardPersonaNew->time_attendees}}"
                            data-time_attendees_hijri="{{$cardPersonaNew->time_attendees_hijri}}"
                            data-bs-toggle="modal"
                            data-bs-target="#cardpersonanews-edit-time_attendees"></a>
                        @endif
                      @endif
                    </span>
                    <a href="#" class="bx bx-trash text-danger" 
                      data-id_show="{{$cardPersonaNew->id}}"
                      data-encrypted_id="{{encrypt($cardPersonaNew->id)}}" 
                      data-type="بطاقة شخصية جـديد"
                      data-bs-toggle="modal" 
                      data-bs-target="#cardpersonanews-delete"></a>
                  </div>
                </div>
            </div>
          @endforeach

          {{-- طلبات بطاقة شخصية تالف / فاقد / تجديد --}}
          @foreach ($cardDamageRenewals as $cardDamageRenewal)
            <div class="col-md-3 col-sm-6 services-item
                @if ($cardDamageRenewal->requeststatu->id == '1')
                  filter-mo
                @elseif($cardDamageRenewal->requeststatu->id == '2')
                  filter-mqbol
                @endif mt-4 mt-xl-4">
                <div class="icon-box text-right" data-aos="zoom-in" data-aos-delay="100">
                  <div class="icon"><i class="bx bx-file"></i></div>
                  <h4><a href="">بطاقة شخصية {{$cardDamageRenewal->req_type}}</a></h4>
                  <p>رقم الطلب : {{$cardDamageRenewal->id}}</p>
                  <p>الحالة : 
                    @if ($cardDamageRenewal->request_statu_id == 2)
                      {{'تم تحديد موعد الحضور'.' '.$cardDamageRenewal->time_attendees}}</p>
                    @else
                      {{$cardDamageRenewal->requeststatu->na_req_status}}</p>
                    @endif
                  <p>  {{$cardDamageRenewal->created_at->format('Y-m-d')}} : تاريخ الطلب </p>
                  <p>  {{$cardDamageRenewal->updated_at->format('Y-m-d')}} : تاريخ التعديل </p>
                  <div class="icon display-6 py-4 mb-0">
                    <span>
                      <a href="{{route('carddamagerenewal.show', encrypt($cardDamageRenewal->id))}}" class="bx bx-show"></a>
                      @if ($cardDamageRenewal->request_statu_id == "1")
                        <a href="{{route('carddamagerenewal.edit', encrypt($cardDamageRenewal->id))}}" class="bx bx-edit text-success"></a>
                      @elseif ($cardDamageRenewal->request_statu_id == "2")
                        @if ($cardDamageRenewal->time_attendees == now()->format('Y-m-d'))
                          @if (now()->format('A') == 'PM')
                          <a href="" class="bx bx-edit text-success"
                            data-id_show="{{$cardDamageRenewal->id}}"
                            data-type="بطاقة شخصية تالف فاقد تجديد"
                            data-encrypted_id="{{encrypt($cardDamageRenewal->id)}}"
                            data-province_id="{{$cardDamageRenewal->province_id}}"
                            data-directorate_id="{{$cardDamageRenewal->directorate_id}}"
                            data-center_id="{{$cardDamageRenewal->center_id}}"
                            data-time_attendees="{{$cardDamageRenewal->time_attendees}}"
                            data-time_attendees_hijri="{{$cardDamageRenewal->time_attendees_hijri}}"
                            data-bs-toggle="modal"
                            data-bs-target="#cardpersonanews-edit-time_attendees"></a>
                          @endif
                          @elseif ($cardDamageRenewal->time_attendees < now())
                          
                          @else
                          <a href="" class="bx bx-edit text-success"
                            data-id_show="{{$cardDamageRenewal->id}}"
                            data-type="بطاقة شخصية تالف فاقد تجديد"
                            data-encrypted_id="{{encrypt($cardDamageRenewal->id)}}"
                            data-province_id="{{$cardDamageRenewal->province_id}}"
                            data-directorate_id="{{$cardDamageRenewal->directorate_id}}"
                            data-center_id="{{$cardDamageRenewal->center_id}}"
                            data-time_attendees="{{$cardDamageRenewal->time_attendees}}"
                            data-time_attendees_hijri="{{$cardDamageRenewal->time_attendees_hijri}}"
                            data-bs-toggle="modal"
                            data-bs-target="#cardpersonanews-edit-time_attendees"></a>
                        @endif
                      @endif
                    </span>
                    <a href="#" class="bx bx-trash text-danger" 
                      data-id_show="{{$cardDamageRenewal->id}}"
                      data-encrypted_id="{{encrypt($cardDamageRenewal->id)}}" 
                      data-type="بطاقة شخصية تالف فاقد تجديد"
                      data-bs-toggle="modal" 
                      data-bs-target="#cardpersonanews-delete"></a>
                  </div>
                </div>
            </div>
          @endforeach

          {{-- طلبات بطاقة عائلية جديد --}}
          @foreach ($familyCards as $familyCard)
            
            <div class="col-md-3 col-sm-6 services-item
                @if ($familyCard->requeststatu->id == '1')
                  filter-mo
                @elseif($familyCard->requeststatu->id == '2')
                  filter-mqbol
                @endif mt-4 mt-xl-4">
                <div class="icon-box text-right" data-aos="zoom-in" data-aos-delay="100">
                  <div class="icon"><i class="bx bx-file"></i></div>
                  <h4><a href="">بطاقة عائلية جـديد</a></h4>
                  <p>رقم الطلب : {{$familyCard->id}}</p>
                  <p>الحالة : 
                    @if ($familyCard->request_statu_id == 2)
                      {{'تم تحديد موعد الحضور'.' '.$familyCard->time_attendees}}</p>
                    @else
                      {{$familyCard->requeststatu->na_req_status}}</p>
                    @endif
                  <p>  {{$familyCard->created_at->format('Y-m-d')}} : تاريخ الطلب </p>
                  <p>  {{$familyCard->updated_at->format('Y-m-d')}} : تاريخ التعديل </p>
                  <div class="icon display-6 py-4 mb-0">
                    <span>
                      <a href="{{route('FamilyCard.show', encrypt($familyCard->id))}}" class="bx bx-show"></a>
                      @if ($familyCard->request_statu_id == "1")
                        <a href="{{route('FamilyCard.edit', encrypt($familyCard->id))}}" class="bx bx-edit text-success"></a>
                      @elseif ($familyCard->request_statu_id == "2")
                        @if ($familyCard->time_attendees == now()->format('Y-m-d'))
                          @if (now()->format('A') == 'PM')
                          <a href="" class="bx bx-edit text-success"
                            data-id_show="{{$familyCard->id}}"
                            data-type="بطاقة عائلية جـديد"
                            data-encrypted_id="{{encrypt($familyCard->id)}}"
                            data-province_id="{{$familyCard->province_id}}"
                            data-directorate_id="{{$familyCard->directorate_id}}"
                            data-center_id="{{$familyCard->center_id}}"
                            data-time_attendees="{{$familyCard->time_attendees}}"
                            data-time_attendees_hijri="{{$familyCard->time_attendees_hijri}}"
                            data-bs-toggle="modal"
                            data-bs-target="#cardpersonanews-edit-time_attendees"></a>
                          @endif
                          @elseif ($familyCard->time_attendees < now())
                          
                          @else
                          <a href="" class="bx bx-edit text-success"
                            data-id_show="{{$familyCard->id}}"
                            data-type="بطاقة عائلية جـديد"
                            data-encrypted_id="{{encrypt($familyCard->id)}}"
                            data-province_id="{{$familyCard->province_id}}"
                            data-directorate_id="{{$familyCard->directorate_id}}"
                            data-center_id="{{$familyCard->center_id}}"
                            data-time_attendees="{{$familyCard->time_attendees}}"
                            data-time_attendees_hijri="{{$familyCard->time_attendees_hijri}}"
                            data-bs-toggle="modal"
                            data-bs-target="#cardpersonanews-edit-time_attendees"></a>
                        @endif
                      @endif
                    </span>
                    <a href="#" class="bx bx-trash text-danger" 
                      data-id_show="{{$familyCard->id}}"
                      data-encrypted_id="{{encrypt($familyCard->id)}}"
                      data-type="بطاقة عائلية جديد"
                      data-bs-toggle="modal" 
                      data-bs-target="#cardpersonanews-delete"></a>
                  </div>
                </div>
            </div>
          @endforeach

          {{-- طلبات قيد ميلاد --}}
          @foreach ($birthRestrictions as $birthRestriction)
            
            <div class="col-md-3 col-sm-6 services-item
                @if ($birthRestriction->requeststatu->id == '1')
                  filter-mo
                @elseif($birthRestriction->requeststatu->id == '2')
                  filter-mqbol
                @endif mt-4 mt-xl-4">
                <div class="icon-box text-right" data-aos="zoom-in" data-aos-delay="100">
                  <div class="icon"><i class="bx bx-file"></i></div>
                  <h4><a href="">قيد وشهادة ميلاد</a></h4>
                  <p>رقم الطلب : {{$birthRestriction->id}}</p>
                  <p>الحالة : 
                    @if ($birthRestriction->request_statu_id == 2)
                      {{'تم تحديد موعد الحضور'.' '.$birthRestriction->time_attendees}}</p>
                    @else
                      {{$birthRestriction->requeststatu->na_req_status}}</p>
                    @endif
                  <p>  {{$birthRestriction->created_at->format('Y-m-d')}} : تاريخ الطلب </p>
                  <p>  {{$birthRestriction->updated_at->format('Y-m-d')}} : تاريخ التعديل </p>
                  <div class="icon display-6 py-4 mb-0">
                    <span>
                      <a href="{{route('birthRestriction.show', encrypt($birthRestriction->id))}}" class="bx bx-show"></a>
                      @if ($birthRestriction->request_statu_id == "1")
                        <a href="{{route('birthRestriction.edit', encrypt($birthRestriction->id))}}" class="bx bx-edit text-success"></a>
                      @elseif ($birthRestriction->request_statu_id == "2")
                        @if ($birthRestriction->time_attendees == now()->format('Y-m-d'))
                          @if (now()->format('A') == 'PM')
                          <a href="" class="bx bx-edit text-success"
                            data-id_show="{{$birthRestriction->id}}"
                            data-type="قيد ميلاد"
                            data-encrypted_id="{{encrypt($birthRestriction->id)}}"
                            data-province_id="{{$birthRestriction->province_id}}"
                            data-directorate_id="{{$birthRestriction->directorate_id}}"
                            data-center_id="{{$birthRestriction->center_id}}"
                            data-time_attendees="{{$birthRestriction->time_attendees}}"
                            data-time_attendees_hijri="{{$birthRestriction->time_attendees_hijri}}"
                            data-bs-toggle="modal"
                            data-bs-target="#cardpersonanews-edit-time_attendees"></a>
                          @endif
                          @elseif ($birthRestriction->time_attendees < now())
                          
                          @else
                          <a href="" class="bx bx-edit text-success"
                            data-id_show="{{$birthRestriction->id}}"
                            data-type="قيد ميلاد"
                            data-encrypted_id="{{encrypt($birthRestriction->id)}}"
                            data-province_id="{{$birthRestriction->province_id}}"
                            data-directorate_id="{{$birthRestriction->directorate_id}}"
                            data-center_id="{{$birthRestriction->center_id}}"
                            data-time_attendees="{{$birthRestriction->time_attendees}}"
                            data-time_attendees_hijri="{{$birthRestriction->time_attendees_hijri}}"
                            data-bs-toggle="modal"
                            data-bs-target="#cardpersonanews-edit-time_attendees"></a>
                        @endif
                      @endif
                    </span>
                    <a href="#" class="bx bx-trash text-danger" 
                      data-id_show="{{$birthRestriction->id}}"
                      data-encrypted_id="{{encrypt($birthRestriction->id)}}"
                      data-type="قيد ميلاد"
                      data-bs-toggle="modal" 
                      data-bs-target="#cardpersonanews-delete"></a>
                  </div>
                </div>
            </div>
          @endforeach

          {{-- طلبات قيد زواج --}}
          @foreach ($logMarriages as $logMarriage)
            
            <div class="col-md-3 col-sm-6 services-item
                @if ($logMarriage->requeststatu->id == '1')
                  filter-mo
                @elseif($logMarriage->requeststatu->id == '2')
                  filter-mqbol
                @endif mt-4 mt-xl-4">
                <div class="icon-box text-right" data-aos="zoom-in" data-aos-delay="100">
                  <div class="icon"><i class="bx bx-file"></i></div>
                  <h4><a href="">قيد زواج</a></h4>
                  <p>رقم الطلب : {{$logMarriage->id}}</p>
                  <p>الحالة : 
                    @if ($logMarriage->request_statu_id == 2)
                      {{'تم تحديد موعد الحضور'.' '.$logMarriage->time_attendees}}</p>
                    @else
                      {{$logMarriage->requeststatu->na_req_status}}</p>
                    @endif
                  <p>  {{$logMarriage->created_at->format('Y-m-d')}} : تاريخ الطلب </p>
                  <p>  {{$logMarriage->updated_at->format('Y-m-d')}} : تاريخ التعديل </p>
                  <div class="icon display-6 py-4 mb-0">
                    <span>
                      <a href="{{route('logMarriage.show', encrypt($logMarriage->id))}}" class="bx bx-show"></a>
                      @if ($logMarriage->request_statu_id == "1")
                        <a href="{{route('logMarriage.edit', encrypt($logMarriage->id))}}" class="bx bx-edit text-success"></a>
                      @elseif ($logMarriage->request_statu_id == "2")
                        @if ($logMarriage->time_attendees == now()->format('Y-m-d'))
                          @if (now()->format('A') == 'PM')
                          <a href="" class="bx bx-edit text-success"
                            data-id_show="{{$logMarriage->id}}"
                            data-type="قيد زواج"
                            data-encrypted_id="{{encrypt($logMarriage->id)}}"
                            data-province_id="{{$logMarriage->province_id}}"
                            data-directorate_id="{{$logMarriage->directorate_id}}"
                            data-center_id="{{$logMarriage->center_id}}"
                            data-time_attendees="{{$logMarriage->time_attendees}}"
                            data-time_attendees_hijri="{{$logMarriage->time_attendees_hijri}}"
                            data-bs-toggle="modal"
                            data-bs-target="#cardpersonanews-edit-time_attendees"></a>
                          @endif
                          @elseif ($logMarriage->time_attendees < now())
                          
                          @else
                          <a href="" class="bx bx-edit text-success"
                            data-id_show="{{$logMarriage->id}}"
                            data-type="قيد زواج"
                            data-encrypted_id="{{encrypt($logMarriage->id)}}"
                            data-province_id="{{$logMarriage->province_id}}"
                            data-directorate_id="{{$logMarriage->directorate_id}}"
                            data-center_id="{{$logMarriage->center_id}}"
                            data-time_attendees="{{$logMarriage->time_attendees}}"
                            data-time_attendees_hijri="{{$logMarriage->time_attendees_hijri}}"
                            data-bs-toggle="modal"
                            data-bs-target="#cardpersonanews-edit-time_attendees"></a>
                        @endif
                      @endif
                    </span>
                    <a href="#" class="bx bx-trash text-danger" 
                      data-id_show="{{$logMarriage->id}}"
                      data-encrypted_id="{{encrypt($logMarriage->id)}}"
                      data-type="قيد زواج"
                      data-bs-toggle="modal" 
                      data-bs-target="#cardpersonanews-delete"></a>
                  </div>
                </div>
            </div>
          @endforeach
          
          {{-- طلبات قيد طلاق --}}
          @foreach ($logDivorces as $logDivorce)
            
            <div class="col-md-3 col-sm-6 services-item
                @if ($logDivorce->requeststatu->id == '1')
                  filter-mo
                @elseif($logDivorce->requeststatu->id == '2')
                  filter-mqbol
                @endif mt-4 mt-xl-4">
                <div class="icon-box text-right" data-aos="zoom-in" data-aos-delay="100">
                  <div class="icon"><i class="bx bx-file"></i></div>
                  <h4><a href="">قيد طلاق</a></h4>
                  <p>رقم الطلب : {{$logDivorce->id}}</p>
                  <p>الحالة : 
                    @if ($logDivorce->request_statu_id == 2)
                      {{'تم تحديد موعد الحضور'.' '.$logDivorce->time_attendees}}</p>
                    @else
                      {{$logDivorce->requeststatu->na_req_status}}</p>
                    @endif
                  <p>  {{$logDivorce->created_at->format('Y-m-d')}} : تاريخ الطلب </p>
                  <p>  {{$logDivorce->updated_at->format('Y-m-d')}} : تاريخ التعديل </p>
                  <div class="icon display-6 py-4 mb-0">
                    <span>
                      <a href="{{route('logDivorce.show', encrypt($logDivorce->id))}}" class="bx bx-show"></a>
                      @if ($logDivorce->request_statu_id == "1")
                        <a href="{{route('logDivorce.edit', encrypt($logDivorce->id))}}" class="bx bx-edit text-success"></a>
                      @elseif ($logDivorce->request_statu_id == "2")
                        @if ($logDivorce->time_attendees == now()->format('Y-m-d'))
                          @if (now()->format('A') == 'PM')
                          <a href="" class="bx bx-edit text-success"
                            data-id_show="{{$logDivorce->id}}"
                            data-type="قيد طلاق"
                            data-encrypted_id="{{encrypt($logDivorce->id)}}"
                            data-province_id="{{$logDivorce->province_id}}"
                            data-directorate_id="{{$logDivorce->directorate_id}}"
                            data-center_id="{{$logDivorce->center_id}}"
                            data-time_attendees="{{$logDivorce->time_attendees}}"
                            data-time_attendees_hijri="{{$logDivorce->time_attendees_hijri}}"
                            data-bs-toggle="modal"
                            data-bs-target="#cardpersonanews-edit-time_attendees"></a>
                          @endif
                          @elseif ($logDivorce->time_attendees < now())
                          
                          @else
                          <a href="" class="bx bx-edit text-success"
                            data-id_show="{{$logDivorce->id}}"
                            data-type="قيد طلاق"
                            data-encrypted_id="{{encrypt($logDivorce->id)}}"
                            data-province_id="{{$logDivorce->province_id}}"
                            data-directorate_id="{{$logDivorce->directorate_id}}"
                            data-center_id="{{$logDivorce->center_id}}"
                            data-time_attendees="{{$logDivorce->time_attendees}}"
                            data-time_attendees_hijri="{{$logDivorce->time_attendees_hijri}}"
                            data-bs-toggle="modal"
                            data-bs-target="#cardpersonanews-edit-time_attendees"></a>
                        @endif
                      @endif
                    </span>
                    <a href="#" class="bx bx-trash text-danger" 
                      data-id_show="{{$logDivorce->id}}"
                      data-encrypted_id="{{encrypt($logDivorce->id)}}"
                      data-type="قيد طلاق"
                      data-bs-toggle="modal" 
                      data-bs-target="#cardpersonanews-delete"></a>
                  </div>
                </div>
            </div>
          @endforeach

          {{-- طلبات تصحيح او تثبيت او ابطال قيد --}}
          @foreach ($correctionInstRevConstrs as $correctionInstRevConstr)
            
            <div class="col-md-3 col-sm-6 services-item
                @if ($correctionInstRevConstr->requeststatu->id == '1')
                  filter-mo
                @elseif($correctionInstRevConstr->requeststatu->id == '2')
                  filter-mqbol
                @endif mt-4 mt-xl-4">
                <div class="icon-box text-right" data-aos="zoom-in" data-aos-delay="100">
                  <div class="icon"><i class="bx bx-file"></i></div>
                  <h4><a href="">تصحيح او ابطال قيد</a></h4>
                  <p>رقم الطلب : {{$correctionInstRevConstr->id}}</p>
                  <p>الحالة : 
                    @if ($correctionInstRevConstr->request_statu_id == 2)
                      {{'تم تحديد موعد الحضور'.' '.$correctionInstRevConstr->time_attendees}}</p>
                    @else
                      {{$correctionInstRevConstr->requeststatu->na_req_status}}</p>
                    @endif
                  <p>  {{$correctionInstRevConstr->created_at->format('Y-m-d')}} : تاريخ الطلب </p>
                  <p>  {{$correctionInstRevConstr->updated_at->format('Y-m-d')}} : تاريخ التعديل </p>
                  <div class="icon display-6 py-4 mb-0">
                    <span>
                      <a href="{{route('correctionInstRevConstr.show', encrypt($correctionInstRevConstr->id))}}" class="bx bx-show"></a>
                      @if ($correctionInstRevConstr->request_statu_id == "1")
                        <a href="{{route('correctionInstRevConstr.edit', encrypt($correctionInstRevConstr->id))}}" class="bx bx-edit text-success"></a>
                      @elseif ($correctionInstRevConstr->request_statu_id == "2")
                        @if ($correctionInstRevConstr->time_attendees == now()->format('Y-m-d'))
                          @if (now()->format('A') == 'PM')
                          <a href="" class="bx bx-edit text-success"
                            data-id_show="{{$correctionInstRevConstr->id}}"
                            data-type="تصحيح او ابطال قيد"
                            data-encrypted_id="{{encrypt($correctionInstRevConstr->id)}}"
                            data-province_id="{{$correctionInstRevConstr->province_id}}"
                            data-directorate_id="{{$correctionInstRevConstr->directorate_id}}"
                            data-center_id="{{$correctionInstRevConstr->center_id}}"
                            data-time_attendees="{{$correctionInstRevConstr->time_attendees}}"
                            data-time_attendees_hijri="{{$correctionInstRevConstr->time_attendees_hijri}}"
                            data-bs-toggle="modal"
                            data-bs-target="#cardpersonanews-edit-time_attendees"></a>
                          @endif
                          @elseif ($correctionInstRevConstr->time_attendees < now())
                          
                          @else
                          <a href="" class="bx bx-edit text-success"
                            data-id_show="{{$correctionInstRevConstr->id}}"
                            data-type="تصحيح او ابطال قيد"
                            data-encrypted_id="{{encrypt($correctionInstRevConstr->id)}}"
                            data-province_id="{{$correctionInstRevConstr->province_id}}"
                            data-directorate_id="{{$correctionInstRevConstr->directorate_id}}"
                            data-center_id="{{$correctionInstRevConstr->center_id}}"
                            data-time_attendees="{{$correctionInstRevConstr->time_attendees}}"
                            data-time_attendees_hijri="{{$correctionInstRevConstr->time_attendees_hijri}}"
                            data-bs-toggle="modal"
                            data-bs-target="#cardpersonanews-edit-time_attendees"></a>
                        @endif
                      @endif
                    </span>
                    <a href="#" class="bx bx-trash text-danger" 
                      data-id_show="{{$correctionInstRevConstr->id}}"
                      data-encrypted_id="{{encrypt($correctionInstRevConstr->id)}}"
                      data-type="تصحيح او ابطال قيد"
                      data-bs-toggle="modal" 
                      data-bs-target="#cardpersonanews-delete"></a>
                  </div>
                </div>
            </div>
          @endforeach

          {{-- طلبات شهادة وفاة --}}
          @foreach ($deathStatements as $deathStatement)
            
            <div class="col-md-3 col-sm-6 services-item
                @if ($deathStatement->requeststatu->id == '1')
                  filter-mo
                @elseif($deathStatement->requeststatu->id == '2')
                  filter-mqbol
                @endif mt-4 mt-xl-4">
                <div class="icon-box text-right" data-aos="zoom-in" data-aos-delay="100">
                  <div class="icon"><i class="bx bx-file"></i></div>
                  <h4><a href="">شهادة وفاة</a></h4>
                  <p>رقم الطلب : {{$deathStatement->id}}</p>
                  <p>الحالة : 
                    @if ($deathStatement->request_statu_id == 2)
                      {{'تم تحديد موعد الحضور'.' '.$deathStatement->time_attendees}}</p>
                    @else
                      {{$deathStatement->requeststatu->na_req_status}}</p>
                    @endif
                  <p>  {{$deathStatement->created_at->format('Y-m-d')}} : تاريخ الطلب </p>
                  <p>  {{$deathStatement->updated_at->format('Y-m-d')}} : تاريخ التعديل </p>
                  <div class="icon display-6 py-4 mb-0">
                    <span>
                      <a href="{{route('deathStatement.show', encrypt($deathStatement->id))}}" class="bx bx-show"></a>
                      @if ($deathStatement->request_statu_id == "1")
                        <a href="{{route('deathStatement.edit', encrypt($deathStatement->id))}}" class="bx bx-edit text-success"></a>
                      @elseif ($deathStatement->request_statu_id == "2")
                        @if ($deathStatement->time_attendees == now()->format('Y-m-d'))
                          @if (now()->format('A') == 'PM')
                          <a href="" class="bx bx-edit text-success"
                            data-id_show="{{$deathStatement->id}}"
                            data-type="شهادة وفاة"
                            data-encrypted_id="{{encrypt($deathStatement->id)}}"
                            data-province_id="{{$deathStatement->province_id}}"
                            data-directorate_id="{{$deathStatement->directorate_id}}"
                            data-center_id="{{$deathStatement->center_id}}"
                            data-time_attendees="{{$deathStatement->time_attendees}}"
                            data-time_attendees_hijri="{{$deathStatement->time_attendees_hijri}}"
                            data-bs-toggle="modal"
                            data-bs-target="#cardpersonanews-edit-time_attendees"></a>
                          @endif
                          @elseif ($deathStatement->time_attendees < now())
                          
                          @else
                          <a href="" class="bx bx-edit text-success"
                            data-id_show="{{$deathStatement->id}}"
                            data-type="شهادة وفاة"
                            data-encrypted_id="{{encrypt($deathStatement->id)}}"
                            data-province_id="{{$deathStatement->province_id}}"
                            data-directorate_id="{{$deathStatement->directorate_id}}"
                            data-center_id="{{$deathStatement->center_id}}"
                            data-time_attendees="{{$deathStatement->time_attendees}}"
                            data-time_attendees_hijri="{{$deathStatement->time_attendees_hijri}}"
                            data-bs-toggle="modal"
                            data-bs-target="#cardpersonanews-edit-time_attendees"></a>
                        @endif
                      @endif
                    </span>
                    <a href="#" class="bx bx-trash text-danger" 
                      data-id_show="{{$deathStatement->id}}"
                      data-encrypted_id="{{encrypt($deathStatement->id)}}"
                      data-type="شهادة وفاة"
                      data-bs-toggle="modal" 
                      data-bs-target="#cardpersonanews-delete"></a>
                  </div>
                </div>
            </div>
          @endforeach

          {{-- طلبات تعديل البيانات الأساسية  --}}
          @foreach ($ReqChangeDataCommons as $ReqChangeDataCommon)
            {{-- حذف الطلب --}}
            <div class="modal fade" id="ReqChangeDataCommon-delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true" style="margin-top:15%; margin-right:17%; width:64%;">
              <div class="modal-dialog" dir="rtl">
                <div class="modal-content">
                  <div class="modal-header" style="background-color: rgba(255, 0, 0, 0.823)">
                    <h2 class="modal-title text-white" id="staticBackdropLiveLabel">تحذير</h2>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                  </div>
                  <div class="modal-body">
                    <table>
                      <tr>
                        <td>
                          <h2 style="margin-left: 5px">هل انت متاكد من حذف الطلب رقم : </h2>
                        </td>
                        <td>
                          <h2 id="id_show"></h2>
                        </td>
                      </tr>
                    </table>
                    <div class="modal-footer justify-content-center">
                      <form action="{{route('req.change.data.commons.delete')}}" method="POST">
                        @csrf
                        <input type="hidden" name="encrypted_id" id="encrypted_id">
                        <button type="submit" class="btn btn-danger"  style="font-size:15px">حــذف</button>
                        <div class="btn btn-secondary" data-bs-dismiss="modal"  style="font-size:15px ">إغلاق</div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            {{-- عرض الطلب --}}
            <div class="modal fade" id="ReqChangeDataCommon-show" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true" style="margin-top:15%; margin-right:17%; width:64%;">
              <div class="modal-dialog" dir="rtl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h2 class="modal-title" id="staticBackdropLiveLabel">عرض الطلب</h2>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <table style="width: 100%; border: solid;" id="tabletd">
                        <tr style="border: solid">
                          <td style="width: 158px;background-color: #10202e;color: white;text-align: center;">
                            <label for="">رقم الطلب</label>
                          </td>
                          <td>
                            <h3 id="id" class="text-center"></h3>
                          </td>
                        </tr>
                        
                        <tr style="border: solid">
                          <td style="width: 158px;background-color: #10202e;color: white;text-align: center;">
                            <label for="">نوع البيانات المطلوب تغييرها</label>
                          </td>
                          <td>
                            <h3 id="na_type_chan_show" class="text-center"></h3>
                          </td>
                        </tr>
                        {{-- @foreach ($ReqChangeDataCommonDa->new_data as $ReqChangeDataCommon) --}}
                          <tr style="border: solid">
                            <td style="width: 158px;background-color: #10202e;color: white;text-align: center;">
                              <label for="">البيانات الجديدة   </label>
                            </td>
                            <td>
                              <h3 id="new_data_show" class="text-center"></h3>
                            </td>
                          </tr>
                          
                        {{-- @endforeach --}}
                        <tr style="border: solid">
                          <td style="width: 158px;background-color: #10202e;color: white;text-align: center;">
                            <label for="">تاريخ الطلب</label>
                          </td>
                          <td>
                            <h3 id="created_at_show" class="text-center"></h3>
                          </td>
                        </tr>
                        <tr style="border: solid">
                          <td style="width: 158px;background-color: #10202e;color: white;text-align: center;">
                            <label for="">حالة الطلب</label>
                          </td>
                          <td>
                            <h3 id="na_req_status_show" class="text-center"></h3>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="modal-footer justify-content-center">
                      <div class="btn btn-secondary" data-bs-dismiss="modal"  style="font-size:15px ">إغلاق</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 services-item align-items-center
              @if ($ReqChangeDataCommon->request_statu_id == '1')
                filter-mo
              @elseif($ReqChangeDataCommon->request_statu_id == '2')
                filter-mqbol
              @elseif($ReqChangeDataCommon->request_statu_id == '3')
                filter-mr
              @endif mt-4 mt-xl-4" >
                <div class="icon-box text-right" data-aos="zoom-in" data-aos-delay="100">
                  <div class="icon"><i class="bx bx-file"></i></div>
                  <h4><a href="">طلب تغيير البيانات الاساسية</a></h4>
                    <p>رقم الطلب : {{$ReqChangeDataCommon->id}}</p>
                    <p>الحالة : 
                      @if ($ReqChangeDataCommon->request_statu_id == '2')
                        تم تعديل البيانات
                      @else
                      {{$ReqChangeDataCommon->requeststatu->na_req_status}}
                      @endif
                    </p>
                    <p>تاريخ الطلب  : {{$ReqChangeDataCommon->created_at->format('Y-m-d')}}</p>
                    <p>تاريخ التعديل : {{$ReqChangeDataCommon->updated_at->format('Y-m-d')}}</p>
                    <div class="icon display-6 py-4 mb-0">
                      <a href="{{route('ReqChangeDataCommon.show',encrypt($ReqChangeDataCommon->id))}}" class="bx bx-show"></a>
                      @if ($ReqChangeDataCommon->requeststatu->id == "1")
                        <a href="{{route('ReqChangeDataCommon.edit',encrypt($ReqChangeDataCommon->id))}}" class="bx bx-edit text-success"></a>
                        <a href="#" class="bx bx-trash text-danger"
                        data-id_show="{{$ReqChangeDataCommon->id}}"
                        data-encrypted_id="{{encrypt($ReqChangeDataCommon->id)}}" 
                        data-bs-toggle="modal"
                        data-bs-target="#ReqChangeDataCommon-delete"></a>
                      @endif
                    </div>
                </div>
            </div>
          @endforeach

        </div>
    </section>
    <!-- End Services Section -->

  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" dir="rtl">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>الصفحات</h4>
            <ul>
              <li><i class="bx bx-chevron-left"></i> <a href="/home">الرئيسية</a></li>
              <li><i class="bx bx-chevron-left"></i> <a href="{{route('demand_mang.index')}}">إدارة الحجز</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>الخدمات</h4>
            <ul>
              <li><i class="bx bx-chevron-left"></i> <a href="{{url('index_card_pers')}}">بطاقة شخصية</a></li>
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
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @endsection
  @section('js')
  <script>
    $('#cardpersonanews-delete').on('show.bs.modal',function (event){
      var button = $(event.relatedTarget)
      var id_show = button.data('id_show')
      var encrypted_id = button.data('encrypted_id')
      var type = button.data('type')
      var modal = $(this)
      modal.find('.modal-body #id_show').html(id_show);
      modal.find('.modal-body #encrypted_id').val(encrypted_id);
      modal.find('.modal-body #type').val(type);
    })
    $('#ReqChangeDataCommon-edit').on('show.bs.modal',function (event){
      var button = $(event.relatedTarget)
      var id_show = button.data('id_show')
      var encrypted_id = button.data('encrypted_id');
      var na_type_chan_edit = button.data('na_type_chan_edit')
      var new_data_edit = button.data('new_data_edit')
      var modal = $(this)
      modal.find('.modal-body #na_type_chan_edit').val(na_type_chan_edit);
      modal.find('.modal-body #new_data_edit').val(new_data_edit);
      modal.find('.modal-body #id_show').html(id_show);
      modal.find('.modal-body #encrypted_id').val(encrypted_id);
    });
    $('#ReqChangeDataCommon-delete').on('show.bs.modal',function (event){
      var button = $(event.relatedTarget)
      var id_show = button.data('id_show')
      var encrypted_id = button.data('encrypted_id')
      var modal = $(this)
      modal.find('.modal-body #id_show').html(id_show);
      modal.find('.modal-body #encrypted_id').val(encrypted_id);
    })
    $('#cardpersonanews-edit-time_attendees').on('show.bs.modal',function (event){
      var button = $(event.relatedTarget)
      var type = button.data('type')
      var id_show = button.data('id_show')
      var encrypted_id = button.data('encrypted_id')
      var province_id = button.data('province_id')
      var na_prov = button.data('na_prov')
      var directorate_id = button.data('directorate_id')
      var na_dire = button.data('na_dire')
      var center_id = button.data('center_id')
      var time_attendees = button.data('time_attendees')
      var time_attendees_hijri = button.data('time_attendees_hijri')
      var modal = $(this)
      modal.find('.modal-body #id_show').html(id_show);
      modal.find('.modal-body #type').val(type);
      modal.find('.modal-body #encrypted_id').val(encrypted_id);
      modal.find('.modal-body #province_id').val(province_id);
      modal.find('.modal-body #directorate_id').val(directorate_id);
      modal.find('.modal-body #center_id').val(center_id);
      modal.find('.modal-body #time_attendees').val(time_attendees);
      modal.find('.modal-body #time_attendees_hijri').val(time_attendees_hijri);
      var selectedProvinceId = $('#province_id').val();
    })
    flatpickr.localize({firstDayOfWeek:6});
    flatpickr("#time_attendees", {
    // تعيين خيارات العرض والتنسيق
    dateFormat: "Y-m-d",
    disableMobile: true,
    
    // تعيين التواريخ التي يتم تعطيلها
    disable: [
        function(date) {
            return (date.getMonth() === 4 && date.getDate() === 1) || (date.getMonth() === 4 && date.getDate() === 22) || (date.getMonth() === 8 && date.getDate() === 26) || (date.getMonth() === 9 && date.getDate() === 14) || (date.getMonth() === 10 && date.getDate() === 30) || (date.getDay() === 5 || date.getDay() === 4);
        }
    ]
    });

  // استدعاء المديريات المرتبطة بالمحافظة المختارة
  $('#province_id').change(function() {
                var province_id = $(this).val();
                if (province_id) {
                    $.ajax({
                        url: "{{ route('getDirectoratesByGovernorate') }}",
                        type: "POST",
                        data: {
                            province_id: province_id,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            // إضافة اختيارات المديريات إلى حقل المديرية
                            $('#directorate_id').empty().append('<option value="">مديرية</option>');
                            $.each(data, function(key, value) {
                                $('#directorate_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                            // إفراغ حقل المركز
                            $('#center_id').empty().append('<option value="">مركز</option>');
                        }
                    });
                } else {
                    // إفراغ حقول المديرية والمركز
                    $('#directorate_id').empty().append('<option value="">مديرية</option>');
                    $('#center_id').empty().append('<option value="">مركز</option>');
                }
            });

            // استدعاء المراكز المرتبطة بالمديرية المختارة
            $('#directorate_id').change(function() {
                var directorate_id = $(this).val();
                if (directorate_id) {
                    $.ajax({
                        url: "{{ route('getCentersByDirectorate') }}",
                        type: "POST",
                        data: {
                            directorate_id: directorate_id,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            // إضافة اختيارات المراكز إلى حقل المركز
                            $('#center_id').empty().append('<option value="">مركز</option>');
                            $.each(data, function(key, value) {
                                $('#center_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    // إفراغ حقل المركز
                    $('#center_id').empty().append('<option value="">مركز</option>');
                }
            });
  </script>
  @endsection