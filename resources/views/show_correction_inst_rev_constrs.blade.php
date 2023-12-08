@extends('layouts.head_forms')
@section('title')
    عرض طلب تصحيح او تثبيت او ابطال قيد
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
            </tr>
            <tr>
                <th style="width: 10%" class="th">محافظة</th>
                <td style="width: 20%">{!!$correction_inst_rev_constr->province->na_prov!!}</td>
                <th style="width: 10%" class="th">مديرية</th>
                <td style="width: 20%">{!!$correction_inst_rev_constr->directorate->na_dire!!}</td>
                <th style="width: 10%" class="th">المركز</th>
                <td style="width: 20%">{!!$correction_inst_rev_constr->center->na_center!!}</td>
            </tr>
    </thead>
    <tbody>
        <tr class="text-center tr">
            <th colspan="6">بيانات صاحب القيد</th>
        </tr>
        <tr>
            <td class="th">نوع القيد</td>
            <td>{{$correction_inst_rev_constr->constraint->na_constraint}}</td>
            <td class="th">رقم القيد</td>
            <td>{{$correction_inst_rev_constr->no_Constraint}}</td>
            <td class="th">تاريخ القيد</td>
            <td>{{$correction_inst_rev_constr->date_constraint}}</td>
        </tr>
        <tr>
            <td class="th">محافظة القيد</td>
            <td>{{$correction_inst_rev_constr->province_cons->na_prov}}</td>
            <td class="th">مديرية القيد</td>
            <td>{{$correction_inst_rev_constr->directorate_cons->na_dire}}</td>
        </tr>
        <tr>
            <th class="th"></th>
            <th class="th">اسم الفرد</th>
            <th class="th">اسم الاب</th>
            <th class="th">اسم الجد</th>
            <th class="th">اللقب</th>
            
        </tr>
        <tr>
            <th class="th">اسم صاحب القيد كامل</th>
            <td>{!!$correction_inst_rev_constr->common_data->req_fore_na!!}</td>
            <td>{{$correction_inst_rev_constr->common_data->req_second_na}}</td>
            <td>{{$correction_inst_rev_constr->common_data->req_third_na}}</td>
            <td>{{$correction_inst_rev_constr->common_data->req_tit}}</td>
        </tr>
        <tr>
            <th class="th">اسم الام</th>
            <td>{{$correction_inst_rev_constr->common_data->mother_fore_na}}</td>
            <td>{{$correction_inst_rev_constr->common_data->mother_second_na}}</td>
            <td>{{$correction_inst_rev_constr->common_data->mother_third_na}}</td>
            <td>{{$correction_inst_rev_constr->common_data->mother_tit}}</td>
        </tr>
        <tr class="text-center tr">
            <th colspan="6">محل الميلاد</th>
        </tr>
        <tr>
            <th class="th">دولة الميلاد</th>
            <td colspan="2">{{$correction_inst_rev_constr->common_data->countrie_birth->countrie_na}}</td>
            <td class="th">محافطة الميلاد</td>
            <td colspan="2">{{$correction_inst_rev_constr->common_data->province_birth->na_prov}}</td>
        </tr>
        <tr>
            <td class="th">مديرية الميلاد</td>
            <td>{{$correction_inst_rev_constr->common_data->directorate_pirth->na_dire}}</td>
            <td class="th">عزلة/قرية</td>
            <td>{{$correction_inst_rev_constr->common_data->village_parth}}</td>
            <td class="th">تاريخ الميلاد</td>
            <td>{{$correction_inst_rev_constr->common_data->date_pirth_ad}}</td>
        </tr>

        {{-- ////////////////////////////////////// --}}
        <tr class="text-center tr">
            <th colspan="6">البيان المطلوب تصحيحه او تثبيته او ابطالة</th>
        </tr>
        <tr>
            <th class="th">مسلسل</th>
            <th class="th">البيان القديم</th>
            <th class="th">رمزه</th>
            <th class="th">البيان الجديد</th>
            <td class="th">رمزه</td>
            
        </tr>
        <?php $id_statement = 0 ?>
        @foreach ($correction_inst_rev_constr->statement_req_correction as $statement)
        <tr>
                <td><?php echo $id_statement += 1 ?></td>
                <td>{{$statement->old_statement}}</td>
                <td>{{$statement->old_statement_code}}</td>
                <td>{{$statement->new_statement}}</td>
                <td>{{$statement->new_statement_code}}</td>
            </tr>
        @endforeach

        <tr class="text-center tr">
            <th colspan="6">الحكم او مستند التصحيح المرفق</th>
        </tr>
        <tr>
            <th class="th">الجهة المصدرة للحكم</th>
            <td>{{$correction_inst_rev_constr->source_governances->na_source_governance}}</td>
            <td class="th">رقم الحكم او المستند</td>
            <td>{{$correction_inst_rev_constr->ruling_No}}</td>
            <td class="th">تاريخ الحكم او المستند</td>
            <td>{{$correction_inst_rev_constr->ruling_date}}</td>
        </tr>
        <tr>
            <td class="th">ملخص الحكم</td>
            <td>{{$correction_inst_rev_constr->summary_ruling}}</td>
            <td class="th">تاريخ الطلب</td>
            <td>{{$correction_inst_rev_constr->created_at}}</td>
            <td class="th">توقيع صاحب القيد</td>
            <td></td>
        </tr>
    </table>
    </div>
    
@endsection
