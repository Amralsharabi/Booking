@extends('layouts.head_forms')
@section('title')
    عرض طلب بطاقة شخصية
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
        }
    </style>
@endsection
@section('body')

<div id="" class="container bg-white" style="margin-top: 210px; padding:10px 8px 10px 8px; ">
<button class="bx bx-printer display-1   bg-transparent text-black" style="border: 0px;" id="print-button" onclick="printJS({printable: 'mydivs', type: 'html'})"></button>
</div>
<div id="mydivs" class="container bg-white mydiv " style=" margin-bottom:50px; padding:10px 8px 10px 8px; ">
    <table class="table table-sm table-bordered bg-white" style="margin-top: 5px !important;"  dir="rtl">
        <thead>
            <tr>
                <th colspan="6">
                    <img src="{{asset('assets/img/head2.png')}}" class="img-head" ><br><br>
                </th>
            </tr>
            <tr>
                <td style="width: 10%" class="th">رقم الطلب</td>
                <td style="width: 10%">{!!$id!!}</td>
                <td style="width: 10%" class="th">نوع الطلب</td>
                <td style="width: 10%">{!!$CardDamageRenewal->req_type!!}</td>
            </tr>
            <tr>
                <th style="width: 10%" class="th">محافظة</th>
                <td style="width: 20%">{!!$province!!}</td>
                <th style="width: 10%" class="th">مديرية</th>
                <td style="width: 20%">{!!$directorate!!}</td>
                <th style="width: 10%" class="th">المركز</th>
                <td style="width: 20%">{!!$center!!}</td>
            </tr>
    </thead>
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
        
    </tr>
      <tr>
        <th class="th">مقدم الطلب</th>
        <td>{!!$common_data->req_fore_na!!}</td>
        <td>{{$common_data->req_second_na}}</td>
        <td>{{$common_data->req_third_na}}</td>
        <td>{{$common_data->req_tit}}</td>
    </tr>
      <tr class="text-center tr">
          <th colspan="6">محل اصدار البطاقة</th>
        </tr>
        <tr>
            <th style="width: 10%" class="th">محافظة</th>
            <td style="width: 20%">{!!$province_version_card_id!!}</td>
            <th style="width: 10%" class="th">مديرية</th>
            <td style="width: 20%">{!!$directorate_version_card_id!!}</td>
            <th style="width: 10%" class="th">المركز</th>
            <td style="width: 20%">{!!$card_version_center_id!!}</td>
        </tr>
            <td class="th">رقم البطاقة</td>
            <td>{{$common_data->id_card}}</td>
            <td class="th">تاريخ الاصدار</td>
            <td>{{$CardDamageRenewal->date_version}}</td>
        </tr>
    </table>
    </div>
    
@endsection
