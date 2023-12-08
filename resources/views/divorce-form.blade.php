@extends('layouts.head_forms')
@section('title')
    طلب قيد طلاق
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
    <div class="wrapper" dir="rtl" >
        <form action="{{route('logDivorce.store')}}" method="POST" data-aos="zoom-in-down">
            @csrf
            <div class="form-header">
                <h2>طلب الحصول على قيد طلاق</h2>
            </div>
            <!-- tab 0 -->
            <div  class="tab" id="tab-0">
                <div id="wizard">
                    <section class="sec">
                        <div class="form-header">
                            <h2>تقديم الطلب</h2>
                            <hr size="5" />
                        </div>
                        
                        <div class="form-row" dir="rtl">
                            <label for="">
                                تقديم الطلب الى :
                            </label>
                            <div class="form-holder">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <select name="province_id" id="province_id" class="form-select" required data-bs-toggle='tooltip'  title='قم بإختيار عنصر من القائمة'>
                                            <option value="" class="option">محافظة</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select name="directorate_id" id="directorate_id" class="form-select" required data-bs-toggle='tooltip'  title='قم بإختيار عنصر من القائمة'>
                                            <option value="" class="option">مديرية </option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select name="center_id" id="center_id" class="form-select" required data-bs-toggle='tooltip'  title='قم بإختيار عنصر من القائمة'>
                                            <option value="" class="option">مركز</option>
                                        </select>
                                    </div>
                                </div>	                        
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-header">
                            <h2>تسجيل واقعة الطلاق طبقاً للبيانات التالية</h2>
                            <hr size="5" />
                        </div>
                        
                        <div class="form-row" dir="rtl">
                            <label for="">
                                تاريخ الطلاق الميلادي :
                            </label>
                            <div class="col-sm-4">
                                <input type="date" name="date_contract_ad" id="date_contract_ad" class="form-control" />
                            </div>
                            <label for="" style="margin-right: 20px;">
                                تاريخ الطلاق الهجري:
                            </label>
                            <div class="col-sm-4">
                                <input type="text" name="date_contract_he" id="date_contract_he" class="form-control text-ignore-validation" />
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                محافظة الطلاق:
                            </label>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <select class="form-select" name="province_contract_id" id="province_contract_id">
                                        <option>اختار محافظة</option>
                                    </select>
                                </div>
                            </div>
                            <label for="" style="margin-right: 20px;">
                                مديرية الطلاق:
                            </label>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <select class="form-select" name="directorate_contract_id" id="directorate_contract_id">
                                        <option>اختار مديرية</option>
                                    </select>
                                </div>
                            </div>
                            <label for="" style="margin-right: 20px;">
                                نوع الطلاق:
                            </label>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <select class="form-select" name="divor_type" id="divor_type">
                                        <option class="octicon" value="">نوع الطلاق</option>
                                        <option class="octicon" value="1">نافذ</option>
                                        <option class="octicon" value="2">رجعي</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                سبب الطلاق:
                            </label>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <input type="text" name="divorce_reason" id="divorce_reason" style="width: 100%; height: 50px; background-color: #ffffff99;border: 1px solid rgb(0, 179, 255);text-align: center;padding: 8px;color:black"/>
                                </div>
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                عدد المولدين احياء للمطلقة من  المطلق:
                            </label>
                            <div class="form-holder">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="number" placeholder="ذكور" class="form-control" name="no_births_levi_husw_male" id="no_births_levi_husw_male" />
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" placeholder="اناث" class="form-control" name="no_births_levi_husw_fem" id="no_births_levi_husw_fem" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                عدد المولدين احياء للمطلقة:
                            </label>
                            <div class="form-holder">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="number" placeholder="ذكور" class="form-control" name="no_births_live_wife_male" id="no_births_live_wife_male" />
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" placeholder="اناث" class="form-control" name="no_births_live_wife_fem" id="no_births_live_wife_fem" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row" dir="rtl">
                            <label for="">
                                تاريخ الزواج الميلادي :
                            </label>
                            <div class="col-sm-3">
                                <input type="date" name="date_marriage" id="date_marriage" class="form-control" />
                            </div>
                            <label for="" style="margin-right: 20px;">
                                تاريخ الزواج الهجري:
                            </label>
                            <div class="col-sm-3">
                                <input type="text" name="date_marriage_hj" id="date_marriage_hj" class="form-control text-ignore-validation" />
                            </div>
                            <label for="" style="margin-right: 20px;">
                                حالة المطلقة:
                            </label>
                            <div class="col-sm-3">
                                <select name="status_wife_after_divo" id="status_wife_after_divo" class="form-select" required>
                                    <option value="" class="option">حالة المطلقة</option>
                                    <option value="1" class="option">حامل</option>
                                    <option value="2" class="option">غير معروف</option>
                                    <option value="3" class="option">مرضع</option>
                                    <option value="4" class="option">لايوجد حمل</option>
                                </select>
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                اسم المحكمة:
                            </label>
                            <div class="col-sm-3">
                                <input type="text" name="Court_na" id="Court_na" class="form-control" />
                            </div>
                            <label for="" style="margin-right: 20px;">
                                رقم الوثيقة:
                            </label>
                            <div class="col-sm-3">
                                <input type="number" name="document_no" id="document_no" class="form-control" />
                            </div>
                            <label for="" style="margin-right: 20px;">
                                تاريخ الوثيقة:
                            </label>
                            <div class="col-sm-3">
                                <input type="date" name="date_document" id="date_document" class="form-control" />
                            </div>
                        </div>
                        <hr size="5" class="hr-m"/>
                    </section>
                    <div class="index-btn-wrapper" dir="rtl">
                        <div class="btn btn-info col-md-2" onclick="run(0, 1);">التالي</div>
                    </div>
                </div>
            </div>

            <!-- tab 1 -->
            <div  class="tab" id="tab-1">
                <div id="wizard">
                    <div class="form-header">
                        <h2>بيانات المطلق</h2>
                        <hr size="5" />
                    </div>
                    <section class="sec">
                        <div class="form-row" dir="rtl">
                            <label for="">
                                اسم المطلق:
                            </label>
                            <div class="form-holder">
                                <div class="row">
                                <div class="col-sm-3">
                                    <input type="text" placeholder="الاسم الأول" class="form-control" name="forena" id="forena" />
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" placeholder="أسم الاب" class="form-control" name="secondna" id="secondna" />
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" placeholder="أسم الجد" class="form-control" name="thirdna" id="thirdna" />
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" placeholder="القب" class="form-control" name="Tit" id="Tit" />
                                </div>
                            </div>	                        
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                تاريخ الميلاد الميلادي :
                            </label>
                            <div class="col-sm-4">
                                <input type="date" name="date_pirth_Ad" id="date_pirth_Ad" class="form-control" />
                            </div>
                            <label for="" style="margin-right: 20px;">
                                تاريخ الميلاد الهجري:
                            </label>
                            <div class="col-sm-4">
                                <input type="text" name="date_pirth_hegira" id="date_pirth_hegira" class="form-control text-ignore-validation" />
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                محل  ميلاد المطلق:
                            </label>
                            <div class="form-holder">
                                <div class="row">
                                    <div class="col-sm-3 " >
                                        <select name="countrie_parth_id" id="countrie_parth_id" class="form-select">
                                            <option class="option" value="">دولة</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-3 " >
                                        <select name="province_parth_id" id="province_parth_id" class="form-select">
                                            <option class="option" value="">محافظة</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-3 " >
                                        <select name="directorate_parth_id" id="directorate_parth_id" class="form-select">
                                            <option class="option" value="">مديرية </option>
                                        </select>
                                    </div>

                                    <div class="col-sm-3">
                                        <input type="text" placeholder="قرية/ مدينة" class="form-control" name="village_parth" id="village_parth"/>
                                    </div>

                                </div>
                            </div>
                        </div>
                    
                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                    محل أقامة المطلق المعتاد :
                            </label>
                            <div class="form-holder">
                                <div class="row">
                                    <div class="col-sm-3 " >
                                        <select name="countrie_acom_id" id="countrie_acom_id" class="form-select">
                                            <option class="option" value="">دولة</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-3 " >
                                        <select name="province_acom_id" id="province_acom_id" class="form-select">
                                            <option class="option" value="">محافظة</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-sm-3 " >
                                        <select name="directorate_acom_id" id="directorate_acom_id" class="form-select">
                                            <option class="option" value="">مديرية </option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="قرية/ مدينة" class="form-control" name="village_accomm" id="village_accomm" />
                                    </div>
                                </div>
                            </div>
                        </div>
            

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                الــجنسية:
                            </label>
                            <div class="col-sm-5">
                                <select name="nationality_id" id="nationality_id" class="form-select" required>
                                    <option value="" class="option">الجنسية</option>
                                    @foreach ($countrie_nationalits as $countrie_nationalit)
                                        <option value="{{$countrie_nationalit->id}}" class="option">{{$countrie_nationalit->nationality_na}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="" style="margin-right: 17px;">
                                الــديــانــة:
                            </label>
                            <div class="col-sm-5">
                                <select name="religion_id" id="religion_id" class="form-select" required>
                                    <option value="" class="option">الديانة</option>
                                    @foreach ($religions as $religion)
                                        <option value="{{$religion->id}}" class="option">{{$religion->na_relig}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                المهنة الرئيسية:
                            </label>
                            <div class="col-sm-5">
                                <select name="profession_id" id="profession_id" class="form-select" required>
                                    <option value="" class="option">المهنة</option>
                                    @foreach ($professions as $profession)
                                        <option value="{{$profession->id}}" class="option">{{$profession->na_profes}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="" style="margin-right: 17px;">
                                المستوى التعليمي:
                            </label>
                            <div class="col-sm-5">
                                <select name="educational_level" id="educational_level" class="form-select" required>
                                    <option value="" class="option">المستوى التعليمي</option>
                                    <option value="1" class="option">متعلم</option>
                                    <option value="0" class="option">امي</option>
                                </select>
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                العمر عند اول زواج:
                            </label>
                            <div class="col-sm-5">
                                <input type="number" name="age_first_marri" id="age_first_marri" class="form-control" />
                            </div>
                            <label for="" style="margin-right: 17px;">
                                عدد مرات الزواج السابق:
                            </label>
                            <div class="col-sm-5">
                                <input type="number" name="former_no" id="former_no" class="form-control" />
                            </div>
                        </div>
                        
                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                أسم الأم الكامل:
                            </label>
                            <div class="form-holder">
                                <div class="row">
                                <div class="col-sm-3">
                                    <input type="text" placeholder="الاسم الأول" class="form-control" name="forena_moth" id="forena_moth" />
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" placeholder="أسم الاب" class="form-control" name="secondna_moth" id="secondna_moth" />
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" placeholder="أسم الجد" class="form-control" name="thirdna_moth" id="thirdna_moth" />
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" placeholder="القب" class="form-control" name="tit_moth" id="tit_moth" />
                                </div>
                            </div>	                        
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                عدد المواليد احياء السابقين:
                            </label>
                            <div class="form-holder">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="number" placeholder="ذكور" class="form-control" name="no_form_biths_live_male" id="no_form_biths_live_male" />
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" placeholder="اناث" class="form-control" name="no_form_biths_live_female" id="no_form_biths_live_female" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-header">
                            <h2>بيانات البطاقة</h2>
                        </div>
                        
                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                النوع:
                            </label>
                            <div class="col-sm-2">
                                <select name="ty_documents_id" id="ty_documents_id" class="form-select" required>
                                    <option value="" class="option">نوع البطاقة</option>
                                    @foreach ($ty_documents as $ty_document)
                                        <option value="{{$ty_document->id}}" class="option">{{$ty_document->na_ty_doc}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="" style="margin-right: 20px;">
                                الــرقم :
                            </label>
                            <div class="col-sm-2">
                                <input type="text"  class="form-control cardid" name="card_No" id="card_No"/>
                            </div>
                            <label for="" style="margin-right: 20px;">
                                تاريخ الإصدار:
                            </label>
                            <div class="col-sm-2">
                                <input type="date"  class="form-control" name="date_card_version" id="date_card_version"/>
                            </div>
                            <label for="" style="margin-right: 20px;">
                                جهة الإصدار :
                            </label>
                            <div class="col-sm-2">
                                <select name="card_version_center_id" id="card_version_center_id" class="form-select" required>
                                    <option  class="option" value="">جهة الاصدار</option>
                                    @foreach ($card_version_centers as $card_version_center)
                                        <option value="{{$card_version_center->id}}" class="option">{{$card_version_center->na_center}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr size="5" class="hr-m"/>
                    </section> 
                    <div class="index-btn-wrapper" dir="rtl">
                        <div class="btn btn-info col-md-2" onclick="run(1, 2);">التالي</div>
                        <div class="btn btn-outline-warning col-md-2" onclick="run(1, 0);">السابق</div>
                    </div>
                </div>
            </div>

            <!-- tab 2 -->
            <div  class="tab" id="tab-2">
                <div id="wizard" style="border: 4px dashed pink; background: rgb(250 132 132 / 10%);">
                    <div class="form-header">
                        <h2>بيانات المطلقة</h2>
                        <hr size="5" />
                    </div>
                    <section class="sec">
                        <div class="form-row" dir="rtl">
                            <label for="">
                                اسم المطلقة:
                            </label>
                            <div class="form-holder">
                                <div class="row">
                                <div class="col-sm-3">
                                    <input type="text" placeholder="الاسم الأول" class="form-control" name="forenaw" id="forenaw" />
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" placeholder="أسم الاب" class="form-control" name="secondnaw" id="secondnaw" />
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" placeholder="أسم الجد" class="form-control" name="thirdnaw" id="thirdnaw" />
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" placeholder="القب" class="form-control" name="Titw" id="Titw" />
                                </div>
                            </div>	                        
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                تاريخ الميلاد الميلادي :
                            </label>
                            <div class="col-sm-4">
                                <input type="date" name="date_pirth_Adw" id="date_pirth_Adw" class="form-control" />
                            </div>
                            <label for="" style="margin-right: 20px;">
                                تاريخ الميلاد الهجري:
                            </label>
                            <div class="col-sm-4">
                                <input type="text" name="date_pirth_hegiraw" id="date_pirth_hegiraw" class="form-control text-ignore-validation" />
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                محل  ميلاد المطلقة:
                            </label>
                            <div class="form-holder">
                                <div class="row">
                                    <div class="col-sm-3 " >
                                        <select name="countrie_parth_idw" id="countrie_parth_idw" class="form-select">
                                            <option class="option" value="">دولة</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-3 " >
                                        <select name="province_parth_idw" id="province_parth_idw" class="form-select">
                                            <option class="option" value="">محافظة</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-3 " >
                                        <select name="directorate_parth_idw" id="directorate_parth_idw" class="form-select">
                                            <option class="option" value="">مديرية </option>
                                        </select>
                                    </div>

                                    <div class="col-sm-3">
                                        <input type="text" placeholder="قرية/ مدينة" class="form-control" name="village_parthw" id="village_parthw"/>
                                    </div>

                                </div>
                            </div>
                        </div>
                    
                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                    محل أقامة المطلقة المعتاد :
                            </label>
                            <div class="form-holder">
                                <div class="row">
                                    <div class="col-sm-3 " >
                                        <select name="countrie_acom_idw" id="countrie_acom_idw" class="form-select">
                                            <option class="option" value="">دولة</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-3 " >
                                        <select name="province_acom_idw" id="province_acom_idw" class="form-select">
                                            <option class="option" value="">محافظة</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-sm-3 " >
                                        <select name="directorate_acom_idw" id="directorate_acom_idw" class="form-select">
                                            <option class="option" value="">مديرية </option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="قرية/ مدينة" class="form-control" name="village_accommw" id="village_accommw" />
                                    </div>
                                </div>
                            </div>
                        </div>
            

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                الــجنسية:
                            </label>
                            <div class="col-sm-5">
                                <select name="nationality_idw" id="nationality_idw" class="form-select" required>
                                    <option value="" class="option">الجنسية</option>
                                    @foreach ($countrie_nationalits as $countrie_nationalit)
                                        <option value="{{$countrie_nationalit->id}}" class="option">{{$countrie_nationalit->nationality_na}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="" style="margin-right: 17px;">
                                الــديــانــة:
                            </label>
                            <div class="col-sm-5">
                                <select name="religion_idw" id="religion_idw" class="form-select" required>
                                    <option value="" class="option">الديانة</option>
                                    @foreach ($religions as $religion)
                                        <option value="{{$religion->id}}" class="option">{{$religion->na_relig}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                المهنة الرئيسية:
                            </label>
                            <div class="col-sm-5">
                                <select name="profession_idw" id="profession_idw" class="form-select" required>
                                    <option value="" class="option">المهنة</option>
                                    @foreach ($professions as $profession)
                                        <option value="{{$profession->id}}" class="option">{{$profession->na_profes}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="" style="margin-right: 17px;">
                                المستوى التعليمي:
                            </label>
                            <div class="col-sm-5">
                                <select name="educational_levelw" id="educational_levelw" class="form-select" required>
                                    <option value="" class="option">المستوى التعليمي</option>
                                    <option value="1" class="option">متعلم</option>
                                    <option value="0" class="option">امي</option>
                                </select>
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                العمر عند اول زواج:
                            </label>
                            <div class="col-sm-5">
                                <input type="number" name="age_first_marriw" id="age_first_marriw" class="form-control" />
                            </div>
                            <label for="" style="margin-right: 17px;">
                                عدد مرات الزواج السابق:
                            </label>
                            <div class="col-sm-5">
                                <input type="number" name="former_now" id="former_now" class="form-control" />
                            </div>
                        </div>
                        
                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                أسم الأم الكامل:
                            </label>
                            <div class="form-holder">
                                <div class="row">
                                <div class="col-sm-3">
                                    <input type="text" placeholder="الاسم الأول" class="form-control" name="forena_mothw" id="forena_mothw" />
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" placeholder="أسم الاب" class="form-control" name="secondna_mothw" id="secondna_mothw" />
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" placeholder="أسم الجد" class="form-control" name="thirdna_mothw" id="thirdna_mothw" />
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" placeholder="القب" class="form-control" name="tit_mothw" id="tit_mothw" />
                                </div>
                            </div>	                        
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                عدد المواليد احياء السابقين:
                            </label>
                            <div class="form-holder">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="number" placeholder="ذكور" class="form-control" name="no_form_biths_live_malew" id="no_form_biths_live_malew" />
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" placeholder="اناث" class="form-control" name="no_form_biths_live_femalew" id="no_form_biths_live_femalew" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-header">
                            <h2>بيانات البطاقة</h2>
                        </div>
                        
                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                النوع:
                            </label>
                            <div class="col-sm-2">
                                <select name="ty_documents_idw" id="ty_documents_idw" class="form-select" required>
                                    <option value="" class="option">نوع البطاقة</option>
                                    @foreach ($ty_documents as $ty_document)
                                        <option value="{{$ty_document->id}}" class="option">{{$ty_document->na_ty_doc}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="" style="margin-right: 20px;">
                                الــرقم :
                            </label>
                            <div class="col-sm-2">
                                <input type="text"  class="form-control cardid" name="card_Now" id="card_Now"/>
                            </div>
                            <label for="" style="margin-right: 20px;">
                                تاريخ الإصدار:
                            </label>
                            <div class="col-sm-2">
                                <input type="date"  class="form-control" name="date_card_versionw" id="date_card_versionw"/>
                            </div>
                            <label for="" style="margin-right: 20px;">
                                جهة الإصدار :
                            </label>
                            <div class="col-sm-2">
                                <select name="card_version_center_idw" id="card_version_center_idw" class="form-select" required>
                                    <option  class="option" value="">جهة الاصدار</option>
                                    @foreach ($card_version_centers as $card_version_center)
                                        <option value="{{$card_version_center->id}}" class="option">{{$card_version_center->na_center}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr size="5" class="hr-m"/>
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
                                    <h3>هل انت متاكد من ان كل بياناتك صحيحة</h3>
                                    <h3>بعد ارسالك للطلب سيصلك اشعار بحالة الطلب وتحديد موعد حضورك الى المصلحة</h3>
                                    <h3>لاكمال معاملتك</h3>          
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
                        $('#countrie_parth_id').append('<option value="' + key + '">' + value + '</option>');
                        $('#countrie_acom_id').append('<option value="' + key + '">' + value + '</option>');
                        $('#countrie_parth_idw').append('<option value="' + key + '">' + value + '</option>');
                        $('#countrie_acom_idw').append('<option value="' + key + '">' + value + '</option>');
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
                            $('#province_accom_id').empty().append('<option value="">اختار محافظة</option>');
                            $.each(data, function(key, value) {
                                $('#province_accom_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                            // إفراغ حقول المديرية والمركز
                            $('#directorate_accom_id').empty().append('<option value="">اختار مديرية</option>');
                        }
                    });
                } else {
                    // إفراغ جميع حقول الاختيارات
                    $('#province_accom_id').empty().append('<option value="">اختار محافظة</option>');
                    $('#directorate_accom_id').empty().append('<option value="">اختار مديرية</option>');
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
                            $('#directorate_accom_id').empty().append('<option value="">اختار مديرية</option>');
                            $.each(data, function(key, value) {
                                $('#directorate_accom_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    // إفراغ حقول المديرية
                    $('#directorate_accom_id').empty().append('<option value="">اختار مديرية</option>');
                }
            });

            

            // استدعاء المحافظات من الخادم عند تحميل الصفحة
            $.ajax({
                url: "{{ route('indexprovince') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    // إضافة اختيارات المحافظات إلى حقل المحافظات
                    $.each(data, function(key, value) {
                        $('#province_contract_id').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });

            // استدعاء المديريات المرتبطة بمحافظة العقد المختارة
            $('#province_contract_id').change(function() {
                var province_contract_id = $(this).val();
                if (province_contract_id) {
                    $.ajax({
                        url: "{{ route('getDirectoratesByProvinceLogMarraige') }}",
                        type: "POST",
                        data: {
                            province_contract_id: province_contract_id,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            // إضافة اختيارات المديريات إلى حقل المديرية
                            $('#directorate_contract_id').empty().append('<option value="">اختار مديرية</option>');
                            $.each(data, function(key, value) {
                                $('#directorate_contract_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    // إفراغ حقول المديرية
                    $('#directorate_contract_id').empty().append('<option value="">اختار مديرية</option>');
                }
            });

            // استدعاء المحافظات المرتبطة بالدولة المختارة
            $('#countrie_parth_id').change(function() {
                var countrie_parth_id = $(this).val();
                if (countrie_parth_id) {
                    $.ajax({
                        url: "{{ route('getGovernoratesByCountryParthMarraige') }}",
                        type: "POST",
                        data: {
                            countrie_parth_id: countrie_parth_id,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            // إضافة اختيارات المحافظات إلى حقل المحافظة
                            $('#province_parth_id').empty().append('<option value="">محافظة</option>');
                            $.each(data, function(key, value) {
                                $('#province_parth_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                            // إفراغ حقول المديرية والمركز
                            $('#directorate_parth_id').empty().append('<option value="">مديرية</option>');
                        }
                    });
                } else {
                    // إفراغ جميع حقول الاختيارات
                    $('#province_parth_id').empty().append('<option value="">محافظة</option>');
                    $('#directorate_parth_id').empty().append('<option value="">مديرية</option>');
                }
            });

            // استدعاء المديريات المرتبطة بالمحافظة المختارة
            $('#province_parth_id').change(function() {
                var province_parth_id = $(this).val();
                if (province_parth_id) {
                    $.ajax({
                        url: "{{ route('getDirectoratesByProvinceParthMarraige') }}",
                        type: "POST",
                        data: {
                            province_parth_id: province_parth_id,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            // إضافة اختيارات المديريات إلى حقل المديرية
                            $('#directorate_parth_id').empty().append('<option value="">مديرية</option>');
                            $.each(data, function(key, value) {
                                $('#directorate_parth_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    // إفراغ حقول المديرية
                    $('#directorate_parth_id').empty().append('<option value="">مديرية</option>');
                }
            });

            // استدعاء المحافظات المرتبطة بالدولة المختارة
            $('#countrie_acom_id').change(function() {
                var countrie_acom_id = $(this).val();
                if (countrie_acom_id) {
                    $.ajax({
                        url: "{{ route('getGovernoratesByCountryAcomhMarraige') }}",
                        type: "POST",
                        data: {
                            countrie_acom_id: countrie_acom_id,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            // إضافة اختيارات المحافظات إلى حقل المحافظة
                            $('#province_acom_id').empty().append('<option value="">محافظة</option>');
                            $.each(data, function(key, value) {
                                $('#province_acom_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                            // إفراغ حقول المديرية والمركز
                            $('#directorate_acom_id').empty().append('<option value="">مديرية</option>');
                        }
                    });
                } else {
                    // إفراغ جميع حقول الاختيارات
                    $('#province_acom_id').empty().append('<option value="">محافظة</option>');
                    $('#directorate_acom_id').empty().append('<option value="">مديرية</option>');
                }
            });

            // استدعاء المديريات المرتبطة بالمحافظة المختارة
            $('#province_acom_id').change(function() {
                var province_acom_id = $(this).val();
                if (province_acom_id) {
                    $.ajax({
                        url: "{{ route('getDirectoratesByProvinceaAcomhMarraige') }}",
                        type: "POST",
                        data: {
                            province_acom_id: province_acom_id,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            // إضافة اختيارات المديريات إلى حقل المديرية
                            $('#directorate_acom_id').empty().append('<option value="">مديرية</option>');
                            $.each(data, function(key, value) {
                                $('#directorate_acom_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    // إفراغ حقول المديرية
                    $('#directorate_acom_id').empty().append('<option value="">مديرية</option>');
                }
            });

            // استدعاء المحافظات المرتبطة بالدولة المختارة
            $('#countrie_parth_idw').change(function() {
                var countrie_parth_idw = $(this).val();
                if (countrie_parth_idw) {
                    $.ajax({
                        url: "{{ route('getGovernoratesByCountryParthMarraigew') }}",
                        type: "POST",
                        data: {
                            countrie_parth_idw: countrie_parth_idw,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            // إضافة اختيارات المحافظات إلى حقل المحافظة
                            $('#province_parth_idw').empty().append('<option value="">محافظة</option>');
                            $.each(data, function(key, value) {
                                $('#province_parth_idw').append('<option value="' + key + '">' + value + '</option>');
                            });
                            // إفراغ حقول المديرية والمركز
                            $('#directorate_parth_idw').empty().append('<option value="">مديرية</option>');
                        }
                    });
                } else {
                    // إفراغ جميع حقول الاختيارات
                    $('#province_parth_idw').empty().append('<option value="">محافظة</option>');
                    $('#directorate_parth_idw').empty().append('<option value="">مديرية</option>');
                }
            });

            // استدعاء المديريات المرتبطة بالمحافظة المختارة
            $('#province_parth_idw').change(function() {
                var province_parth_idw = $(this).val();
                if (province_parth_idw) {
                    $.ajax({
                        url: "{{ route('getDirectoratesByProvinceParthMarraigew') }}",
                        type: "POST",
                        data: {
                            province_parth_idw: province_parth_idw,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            // إضافة اختيارات المديريات إلى حقل المديرية
                            $('#directorate_parth_idw').empty().append('<option value="">مديرية</option>');
                            $.each(data, function(key, value) {
                                $('#directorate_parth_idw').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    // إفراغ حقول المديرية
                    $('#directorate_parth_idw').empty().append('<option value="">مديرية</option>');
                }
            });

            // استدعاء المحافظات المرتبطة بالدولة المختارة
            $('#countrie_acom_idw').change(function() {
                var countrie_acom_idw = $(this).val();
                if (countrie_acom_idw) {
                    $.ajax({
                        url: "{{ route('getGovernoratesByCountryAcomhMarraigew') }}",
                        type: "POST",
                        data: {
                            countrie_acom_idw: countrie_acom_idw,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            // إضافة اختيارات المحافظات إلى حقل المحافظة
                            $('#province_acom_idw').empty().append('<option value="">محافظة</option>');
                            $.each(data, function(key, value) {
                                $('#province_acom_idw').append('<option value="' + key + '">' + value + '</option>');
                            });
                            // إفراغ حقول المديرية والمركز
                            $('#directorate_acom_idw').empty().append('<option value="">مديرية</option>');
                        }
                    });
                } else {
                    // إفراغ جميع حقول الاختيارات
                    $('#province_acom_idw').empty().append('<option value="">محافظة</option>');
                    $('#directorate_acom_idw').empty().append('<option value="">مديرية</option>');
                }
            });

            // استدعاء المديريات المرتبطة بالمحافظة المختارة
            $('#province_acom_idw').change(function() {
                var province_acom_idw = $(this).val();
                if (province_acom_idw) {
                    $.ajax({
                        url: "{{ route('getDirectoratesByProvinceaAcomhMarraigew') }}",
                        type: "POST",
                        data: {
                            province_acom_idw: province_acom_idw,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            // إضافة اختيارات المديريات إلى حقل المديرية
                            $('#directorate_acom_idw').empty().append('<option value="">مديرية</option>');
                            $.each(data, function(key, value) {
                                $('#directorate_acom_idw').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    // إفراغ حقول المديرية
                    $('#directorate_acom_idw').empty().append('<option value="">مديرية</option>');
                }
            });
        });

        // تاريخ العقد
        $(function () {
            initDefault();
        });
        function initDefault() {
            $("#date_contract_he").hijriDatePicker({
                hijri:true,
                showSwitcher:false
            });
            $("#date_pirth_hegira").hijriDatePicker({
                hijri:true,
                showSwitcher:false
            });
            $("#date_pirth_hegiraw").hijriDatePicker({
                hijri:true,
                showSwitcher:false
            });
            $("#date_marriage_hj").hijriDatePicker({
                hijri:true,
                showSwitcher:false
            });
        }
        var date_contract_ad = document.getElementById('date_contract_ad');
        var date_contract_he = document.getElementById('date_contract_he');
        date_contract_ad.addEventListener('change', function() {
            var gregorianDateContract = moment(this.value);
            var hijriDateContract = gregorianDateContract.format('iYYYY/iM/iD');
            date_contract_he.value = hijriDateContract;
        });

        // تاريخ ميلاد الزوج
        
        var date_pirth_Ad = document.getElementById('date_pirth_Ad');
        var date_pirth_hegira = document.getElementById('date_pirth_hegira');
        date_pirth_Ad.addEventListener('change', function() {
            var gregorianDatePirth = moment(this.value);
            var hijriDatePirth = gregorianDatePirth.format('iYYYY/iM/iD');
            date_pirth_hegira.value = hijriDatePirth;
        });
        // تاريخ ميلاد الزوجة
        
        var date_pirth_Adw = document.getElementById('date_pirth_Adw');
        var date_pirth_hegiraw = document.getElementById('date_pirth_hegiraw');
        date_pirth_Adw.addEventListener('change', function() {
            var gregorianDatePirthw = moment(this.value);
            var hijriDatePirthw = gregorianDatePirthw.format('iYYYY/iM/iD');
            date_pirth_hegiraw.value = hijriDatePirthw;
        });
        // تاريخ ميلاد الزواج
        
        var date_marriage = document.getElementById('date_marriage');
        var date_marriage_hj = document.getElementById('date_marriage_hj');
        date_marriage.addEventListener('change', function() {
            var gregorianDatedivor = moment(this.value);
            var hijriDateDivor = gregorianDatedivor.format('iYYYY/iM/iD');
            date_marriage_hj.value = hijriDateDivor;
        });
    </script>
@endsection