@extends('layouts.head_forms')
@section('title')
    تعديل طلب بيان وشهادة وفاة
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
        <form action="{{route('deathStatement.update',encrypt($death_statement->id))}}" method="POST" data-aos="zoom-in-down">
            @csrf
            @method('GET')
            <!-- tab 0 -->
            <div  class="tab" id="tab-0" >
                <div class="form-header">
                    <h1 class="mb-4">تعديل طلب الحصول على شهادة وفاة</h1>
                </div>
                <div id="wizard" >
                    <div class="form-header">
                        <h3 class="mb-5">بيانات المتوفي</h3>
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
                                            <option value="{{$death_statement->province_id}}" class="option">{{$death_statement->province->na_prov}}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select name="directorate_id" id="directorate_id" class="form-select" required data-bs-toggle='tooltip'  title='قم بإختيار عنصر من القائمة'>
                                            <option value="{{$death_statement->directorate_id}}" class="option">{{$death_statement->directorate->na_dire}}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select name="center_id" id="center_id" class="form-select" required data-bs-toggle='tooltip'  title='قم بإختيار عنصر من القائمة'>
                                            <option value="{{$death_statement->center_id}}" class="option">{{$death_statement->center->na_center}}</option>
                                        </select>
                                    </div>
                                </div>	                        
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                                <label for="">
                                    أسم المتوفي الكامل:
                                </label>
                                <div class="form-holder">
                                    
                                    <div class="row ">
                                    <div class="col-sm-3">
                                        <input type="text"  placeholder="الاسم الأول" class="form-control " value="{!!$death_statement->common_data->req_fore_na!!}" readonly data-bs-toggle="tooltip" data-bs-html="true"  readonly data-bs-toggle='tooltip' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>'/>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="أسم الاب" class="form-control" value="{{$death_statement->common_data->req_second_na}}" readonly data-bs-toggle="tooltip" data-bs-html="true"  readonly data-bs-toggle='tooltip' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>'/>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="أسم الجد" class="form-control" value="{{$death_statement->common_data->req_third_na}}"readonly data-bs-toggle="tooltip" data-bs-html="true" readonly data-bs-toggle='tooltip' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>'/>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="القب" class="form-control" value="{{$death_statement->common_data->req_tit}}" readonly data-bs-toggle="tooltip" data-bs-html="true"  readonly data-bs-toggle='tooltip' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>'/>
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
                                        <input type="text" placeholder="الاسم الأول" class="form-control" value="{{$death_statement->common_data->mother_fore_na}}" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>' />
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="أسم الاب" class="form-control" value="{{$death_statement->common_data->mother_second_na}}" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>' />
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="أسم الجد" class="form-control" value="{{$death_statement->common_data->mother_third_na}}" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>' />
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" placeholder="القب" class="form-control" value="{{$death_statement->common_data->mother_tit}}" readonly data-bs-toggle='tooltip' data-bs-html='true' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>' />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                الجنس:
                            </label>
                            <div class="col-sm-5 " >
                                <select id="" class="form-select" readonly data-bs-toggle="tooltip" data-bs-html="true"  readonly data-bs-toggle='tooltip' title=' لا يمكنك تعديل هذه البيانات للمزيد قم بدخول الى صفحة <a href=``>المساعدة</a>'>
                                    @if ($death_statement->common_data->gender == 1)
                                        <option value="1" class="option" selected>ذكر</option>                                           
                                    @else
                                        <option value="0" class="option">انثى</option>                                           
                                    @endif
                                </select>
                            </div>
                            <label for="" style="margin-right: 19px;">
                                تاريخ الوفاة:
                            </label>
                            <div class="col-sm-5">
                                <input type="datetime-local" value="{{$death_statement->date_death}}" class="form-control" name="date_death" id="date_death"/>
                            </div>
                            
                        </div>
                        <hr size="5" class="hr-m"/>

                        <div class="form-header">
                            <h1 class="mb-4">بيانات البطاقة للمتوفي</h1>
                        </div>

                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                            <label for="">
                                النوع:
                            </label>
                            <div class="col-sm-2">
                                <select name="ty_document_id" id="ty_document_id" class="form-select" required>
                                    <option value="{{$death_statement->ty_document_id}}" class="option">{{$death_statement->ty_document->na_ty_doc}}</option>
                                    @foreach ($ty_documents as $ty_document)
                                        @if ($ty_document->id != $death_statement->ty_document_id)
                                            <option value="{{$ty_document->id}}" class="option">{{$ty_document->na_ty_doc}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <label for="" style="margin-right: 20px;">
                                الــرقم :
                            </label>
                            <div class="col-sm-2">
                                <input type="text" value="{{$death_statement->card_No_decea}}" class="form-control cardid" name="card_No_decea" id="card_No_decea"/>
                            </div>
                            <label for="" style="margin-right: 20px;">
                                تاريخ الإصدار:
                            </label>
                            <div class="col-sm-2">
                                <input type="date" value="{{$death_statement->date_card_issuance_dec}}" class="form-control" name="date_card_issuance_dec" id="date_card_issuance_dec"/>
                            </div>
                            <label for="" style="margin-right: 20px;">
                                جهة الإصدار :
                            </label>
                            <div class="col-sm-2">
                                <select name="card_version_center_id" id="card_version_center_id" class="form-select" required>
                                    <option  class="option" value="{{$death_statement->card_version_center_id}}">{{$death_statement->card_version_center->na_center}}</option>
                                    @foreach ($card_version_centers as $card_version_center)
                                        @if ($card_version_center->id != $death_statement->card_version_center_id)
                                            <option value="{{$card_version_center->id}}" class="option">{{$card_version_center->na_center}}</option>
                                        @endif
                                    @endforeach
                                </select>
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
            <div class="tab" id="tab-1">
                <div class="container">
                    <div class="row justify-content-center">
                        <div id="createaccount " class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" >
                            <div class="modal-content mes col-md-6 col-lg-6">
                                <div class="modal-header">
                                <h5 class="modal-title text-black display-6" id="staticBackdropLiveLabel"> تـــــاكـــيـــد</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق" onclick="run(1, 0);"></button>
                                </div>
                                <hr style="color: black;">
                                <div class="modal-body text-black">
                                    <h3>هل انت متاكد من البيانات التي قمت بتعديلها</h3>
                                </div>
                                <hr style="color: black;">
                                <div class="modal-footer mx-auto ">
                                    <button class="btn btn-primary" style="margin-left: 5px;">حــفــظ</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="run(1, 0);">إغــلاق</button>
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
    </script>
@endsection
