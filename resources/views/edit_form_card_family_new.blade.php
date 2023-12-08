@extends('layouts.head_forms')
@section('title')
    تعديل طلب البطاقة العائلية
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
        <form action="{{route('FamilyCard.update',encrypt($FamilyCard->id))}}" method="POST" data-aos="zoom-in-down">
            @csrf
            @method('HEAD')
            <!-- tab 0 -->
            <div  class="tab" id="tab-0" >
                <div class="form-header">
                    <h1 class="mb-4">تعديل طلب الحصول على بطاقة عائلية</h1>
                </div>
                <div id="wizard" >
                    <div class="form-header">
                        <h3 class="mb-5">بيانات مقدم الطلب</h3>
                    </div>
                    <hr size="5" />
                <section class="sec">
                    <div class="tooltip-demo">
                        <div class="form-row" dir="rtl">
                            <label for="">
                                تقديم الطلب الى :
                            </label>
                            <div class="form-holder">
                                
                                <div class="row ">
                                <div class="col-sm-3">
                                    <select name="province_id" id="province_id" class="form-select" required data-bs-toggle='tooltip'  title='قم بإختيار عنصر من القائمة'>
                                        <option value="{{$province_id}}" class="option">{{$province}}</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select name="directorate_id" id="directorate_id" class="form-select" required data-bs-toggle='tooltip'  title='قم بإختيار عنصر من القائمة'>
                                        <option value="{{$directorate_id}}" class="option">{{$directorate}}</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select name="center_id" id="center_id" class="form-select" required data-bs-toggle='tooltip'  title='قم بإختيار عنصر من القائمة'>
                                        <option value="{{$center_id}}" class="option">{{$center}}</option>
                                    </select>
                                </div>
                                <div class="col-sm-3 " >
                                    <select name="blood_type_id" id="" class="form-select" required data-bs-toggle='tooltip'  title='قم بإختيار عنصر من القائمة'>
                                        <option value="{{$blood_type_id}}" class="option">{{$blood_type}}</option>
                                        @foreach ($blood_types as $blood_type)
                                            @if ($blood_type->id != $blood_type_id)
                                                <option value="{{$blood_type->id}}" @if(old('blood_type_id') == $blood_type->id) selected @endif class="option">{{$blood_type->na_bloodty}}</option>
                                            @endif
										@endforeach
                                    </select>
                                </div>
                            </div>	                        
                        </div>
                    </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                                <label for="">
                                    أسم مقدم الطلب الكامل:
                                </label>
                                <div class="form-holder">
                                    
                                    <div class="row ">
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="الاسم الأول" class="form-control " value="{!!$common_data->req_fore_na!!}" readonly data-bs-toggle="tooltip" data-bs-html="true"  readonly data-bs-toggle='tooltip' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>'/>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="أسم الاب" class="form-control" value="{{$common_data->req_second_na}}" readonly data-bs-toggle="tooltip" data-bs-html="true"  readonly data-bs-toggle='tooltip' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>'/>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" placeholder="أسم الجد" class="form-control" value="{{$common_data->req_third_na}}" readonly data-bs-toggle="tooltip" data-bs-html="true" readonly data-bs-toggle='tooltip' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>'/>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" placeholder="القب" class="form-control" value="{{$common_data->req_tit}}" readonly data-bs-toggle="tooltip" data-bs-html="true"  readonly data-bs-toggle='tooltip' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>'/>
                                    </div>
                                    <div class="col-sm-2 " >
                                        <select id="" class="form-select" readonly data-bs-toggle="tooltip" data-bs-html="true"  readonly data-bs-toggle='tooltip' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>'>
                                            <option value="0" class="option">{{$nationality_req}}</option>
                                        </select>
                                    </div>
                                </div>	                        
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                                <label for="">
                                    أسم الاب الكامل:
                                </label>
                                <div class="form-holder">
                                    <div class="row">
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="الاسم الأول" class="form-control" value="{{$common_data->father_fore_na}}" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>'/>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="أسم الاب" class="form-control" value="{{$common_data->father_second_na}}" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>' />
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" placeholder="أسم الجد" class="form-control" value="{{$common_data->father_third_na}}" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>'/>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" placeholder="القب" class="form-control" value="{{$common_data->father_tit}}" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>' />
                                    </div>
                                    <div class="col-sm-2 " >
                                        <select id="" class="form-select" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>'>
                                            <option value="0" class="option">{{$nationality_father}}</option>
                                        </select>
                                    </div>
                                </div>
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
                                        <input type="text" placeholder="الاسم الأول" class="form-control" value="{{$common_data->mother_fore_na}}" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>' />
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="أسم الاب" class="form-control" value="{{$common_data->mother_second_na}}" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>' />
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" placeholder="أسم الجد" class="form-control" value="{{$common_data->mother_third_na}}" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>' />
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" placeholder="القب" class="form-control" value="{{$common_data->mother_tit}}" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>' />
                                    </div>
                                    <div class="col-sm-2 " >
                                        <select id="" class="form-select" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>' >
                                            <option value="0" class="option">{{$nationality_mother}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="col-sm-2">
                            <div class="checkbox-circle">
                            <label for="">
                                النوع:
                            </label>
                            @if ($common_data->gender == 1)
                            <label class="male">
                                ذكر<input type="radio" value="1" checked>
                                <span class="checkmark"></span>
                            </label>
                            @else
                            <label class="female">
                                انثى<input type="radio" value="0" checked>
                                <span class="checkmark"></span>
                            </label>
                            @endif
                            </div>
                        </div>
                        <hr size="5" class="hr-m"/>

                    </div>
                </section> 
                <div class="index-btn-wrapper" dir="rtl">
                    <div class="btn btn-info col-md-3" onclick="run(0, 1);">التالي</div>
                </div>
                </div>
            </div>

            <!-- tab 1 -->
            <div  class="tab" id="tab-1">
                <div class="form-header">
                    <h1 class="mb-4"> تعديل طلب الحصول على بطاقة عائلية</h1>
                </div>
                <div id="wizard">
                    <div class="form-header">
                        <h2>بيانات مقدم الطلب</h2>
                        <hr size="5" />
                    </div>
                    
                <section class="sec">
                <div class="tooltip-demo">
                    <div class="form-row" dir="rtl">
                    <label for="">
                        تاريخ الميلاد الميلاد:
                    </label>
                    <div class="col-sm-4">
                        <input type="date" value="{{$common_data->date_pirth_ad}}" class="form-control" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>'/>
                    </div>
                    <label for="" style="margin-right: 20px;">
                        تاريخ الميلاد الهجري:
                    </label>
                    <div class="col-sm-4">
                        <input type="text" value="{{$common_data->date_pirth_he}}" class="form-control text-ignore-validation" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>'/>
                    </div>
                    </div>

                    <hr size="5" class="hr-m"/>
                    <div class="form-row" dir="rtl">
                        <label for="">
                            محل الميلاد:
                        </label>
                        <div class="form-holder">
                            <div class="row">
                                <div class="col-sm-3 " >
                                    <select id="" class="form-select" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>' >
                                        <option value="{{$common_data->countrie_birth_id}}" class="option"> {{$countrie_birth}}</option>
                                    </select>
                                </div>
                                <div class="col-sm-3 " >
                                    <select id="" class="form-select" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>'>
                                        <option value="{{$common_data->province_birth_id}}" class="option">{{$province_birth}}</option>
                                    </select>
                                </div>
                                <div class="col-sm-3 " >
                                    <select id="" class="form-select" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>'>
                                        <option value="{{$common_data->directorate_pirth_id}}" class="option">{{$directorate_pirth}}</option>                                        
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" placeholder="عزلة / قرية الميلاد" class="form-control" value="{{$common_data->village_parth}}" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>' />
                                </div>
                        </div>
                    </div>
                    </div>

                    <hr size="5" class="hr-m"/>
                    <div class="form-row" dir="rtl">
                    <label for="">
                        الــديــانــة:
                    </label>
                    <div class="col-sm-4">
                        <select id="" class="form-select" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>'>
                            <option value="0" class="option">{{$religions}}</option>
                        </select>
                    </div>
                    <label for="" style="margin-right: 20px;">
                        الـحــالــة الاجــتــمـاعـيـة:
                    </label>
                    <div class="col-sm-4">
                        <select name="social_statu_id" id="" class="form-select" data-bs-toggle='tooltip'  title='يمكنك التعديل على هذه البيانات'>
                            <option value="{{$social_statu_id}}" class="option">{{$social_statu}}</option>
                            @foreach ($social_status as $social_statu)
                                    @if ($social_statu->id != $social_statu_id)
                                        
                                    <option value="{{$social_statu->id}}" class="option">{{$social_statu->na_status}}</option>
                                    @endif
                                    
                            @endforeach
                        </select>
                    </div>
                    </div>

                    <hr size="5" class="hr-m"/>
                    <div class="form-row" dir="rtl">
                    <label for="">
                        الحالة التعليمية:
                    </label>
                    <div class="col-sm-2">
                        <select name="learning_condition" id="" class="form-select" required data-bs-toggle='tooltip'  title='يمكنك التعديل على هذه البيانات'>
                            @if ($common_data->learning_condition == 1)
                            <option value="1" class="option">متعلم</option>
                            <option value="0" class="option">امي</option>
                            @else
                            <option value="0" class="option">امي</option>
                            <option value="1" class="option">متعلم</option>
                            @endif
                        </select>
                    </div>
                    <label for="" style="margin-right: 20px;">
                        اسم اعلى شهادة:
                    </label>
                    <div class="col-sm-2">
                        <select name="certificate_id" id="" class="form-select" data-bs-toggle='tooltip'  title='يمكنك التعديل على هذه البيانات'>
                            <option value="{{$certificate_id}}" class="option">{{$certificate}} </option>
                            @foreach ($certificates as $certificate)
                                @if ($certificate->id != $certificate_id)
                                    <option value="{{$certificate->id}}" class="option">{{$certificate->na_cert}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <label for="" style="margin-right: 20px;">
                        التخصص:
                    </label>
                    <div class="col-sm-2">
                        <select name="specialtie_id" id="" class="form-select" data-bs-toggle='tooltip'  title='يمكنك التعديل على هذه البيانات'>
                            <option value="{{$specialtie_id}}" class="option">{{$specialtie}} </option>
                            @foreach ($specialties as $specialtie)
                                @if ($specialtie->id != $specialtie_id)
                                    <option value="{{$specialtie->id}}" class="option">{{$specialtie->na_spec}}</option>
                                @endif
                            @endforeach                            
                        </select>
                    </div>
                    </div>

                    <hr size="5" class="hr-m"/>
                    <div class="form-row" dir="rtl">
                    <label for="">
                        الــــمــهـــنــة:
                    </label>
                    <div class="col-sm-4">
                        <select name="profession_id" id="" class="form-select" data-bs-toggle='tooltip'  title='يمكنك التعديل على هذه البيانات'>
                            <option value="{{$profession_id}}" class="option">{{$profession}} </option>
                            @foreach ($professions as $profession)
                            @if ($profession->id != $profession_id)
                                <option value="{{$profession->id}}" class="option">{{$profession->na_profes}}</option>
                            @endif
                            @endforeach  
                        </select>
                    </div>
                    <label for="" style="margin-right: 20px;">
                        جــهـــة الـــعـــمـــل:
                    </label>
                    <div class="col-sm-4">
                        <select name="jihat_work_id" id="" class="form-select" data-bs-toggle='tooltip'  title='يمكنك التعديل على هذه البيانات'>
                            <option value="{{$jihat_work_id}}" class="option">{{$jihat_work}} </option>
                            @foreach ($jihat_works as $jihat_work)
                                @if ($jihat_work->id != $jihat_work_id)
                                    <option value="{{$jihat_work->id}}" class="option">{{$jihat_work->na_jihatw}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    </div>

                    <hr size="5" class="hr-m"/>
                    <div class="form-row" dir="rtl">
                        <label for="">
                            محل الاقامة الحالي:
                        </label>
                        <div class="form-holder">
                            <div class="row">
                            <div class="col-sm-3">
                                <select name="countrie_accom_id" id="countrie_accom_id" class="form-select" data-bs-toggle='tooltip'  title='يمكنك التعديل على هذه البيانات'>
                                    <option value="{{$countrie_accom_id}}"  class="option" >{{$countrie_accom}} </option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select name="province_accom_id" id="province_accom_id" class="form-select" data-bs-toggle='tooltip'  title='يمكنك التعديل على هذه البيانات'>
                                    <option value="{{$province_accom_id}}" class="option">{{$province_accom}}</option>
                                </select>
                            </div>
                            
                            <div class="col-sm-3 " >
                                <select name="directorate_accom_id" id="directorate_accom_id" class="form-select" data-bs-toggle='tooltip'  title='يمكنك التعديل على هذه البيانات'>
                                    <option value="{{$directorate_accom_id}}" class="option">{{$directorate_accom}} </option>
                                </select>
                            </div>

                            <div class="col-sm-3">
                                <input type="text" placeholder="عزلة / قرية" class="form-control" name="village_accom" value="{{$common_data->village_accom}}" required data-bs-toggle='tooltip'  title='يمكنك التعديل على هذه البيانات'/>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-sm-3">
                                <input type="text" placeholder="الحي" class="form-control" name="neigh_accom" value="{{$common_data->neigh_accom}}" required data-bs-toggle='tooltip'  title='يمكنك التعديل على هذه البيانات'/>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" placeholder="الشارع" class="form-control text-ignore-validation" name="street_accom" value="{{$common_data->street_accom}}" required />
                            </div>
                            <div class="col-sm-3">
                                <input type="text" placeholder="المنزل" class="form-control text-ignore-validation" name="house_accom" value="{{$common_data->house_accom}}" required/>
                            </div>
                            <div class="col-sm-3">
                                <input type="tel" placeholder="رقم التلفون" class="form-control" name="num_phone" value="{{$common_data->num_phone}}" required/>
                            </div>
                            </div>

                        </div>
                    </div>
                    <hr size="5" class="hr-m"/>
                    <div class="form-row" dir="rtl">
                        <label for="">
                            محل الاقامة السابق:
                        </label>
                        <div class="form-holder">
                            <div class="row">
                            <div class="col-sm-3">
                                <select name="countrie_accom_form_id" id="countrie_accom_form_id" class="form-select" data-bs-toggle='tooltip'  title='يمكنك التعديل على هذه البيانات'>
                                    <option value="{{$FamilyCard->countrie_accom_form_id}}"  style="color: white" >{{$FamilyCard->countrieaccomform->countrie_na}}</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select name="province_acom_form_id" id="province_acom_form_id" class="form-select" data-bs-toggle='tooltip'  title='يمكنك التعديل على هذه البيانات'>
                                    <option value="{{$FamilyCard->province_acom_form_id}}"  style="color: white" >{{$FamilyCard->provinceacomform->na_prov}}</option>
                                </select>
                            </div>
                            
                            <div class="col-sm-3 " >
                                <select name="directorate_acom_form_id" id="directorate_acom_form_id" class="form-select" data-bs-toggle='tooltip'  title='يمكنك التعديل على هذه البيانات'>
                                    <option value="{{$FamilyCard->directorate_acom_form_id}}"  style="color: white" >{{$FamilyCard->directorateacomform->na_dire}}</option>
                                </select>
                            </div>

                            <div class="col-sm-3">
                                <input type="text" placeholder="عزلة / قرية" class="form-control" value="{{$FamilyCard->village_accomm_form}}" name="village_accomm_form" required data-bs-toggle='tooltip'  title='يمكنك التعديل على هذه البيانات'/>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-sm-3">
                                <input type="text" placeholder="الحي" class="form-control" value="{{$FamilyCard->neigh_accomm_form}}" name="neigh_accomm_form" required data-bs-toggle='tooltip'  title='يمكنك التعديل على هذه البيانات'/>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" placeholder="الشارع" class="form-control" value="{{$FamilyCard->street_accomm_form}}" name="street_accomm_form" required />
                            </div>
                            <div class="col-sm-3">
                                <input type="text" placeholder="المنزل" class="form-control" value="{{$FamilyCard->house_accom_form}}" name="house_accom_form" required/>
                            </div>
                            <div class="col-sm-3">
                                <input type="tel" placeholder="رقم التلفون" class="form-control" value="{{$FamilyCard->phone}}" name="phone" required/>
                            </div>
                            </div>

                        </div>
                    </div>
                    <hr size="5" class="hr-m"/>
                    <div class="form-row" dir="rtl">
                        <label for="">
                            بيانات البطاقة الشخصية:
                        </label>
                        <div class="form-holder">
                            <div class="row">
                                <div class="col-sm-3">
                                    <input type="text" class="form-control cardid" placeholder="رقم الــبــطاقـة" value="{{$common_data->id_card}}" name="id_card" required data-bs-toggle='tooltip'  title='يرجى الانتباه هذا الحقل مخصص لرقم البطاقة الشخصية '/>
                                </div>
                                <div class="col-sm-3">
                                    <input type="date" class="form-control" value="{{$FamilyCard->date_version}}" name="date_version" id="date_version" required/>
                                </div>
                            
                                <div class="col-sm-3 " >
                                    <select name="card_version_center_id" id="card_version_center_id" class="form-select" required data-bs-toggle='tooltip'  title='يرجى إختيار عنصر من القائمة'>
                                        <option value="{{$FamilyCard->card_version_center_id}}" class="option">{{$FamilyCard->CardVersionCenter->na_center}}</option>
                                        @foreach ($card_version_centers as $card_version_center)
                                            @if ($card_version_center->id != $FamilyCard->card_version_center_id)
                                                <option value="{{$card_version_center->id}}" class="option">{{$card_version_center->na_center}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <hr size="5" class="hr-m"/>
                </section> 
                <div class="index-btn-wrapper" dir="rtl">
                    <div   class="btn btn-info col-md-2" onclick="run(1, 2);">التالي</div>
                    <div class="btn btn-outline-warning col-md-2" onclick="run(1, 0);">السابق</div>
                </div>
                </div>
            </div>

            <!-- tab 2 -->
            <div  class="tab" id="tab-2">
                <div class="form-header">
                    <h1 class="mb-4">تعديل طلب الحصول على بطاقة عائلية </h1>
                </div>
                <div id="wizard">
                    <div class="form-header">
                        <h2>بيانات  الشهود</h2>
                        <hr size="5" />
                    </div>
                <section class="sec">
                    <div class="tooltip-demo">
                        <div class="form-header">
                            <h2>بيانات  الشاهد الأول</h2>
                            <hr size="5" />
                        </div>

                        <div class="form-row" dir="rtl">
                                <label for="">
                                    أسم الشاهد الكامل:
                                </label>
                                <div class="form-holder">
                                    <div class="row">
                                    <div class="col-sm-3">
                                        <input type="text" value="{!!$dataWitnesse->foreNa_witn!!}" placeholder="الاسم الأول" class="form-control" name="foreNa_witn" required data-bs-toggle='tooltip'  title='هذ الحقل مخصص لاسم واحد فقط بالغة العربية ولايسمح بإدخال مسافة'/>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" value="{!!$dataWitnesse->secondNa_witn!!}" placeholder="أسم الاب" class="form-control" name="secondNa_witn" required data-bs-toggle='tooltip'  title='هذ الحقل مخصص لاسم واحد فقط بالغة العربية ولايسمح بإدخال مسافة'/>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" value="{!!$dataWitnesse->thirdNa_witn!!}" placeholder="أسم الجد" class="form-control" name="thirdNa_witn" required data-bs-toggle='tooltip'  title='هذ الحقل مخصص لاسم واحد فقط بالغة العربية ولايسمح بإدخال مسافة'/>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" value="{!!$dataWitnesse->tit_witn!!}" placeholder="القب" class="form-control" name="tit_witn" required data-bs-toggle='tooltip'  title='هذ الحقل مخصص لاسم واحد فقط بالغة العربية ولايسمح بإدخال مسافة'/>
                                    </div>
                                </div>	                        
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                جهة العمل:
                            </label>
                            <div class="col-sm-3">
                                <select name="jihat_work_id_w" id="" class="form-select" required data-bs-toggle='tooltip'  title='يرجى إختيار عنصر من القائمة'>
                                    <option value="{{$jihat_work_w_id}}" class="option">{{$jihat_work_w}}</option>
                                    @foreach ($jihat_works as $jihat_work)
                                    @if ($jihat_work->id != $jihat_work_w_id)
                                    <option value="{{$jihat_work->id}}" class="option">{{$jihat_work->na_jihatw}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <label for="" style="margin-right: 20px;">
                                مقر العمل:
                            </label>
                                <div class="col-sm-3">
                                    <input type="text" value="{!!$dataWitnesse->work_head_witn!!}" placeholder="مقر العمل" class="form-control" name="work_head_witn" required data-bs-toggle='tooltip' title='هذ الحقل خاص بمقر العمل يسمح بإدخال الاحرف العربية فقط '/>
                                </div>
                            <label for="" style="margin-right: 20px;">
                                التلفون:
                            </label>
                                <div class="col-sm-2">
                                    <input type="tel" value="{!!$dataWitnesse->phone_witn!!}" placeholder="رقم التلفون" class="form-control" name="phone_witn" required data-bs-toggle='tooltip' title='هذا الحقل خاص برقم التلفون لايمكنك ادخال غير الارقم'/>
                                </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                بطاقة الشهاد:
                            </label>
                                <div class="col-sm-3">
                                    <select name="ty_document_witn_id" id="" class="form-select" required data-bs-toggle='tooltip'  title='يرجى إختيار عنصر من القائمة'>
                                        <option value="{{$ty_document_witn_id}}" class="option">{{$ty_document_witn}}</option>
                                        @foreach ($ty_documents as $ty_document)
                                            @if ($ty_document->id != $ty_document_witn_id)
                                            <option value="{{$ty_document->id}}" class="option">{{$ty_document->na_ty_doc}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <label for="" style="margin-right: 20px;">
                                    رقم البطاقة:
                                </label>
                                <div class="col-sm-3">
                                    <input type="text" value="{!!$dataWitnesse->card_id!!}" class="form-control cardid" placeholder="رقم الــبــطاقـة" name="card_id" required data-bs-toggle='tooltip'  title='يرجى الانتباه هذا الحقل مخصص لرقم البطاقة الشخصية '/>
                                </div>
                                <label for="" style="margin-right: 20px;">
                                    محل الاصدار:
                                </label>
                                <div class="col-sm-2">
                                    <select name="card_version_center_id" id="" class="form-select" required data-bs-toggle='tooltip'  title='يرجى إختيار عنصر من القائمة'>
                                        <option value="{{$card_version_center_w_id}}" class="option">{{$card_version_center_w}}</option>
                                        @foreach ($card_version_centers as $card_version_center)
                                            @if ($card_version_center->id != $card_version_center_w_id)
                                            <option value="{{$card_version_center->id}}" class="option">{{$card_version_center->na_center}}</option>                                                
                                            @endif                                                
                                        @endforeach
                                    </select>
                                </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                تاريخ اصدار البطاقة:
                            </label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" value="{!!$dataWitnesse->date_card_issuance!!}" name="date_card_issuance" required data-bs-toggle='tooltip'  title='يرجى تحديد تاريخ اصدار البطاقة'/>
                            </div>
                            <label for="" style="margin-right: 20px;">
                                الـــعــنــوان:
                            </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="{!!$dataWitnesse->address_witn!!}" name="address_witn" required data-bs-toggle='tooltip'  title='هذ الحقل مخصص للعنوان يسمح بالغة العربية فقط '/>
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-header">
                            <br><h2>بيانات  الشاهد الثاني</h2>
                            <hr size="5" />
                        </div>

                        <div class="form-row" dir="rtl">
                            <label for="">
                                أسم الشاهد الكامل:
                            </label>
                            <div class="form-holder">
                                <div class="row">
                                <div class="col-sm-3">
                                    <input type="text" value="{!!$dataWitnesse2->foreNa_witn!!}" placeholder="الاسم الأول" class="form-control" name="foreNa_witn2" required data-bs-toggle='tooltip'  title='هذ الحقل مخصص لاسم واحد فقط بالغة العربية ولايسمح بإدخال مسافة'/>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" value="{!!$dataWitnesse2->secondNa_witn!!}" placeholder="أسم الاب" class="form-control" name="secondNa_witn2" required data-bs-toggle='tooltip'  title='هذ الحقل مخصص لاسم واحد فقط بالغة العربية ولايسمح بإدخال مسافة'/>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" value="{!!$dataWitnesse2->thirdNa_witn!!}" placeholder="أسم الجد" class="form-control" name="thirdNa_witn2" required data-bs-toggle='tooltip'  title='هذ الحقل مخصص لاسم واحد فقط بالغة العربية ولايسمح بإدخال مسافة'/>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" value="{!!$dataWitnesse2->tit_witn!!}" placeholder="القب" class="form-control" name="tit_witn2" required data-bs-toggle='tooltip'  title='هذ الحقل مخصص لاسم واحد فقط بالغة العربية ولايسمح بإدخال مسافة'/>
                                </div>
                            </div>	                        
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                جهة العمل:
                            </label>
                            <div class="col-sm-3">
                                <select name="jihat_work_id_w2" id="" class="form-select" required data-bs-toggle='tooltip'  title='يرجى إختيار عنصر من القائمة'>
                                    <option value="{{$jihat_work_w_id2}}" class="option">{{$jihat_work_w2}}</option>
                                    @foreach ($jihat_works as $jihat_work)
                                    @if ($jihat_work->id != $jihat_work_w_id2)
                                    <option value="{{$jihat_work->id}}" class="option">{{$jihat_work->na_jihatw}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <label for="" style="margin-right: 20px;">
                                مقر العمل:
                            </label>
                                <div class="col-sm-3">
                                    <input type="text" value="{!!$dataWitnesse2->work_head_witn!!}" placeholder="مقر العمل" class="form-control" name="work_head_witn2" required data-bs-toggle='tooltip' title='هذ الحقل خاص بمقر العمل يسمح بإدخال الاحرف العربية فقط'/>
                                </div>
                            <label for="" style="margin-right: 20px;">
                                التلفون:
                            </label>
                                <div class="col-sm-2">
                                    <input type="tel" value="{!!$dataWitnesse2->phone_witn!!}" placeholder="رقم التلفون" class="form-control" name="phone_witn2" required data-bs-toggle='tooltip' title='هذا الحقل خاص برقم التلفون لايمكنك ادخال غير الارقم'/>
                                </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                بطاقة الشهاد:
                            </label>
                                <div class="col-sm-3">
                                    <select name="ty_document_witn_id2" id="" class="form-select" required data-bs-toggle='tooltip'  title='يرجى إختيار عنصر من القائمة'>
                                        <option value="{{$ty_document_witn_id2}}" class="option">{{$ty_document_witn2}}</option>
                                        @foreach ($ty_documents as $ty_document)
                                            @if ($ty_document->id != $ty_document_witn_id2)
                                            <option value="{{$ty_document->id}}" class="option">{{$ty_document->na_ty_doc}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <label for="" style="margin-right: 20px;">
                                    رقم البطاقة:
                                </label>
                                <div class="col-sm-3">
                                    <input type="text" value="{!!$dataWitnesse2->card_id!!}" class="form-control cardid" placeholder="رقم الــبــطاقـة" name="card_id2" required data-bs-toggle='tooltip'  title='يرجى الانتباه هذا الحقل مخصص لرقم البطاقة الشخصية '/>
                                </div>
                                <label for="" style="margin-right: 20px;">
                                    محل الاصدار:
                                </label>
                                <div class="col-sm-2">
                                    <select name="card_version_center_id2" id="" class="form-select" required data-bs-toggle='tooltip'  title='يرجى إختيار عنصر من القائمة'>
                                        <option value="{{$card_version_center_w_id2}}" class="option">{{$card_version_center_w2}}</option>
                                        @foreach ($card_version_centers as $card_version_center)
                                            @if ($card_version_center->id != $card_version_center_w_id2)
                                            <option value="{{$card_version_center->id}}" class="option">{{$card_version_center->na_center}}</option>                                                
                                            @endif                                                
                                        @endforeach
                                    </select>
                                </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                تاريخ اصدار البطاقة:
                            </label>
                            <div class="col-sm-4">
                                <input type="date" value="{!!$dataWitnesse2->date_card_issuance!!}" class="form-control" name="date_card_issuance2" required data-bs-toggle='tooltip'  title='يرجى تحديد تاريخ اصدار البطاقة'/>
                            </div>
                            <label for="" style="margin-right: 20px;">
                                الـــعــنــوان:
                            </label>
                            <div class="col-sm-4">
                                <input type="text" value="{!!$dataWitnesse2->address_witn!!}" class="form-control" name="address_witn2" required data-bs-toggle='tooltip'  title='هذ الحقل مخصص للعنوان يسمح بالغة العربية فقط '/>
                            </div>
                        </div>
                        <hr size="5" class="hr-m"/>
                    </div>
                </section> 
                <div class="index-btn-wrapper" dir="rtl">
                    <div class="btn btn-primary col-md-2" onclick="run(2, 3)" data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollable">
                        إرســــال
                    </div>
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
                                    <button class="btn btn-primary" style="margin-left: 5px;">نـعـم</button>
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
        });

        // العنوان
        $(document).ready(function() {
            // استدعاء الدول من الخادم عند تحميل الصفحة
            $.ajax({
                url: "{{ route('Location.index') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    // إضافة اختيارات الدول إلى حقل الدولة
                    $.each(data, function(key, value) {
                        $('#countrie_accom_id').append('<option value="' + key + '">' + value + '</option>');
                        $('#countrie_accom_form_id').append('<option value="' + key + '">' + value + '</option>');
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

            // استدعاء المحافظات المرتبطة بالدولة المختارة
            $('#countrie_accom_form_id').change(function() {
                var countrie_accom_form_id = $(this).val();
                if (countrie_accom_form_id) {
                    $.ajax({
                        url: "{{ route('getGovernoratesByCountryAccomForm') }}",
                        type: "POST",
                        data: {
                            countrie_accom_form_id: countrie_accom_form_id,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            // إضافة اختيارات المحافظات إلى حقل المحافظة
                            $('#province_acom_form_id').empty().append('<option value="">اختر محافظة</option>');
                            $.each(data, function(key, value) {
                                $('#province_acom_form_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                            // إفراغ حقول المديرية والمركز
                            $('#directorate_acom_form_id').empty().append('<option value="">اختر مديرية</option>');
                        }
                    });
                } else {
                    // إفراغ جميع حقول الاختيارات
                    $('#province_acom_form_id').empty().append('<option value="">اختر محافظة</option>');
                    $('#directorate_acom_form_id').empty().append('<option value="">اختر مديرية</option>');
                }
            });

            // استدعاء المديريات المرتبطة بالمحافظة المختارة
            $('#province_acom_form_id').change(function() {
                var province_acom_form_id = $(this).val();
                if (province_acom_form_id) {
                    $.ajax({
                        url: "{{ route('getDirectoratesByGovernorateAccomForm') }}",
                        type: "POST",
                        data: {
                            province_acom_form_id: province_acom_form_id,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            // إضافة اختيارات المديريات إلى حقل المديرية
                            $('#directorate_acom_form_id').empty().append('<option value="">اختر مديرية</option>');
                            $.each(data, function(key, value) {
                                $('#directorate_acom_form_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    // إفراغ حقول المديرية
                    $('#directorate_acom_form_id').empty().append('<option value="">اختر مديرية</option>');
                }
            });
        });
    </script>
@endsection
