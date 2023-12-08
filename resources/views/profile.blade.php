@extends('layouts.head_forms')
@section('title')
    الملف الشخصي
@endsection
@section('style')
    <style>
        .th{
            background-color: #2b53604f !important;
            /* color: white; */
        }.tr{
            background-color: #2b5360a3 !important;
            color: white;
        }
        table{
            border: solid 2px black !important;
            text-align: center;
        }
        .form-control{
            color: rgb(0, 0, 0) !important;
        }form{
            padding-bottom: 0px !important;
        }
    </style>
@endsection
@section('nav')
<!-- message add -->
    @if ($message = Session::get('add'))
        <div style="width: 100%; display: flex; justify-content: center;">
            <div class="alert alert-success alert-dismissible fade show text-center col-md-6 col-sm-12" role="alert">
                {{$message}} 
                <button type="button" class="btn-close" style="left: 0" data-bs-dismiss="alert" aria-label="قريب"></button>
            </div><br>
        </div>
    @endif
    @if ($message = Session::get('changed'))
        <div style="width: 100%; display: flex; justify-content: center;">
            <div class="alert alert-success alert-dismissible fade show text-center col-md-6 col-sm-12" role="alert">
                {{$message}} 
                <button type="button" class="btn-close" style="left: 0" data-bs-dismiss="alert" aria-label="قريب"></button>
            </div><br>
        </div>
    @endif
    @if ($message = Session::get('warning'))
        <div style="width: 100%; display: flex; justify-content: center;">
            <div class="alert alert-warning alert-dismissible fade show text-center col-md-6 col-sm-12" role="alert">
                {{$message}} 
                <button type="button" class="btn-close" style="left: 0" data-bs-dismiss="alert" aria-label="قريب"></button>
            </div><br>
        </div>
    @endif
    <!-- message errors -->
    @foreach ($errors->all() as $error)
        <div style="width: 100%; display: flex; justify-content: center;">
            <div class="alert alert-danger alert-dismissible fade show text-center col-md-6 col-sm-12" role="alert">
                {{$error}}
                <button type="button" class="btn-close" style="left: 0" data-bs-dismiss="alert" aria-label="قريب"></button>
            </div><br>
        </div>
    @endforeach    
@endsection
@section('body')
<form action="{{route('req.change.data.commons')}}" method="post">
    @csrf
    <div class="modal fade text-black" id="staticBackdropLive" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true" dir="rtl">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLiveLabel">طلب تعديل البيانات الاساسية</h5>
                    <div class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></div>
                </div>
                <div id="form-container" class="modal-body">
                        <div class="btn btn-primary" id="add_new_field">إضافة حقل جديد</div>
                        <div class="form-group">
                            <label for="">نوع البيانات المطلوب تغييرها</label>
                            <select class="form-select text-black" style="background-position: left 0.75rem center;" name="ty_data_req_change_id[]" id="ty_data_req_change_id" required>
                                <option value="">-- حدد نوع البيانات المطلوب تغييرها --</option>
                                @foreach ($tyDataReqChanges as $tyDataReqChange)
                                    <option value="{{$tyDataReqChange->id}}">{{$tyDataReqChange->na_type_chan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                        <label for="">البيانات الجديدة</label>
                            <input type="text" name="new_data[]" id="new_data" class="form-control text-ignore-validation " placeholder="" aria-describedby="helpId" required>
                        </div>
                    </div>
                    <div class="modal-footer" style="width: 100%; display: flex; justify-content: center;">
                        <div class="btn btn-secondary col-md-2" data-bs-dismiss="modal">إغلاق</div>
                        <button  class="btn btn-primary col-md-2">إرسال</button>
                    </div>
                </div>
                </div>
            </div>
        </form>
        <div id="mydivs" class="container bg-white mydiv " style=" margin-bottom:50px; margin-top:220px; padding:10px 8px 10px 8px; ">
            <div class="text-center">
                <h1 class="text-black">البيانات الاساسية</h1>
            </div>
            <table class="table table-sm table-bordered bg-white" style="margin-top: 5px !important;"  dir="rtl">
              <tbody>
              <tr class="text-center tr">
                <th colspan="6">بيانات مقدم الطلب</th>
              </tr>
              <tr>
                  <th class="th"></th>
                  <th class="th">اسم الفرد</th>
                <th class="th">اسم الاب</th>
                <th class="th">اسم الجد</th>
                <th class="th">اللقب</th>
                <th class="th">الجنسية</th>
                
            </tr>
              <tr>
                <th class="th">مقدم الطلب</th>
                <td>{!!$common_data->req_fore_na!!}</td>
                <td>{{$common_data->req_second_na}}</td>
                <td>{{$common_data->req_third_na}}</td>
                <td>{{$common_data->req_tit}}</td>
                <td>{{$common_data->nationality_req->nationality_na}}</td>
            </tr>
            <tr>
                <th class="th">اسم الاب</th>
                <td>{{$common_data->father_fore_na}}</td>
                <td>{{$common_data->father_second_na}}</td>
                <td>{{$common_data->father_third_na}}</td>
                <td>{{$common_data->father_tit}}</td>
                <td>{{$common_data->nationality_father->nationality_na}}</td>
            </tr>
            <tr>
                <th class="th">اسم الام</th>
                <td>{{$common_data->mother_fore_na}}</td>
                <td>{{$common_data->mother_second_na}}</td>
                <td>{{$common_data->mother_third_na}}</td>
                <td>{{$common_data->mother_tit}}</td>
                <td>{{$common_data->nationality_mother->nationality_na}}</td>
              </tr>
              <tr class="text-center tr">
                  <th colspan="6">محل الميلاد</th>
                </tr>
                <tr>
                    <th class="th">النوع</th>
                    @if ($common_data->gender == 1)
                            <td>ذكر</td>
                            @else
                        <td>انثى</td>
                    @endif
                    <td class="th">تاريخ الميلاد الميلادي</td>
                    <td>{{$common_data->date_pirth_ad}}</td>
                    <td class="th">تاريخ الميلاد الهجري</td>
                    <td>{{$common_data->date_pirth_he}}</td>
                </tr>
                <tr>
                    <th class="th">دولة الميلاد</th>
                    <td colspan="2">{{$common_data->countrie_birth->countrie_na}}</td>
                    <td class="th">محافطة الميلاد</td>
                    <td colspan="2">{{$common_data->province_birth->na_prov}}</td>
                </tr>
                <tr>
                    <td class="th">مديرية الميلاد</td>
                    <td>{{$common_data->directorate_pirth->na_dire}}</td>
                    <td class="th">عزلة/قرية</td>
                    <td>{{$common_data->village_parth}}</td>
                    <td class="th">الديانة</td>
                    <td>{{$common_data->religions->na_relig}}</td>
                </tr>
                <tr class="tr"><th colspan="6"></th></tr>
                <tr>
                    <th colspan="6">
                        <div class="text-center"><a style="background-color: #2b5360a3;" class="btn shadownext col-md-3 text-black" data-bs-toggle="modal" data-bs-target="#staticBackdropLive">{{ __('طلب تعديل البيانات') }}</a></div>
                    </th>
                </tr>
            </table>
        </div>

   
    <div class="container">
        <div class="row justify-content-center bg-transparent">
            <div class="col-md-12">
                <div class="card text-black mb-5" dir="rtl">
                    <div class="card-header" style="background-color: #68929a; color: white; text-align: center; font-size: larger;">{{ __('تغيير كلمة المرور') }}</div>
                    <div class="card-body">
                        <form method="POST"  action="{{ route('password.update') }}">
                            @csrf
    
                            <div class="row mb-3">
                                    <label for="current_password" class="col-md-2 col-form-label text-md-right">{{ __('كلمة المرور الحالية') }}</label>

                                    <div class="col-md-10">
                                        <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autocomplete="current-password">
    
                                        @error('current_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-md-2 col-form-label text-md-end">{{ __(' كلمة المرور الجديد') }}</label>
    
                                <div class="col-md-10">
                                    <input id="password" type="password" class="form-control text-black @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-2 col-form-label text-md-end">{{ __('تاكيد كلمة المرور') }}</label>
    
                                <div class="col-md-10">
                                    <input id="password-confirm" type="password" class="form-control text-black" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
    
                            <div class="row mb-0">
                                <div class="col-md-6" style="width: 100%; display: flex; justify-content: center;">
                                    <button class="btn btn-primary">
                                        {{ __('إعادة تعيين كلمة المرور') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-5" style="margin-top: 20px; width: 100%; display: flex; justify-content: center;">
        <a class="col-md-5 btn btn-danger" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            {{ __('تسجيل خروج') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            var fieldcount = 1;
            $('#add_new_field').click(function() {
                if(fieldcount <= 2){
                    $('<div class="form-group"><label for="">نوع البيانات المطلوب تغييرها</label><select class="form-select text-black" style="background-position: left 0.75rem center;" name="ty_data_req_change_id[]" id="ty_data_req_change_id" required><option value="">-- حدد نوع البيانات المطلوب تغييرها --</option>@foreach ($tyDataReqChanges as $tyDataReqChange)<option value="{{$tyDataReqChange->id}}">{{$tyDataReqChange->na_type_chan}}</option>@endforeach</select></div><div class="form-group"><label for="">البيانات الجديدة</label><input type="text" name="new_data[]" id="new_data" class="form-control text-ignore-validation " placeholder="" aria-describedby="helpId" required></div>').appendTo('#form-container');
                    fieldcount++;
                }
            });
        });
    </script>
@endsection
