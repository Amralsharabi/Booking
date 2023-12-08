@extends('layouts.head_forms')
@section('title')
    إنشاء حساب
@endsection
@section('style')
    <style>
        .bg{
            border: 1px solid #fff;
            border-radius: 10px;
            padding: 30px 10px 30px 10px;
            position: relative;
            background: rgba(0, 0, 0, 0.277); 
            box-shadow: 0 0 12px 0px rgb(0, 183, 255);
        }
        .bg input{
            margin-bottom: 10px
        }
        .title h1{
            text-align: center;
            font-size: 40px !important;
            margin-bottom: 20px
        }
        label{
            font-size: 20px;
        }
        .mes{
            background-color: #fff !important;
            padding: 20px;
            border-radius: 10px !important;
            text-align: center;
        }select option{
            color: black;
        }
    </style>
@endsection
@section('body')
    <div class="wrapper" dir="rtl" >
        <form action="{{ route('register.store') }}" method="POST">
            @csrf
            <!-- tab 0 -->
            <div  class="tab" id="tab-0" >
                <div class="container">
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show py-10 text-center" role="alert" style="text-align:right ">
                        <ul>
                                <h1 class="alert-heading">خطاء</h1>
                                <li>{{$error}}</li>
                            </ul>
                        </div>
                        @endforeach
                </div>
                <section class="sec">
                        <div class="container">
                            <div class="row justify-content-center" >
                                <div id="createaccount " class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" >
                                    <div class="tooltip-demo">
                                        <div class="row bg" dir="rtl" data-aos="flip-right">
                                            <div class="title text-white">
                                            <h1 class="text-white">إنـشـاء حـســاب</h1>
                                            <hr>
                                        </div>
                                        {{-- <div class="form-group col-md-6" >
                                            <label for="username">{{__('أسم المستخدم')}}</label>
                                            <input type="text" name="name" id="" class="text-ignore-validation form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="usrename" required autocomplete="name" data-bs-toggle='tooltip' title='يرجى ملء هذا الحقل'/>
                                            @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group col-md-6">
                                            <label for="numberphone">{{__('رقم التلفون')}}</label>
                                            <input type="tel"   name="numberphone" class="form-control @error('numberphone') is-invalid @enderror" id="numberphone" value="{{ old('numberphone') }}" required autocomplete="numberphone" dir="ltr" data-bs-toggle='tooltip' title='هذا الحقل خاص برقم التلفون لايمكنك ادخال غير الارقم'>
                                            @error('numberphone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> --}}

                                        <div class="form-group col-md-12">

                                            <label for="email">{{__('الايميل')}}</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" dir="ltr">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="password">{{__('كلمة المرور')}}</label>
                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required autocomplete="new-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        

                                        <div class="form-group col-md-6">
                                            <label for="password-confirm">{{__('تاكيد كلمة المرور')}}</label>
                                            <input type="password" name="password_confirmation" class="form-control" id="password-confirm" required autocomplete="new-password">
                                        </div>

                                        <h5 class="mx-3"><a href="{{ route('login') }}" style="font-size: 20px; color: #93e0ff;"> لدي حساب بالفعل ؟ </a></h5>
                                        <div class="text-center"><div class="btn btn-primary  col-md-4 text-white shadownext" onclick="run(0, 1);">{{__('الــتــالــــي')}}</div></div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
            </div>
            <div class="container" style="margin-bottom: 50px;">
                <!-- tab 1 -->
                <div  class="tab" id="tab-1" >
                    <div class="title text-white">
                        <h1 class="text-white"> الــبــيـانــات الاســاســيــة</h1>
                    </div>
                    <div id="wizard">
                        <div class="form-header">
                            <h1>بيانات مقدم الطلب</h1>
                        </div>
                        <div class="container">
                            <div class="alert alert-success alert-dismissible fade show py-10" role="alert" style="text-align:center ">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" style="left: 0;right: auto;" aria-label="قريب"></button>
                                <p class="mb-0 mt-3">لا تقلق ستقوم بتعبئة هذه البيانات لمره واحدة فقط ، في المره القادمة لن تحتاج الى تعبيئة هذه البيانات</p>
                                <hr>
                                <p class="mb-0"><span style="color: red;">ملاحظة: </span>احرص على ان تكون كل البيانات التي تقوم بادخالها صحيحة</p>
                            </div>
                        </div>
                        <hr size="5" />
                        <section class="sec">
                            <div class="tooltip-demo">
                                <div class="form-row" dir="rtl">
                                    <label for="">
                                        أسم مقدم الطلب الكامل:
                                    </label>
                                    <div class="form-holder">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <input type="text" placeholder="الاسم الأول" class="form-control" value="{{ old('req_fore_na') }}" name="req_fore_na" id="input1"  required  data-bs-toggle='tooltip'  title='هذ الحقل مخصص لاسم واحد فقط بالغة العربية'/>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" placeholder="أسم الاب" class="form-control" value="{{ old('req_second_na') }}" name="req_second_na"  required data-bs-toggle='tooltip'  title='هذ الحقل مخصص لاسم واحد فقط بالغة العربية'/>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" placeholder="أسم الجد" class="form-control" value="{{ old('req_third_na') }}" name="req_third_na"  required data-bs-toggle='tooltip'  title='هذ الحقل مخصص لاسم واحد فقط بالغة العربية'/>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" placeholder="القب" class="form-control" value="{{ old('req_tit') }}" name="req_tit"  required data-bs-toggle='tooltip'  title='هذ الحقل مخصص لاسم واحد فقط بالغة العربية'/>
                                            </div>
                                            <div class="col-sm-2 " >
                                                <select name="nationality_req_id" id="" class="form-select" required data-bs-toggle='tooltip'  title='قم بإختيار عنصر من القائمة'>
                                                    <option value=""  class="option">الجنسية</option>
                                                    @foreach ($countrie_nationalits as $countries_nationality)
                                                        <option value="{{$countries_nationality->id}}" @if(old('nationality_req_id') == $countries_nationality->id) selected @endif class="option">{{$countries_nationality->nationality_na}}</option>
                                                    @endforeach
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
                                                <input type="text" placeholder="الاسم الأول" class="form-control" value="{{ old('father_fore_na') }}" name="father_fore_na" required data-bs-toggle='tooltip'  title='هذ الحقل مخصص لاسم واحد فقط بالغة العربية'/>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" placeholder="أسم الاب" class="form-control" value="{{ old('father_second_na') }}" name="father_second_na" required data-bs-toggle='tooltip'  title='هذ الحقل مخصص لاسم واحد فقط بالغة العربية'/>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" placeholder="أسم الجد" class="form-control" value="{{ old('father_third_na') }}" name="father_third_na" required data-bs-toggle='tooltip'  title='هذ الحقل مخصص لاسم واحد فقط بالغة العربية'/>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" placeholder="القب" class="form-control" value="{{ old('father_tit') }}" name="father_tit" required data-bs-toggle='tooltip'  title='هذ الحقل مخصص لاسم واحد فقط بالغة العربية'/>
                                            </div>
                                            <div class="col-sm-2 " >
                                                <select name="nationality_father_id" id="" class="form-select" required data-bs-toggle='tooltip'  title='قم بإختيار عنصر من القائمة'>
                                                    <option value="" class="option">الجنسية</option>
                                                    @foreach ($countrie_nationalits as $countries_nationality)
                                                        <option value="{{$countries_nationality->id}}" @if(old('nationality_father_id') == $countries_nationality->id) selected @endif class="option">{{$countries_nationality->nationality_na}}</option>
                                                    @endforeach
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
                                                <input type="text" placeholder="الاسم الأول" class="form-control" value="{{ old('mother_fore_na') }}" name="mother_fore_na" required data-bs-toggle='tooltip'  title='هذ الحقل مخصص لاسم واحد فقط بالغة العربية'/>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" placeholder="أسم الاب" class="form-control" value="{{ old('mother_second_na') }}" name="mother_second_na" required data-bs-toggle='tooltip'  title='هذ الحقل مخصص لاسم واحد فقط بالغة العربية'/>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" placeholder="أسم الجد" class="form-control" value="{{ old('mother_third_na') }}" name="mother_third_na" required data-bs-toggle='tooltip'  title='هذ الحقل مخصص لاسم واحد فقط بالغة العربية'/>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" placeholder="القب" class="form-control" value="{{ old('mother_tit') }}" name="mother_tit" required data-bs-toggle='tooltip'  title='هذ الحقل مخصص لاسم واحد فقط بالغة العربية'/>
                                            </div>
                                            <div class="col-sm-2 " >
                                                <select name="nationality_mother_id" id="" class="form-select" required data-bs-toggle='tooltip'  title='قم بإختيار عنصر من القائمة'>
                                                    <option value="" class="option">الجنسية</option>
                                                    @foreach ($countrie_nationalits as $countries_nationality)
                                                        <option value="{{$countries_nationality->id}}" @if(old('nationality_mother_id') == $countries_nationality->id) selected @endif class="option">{{$countries_nationality->nationality_na}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr size="5" class="hr-m"/>
                                <div class="form-row" dir="rtl">
                                    <div class="form-holder">
                                        <div class="row">
                                            <div class="checkbox-circle">
                                                <div class="col-sm-12">
                                                    <label for="">
                                                        النوع:
                                                    </label>
                                                    <label class="male">
                                                        <input type="radio" name="gender" value="1" required checked @if(old('gender') == '1') checked @endif> ذكر<br>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="female">
                                                        <input type="radio" name="gender" value="0" required @if(old('gender') == '0') checked @endif> انثى<br>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section> 
                        <div class="index-btn-wrapper" dir="rtl">
                            <div class="btn btn-primary col-md-2 shadownext" onclick="run(1, 2);">التالي</div>
                            <div class="btn btn-outline-warning col-md-2 shadoback" onclick="run(1, 0);">السابق</div>
                        </div>
                    </div>
                </div>

                <!-- tab 2 -->
                <div  class="tab" id="tab-2">
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
                                        <input type="date" value="{{ old('date_pirth_ad') }}" name="date_pirth_ad" class="form-control" id="gregorian-date" required data-bs-toggle='tooltip'  title='يرجى تحديد تاريخ ميلادك'/>
                                    </div>
                                    <label for="" style="margin-right: 20px;">
                                        تاريخ الميلاد الهجري:
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" value="{{ old('date_pirth_he') }}" name="date_pirth_he" id="hijri-picker" class="form-control text-ignore-validation" data-bs-toggle='tooltip'  title='تاريخ الميلاد بالهجري يتم تحديدة تلقائياً بناً على التاريخ الميلادي'/>
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
                                                <select name="countrie_birth_id" id="countrie_birth_id" class="form-select" required data-bs-toggle='tooltip'  title='قم بإختيار عنصر من القائمة'>
                                                    <option value="" class="option">دولة الميلاد</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3 " >
                                                <select name="province_birth_id" id="province_birth_id" class="form-select" required data-bs-toggle='tooltip'  title='قم بإختيار عنصر من القائمة'>
                                                    <option value="" class="option"> محافظة الميلاد</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3 " >
                                                <select name="directorate_pirth_id" id="directorate_pirth_id" class="form-select" required data-bs-toggle='tooltip'  title='قم بإختيار عنصر من القائمة'>
                                                    <option value="" class="option">مديرية الميلاد</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" placeholder="عزلة / قرية الميلاد" class="form-control" value="{{ old('village_parth') }}" name="village_parth" required data-bs-toggle='tooltip'  title='هذ الحقل خاص بقرية الميلاد  ولايسمح بإدخال غير الاحرف العربية'/>
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
                                        <select name="religions_id" id="" class="form-select" required data-bs-toggle='tooltip'  title='قم بإختيار عنصر من القائمة'>
                                            <option value="" class="option">الديانة</option>
                                            @foreach ($religions as $religion)
                                                <option value="{{$religion->id}}" @if(old('religions_id') == $religion->id) selected @endif class="option">{{$religion->na_relig}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="" style="margin-right: 20px;">
                                        الـحــالــة الاجــتــمـاعـيـة:
                                    </label>
                                    <div class="col-sm-4">
                                        <select name="social_statu_id" id="" class="form-select" required data-bs-toggle='tooltip'  title='قم بإختيار عنصر من القائمة'>
                                            <option value="" class="option">الحالة الاجتماعية </option>
                                            @foreach ($social_status as $social_statu)
                                                <option value="{{$social_statu->id}}" @if(old('social_statu_id') == $social_statu->id) selected @endif class="option">{{$social_statu->na_status}}</option>
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
                                        <select name="learning_condition" id="" class="form-select" required data-bs-toggle='tooltip'  title='قم بإختيار عنصر من القائمة'>
                                            <option value="" class="option">الحالة التعليمية</option>
                                            <option value="1" @if(old('learning_condition') == '1') selected @endif class="option">متعلم</option>
                                            <option value="0" @if(old('learning_condition') == '0') selected @endif class="option">امي</option>
                                        </select>
                                    </div>
                                    <label for="" style="margin-right: 20px;">
                                        اسم اعلى شهادة:
                                    </label>
                                    <div class="col-sm-2">
                                        <select name="certificate_id" id="" class="form-select" required data-bs-toggle='tooltip'  title='قم بإختيار عنصر من القائمة'>
                                            <option value="" class="option">اعلى شهادة </option>
                                            @foreach ($certificates as $certificate)
                                                <option value="{{$certificate->id}}" @if(old('certificate_id') == $certificate->id) selected @endif class="option">{{$certificate->na_cert}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="" style="margin-right: 20px;">
                                        التخصص:
                                    </label>
                                    <div class="col-sm-2">
                                        <select name="specialtie_id" id="" class="form-select" required data-bs-toggle='tooltip'  title='قم بإختيار عنصر من القائمة'>
                                            <option value="" class="option">التخصص </option>
                                            @foreach ($specialties as $specialtie)
                                                <option value="{{$specialtie->id}}" @if(old('specialtie_id') == $specialtie->id) selected @endif class="option">{{$specialtie->na_spec}}</option>
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
                                        <select name="profession_id" id="" class="form-select" required data-bs-toggle='tooltip'  title='قم بإختيار عنصر من القائمة'>
                                            <option value="" class="option">المهنة </option>
                                            @foreach ($professions as $profession)
                                                <option value="{{$profession->id}}" @if(old('profession_id') == $profession->id) selected @endif class="option">{{$profession->na_profes}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="" style="margin-right: 20px;">
                                        جــهـــة الـــعـــمـــل:
                                    </label>
                                    <div class="col-sm-4">
                                        <select name="jihat_work_id" id="" class="form-select" required data-bs-toggle='tooltip'  title='قم بإختيار عنصر من القائمة'>
                                            <option value="" class="option">جهة العمل </option>
                                            @foreach ($jihat_works as $jihat_work)
                                                <option value="{{$jihat_work->id}}" @if(old('jihat_work_id') == $jihat_work->id) selected @endif class="option">{{$jihat_work->na_jihatw}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <hr size="5" class="hr-m"/>
                                <div class="form-row" dir="rtl">
                                    <label for="">
                                        الـــــعــنــوان:
                                    </label>
                                    <div class="form-holder">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <select name="countrie_accom_id" id="countrie_accom_id" class="form-select" required data-bs-toggle='tooltip'  title='قم بإختيار عنصر من القائمة'>
                                                    <option value=""  class="option" >دولة الإقامة</option>
                                                    {{-- @foreach ($countrie_nationalits as $countries_nationality)
                                                            <option value="{{$countries_nationality->id}}" @if(old('countrie_accom_id') == $countries_nationality->id) selected @endif class="option">{{$countries_nationality->countrie_na}}</option>
                                                    @endforeach --}}
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <select name="province_accom_id" id="province_accom_id" class="form-select" required data-bs-toggle='tooltip'  title='قم بإختيار عنصر من القائمة'>
                                                    <option value="" class="option">محافظة الإقامة</option>
                                                        {{-- @foreach ($provinces as $province)
                                                            <option value="{{$province->id}}" @if(old('province_accom_id') == $province->id) selected @endif class="option">{{$province->na_prov}}</option>
                                                        @endforeach --}}
                                                </select>
                                            </div>
                                            <div class="col-sm-3 " >
                                                <select name="directorate_accom_id" id="directorate_accom_id" class="form-select" required data-bs-toggle='tooltip'  title='قم بإختيار عنصر من القائمة'>
                                                    <option value="" class="option">مديرية الإقامة</option>
                                                    {{-- @foreach ($directorates as $directorate)
                                                        <option value="{{$directorate->id}}" @if(old('directorate_accom_id') == $directorate->id) selected @endif class="option">{{$directorate->na_dire}}</option>
                                                    @endforeach --}}
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" placeholder="عزلة / قرية" class="form-control" value="{{ old('village_accom') }}" name="village_accom" required title='هذ الحقل خاص باسم قرية الاقامة يسمح بإدخال الاحرف العربية فقط '/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <input type="text" placeholder="الحي" class="form-control" value="{{ old('neigh_accom') }}" name="neigh_accom" required title='هذ الحقل خاص باسم حي الاقامة يسمح بإدخال الاحرف العربية فقط '/>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" value="الشارع" class="form-control text-ignore-validation" value="{{ old('street_accom') }}" name="street_accom" />
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" value="المنزل" class="form-control text-ignore-validation" value="{{ old('house_accom') }}" name="house_accom" />
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="tel" placeholder="رقم التلفون" class="form-control" value="{{ old('num_phone') }}" name="num_phone" required data-bs-toggle='tooltip' title='هذا الحقل خاص برقم التلفون لايمكنك ادخال غير الارقم'/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr size="5" class="hr-m"/>
                            </div>
                        </section> 
                        <div class="index-btn-wrapper" dir="rtl">
                            <div class="btn btn-primary col-md-2 shadownext"  onclick="run(2, 3);"  data-bs-toggle="modal" data-bs-target="#staticBackdropLive">
                                إرســــال
                            </div>
                            <div class="btn btn-outline-warning col-md-2 shadoback" onclick="run(2, 1);">السابق</div>
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
                                        <h2>لن تستطيع تعديل هذه البيانات الابعد تقديم طلب تعديل</h2>
                                        <h2>لان كل الطلبات التي ستقوم بطلبها تعتمد على هذه البيانات</h2>
                                        <h2>وذلك لسلامة بياناتك وتسهيل طلباتك</h2>
                                    </div>
                                    <hr style="color: black;">
                                    <div class="modal-footer mx-auto ">
                                        <button class="btn btn-primary" onclick="run(3, 4);" style="margin-left: 5px;">حــفــظ</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="run(3, 2);">إغــلاق</button>
                                    </div>
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
        // العنوان + مكان الميلاد
        $(document).ready(function() {
            // استدعاء الدول من الخادم عند تحميل الصفحة
            $.ajax({
                url: "{{ route('Location.index') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    // إضافة اختيارات الدول إلى حقل الدولة
                    $.each(data, function(key, value) {
                        // إضافة اختيارات الدول إلى حقل الدولة
                        $('#countrie_accom_id').append('<option @if(old(`countrie_accom_id`) == ' + key + ') selected @endif value="' + key + '">' + value + '</option>');
                        $('#countrie_birth_id').append('<option @if(old(`countrie_birth_id`) == ' + key + ') selected @endif value="' + key + '">' + value + '</option>');
                    });
                    
                }
            });
            
            // استدعاء المحافظات المرتبطة بدولة الاقامة المختارة
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
                            //  إضافة اختيارات المحافظات إلى حقل محافظة الاقامة
                            $('#province_accom_id').empty().append('<option value="">محافظة الإقامة</option>');
                            $.each(data, function(key, value) {
                                $('#province_accom_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                            // إفراغ حقول المديرية 
                            $('#directorate_accom_id').empty().append('<option value="">مديرية الإقامة</option>');
                        }
                    });
                } else {
                    // إفراغ جميع حقول الاختيارات
                    $('#province_accom_id').empty().append('<option value="">محافظة الإقامة</option>');
                    $('#directorate_accom_id').empty().append('<option value="">مديرية الإقامة</option>');
                }
            });

            // استدعاء المديريات المرتبطة بمحافظة الإقامة المختارة
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
                            // إضافة اختيارات المديريات إلى حقل مديرية الإقامة
                            $('#directorate_accom_id').empty().append('<option value="">مديرية الإقامة</option>');
                            $.each(data, function(key, value) {
                                $('#directorate_accom_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    // إفراغ حقول مديرية الإقامة 
                    $('#directorate').empty().append('<option value="">مديرية الإقامة</option>');
                }
            });

            // استدعاء المحافظات المرتبطة بدولة الميلاد المختارة
            $('#countrie_birth_id').change(function() {
                var countrie_birth_id = $(this).val();
                if (countrie_birth_id) {
                    $.ajax({
                        url: "{{ route('getProvincesByCountryBirth') }}",
                        type: "POST",
                        data: {
                            countrie_birth_id: countrie_birth_id,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            // إضافة اختيارات المحافظات إلى حقل محافظة الميلاد
                            $('#province_birth_id').empty().append('<option value="">محافظة الميلاد</option>');
                            $.each(data, function(key, value) {
                                $('#province_birth_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                            // إفراغ حقول المديرية 
                            $('#directorate_pirth_id').empty().append('<option value="">مديرية الميلاد</option>');
                        }
                    });
                } else {
                    // إفراغ جميع حقول الاختيارات
                    $('#province_birth_id').empty().append('<option value="">محافظة الميلاد</option>');
                    $('#directorate_pirth_id').empty().append('<option value="">مديرية الميلاد</option>');
                }
            });

            // استدعاء المديريات المرتبطة بمحافظة الميلاد المختارة
            $('#province_birth_id').change(function() {
                var province_birth_id = $(this).val();
                if (province_birth_id) {
                    $.ajax({
                        url: "{{ route('getDirectoratesByProvinceBirth') }}",
                        type: "POST",
                        data: {
                            province_birth_id: province_birth_id,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            // إضافة اختيارات المديريات إلى حقل مديرية الميلاد
                            $('#directorate_pirth_id').empty().append('<option value="">مديرية الميلاد</option>');
                            $.each(data, function(key, value) {
                                $('#directorate_pirth_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    // إفراغ حقول المديرية 
                    $('#directorate_pirth_id').empty().append('<option value="">مديرية الميلاد</option>');
                }
            });

        });
        // نهائية العنوان + مكان الميلاد
    </script>
@endsection




