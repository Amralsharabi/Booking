@extends('layouts.head_forms')
@section('title')
تعديل طلب شهادة ميلاد
@endsection
@section('style')
    <style>
        .mes{
            background-color: #fff !important;
            padding: 20px;
            border-radius: 10px !important;
            text-align: center;
        }.modal-body h3{
            margin-bottom: 3px;
            margin-top: 0px;
        }select option{
            color: black;
        }
    </style>
@endsection
@section('body')
    <!-- ======= Header ======= -->
    {{-- <header id="header" class="fixed-top ">
        <img src="assets/img/head.png" class="img-head"><br><br>
        <div class="container d-flex align-items-center">



            <a href="#" class="logo"><img src="assets/img/logo_630x631.png" alt="" class="img-fluid"></a>
            <h1 class="logo me-auto"><a href="#">الإستمارة الإلكترونية</a></h1>

            <nav id="navbar" class="navbar" dir="rtl">
                <ul>
                    <li>
                        <a href="#" class="bx bx-user-circle" style="font-size: 40px !important ;"></a>
                    </li>
                    <li><a class="nav-link scrollto active" href="index.html">الرئيسية</a></li>
                    <li><a class="nav-link   scrollto" href="demand-mang.html">إدارة الحجز</a></li>
                    <li><a class="nav-link scrollto" href="#">مساعدة</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
        </div>
    </header> --}}
    <!-- End Header -->

    <div class="wrapper" dir="rtl">
        <form action="{{route('birthRestriction.update',encrypt($birth_restriction->id))}}" method="POST" data-aos="zoom-in-down">
            @csrf
            @method('HEAD')
            <div class="form-header">
                <h2>تعديل طلب الحصول على شهادة ميلاد</h2>
            </div>

            <!-- tab 0 -->
            <div class="tab" id="tab-0">
                <div id="wizard">
                    <div class="form-header">
                        <h2>بيانات المولود</h2>
                        <hr size="5" />
                    </div>
                    <section class="sec">
                        <div class="form-row" dir="rtl">
                            <label for="">
                                تقديم الطلب الى :
                            </label>
                            <div class="form-holder">
                                <div class="row ">
                                    <div class="col-sm-4">
                                        <select name="province_id" id="province_id" class="form-select" required data-bs-toggle='tooltip'  title='قم بإختيار عنصر من القائمة'>
                                            <option value="{{$birth_restriction->province->id}}" class="option">{{$birth_restriction->province->na_prov}}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select name="directorate_id" id="directorate_id" class="form-select" required data-bs-toggle='tooltip'  title='قم بإختيار عنصر من القائمة'>
                                            <option value="{{$birth_restriction->directorate->id}}" class="option">{{$birth_restriction->directorate->na_dire}}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select name="center_id" id="center_id" class="form-select" required data-bs-toggle='tooltip'  title='قم بإختيار عنصر من القائمة'>
                                            <option value="{{$birth_restriction->center->id}}" class="option">{{$birth_restriction->center->na_center}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                أسم المولود الكامل:
                            </label>
                            <div class="form-holder">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="الاسم الأول" class="form-control" value="{{$birth_restriction->common_data->req_fore_na}}" readonly name="" />
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="أسم الاب" class="form-control" value="{{$birth_restriction->common_data->req_second_na}}" readonly name="" />
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" placeholder="أسم الجد" class="form-control" value="{{$birth_restriction->common_data->req_fore_na}}" readonly name="" />
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" placeholder="القب" class="form-control" value="{{$birth_restriction->common_data->req_tit}}" readonly name="" />
                                    </div>
                                    <div class="col-sm-2 ">
                                        <select name="" id="" class="form-select">
                                            <option value="0" class="option">{{$birth_restriction->common_data->nationality_req->nationality_na}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr size="5" class="hr-m" />
                        <div class="form-row" dir="rtl">
                            <label for="">
                                النوع
                            </label>
                            <div class="col-lg-4 input-mar">
                                <select name="" id="" class="form-select">
                                    @if ($birth_restriction->common_data->gender == 1)
                                        <option value="1" class="option">ذكر</option>
                                        @else
                                        <option value="0" class="option">انثى</option>
                                    @endif
                                </select>
                            </div>
                            <label style="margin-right: 20px;">
                                نوع الولادة:
                            </label>
                            <div class="col-lg-4 input-mar">
                                <select name="birth_type_id" id="birth_type_id" class="form-select">
                                    <option value="{{$birth_restriction->birthtyp->id}}" class="option">{{$birth_restriction->birthtyp->birth_ty_na}}</option>
                                    @foreach ($birth_typs as $birth_typ)
                                        @if ($birth_typ->id != $birth_restriction->birthtyp->id)
                                            <option value="{{$birth_typ->id}}" class="option">{{$birth_typ->birth_ty_na}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr size="5" class="hr-m" />
                        <div class="form-row" dir="rtl">
                            <label for="">
                                صفة من قام بتوليد
                            </label>
                            <div class="col-lg-4 input-mar">
                                <select name="generated_id" id="generated_id" class="form-select">
                                    <option value="{{$birth_restriction->generatedwho->id}}" class="option">{{$birth_restriction->generatedwho->na_generwho}}</option>
                                    @foreach ($generated_whos as $generated_who)
                                        @if ($generated_who->id != $birth_restriction->generatedwho->id)
                                            <option value="{{$generated_who->id}}" class="option">{{$generated_who->na_generwho}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <label style="margin-right: 20px;">
                                مكان الولادة:
                            </label>
                            <div class="col-lg-4 input-mar">
                                <select name="place_birth_id" id="place_birth_id" class="form-select">
                                    <option value="{{$birth_restriction->placebirth->id}}" class="option">{{$birth_restriction->placebirth->na_place}}</option>
                                    @foreach ($place_births as $place_birth)
                                        @if ($place_birth->id != $birth_restriction->placebirth->id)
                                            <option value="{{$place_birth->id}}" class="option">{{$place_birth->na_place}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr size="5" class="hr-m" />
                        <!-- اضافة ساعة الميلاد -->
                        <div class="form-row" dir="rtl">
                            <label for="">
                                تاريخ الميلاد الميلاد:
                            </label>
                            <div class="col-sm-4">
                                <input type="date" value="{{$birth_restriction->common_data->date_pirth_ad}}" class="form-control" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>'/>
                            </div>
                            <label for="" style="margin-right: 20px;">
                                تاريخ الميلاد الهجري:
                            </label>
                            <div class="col-sm-4">
                                <input type="text" value="{{$birth_restriction->common_data->date_pirth_he}}" class="form-control text-ignore-validation" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>'/>
                            </div>
                        </div>

                        <hr size="5" class="hr-m" />
                        <div class="form-row" dir="rtl">
                            <label for="">
                                محل الميلاد:
                            </label>
                            <div class="form-holder">
                                <div class="row">
                                    <div class="col-sm-3 " >
                                        <select id="" class="form-select" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>' >
                                            <option value="0" class="option"> {{$birth_restriction->common_data->countrie_birth->countrie_na}}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 " >
                                        <select id="" class="form-select" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>'>
                                            <option value="0" class="option">{{$birth_restriction->common_data->province_birth->na_prov}}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 " >
                                        <select id="" class="form-select" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>'>
                                            <option value="0" class="option">{{$birth_restriction->common_data->directorate_pirth->na_dire}}</option>                                        
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="عزلة / قرية الميلاد" class="form-control" value="{{$birth_restriction->common_data->village_parth}}" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>' />
                                    </div>
                            </div>
                        </div>
                        </div>
                        <hr size="5" class="hr-m" />
                    </section>
                    <div class="index-btn-wrapper" dir="rtl">
                        <div class="btn btn-info col-md-2" onclick="run(0, 1);">التالي</div>
                    </div>
                </div>
            </div>

            <!-- tab 1 -->
            <div class="tab" id="tab-1">
                <div id="wizard">
                    <div class="form-header">
                        <h2>بيانات الاب</h2>
                        <hr size="5" />
                    </div>
                    <section class="sec">
                        <div class="form-row" dir="rtl">
                            <label for="">
                                    أسم الاب الكامل:
                                </label>
                            <div class="form-holder">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="الاسم الأول" class="form-control" value="{{$birth_restriction->common_data->father_fore_na}}" readonly name="" />
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="أسم الاب" class="form-control" value="{{$birth_restriction->common_data->father_second_na}}" readonly name="" />
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" placeholder="أسم الجد" class="form-control" value="{{$birth_restriction->common_data->father_third_na}}" readonly name="" />
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" placeholder="القب" class="form-control" value="{{$birth_restriction->common_data->father_tit}}" name="" readonly />
                                    </div>
                                    <div class="col-sm-2 ">
                                        <select name="" id="" class="form-select">
                                            <option value="0" class="option">{{$birth_restriction->common_data->nationality_father->nationality_na}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr size="5" class="hr-m" />
                        <div class="form-row" dir="rtl">
                            <label for="">
                                تاريخ الميلاد الميلادي:
                            </label>
                            <div class="col-sm-4">
                                <input type="date" value="{{$birth_restriction->date_pirth_Ad_father}}" name="date_pirth_Ad_father" id="date_pirth_Ad_father" class="form-control" />
                            </div>
                            <label for="" style="margin-right: 20px;">
                                تاريخ الميلاد الهجري:
                            </label>
                            <div class="col-sm-4">
                                <input type="text" value="{{$birth_restriction->date_pirth_hegira_father}}" name="date_pirth_hegira_father" id="date_pirth_hegira_father" class="form-control text-ignore-validation" />
                            </div>
                        </div>

                        <hr size="5" class="hr-m" />
                        <div class="form-row" dir="rtl">
                            <label for="">
                            محل الميلاد:
                            </label>
                            <div class="form-holder">
                                <div class="row">
                                    <div class="col-sm-3 ">
                                        <select name="countrie_parth_fath_id" id="countrie_parth_fath_id" class="form-select" required>
                                            <option value="{{$birth_restriction->countrie_parth_fath_id}}" class="option" >{{$birth_restriction->countrieparthfather->countrie_na}}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 ">
                                        <select name="province_parth_father_id" id="province_parth_father_id" class="form-select">
                                            <option value="{{$birth_restriction->province_parth_father_id}}" class="option">{{$birth_restriction->provinceparthfather->na_prov}}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 ">
                                        <select name="directorate_parth_father_id" id="directorate_parth_father_id" class="form-select">
                                        <option value="{{$birth_restriction->directorate_parth_father_id}}" class="option">{{$birth_restriction->directorateparthfather->na_dire}}</option>
                                    </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="عزلة / قرية الميلاد" class="form-control" value="{{$birth_restriction->village_parth_father}}" name="village_parth_father" id="village_parth_father" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr size="5" class="hr-m" />
                        <div class="form-row" dir="rtl">
                            <label for="">
                                محل الاقامة المعتاد:
                            </label>
                            <div class="form-holder">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <select name="countrie_accom_fath_id" id="countrie_accom_fath_id" class="form-select" required>
                                            <option value="{{$birth_restriction->countrie_accom_fath_id}}"  class="option" >{{$birth_restriction->countrieaccomfather->countrie_na}}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="prov_accom_fath_id" id="prov_accom_fath_id" class="form-select">
                                            <option value="{{$birth_restriction->prov_accom_fath_id}}" class="option">{{$birth_restriction->provinceaccomfather->na_prov}}</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-3 ">
                                        <select name="directorate_accom_fath_id" id="directorate_accom_fath_id" class="form-select">
                                            <option value="{{$birth_restriction->directorate_accom_fath_id}}" class="option">{{$birth_restriction->directorateaccomfather->na_dire}}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="عزلة / قرية" class="form-control" name="village_accomm_father" value="{{$birth_restriction->village_accomm_father}}" id="village_accomm_father" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr size="5" class="hr-m" />
                        <div class="form-row" dir="rtl">
                            <label for="">
                                الــديــانــة:
                            </label>
                            <div class="col-sm-4">
                                <select name="religions_fath_id" id="religions_fath_id" class="form-select" required>
                                    <option value="{{$birth_restriction->religions_fath_id}}" class="option">{{$birth_restriction->religionsfath->na_relig}}</option>
                                    @foreach ($religions as $religion)
                                        @if ($religion->id != $birth_restriction->religions_fath_id)
                                            <option value="{{$religion->id}}" class="option">{{$religion->na_relig}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <label for="" style="margin-right: 20px;">
                                الــــمــهـــنــة:
                            </label>
                            <div class="col-sm-4">
                            <select name="profession_father_id" id="profession_father_id" class="form-select" required>
                                <option value="{{$birth_restriction->profession_father_id}}" class="option">{{$birth_restriction->professionfather->na_profes}}</option>
                                @foreach ($professions as $profession)
                                    <option value="{{$profession->id}}" class="option">{{$profession->na_profes}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>

                        <hr size="5" class="hr-m" />
                        <div class="form-row" dir="rtl">
                            <label for="">
                                المستوى التعليمي
                            </label>
                            <div class="col-sm-4">
                                <select name="educa_level_fath" id="educa_level_fath" class="form-select" required>
                                    @if ($birth_restriction->educa_level_fath == 1)
                                        <option value="1" class="option">متعلم</option>
                                    @else
                                        <option value="0" class="option">امي</option>
                                    @endif
                                </select>
                            </div>
                            <label for="" style="margin-right: 20px;">
                                العمر عند أول زواج
                            </label>
                            <div class="col-sm-4">
                                <input type="number" value="{{$birth_restriction->fath_age_first_marri}}" placeholder="بالسنوات الكاملة" class="form-control" name="fath_age_first_marri" id="fath_age_first_marri" />
                            </div>
                        </div>

                        <hr size="5" class="hr-m" />
                        <div class="form-row" dir="rtl">
                            <label for="">
                                البطاقة
                            </label>
                            <div class="form-holder">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <select name="ty_document_fath_id" id="ty_document_fath_id" class="form-select" required>
                                            <option value="{{$birth_restriction->ty_document_fath_id}}" class="option">{{$birth_restriction->tydocumentfath->na_ty_doc}}</option>
                                            @foreach ($ty_documents as $ty_document)
                                            @if ($ty_document->id != $birth_restriction->ty_document_fath_id)
                                                <option value="{{$ty_document->id}}" class="option">{{$ty_document->na_ty_doc}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select name="card_vers_cent_fath_id" id="card_vers_cent_fath_id" class="form-select" required>
                                            <option value="{{$birth_restriction->card_vers_cent_fath_id}}" class="option">{{$birth_restriction->cardverscentfath->na_center}}</option>
                                            @foreach ($card_version_centers as $card_version_center)
                                                <option value="{{$card_version_center->id}}" class="option">{{$card_version_center->na_center}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" placeholder="الرقم الوطني" class="form-control cardid" value="{{$birth_restriction->card_id_fath}}" name="card_id_fath" id="card_id_fath"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr size="5" class="hr-m" />
                    </section>
                    <div class="index-btn-wrapper" dir="rtl">
                        <div class="btn btn-info col-md-2" onclick="run(1, 2);">التالي</div>
                        <div class="btn btn-outline-warning col-md-2" onclick="run(1, 0);">السابق</div>
                    </div>
                </div>
            </div>

            <!-- tab 2 -->
            <div class="tab" id="tab-2">
                <div id="wizard">
                    <div class="form-header">
                        <h2>بيانات الام</h2>
                        <hr size="5"/>
                    </div>
                    <section class="sec">
                        <div class="form-row" dir="rtl">
                            <label for="">
                                    أسم الام الكامل:
                            </label>
                            <div class="form-holder">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="الاسم الأول" class="form-control" value="{{$birth_restriction->common_data->father_fore_na}}" readonly name="" />
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="أسم الاب" class="form-control" value="{{$birth_restriction->common_data->father_second_na}}" readonly name="" />
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" placeholder="أسم الجد" class="form-control" value="{{$birth_restriction->common_data->father_third_na}}" readonly name="" />
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" placeholder="القب" class="form-control" value="{{$birth_restriction->common_data->father_tit}}" name="" readonly />
                                    </div>
                                    <div class="col-sm-2 ">
                                        <select name="" id="" class="form-select">
                                            <option value="0" class="option">{{$birth_restriction->common_data->nationality_father->nationality_na}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <hr size="5" class="hr-m" />
                        <div class="form-row" dir="rtl">
                            <label for="">
                                تاريخ الميلاد الميلادي:
                            </label>
                            <div class="col-sm-4">
                                <input type="date" value="{{$birth_restriction->date_pirth_ad_moth}}" name="date_pirth_ad_moth" id="date_pirth_ad_moth" class="form-control" />
                            </div>
                            <label for="" style="margin-right: 20px;">
                                تاريخ الميلاد الهجري:
                            </label>
                            <div class="col-sm-4">
                                <input type="text" value="{{$birth_restriction->date_pirth_he_moth}}" name="date_pirth_he_moth" id="date_pirth_he_moth" class="form-control text-ignore-validation" />
                            </div>
                        </div>

                        <hr size="5" class="hr-m" />
                        <div class="form-row" dir="rtl">
                            <label for="">
                            محل الميلاد:
                            </label>
                            <div class="form-holder">
                                <div class="row">
                                    <div class="col-sm-3 ">
                                        <select name="countrie_parth_moth_id" id="countrie_parth_moth_id" class="form-select" required>
                                        <option value="{{$birth_restriction->countrie_parth_moth_id}}" class="option" >{{$birth_restriction->countrieparthmother->countrie_na}}</option>
                                    </select>
                                    </div>
                                    <div class="col-sm-3 ">
                                        <select name="province_parth_moth_id" id="province_parth_moth_id" class="form-select">
                                        <option value="{{$birth_restriction->province_parth_moth_id}}" class="option">{{$birth_restriction->provinceparthmoth->na_prov}}</option>
                                    </select>
                                    </div>
                                    <div class="col-sm-3 ">
                                        <select name="directorate_parth_moth_id" id="directorate_parth_moth_id" class="form-select">
                                        <option value="{{$birth_restriction->directorate_parth_moth_id}}" class="option">{{$birth_restriction->directorateparthmoth->na_dire}}</option>
                                    </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="عزلة / قرية الميلاد" class="form-control" value="{{$birth_restriction->village_parth_moth}}" name="village_parth_moth" id="village_parth_moth" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr size="5" class="hr-m" />
                        <div class="form-row" dir="rtl">
                            <label for="">
                                محل الاقامة المعتاد:
                            </label>
                            <div class="form-holder">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <select name="countrie_accom_moth_id" id="countrie_accom_moth_id" class="form-select" required>
                                            <option value="{{$birth_restriction->countrie_accom_moth_id}}"  class="option" >{{$birth_restriction->countrieaccommoth->countrie_na}}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="prov_acom_moth_id" id="prov_acom_moth_id" class="form-select">
                                            <option value="{{$birth_restriction->prov_acom_moth_id}}" class="option">{{$birth_restriction->provinceaccommoth->na_prov}}</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-3 ">
                                        <select name="directorate_acom_moth_id" id="directorate_acom_moth_id" class="form-select">
                                            <option value="{{$birth_restriction->directorate_acom_moth_id}}" class="option">{{$birth_restriction->directorateaccommoth->na_dire}}</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-3">
                                        <input type="text" placeholder="عزلة / قرية" class="form-control" value="{{$birth_restriction->village_accomm_moth}}" name="village_accomm_moth" id="village_accomm_moth" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr size="5" class="hr-m" />
                        <div class="form-row" dir="rtl">
                            <label for="">
                                الــديــانــة:
                            </label>
                            <div class="col-sm-4">
                                <select name="religion_moth_id" id="religion_moth_id" class="form-select" required>
                                    <option value="{{$birth_restriction->religion_moth_id}}" class="option">{{$birth_restriction->religionsmoht->na_relig}}</option>
                                    @foreach ($religions as $religion)
                                        @if ($religion->id != $birth_restriction->religion_moth_id)
                                            <option value="{{$religion->id}}" class="option">{{$religion->na_relig}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <label for="" style="margin-right: 20px;">
                                الــــمــهـــنــة:
                            </label>
                            <div class="col-sm-4">
                            <select name="profession_moth_id" id="profession_moth_id" class="form-select" required>
                                <option value="{{$birth_restriction->profession_moth_id}}" class="option">{{$birth_restriction->professionmoth->na_profes}}</option>
                                @foreach ($professions as $profession)
                                    @if ($profession->id != $birth_restriction->profession_moth_id)
                                        <option value="{{$profession->id}}" class="option">{{$profession->na_profes}}</option>
                                    @endif
                                @endforeach
                            </select>
                            </div>
                        </div>

                        <hr size="5" class="hr-m" />
                        <div class="form-row" dir="rtl">
                            <label for="">
                                المستوى التعليمي
                            </label>
                            <div class="col-sm-4">
                                <select name="educa_level_moth" id="educa_level_moth" class="form-select" required>
                                    @if ($birth_restriction->educa_level_moth == 1)
                                        <option value="1" class="option">متعلم</option>
                                    @else
                                        <option value="0" class="option">امي</option>
                                    @endif
                                </select>
                            </div>
                            <label for="" style="margin-right: 20px;">
                                العمر عند أول زواج
                            </label>
                            <div class="col-sm-4">
                                <input type="number" placeholder="بالسنوات الكاملة" value="{{$birth_restriction->moth_age_first_marri}}" class="form-control" name="moth_age_first_marri" id="moth_age_first_marri"/>
                            </div>
                        </div>

                        <hr size="5" class="hr-m" />
                        <div class="form-row" dir="rtl">
                            <label for="">
                                البطاقة
                            </label>
                            <div class="form-holder">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <select name="ty_document_moth_id" id="ty_document_moth_id" class="form-select" required>
                                            <option value="{{$birth_restriction->ty_document_moth_id}}" class="option">{{$birth_restriction->tydocumentmoth->na_ty_doc}}</option>
                                            @foreach ($ty_documents as $ty_document)
                                            @if ($ty_document->id != $birth_restriction->ty_document_moth_id)
                                                <option value="{{$ty_document->id}}" class="option">{{$ty_document->na_ty_doc}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select name="card_vers_cent_moth_id" id="card_vers_cent_moth_id" class="form-select" required>
                                            <option value="{{$birth_restriction->card_vers_cent_moth_id}}" class="option">{{$birth_restriction->cardverscentmoth->na_center}}</option>
                                            @foreach ($card_version_centers as $card_version_center)
                                                <option value="{{$card_version_center->id}}" class="option">{{$card_version_center->na_center}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" placeholder="الرقم الوطني" value="{{$birth_restriction->card_id_moth}}" class="form-control cardid" name="card_id_moth" id="card_id_moth"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr size="5" class="hr-m" />
                    </section>
                    <div class="index-btn-wrapper" dir="rtl">
                        <div class="btn btn-info col-md-2" onclick="run(2, 3);">التالي</div>
                        <div class="btn btn-outline-warning col-md-2" onclick="run(2, 1);">السابق</div>
                    </div>
                </div>
            </div>

            <!-- tab 3 -->
            <div class="tab" id="tab-3">
                <div class="container">
                    <div class="row justify-content-center">
                        <div id="createaccount " class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" >
                            <div class="modal-content mes col-md-6 col-lg-6">
                                <div class="modal-header">
                                <h5 class="modal-title text-black display-6" id="staticBackdropLiveLabel"> تـــــاكـــيـــد</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق" onclick="run(3, 2);"></button>
                                </div>
                                <hr style="color: black;">
                                <div class="modal-body text-black">
                                    <h3>هل انت متاكد من البيانات التي قمت بتعديلها</h3>          
                                </div>
                                <hr style="color: black;">
                                <div class="modal-footer mx-auto ">
                                    <button class="btn btn-primary" style="margin-left: 5px;">حــفــظ</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="run(3, 2);">إغــلاق</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection
@section('js')
    <script>
        // تقديم الطالب الى
        $(document).ready(function() {
            // استدعاء المحافظات من الخادم عند تحميل الصفحة
            $.ajax({
                url: "{{ route('indexprovince') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    // إضافة اختيارات المحافظات إلى حقل المحافظات
                    $.each(data, function(key, value) {
                        $('#province_id').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
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

            // العنوان
            // استدعاء الدول من الخادم عند تحميل الصفحة
            $.ajax({
                url: "{{ route('Location.index') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    // إضافة اختيارات الدول إلى حقل الدولة
                    $.each(data, function(key, value) {
                        $('#countrie_accom_id').append('<option value="' + key + '">' + value + '</option>');
                        $('#countrie_parth_fath_id').append('<option value="' + key + '">' + value + '</option>');
                        $('#countrie_parth_moth_id').append('<option value="' + key + '">' + value + '</option>');
                        $('#countrie_accom_fath_id').append('<option value="' + key + '">' + value + '</option>');
                        $('#countrie_accom_moth_id').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });

            // استدعاء المحافظات المرتبطة بالدولة المختارة
            $('#countrie_accom_id').change(function() {
                var countrie_accom_id = $(this).val();
                if (countrie_accom_id) {
                    $.ajax({
                        url: "{{ route('getGovernoratesByCountry') }}",
                        type: "POST",
                        data: {
                            countrie_accom_id: countrie_accom_id,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            // إضافة اختيارات المحافظات إلى حقل المحافظة
                            $('#province_accom_id').empty().append('<option value="">اختر محافظة</option>');
                            $.each(data, function(key, value) {
                                $('#province_accom_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                            // إفراغ حقول المديرية والمركز
                            $('#directorate_accom_id').empty().append('<option value="">اختر مديرية</option>');
                        }
                    });
                } else {
                    // إفراغ جميع حقول الاختيارات
                    $('#province_accom_id').empty().append('<option value="">اختر محافظة</option>');
                    $('#directorate_accom_id').empty().append('<option value="">اختر مديرية</option>');
                }
            });

            // استدعاء المديريات المرتبطة بالمحافظة المختارة
            $('#province_accom_id').change(function() {
                var province_accom_id = $(this).val();
                if (province_accom_id) {
                    $.ajax({
                        url: "{{ route('getDirectoratesByProvinceAccom') }}",
                        type: "POST",
                        data: {
                            province_accom_id: province_accom_id,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            // إضافة اختيارات المديريات إلى حقل المديرية
                            $('#directorate_accom_id').empty().append('<option value="">اختر مديرية</option>');
                            $.each(data, function(key, value) {
                                $('#directorate_accom_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    // إفراغ حقول المديرية
                    $('#directorate_accom_id').empty().append('<option value="">اختر مديرية</option>');
                }
            });

            // استدعاء المحافظات المرتبطة بدولة ميلاد الاب المختارة
            $('#countrie_parth_fath_id').change(function() {
                var countrie_parth_fath_id = $(this).val();
                if (countrie_parth_fath_id) {
                    $.ajax({
                        url: "{{ route('getGovernoratesByCountryParthFather') }}",
                        type: "POST",
                        data: {
                            countrie_parth_fath_id: countrie_parth_fath_id,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            // إضافة اختيارات المحافظات إلى حقل المحافظة
                            $('#province_parth_father_id').empty().append('<option value="">محافظة الميلاد</option>');
                            $.each(data, function(key, value) {
                                $('#province_parth_father_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                            // إفراغ حقول المديرية والمركز
                            $('#directorate_parth_father_id').empty().append('<option value="">مديرية الميلاد</option>');
                        }
                    });
                } else {
                    // إفراغ جميع حقول الاختيارات
                    $('#province_parth_father_id').empty().append('<option value="">محافظة الميلاد</option>');
                    $('#directorate_parth_father_id').empty().append('<option value="">مديرية الميلاد</option>');
                }
            });

            // استدعاء المديريات المرتبطة بمحافظة ميلاد الاب المختارة
            $('#province_parth_father_id').change(function() {
                var province_parth_father_id = $(this).val();
                if (province_parth_father_id) {
                    $.ajax({
                        url: "{{ route('getDirectoratesByProvinceParthFather') }}",
                        type: "POST",
                        data: {
                            province_parth_father_id: province_parth_father_id,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            // إضافة اختيارات المديريات إلى حقل المديرية
                            $('#directorate_parth_father_id').empty().append('<option value="">مديرية الميلاد</option>');
                            $.each(data, function(key, value) {
                                $('#directorate_parth_father_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    // إفراغ حقول المديرية
                    $('#directorate_parth_father_id').empty().append('<option value="">مديرية الميلاد</option>');
                }
            });

            // استدعاء المحافظات المرتبطة بدولة ميلاد الام المختارة
            $('#countrie_parth_moth_id').change(function() {
                var countrie_parth_moth_id = $(this).val();
                if (countrie_parth_moth_id) {
                    $.ajax({
                        url: "{{ route('getGovernoratesByCountryParthMoth') }}",
                        type: "POST",
                        data: {
                            countrie_parth_moth_id: countrie_parth_moth_id,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            // إضافة اختيارات المحافظات إلى حقل المحافظة
                            $('#province_parth_moth_id').empty().append('<option value="">محافظة الميلاد</option>');
                            $.each(data, function(key, value) {
                                $('#province_parth_moth_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                            // إفراغ حقول المديرية والمركز
                            $('#directorate_parth_moth_id').empty().append('<option value="">مديرية الميلاد</option>');
                        }
                    });
                } else {
                    // إفراغ جميع حقول الاختيارات
                    $('#province_parth_moth_id').empty().append('<option value="">محافظة الميلاد</option>');
                    $('#directorate_parth_moth_id').empty().append('<option value="">مديرية الميلاد</option>');
                }
            });

            // استدعاء المديريات المرتبطة بمحافظة ميلاد الام المختارة
            $('#province_parth_moth_id').change(function() {
                var province_parth_moth_id = $(this).val();
                if (province_parth_moth_id) {
                    $.ajax({
                        url: "{{ route('getDirectoratesByProvinceParthMoth') }}",
                        type: "POST",
                        data: {
                            province_parth_moth_id: province_parth_moth_id,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            // إضافة اختيارات المديريات إلى حقل المديرية
                            $('#directorate_parth_moth_id').empty().append('<option value="">مديرية الميلاد</option>');
                            $.each(data, function(key, value) {
                                $('#directorate_parth_moth_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    // إفراغ حقول المديرية
                    $('#directorate_parth_moth_id').empty().append('<option value="">مديرية الميلاد</option>');
                }
            });

            // استدعاء المحافظات المرتبطة بدولة اقامة الاب المختارة
            $('#countrie_accom_fath_id').change(function() {
                var countrie_accom_fath_id = $(this).val();
                if (countrie_accom_fath_id) {
                    $.ajax({
                        url: "{{ route('getGovernoratesByCountryAccomFath') }}",
                        type: "POST",
                        data: {
                            countrie_accom_fath_id: countrie_accom_fath_id,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            // إضافة اختيارات المحافظات إلى حقل المحافظة
                            $('#prov_accom_fath_id').empty().append('<option value="">محافظة الإقامة</option>');
                            $.each(data, function(key, value) {
                                $('#prov_accom_fath_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                            // إفراغ حقول المديرية والمركز
                            $('#directorate_accom_fath_id').empty().append('<option value="">مديرية الإقامة</option>');
                        }
                    });
                } else {
                    // إفراغ جميع حقول الاختيارات
                    $('#prov_accom_fath_id').empty().append('<option value="">محافظة الإقامة</option>');
                    $('#directorate_accom_fath_id').empty().append('<option value="">مديرية الإقامة</option>');
                }
            });

            // استدعاء المديريات المرتبطة بمحافظة اقامة الاب المختارة
            $('#prov_accom_fath_id').change(function() {
                var prov_accom_fath_id = $(this).val();
                if (prov_accom_fath_id) {
                    $.ajax({
                        url: "{{ route('getDirectoratesByProvincAccomFath') }}",
                        type: "POST",
                        data: {
                            prov_accom_fath_id: prov_accom_fath_id,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            // إضافة اختيارات المديريات إلى حقل المديرية
                            $('#directorate_accom_fath_id').empty().append('<option value="">مديرية الإقامة</option>');
                            $.each(data, function(key, value) {
                                $('#directorate_accom_fath_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    // إفراغ حقول المديرية
                    $('#directorate_accom_fath_id').empty().append('<option value="">مديرية الإقامة</option>');
                }
            });

            // استدعاء المحافظات المرتبطة بدولة اقامة الام المختارة
            $('#countrie_accom_moth_id').change(function() {
                var countrie_accom_moth_id = $(this).val();
                if (countrie_accom_moth_id) {
                    $.ajax({
                        url: "{{ route('getGovernoratesByCountryAccomMoth') }}",
                        type: "POST",
                        data: {
                            countrie_accom_moth_id: countrie_accom_moth_id,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            // إضافة اختيارات المحافظات إلى حقل المحافظة
                            $('#prov_acom_moth_id').empty().append('<option value="">محافظة الإقامة</option>');
                            $.each(data, function(key, value) {
                                $('#prov_acom_moth_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                            // إفراغ حقول المديرية والمركز
                            $('#directorate_acom_moth_id').empty().append('<option value="">مديرية الإقامة</option>');
                        }
                    });
                } else {
                    // إفراغ جميع حقول الاختيارات
                    $('#prov_acom_moth_id').empty().append('<option value="">محافظة الإقامة</option>');
                    $('#directorate_acom_moth_id').empty().append('<option value="">مديرية الإقامة</option>');
                }
            });

            // استدعاء المديريات المرتبطة بمحافظة اقامة الام المختارة
            $('#prov_acom_moth_id').change(function() {
                var prov_acom_moth_id = $(this).val();
                if (prov_acom_moth_id) {
                    $.ajax({
                        url: "{{ route('getDirectoratesByProvincAccomMoth') }}",
                        type: "POST",
                        data: {
                            prov_acom_moth_id: prov_acom_moth_id,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            // إضافة اختيارات المديريات إلى حقل المديرية
                            $('#directorate_acom_moth_id').empty().append('<option value="">مديرية الإقامة</option>');
                            $.each(data, function(key, value) {
                                $('#directorate_acom_moth_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    // إفراغ حقول المديرية
                    $('#directorate_acom_moth_id').empty().append('<option value="">مديرية الإقامة</option>');
                }
            });
        });

        
        // تاريخ ميلاد الاب
        $(function () {
            initDefault();
        });
        function initDefault() {
            $("#date_pirth_hegira_father").hijriDatePicker({
                hijri:true,
                showSwitcher:false
            });
            $("#date_pirth_he_moth").hijriDatePicker({
                hijri:true,
                showSwitcher:false
            });
        }
        var date_pirth_Ad_father = document.getElementById('date_pirth_Ad_father');
        var date_pirth_hegira_father = document.getElementById('date_pirth_hegira_father');
        date_pirth_Ad_father.addEventListener('change', function() {
            var gregorianDateFather = moment(this.value);
            var hijriDateFather = gregorianDateFather.format('iYYYY/iM/iD');
            date_pirth_hegira_father.value = hijriDateFather;
        });
        var date_pirth_ad_moth = document.getElementById('date_pirth_ad_moth');
        var date_pirth_he_moth = document.getElementById('date_pirth_he_moth');
        date_pirth_ad_moth.addEventListener('change', function() {
            var gregorianDateMoth = moment(this.value);
            var hijriDateMoth = gregorianDateMoth.format('iYYYY/iM/iD');
            date_pirth_he_moth.value = hijriDateMoth;
        });
    </script>
@endsection