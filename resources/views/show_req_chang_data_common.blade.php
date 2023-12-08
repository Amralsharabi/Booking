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
            border: white solid 3px !important;
        }
    </style>
@endsection
@section('body')
<div class="container" style="margin-top: 200px">
    <div class="form-group" style="display: flex; justify-content: center;">
        <table style="width: 50%; border: solid;" id="tabletd" dir="rtl">
            @foreach ($ReqChangeDataCommons as $ReqChangeDataCommon)
            <tr style="border: solid">
                <td style="width: 158px;background-color: #10202e;color: white;text-align: center;">
                    <label for="">رقم الطلب</label>
                </td>
                <td class="td">
                    <h3 id="id" class="text-center">{{$ReqChangeDataCommon->id}}</h3>
                </td>
            </tr>
            
            <tr style="border: solid">
                <td style="width: 158px;background-color: #10202e;color: white;text-align: center; border: white solid 3px !important;">
                    <label for="">نوع البيانات المطلوب تغييرها</label>
                </td>
                <td style="width: 158px;background-color: #10202e;color: white;text-align: center;">
                    <label for="">البيانات الجديدة   </label>
                </td>
            </tr>
            @foreach ($ReqChangeDataCommon->reqChangeDataCommonDas as $data)
                {{-- @foreach ($ReqChangeDataCommonDa->new_data as $ReqChangeDataCommon) --}}
                <tr style="border: solid">
                    <td class="td">
                        <h3 id="na_type_chan_show" class="text-center">{{$data->tydatareqchange->na_type_chan}}</h3>
                    </td>
                    <td class="td">
                        <h3 id="new_data_show" class="text-center">{{$data->new_data}}</h3>
                    </td>
                </tr>
            @endforeach
        <tr style="border: solid">
            <td style="width: 158px;background-color: #10202e;color: white;text-align: center;">
                <label for="">تاريخ الطلب</label>
            </td>
            <td class="td">
                <h3 id="created_at_show" class="text-center">{{$ReqChangeDataCommon->created_at}}</h3>
            </td>
        </tr>
        <tr style="border: solid">
            <td style="width: 158px;background-color: #10202e;color: white;text-align: center;">
                <label for="">حالة الطلب</label>
            </td>
            <td class="td">
                <h3 id="na_req_status_show" class="text-center">{{$ReqChangeDataCommon->requeststatu->na_req_status}}</h3>
            </td>
        </tr>
        @endforeach
    </table>
</div>
</div>
@endsection
