@extends('layouts.head_forms')
@section('title')
    عرض طلب تغيير البيانات الاساسية
@endsection
@section('style')
    <style>
        td,th{
            /* padding-right: 7px !important; */
            border: 0px !important;
        }.th{
            background-color: #2b53604f !important;
            /* color: white; */
        }.tr{
            background-color: #2b5360a3 !important;
            color: white;
        }
        table{
            border: solid 2px black !important;
            text-align: center;
            font-size: 20px;
            margin-bottom: 40px
        }.td{
            font-size: 20px;
            background-color: #b6cace;
            color: #10202e;
        }
        form{
            padding-top: 10px;
            padding-bottom: 0px;
            padding-left: 0px;
            padding-right: 0px;
        }
        /* .sty{
            border: 1px solid #fff;
    border-radius: 10px;
    padding: 10px 30px 20px 30px;
    position: relative;
    background: rgba(255, 255, 255, 0.1);
        }.form-select{
            border: 1px solid rgb(0, 179, 255);
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
            text-align: center;
            font-size: 15px;
            border-radius: 5px;
        } */
    </style>
@endsection
@section('body')
<div class="container" style="margin-top: 220px;display: flex; justify-content: center;">
    <div id="wizard" dir="rtl" style="margin-bottom: 40px; whdith:" class="col-md-8">
        @foreach ($ReqChangeDataCommons as $ReqChangeDataCommon)
        <form action="{{route('ReqChangeDataCommon.update',encrypt($ReqChangeDataCommon->id))}}" method="post" data-aos="zoom-in-down">
            @csrf
            @method('PUT')
            {{-- <input type="text" value="{{$ReqChangeDataCommon->id}}" name="id" id=""> --}}
            {{-- <input type="text" value="{{$ReqChangeDataCommon->user_id}}" name="id" id=""> --}}
            <div class="form-header mt-4">
                <h1 class="mb-4">تعديل طلب تغيير البيانات الاساسية</h1>
            </div><hr>
                @foreach ($ReqChangeDataCommon->reqChangeDataCommonDas as $data)
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">نوع البيانات المطلوب تغييرها</label>
                            <select class="form-select" style="background-position: left 0.75rem center;" name="ty_data_req_change_id[]" id="ty_data_req_change_id" required>
                                <option class="text-black" value="{{$data->ty_data_req_change_id}}">{{$data->tydatareqchange->na_type_chan}}</option>
                                @foreach ($tyDataReqChanges as $tyDataReqChange)
                                    @if ($tyDataReqChange->id != $data->ty_data_req_change_id)
                                        <option class="text-black" value="{{$tyDataReqChange->id}}">{{$tyDataReqChange->na_type_chan}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">البيانات الجديدة</label>
                            <input type="text" name="new_data[]" id="new_data" value="{{$data->new_data}}" class="form-control text-ignore-validation " placeholder="" aria-describedby="helpId" required>
                        </div>
                    </div>
                    <hr>
                @endforeach
                <div class="justify-content-center" style="display: flex">
                    <button class="btn btn-primary" style="margin-left: 5px;">حــفــظ التغييرات</button>
                </div>
            </form>
        @endforeach
    </div>
</div>
@endsection
