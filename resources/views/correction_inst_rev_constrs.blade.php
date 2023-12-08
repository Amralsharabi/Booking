@extends('layouts.head_forms')
@section('title')
    طلب تصحيح او تثبيت او ابطال قيد
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
{{-- {{ $tooltip = "readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>'" }} --}}
    <div class="wrapper" dir="rtl" >
        <form action="{{route('correctionInstRevConstr.store')}}" method="POST" data-aos="zoom-in-down">
            @csrf
            <!-- tab 0 -->
            <div  class="tab" id="tab-0" >
                <div class="form-header">
                    <h1 class="mb-4">طلب تصحيح او تثبيت او ابطال قيد</h1>
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
                        <div class="form-row" dir="rtl">
                                <label for="">
                                    أسم صاحب القيد الكامل:
                                </label>
                                <div class="form-holder">
                                    
                                    <div class="row ">
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="الاسم الأول" class="form-control " value="{!!$user->req_fore_na!!}" readonly data-bs-toggle="tooltip" data-bs-html="true"  readonly data-bs-toggle='tooltip' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>'/>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="أسم الاب" class="form-control" value="{{$user->req_second_na}}" readonly data-bs-toggle="tooltip" data-bs-html="true"  readonly data-bs-toggle='tooltip' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>'/>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="أسم الجد" class="form-control" value="{{$user->req_third_na}}"readonly data-bs-toggle="tooltip" data-bs-html="true" readonly data-bs-toggle='tooltip' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>'/>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="القب" class="form-control" value="{{$user->req_tit}}" readonly data-bs-toggle="tooltip" data-bs-html="true"  readonly data-bs-toggle='tooltip' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>'/>
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
                                        <input type="text" placeholder="الاسم الأول" class="form-control" value="{{$user->mother_fore_na}}" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>' />
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="أسم الاب" class="form-control" value="{{$user->mother_second_na}}" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>' />
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="أسم الجد" class="form-control" value="{{$user->mother_third_na}}" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>' />
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="القب" class="form-control" value="{{$user->mother_tit}}" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>' />
                                    </div>
                                </div>
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
                                            <option value="0" class="option"> {{$countrie_birth}}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 " >
                                        <select id="" class="form-select" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>'>
                                            <option value="0" class="option">{{$province_birth}}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 " >
                                        <select id="" class="form-select" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>'>
                                            <option value="0" class="option">{{$directorate_pirth}}</option>                                        
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="عزلة / قرية الميلاد" class="form-control" value="{{$user->village_parth}}" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>' />
                                    </div>
                            </div>
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                تاريخ الميلاد الميلاد:
                            </label>
                            <div class="col-sm-4">
                                <input type="date" value="{{$user->date_pirth_ad}}" class="form-control" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>'/>
                            </div>
                            <label for="" style="margin-right: 20px;">
                                تاريخ الميلاد الهجري:
                            </label>
                            <div class="col-sm-4">
                                <input type="text" value="{{$user->date_pirth_he}}" class="form-control text-ignore-validation" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>'/>
                            </div>
                        </div>
                        
                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                نوع القيد:
                            </label>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <select class="form-select" name="constraint_type" id="constraint_type">
                                        <option value="" class="option">نوع القيد</option>
                                        @foreach ($constraints as $constraint)
                                            <option value="{{$constraint->id}}" class="option">{{$constraint->na_constraint}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label for="" style="margin-right: 20px;">
                                رقم القيد:
                            </label>
                            <div class="col-sm-3">
                                <input type="number" placeholder="رقم القيد" class="form-control" name="no_Constraint" id="no_Constraint"/>
                            </div>
                            <label for="" style="margin-right: 20px;">
                                تاريخ القيد:
                            </label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" name="date_constraint" id="date_constraint"/>
                            </div>
                        </div>

                        <div class="form-row" dir="rtl">
                            <label for="">
                                جهة اصدار القيد :
                            </label>
                            <div class="form-holder">
                                
                                <div class="row ">
                                <div class="col-sm-6">
                                    <select name="province_cons_id" id="province_cons_id" class="form-select" required data-bs-toggle='tooltip'  title='قم بإختيار عنصر من القائمة'>
                                        <option value="" class="option">محافظة</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <select name="directorate_Cons_id" id="directorate_Cons_id" class="form-select" required data-bs-toggle='tooltip'  title='قم بإختيار عنصر من القائمة'>
                                        <option value="" class="option">مديرية </option>
                                    </select>
                                </div>
                            </div>	                        
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
                    <h1 class="mb-4">طلب تصحيح او تثبيت او ابطال قيد</h1>
                </div>
                <div id="wizard">
                    <div class="form-header">
                        <h2>البيان المطلوب تصحيحة او تثتبته او إبطاله</h2>
                        <hr size="5" />
                    </div>
                    
                <section class="sec">
                <div class="tooltip-demo " id="addfield">
                    <div class="form-row" dir="rtl">
                        <label for="">
                            البيان القديم:
                        </label>
                        <div class="col-sm-4">
                            <input type="text" placeholder="البيان القديم" class="form-control" name="old_statement[]"/>
                        </div>
                        <div class="col-sm-1" style="margin-right: 20px;">
                            <input type="text" placeholder="رمزه" class="form-control" name="old_statement_code[]"/>
                        </div>
                        <label for="" style="margin-right: 20px;">
                            البيان الجديد:
                        </label>
                        <div class="col-sm-4">
                            <input type="text" placeholder="البيان الجديد" class="form-control" name="new_statement[]"/>
                        </div>
                        <div class="col-sm-1"  style="margin-right: 20px;">
                            <input type="text" placeholder="رمزه" class="form-control" name="new_statement_code[]"/>
                        </div>
                    </div>
                </div>
                <div class="btn btn-primary" id="add_new_field">إضافة حقل جديد</div>

                <hr size="5" class="hr-m"/>
                <div class="form-header">
                    <h1 class="mb-4">الحكم أو مستند التصحيح المرفق</h1>
                </div>

                <hr size="5" class="hr-m"/>
                <div class="form-row" dir="rtl">
                    <label for="">
                        الجهة المصدرة:
                    </label>
                    <div class="col-sm-3">
                        <select name="source_governance" id="source_governance" class="form-select" required data-bs-toggle='tooltip'  title='يرجى إختيار عنصر من القائمة'>
                            <option value="" class="option">الجهة المصدرة </option>
                            @foreach ($source_governances as $source_governance)
                                <option value="{{$source_governance->id}}" class="option">{{$source_governance->na_source_governance}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="" style="margin-right: 20px;">
                        رقم الحكم او المستند:
                    </label>
                        <div class="col-sm-3">
                            <input type="number" placeholder="مقر العمل" class="form-control" name="ruling_No" id="ruling_No" required />
                        </div>
                    <label for="" style="margin-right: 20px;">
                        تاريخ الحكم او المستند:
                    </label>
                        <div class="col-sm-2">
                            <input type="date" placeholder="رقم التلفون" class="form-control" name="ruling_date" id="ruling_date" required/>
                        </div>
                </div>

                <hr size="5" class="hr-m"/>
                <div class="form-row" dir="rtl">
                    <label for="">
                        ملخص الحكم:
                    </label>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <input type="text" name="summary_ruling" id="summary_ruling"style="width: 100%; height: 50px; background-color: #ffffff99;border: 1px solid rgb(0, 179, 255);text-align: center;padding: 8px;color:black" />
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
            <div class="tab" id="tab-2">
                <div class="container">
                    <div class="row justify-content-center">
                        <div id="createaccount " class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" >
                            <div class="modal-content mes col-md-6 col-lg-6">
                                <div class="modal-header">
                                <h5 class="modal-title text-black display-6" id="staticBackdropLiveLabel"> تـــــاكـــيـــد</h5>
                                <div type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق" onclick="run(2, 1);"></div>
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
                                    <div type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="run(2, 1);">إغــلاق</div>
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
                        $('#province_cons_id').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });

            // استدعاء المديريات المرتبطة بمحافظة اصدار القيد المختارة
            $('#province_cons_id').change(function() {
                var province_cons_id = $(this).val();
                if (province_cons_id) {
                    $.ajax({
                        url: "{{ route('getDirectoratesByGovernorateCons') }}",
                        type: "POST",
                        data: {
                            province_cons_id: province_cons_id,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            // إضافة اختيارات المديريات إلى حقل المديرية
                            $('#directorate_Cons_id').empty().append('<option value="">مديرية</option>');
                            $.each(data, function(key, value) {
                                $('#directorate_Cons_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    // إفراغ حقول المديرية 
                    $('#directorate_Cons_id').empty().append('<option value="">مديرية</option>');
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
        });
        $(document).ready(function() {
            var fieldcount = 1;
            $('#add_new_field').click(function() {
                if(fieldcount <= 2){
                    $('<div class="form-row" dir="rtl"><label for="">البيان القديم:</label><div class="col-sm-4"><input type="text" placeholder="البيان القديم" class="form-control" name="old_statement[]"/></div><div class="col-sm-1" style="margin-right: 20px;"><input type="text" placeholder="رمزه" class="form-control" name="old_statement_code[]"/></div><label for="" style="margin-right: 20px;">البيان الجديد:</label><div class="col-sm-4"><input type="text" placeholder="البيان الجديد" class="form-control" name="new_statement[]"/></div><div class="col-sm-1"  style="margin-right: 20px;"><input type="text" placeholder="رمزه" class="form-control" name="new_statement_code[]"/></div></div>').appendTo('#addfield');
                    fieldcount++;
                }
            });
        });
    </script>
@endsection
