@extends('layouts.head_forms')
@section('title')
    تعديل طلب قيد زواج
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
        <form action="{{route('logMarriage.update',encrypt($log_marriage->id))}}" method="POST" data-aos="zoom-in-down">
            @csrf
            @method('GET')
            <div class="form-header">
                <h2>تعديل طلب الحصول على قيد زواج</h2>
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
                                            <option value="{{$log_marriage->province->id}}" class="option">{{$log_marriage->province->na_prov}}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select name="directorate_id" id="directorate_id" class="form-select" required data-bs-toggle='tooltip'  title='قم بإختيار عنصر من القائمة'>
                                            <option value="{{$log_marriage->directorate->id}}" class="option">{{$log_marriage->directorate->na_dire}}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select name="center_id" id="center_id" class="form-select" required data-bs-toggle='tooltip'  title='قم بإختيار عنصر من القائمة'>
                                            <option value="{{$log_marriage->center->id}}" class="option">{{$log_marriage->center->na_center}}</option>
                                        </select>
                                    </div>
                                </div>	                        
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-header">
                            <h2>تسجيل واقعة الزواج طبقاً للبيانات التالية</h2>
                            <hr size="5" />
                        </div>
                        
                        <div class="form-row" dir="rtl">
                            <label for="">
                                تاريخ العقد الميلادي :
                            </label>
                            <div class="col-sm-4">
                                <input type="date" value="{{$log_marriage->date_contract_ad}}" name="date_contract_ad" id="date_contract_ad" class="form-control" />
                            </div>
                            <label for="" style="margin-right: 20px;">
                                تاريخ العقد الهجري:
                            </label>
                            <div class="col-sm-4">
                                <input type="text" value="{{$log_marriage->date_contract_he}}" name="date_contract_he" id="date_contract_he" class="form-control text-ignore-validation" />
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                محافظة العقد:
                            </label>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <select class="form-select" name="province_contract_id" id="province_contract_id">
                                        <option value="{{$log_marriage->provincecontract->id}}" class="option">{{$log_marriage->provincecontract->na_prov}}</option>
                                    </select>
                                </div>
                            </div>
                            <label for="" style="margin-right: 20px;">
                                مديرية العقد:
                            </label>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <select class="form-select" name="directorate_contract_id" id="directorate_contract_id">
                                        <option value="{{$log_marriage->directoratecontract->id}}" class="option">{{$log_marriage->directoratecontract->na_dire}}</option>
                                    </select>
                                </div>
                            </div>
                            <label for="" style="margin-right: 20px;">
                                نوع الزواج:
                            </label>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <select class="form-select" name="marri_type" id="marri_type">
                                        @if ($log_marriage->marri_type == 1)
                                            <option class="octicon" value="1" selected>جديد</option>
                                            <option class="octicon" value="2">تصادق</option>
                                        @else
                                            <option class="octicon" value="1" >جديد</option>
                                            <option class="octicon" value="2"selected>تصادق</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                اسم المحكمة:
                            </label>
                            <div class="col-sm-3">
                                <input type="text" value="{{$log_marriage->Court_na}}" name="Court_na" id="Court_na" class="form-control" />
                            </div>
                            <label for="" style="margin-right: 20px;">
                                رقم الوثيقة:
                            </label>
                            <div class="col-sm-3">
                                <input type="number" value="{{$log_marriage->document_no}}" name="document_no" id="document_no" class="form-control" />
                            </div>
                            <label for="" style="margin-right: 20px;">
                                تاريخ الوثيقة:
                            </label>
                            <div class="col-sm-3">
                                <input type="date" value="{{$log_marriage->date_document}}" name="date_document" id="date_document" class="form-control" />
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
                        <h2>بيانات الزوج</h2>
                        <hr size="5" />
                    </div>
                    <section class="sec">
                        <div class="form-row" dir="rtl">
                            <label for="">
                                اسم الزوج:
                            </label>
                            <div class="form-holder">
                                <div class="row">
                                <div class="col-sm-3">
                                    <input type="text" value="{{$husband_data->forena}}" placeholder="الاسم الأول" class="form-control" name="forena" id="forena" />
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" value="{{$husband_data->secondna}}" placeholder="أسم الاب" class="form-control" name="secondna" id="secondna" />
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" value="{{$husband_data->thirdna}}" placeholder="أسم الجد" class="form-control" name="thirdna" id="thirdna" />
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" value="{{$husband_data->Tit}}" placeholder="القب" class="form-control" name="Tit" id="Tit" />
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
                                <input type="date" value="{{$husband_data->date_pirth_Ad}}" name="date_pirth_Ad" id="date_pirth_Ad" class="form-control" />
                            </div>
                            <label for="" style="margin-right: 20px;">
                                تاريخ الميلاد الهجري:
                            </label>
                            <div class="col-sm-4">
                                <input type="text" value="{{$husband_data->date_pirth_hegira}}" name="date_pirth_hegira" id="date_pirth_hegira" class="form-control text-ignore-validation" />
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                محل  ميلاد الزوج:
                            </label>
                            <div class="form-holder">
                                <div class="row">
                                    <div class="col-sm-3 " >
                                        <select name="countrie_parth_id" id="countrie_parth_id" class="form-select">
                                            <option class="option" value="{{$husband_data->countrie_parth_id}}">{{$husband_data->countrieparth->countrie_na}}</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-3 " >
                                        <select name="province_parth_id" id="province_parth_id" class="form-select">
                                            <option class="option" value="{{$husband_data->province_parth_id}}">{{$husband_data->provinceparth->na_prov}}</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-3 " >
                                        <select name="directorate_parth_id" id="directorate_parth_id" class="form-select">
                                            <option class="option" value="{{$husband_data->directorate_parth_id}}">{{$husband_data->directorateparth->na_dire}}</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-3">
                                        <input type="text" value="{{$husband_data->village_parth}}" placeholder="قرية/ مدينة" class="form-control" name="village_parth" id="village_parth"/>
                                    </div>

                                </div>
                            </div>
                        </div>
                    
                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                    محل أقامة الزوج المعتاد :
                            </label>
                            <div class="form-holder">
                                <div class="row">
                                    <div class="col-sm-3 " >
                                        <select name="countrie_acom_id" id="countrie_acom_id" class="form-select">
                                            <option class="option" value="{{$husband_data->countrie_acom_id}}">{{$husband_data->countrieacom->countrie_na}}</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-3 " >
                                        <select name="province_acom_id" id="province_acom_id" class="form-select">
                                            <option class="option" value="{{$husband_data->province_acom_id}}">{{$husband_data->provinceacom->na_prov}}</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-sm-3 " >
                                        <select name="directorate_acom_id" id="directorate_acom_id" class="form-select">
                                            <option class="option" value="{{$husband_data->directorate_acom_id}}">{{$husband_data->directorateacom->na_dire}}</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-sm-3">
                                        <input type="text" value="{{$husband_data->village_accomm}}" placeholder="قرية/ مدينة" class="form-control" name="village_accomm" id="village_accomm" />
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
                                    <option value="{{$husband_data->nationality_id}}" class="option">{{$husband_data->nationality->nationality_na}}</option>
                                    @foreach ($countrie_nationalits as $countrie_nationalit)
                                        @if ($countrie_nationalit->id != $husband_data->nationality_id)
                                            <option value="{{$countrie_nationalit->id}}" class="option">{{$countrie_nationalit->nationality_na}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <label for="" style="margin-right: 17px;">
                                الــديــانــة:
                            </label>
                            <div class="col-sm-5">
                                <select name="religion_id" id="religion_id" class="form-select" required>
                                    <option value="{{$husband_data->religion_id}}" class="option">{{$husband_data->religion->na_relig}}</option>
                                    @foreach ($religions as $religion)
                                        @if ($religion->id != $husband_data->religion_id)
                                            <option value="{{$religion->id}}" class="option">{{$religion->na_relig}}</option>
                                        @endif
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
                                    <option value="{{$husband_data->profession_id}}" class="option">{{$husband_data->profession->na_profes}}</option>
                                    @foreach ($professions as $profession)
                                        @if ($profession->id)
                                            <option value="{{$profession->id}}" class="option">{{$profession->na_profes}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <label for="" style="margin-right: 17px;">
                                المستوى التعليمي:
                            </label>
                            <div class="col-sm-5">
                                <select name="educational_level" id="educational_level" class="form-select" required>
                                    @if ($husband_data->educational_level == 1)
                                        <option value="1" class="option" selected>متعلم</option>
                                        <option value="0" class="option">امي</option>
                                    @else
                                        <option value="1" class="option" >متعلم</option>
                                        <option value="0" class="option" selected>امي</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                العمر عند اول زواج:
                            </label>
                            <div class="col-sm-2">
                                <input type="number" value="{{$husband_data->age_first_marri}}" name="age_first_marri" id="age_first_marri" class="form-control" />
                            </div>
                            <label for="" style="margin-right: 17px;">
                                الحالة الاجتماعية السابقة:
                            </label>
                            <div class="col-sm-2">
                                <select name="social_statu_forme_id" id="social_statu_forme_id" class="form-select" required>
                                    <option value="{{$husband_data->social_statu_forme_id}}" class="option">{{$husband_data->social_statu->na_status}}</option>
                                    @foreach ($social_status as $social_statu)
                                        @if ($social_statu->id != $husband_data->social_statu_forme_id)
                                            <option value="{{$social_statu->id}}" class="option">{{$social_statu->na_status}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <label for="" style="margin-right: 17px;">
                                عدد مرات الزواج السابق:
                            </label>
                            <div class="col-sm-2">
                                <input type="number" value="{{$husband_data->former_no}}" name="former_no" id="former_no" class="form-control" />
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
                                    <input type="text" value="{{$husband_data->forena_moth}}" placeholder="الاسم الأول" class="form-control" name="forena_moth" id="forena_moth" />
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" value="{{$husband_data->secondna_moth}}" placeholder="أسم الاب" class="form-control" name="secondna_moth" id="secondna_moth" />
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" value="{{$husband_data->thirdna_moth}}" placeholder="أسم الجد" class="form-control" name="thirdna_moth" id="thirdna_moth" />
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" value="{{$husband_data->tit_moth}}" placeholder="القب" class="form-control" name="tit_moth" id="tit_moth" />
                                </div>
                            </div>	                        
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                عدد المواليد احياء:
                            </label>
                            <div class="form-holder">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="number" value="{{$husband_data->no_form_biths_live_male}}" placeholder="ذكور" class="form-control" name="no_form_biths_live_male" id="no_form_biths_live_male" />
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" value="{{$husband_data->no_form_biths_live_female}}" placeholder="اناث" class="form-control" name="no_form_biths_live_female" id="no_form_biths_live_female" />
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
                                    <option value="{{$husband_data->ty_documents_id}}" class="option">{{$husband_data->ty_document->na_ty_doc}}</option>
                                    @foreach ($ty_documents as $ty_document)
                                        @if ($ty_document->id != $husband_data->ty_documents_id)
                                            <option value="{{$ty_document->id}}" class="option">{{$ty_document->na_ty_doc}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <label for="" style="margin-right: 20px;">
                                الــرقم :
                            </label>
                            <div class="col-sm-2">
                                <input type="text" value="{{$husband_data->card_No}}"  class="form-control cardid" name="card_No" id="card_No"/>
                            </div>
                            <label for="" style="margin-right: 20px;">
                                تاريخ الإصدار:
                            </label>
                            <div class="col-sm-2">
                                <input type="date" value="{{$husband_data->date_card_version}}"  class="form-control" name="date_card_version" id="date_card_version"/>
                            </div>
                            <label for="" style="margin-right: 20px;">
                                جهة الإصدار :
                            </label>
                            <div class="col-sm-2">
                                <select name="card_version_center_id" id="card_version_center_id" class="form-select" required>
                                    <option  class="option" value="{{$husband_data->card_version_center_id}}">{{$husband_data->card_version_center->na_center}}</option>
                                    @foreach ($card_version_centers as $card_version_center)
                                        @if ($card_version_center->id != $husband_data->card_version_center_id)
                                            <option value="{{$card_version_center->id}}" class="option">{{$card_version_center->na_center}}</option>
                                        @endif
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
                        <h2>بيانات الزوجة</h2>
                        <hr size="5" />
                    </div>
                    <section class="sec">
                        <div class="form-row" dir="rtl">
                            <label for="">
                                اسم الزوجة:
                            </label>
                            <div class="form-holder">
                                <div class="row">
                                <div class="col-sm-3">
                                    <input type="text" value="{{$wife_data->forena}}" placeholder="الاسم الأول" class="form-control" name="forenaw" id="forenaw" />
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" value="{{$wife_data->secondna}}" placeholder="أسم الاب" class="form-control" name="secondnaw" id="secondnaw" />
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" value="{{$wife_data->thirdna}}" placeholder="أسم الجد" class="form-control" name="thirdnaw" id="thirdnaw" />
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" value="{{$wife_data->Tit}}" placeholder="القب" class="form-control" name="Titw" id="Titw" />
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
                                <input type="date" value="{{$wife_data->date_pirth_Ad}}" name="date_pirth_Adw" id="date_pirth_Adw" class="form-control" />
                            </div>
                            <label for="" style="margin-right: 20px;">
                                تاريخ الميلاد الهجري:
                            </label>
                            <div class="col-sm-4">
                                <input type="text" value="{{$wife_data->date_pirth_hegira}}" name="date_pirth_hegiraw" id="date_pirth_hegiraw" class="form-control text-ignore-validation" />
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                محل  ميلاد الزوجة:
                            </label>
                            <div class="form-holder">
                                <div class="row">
                                    <div class="col-sm-3 " >
                                        <select name="countrie_parth_idw" id="countrie_parth_idw" class="form-select">
                                            <option class="option" value="{{$wife_data->countrie_parth_id}}">{{$wife_data->countrieparth->countrie_na}}</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-3 " >
                                        <select name="province_parth_idw" id="province_parth_idw" class="form-select">
                                            <option class="option" value="{{$wife_data->province_parth_id}}">{{$wife_data->provinceparth->na_prov}}</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-3 " >
                                        <select name="directorate_parth_idw" id="directorate_parth_idw" class="form-select">
                                            <option class="option" value="{{$wife_data->directorate_parth_id}}">{{$wife_data->directorateparth->na_dire}}</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-3">
                                        <input type="text" value="{{$wife_data->village_parth}}" placeholder="قرية/ مدينة" class="form-control" name="village_parthw" id="village_parthw"/>
                                    </div>

                                </div>
                            </div>
                        </div>
                    
                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                    محل أقامة الزوجة المعتاد :
                            </label>
                            <div class="form-holder">
                                <div class="row">
                                    <div class="col-sm-3 " >
                                        <select name="countrie_acom_idw" id="countrie_acom_idw" class="form-select">
                                            <option class="option" value="{{$wife_data->countrie_acom_id}}">{{$wife_data->countrieacom->countrie_na}}</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-3 " >
                                        <select name="province_acom_idw" id="province_acom_idw" class="form-select">
                                            <option class="option" value="{{$wife_data->province_acom_id}}">{{$wife_data->provinceacom->na_prov}}</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-sm-3 " >
                                        <select name="directorate_acom_idw" id="directorate_acom_idw" class="form-select">
                                            <option class="option" value="{{$wife_data->directorate_acom_id}}">{{$wife_data->directorateacom->na_dire}}</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-sm-3">
                                        <input type="text" value="{{$wife_data->village_accomm}}" placeholder="قرية/ مدينة" class="form-control" name="village_accommw" id="village_accommw" />
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
                                    <option value="{{$wife_data->nationality_id}}" class="option">{{$wife_data->nationality->nationality_na}}</option>
                                    @foreach ($countrie_nationalits as $countrie_nationalit)
                                        @if ($countrie_nationalit->id != $wife_data->nationality_id)
                                            <option value="{{$countrie_nationalit->id}}" class="option">{{$countrie_nationalit->nationality_na}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <label for="" style="margin-right: 17px;">
                                الــديــانــة:
                            </label>
                            <div class="col-sm-5">
                                <select name="religion_idw" id="religion_idw" class="form-select" required>
                                    <option value="{{$wife_data->religion_id}}" class="option">{{$wife_data->religion->na_relig}}</option>
                                    @foreach ($religions as $religion)
                                        @if ($religion->id != $wife_data->religion_id)
                                            <option value="{{$religion->id}}" class="option">{{$religion->na_relig}}</option>
                                        @endif
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
                                    <option value="{{$wife_data->profession_id}}" class="option">{{$wife_data->profession->na_profes}}</option>
                                    @foreach ($professions as $profession)
                                        @if ($profession->id)
                                            <option value="{{$profession->id}}" class="option">{{$profession->na_profes}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <label for="" style="margin-right: 17px;">
                                المستوى التعليمي:
                            </label>
                            <div class="col-sm-5">
                                <select name="educational_levelw" id="educational_levelw" class="form-select" required>
                                    @if ($wife_data->educational_level == 1)
                                        <option value="1" class="option" selected>متعلم</option>
                                        <option value="0" class="option">امي</option>
                                    @else
                                        <option value="1" class="option" >متعلم</option>
                                        <option value="0" class="option" selected>امي</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                العمر عند اول زواج:
                            </label>
                            <div class="col-sm-2">
                                <input type="number" value="{{$wife_data->age_first_marri}}" name="age_first_marriw" id="age_first_marriw" class="form-control" />
                            </div>
                            <label for="" style="margin-right: 17px;">
                                الحالة الاجتماعية السابقة:
                            </label>
                            <div class="col-sm-2">
                                <select name="social_statu_forme_idw" id="social_statu_forme_idw" class="form-select" required>
                                    <option value="{{$wife_data->social_statu_forme_id}}" class="option">{{$wife_data->social_statu->na_status}}</option>
                                    @foreach ($social_status as $social_statu)
                                        @if ($social_statu->id != $wife_data->social_statu_forme_id)
                                            <option value="{{$social_statu->id}}" class="option">{{$social_statu->na_status}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <label for="" style="margin-right: 17px;">
                                عدد مرات الزواج السابق:
                            </label>
                            <div class="col-sm-2">
                                <input type="number" value="{{$wife_data->former_no}}" name="former_now" id="former_now" class="form-control" />
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
                                    <input type="text" value="{{$wife_data->forena_moth}}" placeholder="الاسم الأول" class="form-control" name="forena_mothw" id="forena_mothw" />
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" value="{{$wife_data->secondna_moth}}" placeholder="أسم الاب" class="form-control" name="secondna_mothw" id="secondna_mothw" />
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" value="{{$wife_data->thirdna_moth}}" placeholder="أسم الجد" class="form-control" name="thirdna_mothw" id="thirdna_mothw" />
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" value="{{$wife_data->tit_moth}}" placeholder="القب" class="form-control" name="tit_mothw" id="tit_mothw" />
                                </div>
                            </div>	                        
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                عدد المواليد احياء:
                            </label>
                            <div class="form-holder">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="number" value="{{$wife_data->no_form_biths_live_male}}" placeholder="ذكور" class="form-control" name="no_form_biths_live_malew" id="no_form_biths_live_malew" />
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" value="{{$wife_data->no_form_biths_live_female}}" placeholder="اناث" class="form-control" name="no_form_biths_live_femalew" id="no_form_biths_live_femalew" />
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
                                    <option value="{{$wife_data->ty_documents_id}}" class="option">{{$wife_data->ty_document->na_ty_doc}}</option>
                                    @foreach ($ty_documents as $ty_document)
                                        @if ($ty_document->id != $wife_data->ty_documents_id)
                                            <option value="{{$ty_document->id}}" class="option">{{$ty_document->na_ty_doc}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <label for="" style="margin-right: 20px;">
                                الــرقم :
                            </label>
                            <div class="col-sm-2">
                                <input type="text" value="{{$wife_data->card_No}}"  class="form-control cardid" name="card_Now" id="card_Now"/>
                            </div>
                            <label for="" style="margin-right: 20px;">
                                تاريخ الإصدار:
                            </label>
                            <div class="col-sm-2">
                                <input type="date" value="{{$wife_data->date_card_version}}"  class="form-control" name="date_card_versionw" id="date_card_versionw"/>
                            </div>
                            <label for="" style="margin-right: 20px;">
                                جهة الإصدار :
                            </label>
                            <div class="col-sm-2">
                                <select name="card_version_center_idw" id="card_version_center_idw" class="form-select" required>
                                    <option  class="option" value="{{$wife_data->card_version_center_id}}">{{$wife_data->card_version_center->na_center}}</option>
                                    @foreach ($card_version_centers as $card_version_center)
                                        @if ($card_version_center->id != $wife_data->card_version_center_id)
                                            <option value="{{$card_version_center->id}}" class="option">{{$card_version_center->na_center}}</option>
                                        @endif
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
    </script>
@endsection