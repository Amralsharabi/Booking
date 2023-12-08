@extends('layouts.head_forms')
@section('title')
    طلب بطاقة شخصية بدل تالف فاقد تجديد
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
        <form action="{{route('cardDamagedRenewal.store')}}" method="POST" data-aos="zoom-in-down">
            @csrf

            <!-- tab 0 -->
            <div  class="tab" id="tab-0" >
                <div class="form-header">
                    <h1 class="mb-4">طلب بطاقة شخصية بدل تالف / فاقد / تجديد</h1>
                </div>
                <div id="wizard" >
                    <div class="form-header">
                        <h3 class="mb-5">بيانات مقدم الطلب</h3>
                    </div>
                    <div class="container">
                        <div class="alert alert-success alert-dismissible fade show py-10" role="alert" style="text-align:center ">
                            <h3 class="alert-heading text-danger mb-0">ملاحظة</h3>
                            <hr>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="قريب"></button>
                            <h3 class="mb-0">لا يمكنك تعديل البيانات الاساسية التي قمت بتعبئتها مسبقاً </h3>
                            <hr>
                            <h3 class="mb-0"><a href="#"> للمزيد اضغظ هنا </a></h3>
                        </div>
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
                                    أسم مقدم الطلب الكامل:
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
                                    :مكان إصدار البطاقة
                                </label>
                                <div class="form-holder">
                                    <div class="row">
                                    <div class="col-sm-3">
                                        <select name="province_version_card_id" id="province_version_card_id" class="form-select" required data-bs-toggle='tooltip'  title='يرجى إختيار عنصر من القائمة'>
                                            <option value="" class="option">المحافظة</option>
                                            {{-- @foreach ($card_version_centers as $card_version_center)
                                                <option value="{{$card_version_center->id}}" class="option">{{$card_version_center->na_center}}</option>
                                                    
                                            @endforeach --}}
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="directorate_version_card_id" id="directorate_version_card_id" class="form-select" required data-bs-toggle='tooltip'  title='يرجى إختيار عنصر من القائمة'>
                                            <option value="" class="option">المديرية</option>
                                            {{-- @foreach ($card_version_centers as $card_version_center)
                                                <option value="{{$card_version_center->id}}" class="option">{{$card_version_center->na_center}}</option>
                                                    
                                            @endforeach --}}
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="card_version_center_id" id="card_version_center_id" class="form-select" required data-bs-toggle='tooltip'  title='يرجى إختيار عنصر من القائمة'>
                                            <option value="" class="option">المركز</option>
                                            {{-- @foreach ($card_version_centers as $card_version_center)
                                                <option value="{{$card_version_center->id}}" class="option">{{$card_version_center->na_center}}</option>
                                                    
                                            @endforeach --}}
                                        </select>
                                    </div>
                                    <div class="col-sm-3 " >
                                        <input type="text" class="form-control cardid" placeholder="رقم الــبــطاقـة" value="{{$user->id_card}}" name="id_card" required data-bs-toggle='tooltip'  title='يرجى الانتباه هذا الحقل مخصص لرقم البطاقة الشخصية '/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <hr size="5" class="hr-m"/>
                        <div class="form-row" dir="rtl">
                                <label for="">
                                    تاريخ اصدار البطاقة:
                                </label>
                                <div class="form-holder">
                                    <div class="row">
                                    <div class="col-sm-11">
                                        <input type="date" class="form-control" name="date_version" required data-bs-toggle='tooltip'  title='يرجى تحديد تاريخ اصدار البطاقة'/>
                                    </div>
                                </div>
                            </div>
                            <label for="">
                                نوع الطلب
                            </label>
                            <div class="form-holder">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <select class="form-select" name="req_type" id="req_type">
                                            <option value="" >نوع الطلب</option>
                                            <option value="فاقد">فاقد</option>
                                            <option value="تالف">تالف</option>
                                            <option value="تجديد">تجديد</option>
                                        </select>
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
            <div class="tab" id="tab-1">
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
                        $('#province_version_card_id').append('<option value="' + key + '">' + value + '</option>');
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

            // استدعاء المديريات المرتبطة بالمحافظة المختارة
            $('#province_version_card_id').change(function() {
                var province_version_card_id = $(this).val();
                if (province_version_card_id) {
                    $.ajax({
                        url: "{{ route('getDirectoratesByGovernorateVersion') }}",
                        type: "POST",
                        data: {
                            province_version_card_id: province_version_card_id,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            // إضافة اختيارات المديريات إلى حقل المديرية
                            $('#directorate_version_card_id').empty().append('<option value="">مديرية</option>');
                            $.each(data, function(key, value) {
                                $('#directorate_version_card_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                            // إفراغ حقل المركز
                            $('#card_version_center_id').empty().append('<option value="">مركز</option>');
                        }
                    });
                } else {
                    // إفراغ حقول المديرية والمركز
                    $('#directorate_version_card_id').empty().append('<option value="">مديرية</option>');
                    $('#card_version_center_id').empty().append('<option value="">مركز</option>');
                }
            });

            // استدعاء المراكز المرتبطة بالمديرية المختارة
            $('#directorate_version_card_id').change(function() {
                var directorate_version_card_id = $(this).val();
                if (directorate_version_card_id) {
                    $.ajax({
                        url: "{{ route('getCentersByDirectorateVersion') }}",
                        type: "POST",
                        data: {
                            directorate_version_card_id: directorate_version_card_id,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            // إضافة اختيارات المراكز إلى حقل المركز
                            $('#card_version_center_id').empty().append('<option value="">مركز</option>');
                            $.each(data, function(key, value) {
                                $('#card_version_center_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    // إفراغ حقل المركز
                    $('#card_version_center_id').empty().append('<option value="">مركز</option>');
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
