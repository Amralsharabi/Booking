<?php

namespace App\Http\Controllers;

use App\Models\BirthRestriction;
use App\Models\CardDamageRenewal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\CardPersonaNew;
use App\Models\CorrectionInstRevConstr;
use App\Models\DeathStatement;
use App\Models\FamilyCard;
use App\Models\LogDivorce;
use App\Models\LogMarriage;

class ChangeTimeAttendeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return 'dddddd';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = decrypt($request->input('encrypted_id'));
        $this->validate($request,[
            'time_attendees' => 'required|date',
            // 'time_attendees_hijri' => 'required',
        ],[
            'time_attendees.required' => 'خطاء يرجى  ادخال تاريخ الموعد',
            // 'time_attendees_hijri.required' => 'خطاء يرجى  ادخال تاريخ الموعد',
        ]);
        $dateGregorian = Carbon::parse($request->input('time_attendees'));
        $dateHijri = Carbon::parse($request->input('time_attendees_hijri'));
        if ($dateGregorian->isFriday()) {
            return redirect()->route('demand_mang.index')->with('holiday', 'لايمكن ان تختار يوم الجمعة اختار يوماً اخر');
        }elseif ($dateGregorian->isThursday()) {
            return redirect()->route('demand_mang.index')->with('holiday', 'لايمكن ان تختار يوم الخميس اختار يوماً اخر');
        }elseif ($dateGregorian->day == 1 && $dateGregorian->month == 5) {
            return redirect()->route('demand_mang.index')->with('holiday', 'لايمكن ان تختار يوم 1 مايو إجازة رسمية اختار يوماً اخر');
        }elseif ($dateGregorian->day == 22 && $dateGregorian->month == 5) {
            return redirect()->route('demand_mang.index')->with('holiday', 'لايمكن ان تختار يوم 22 مايو إجازة رسمية اختار يوماً اخر');
        }elseif ($dateGregorian->day == 26 && $dateGregorian->month == 9) {
            return redirect()->route('demand_mang.index')->with('holiday', 'لايمكن ان تختار يوم 26 سبتمبر إجازة رسمية اختار يوماً اخر');
        }elseif ($dateGregorian->day == 14 && $dateGregorian->month == 10) {
            return redirect()->route('demand_mang.index')->with('holiday', 'لايمكن ان تختار يوم 14 أكتوبر إجازة رسمية اختار يوماً اخر');
        }elseif ($dateHijri->day == 1 && $dateHijri->month == 1) {
            return redirect()->route('demand_mang.index')->with('holiday', 'يصادف هذا اليوم 1 محرم سنة هجرية جديدة إجازة رسمية اختار يوماً اخر');
        }elseif ($dateHijri->day == 12 && $dateHijri->month == 3) {
            return redirect()->route('demand_mang.index')->with('holiday', 'يصادف هذا اليوم 12 ربيع أول مولد النبي إجازة رسمية اختار يوماً اخر');
        }elseif ($dateHijri->day >= 27 && $dateHijri->month == 9 || $dateHijri->day <= 7 && $dateHijri->month == 10) {
            return redirect()->route('demand_mang.index')->with('holiday', 'يصادف هذا اليوم إجازة عيد الفطر المبارك.. تستمر الإجازة الى 7 شول اختار يوماً اخر');
        }elseif ($dateHijri->day == 8 && $dateHijri->month == 12 || $dateHijri->day == 9 && $dateHijri->month == 12 || $dateHijri->day == 10 && $dateHijri->month == 12 || $dateHijri->day == 11 && $dateHijri->month == 12 || $dateHijri->day == 12 && $dateHijri->month == 12 || $dateHijri->day == 13 && $dateHijri->month == 12 || $dateHijri->day == 14 && $dateHijri->month == 12 || $dateHijri->day == 15 && $dateHijri->month == 12 || $dateHijri->day == 16 && $dateHijri->month == 12) {
            return redirect()->route('demand_mang.index')->with('holiday', 'يصادف هذا اليوم إجازة عيد الأضحى المبارك.. تستمر الإجازة الى 16 ذوالحجة اختار يوماً اخر');
        }else{
            if(request('type') == 'بطاقة شخصية جـديد'){
                $CardPersonaNew_update = CardPersonaNew::find($id);
                $CardPersonaNews = CardPersonaNew::where('time_attendees', $request->time_attendees)->where('center_id', $request->center_id)->groupBy('time_attendees')->selectRaw('count(*) as count')->get();
                if ($request->time_attendees < $CardPersonaNew_update->time_attendees && $request->center_id == $CardPersonaNew_update->center_id) {
                    return redirect()->route('demand_mang.index')->with('holiday', 'لايمكن ان تختار يوم سابق للموعد الذي تم تحديده لك');
                }elseif ($request->time_attendees < now()->format('Y-m-d')) {
                    return redirect()->route('demand_mang.index')->with('holiday', 'لايمكن ان تختار يوم قد مضى');
                }else {
                    foreach ($CardPersonaNews as $CardPersonaNew) {
                        if ($CardPersonaNew->count < 2) {
                            $CardPersonaNew_update->update([
                                'province_id' => $request->province_id,
                                'directorate_id' => $request->directorate_id,
                                'center_id' => $request->center_id,
                                'time_attendees' => $request->time_attendees,
                                'time_attendees_hijri' => $request->time_attendees_hijri,
                                'request_statu_id' =>  2,
                            ]);
                            return redirect()->route('demand_mang.index')->with('edit_time_attendees', 'تم تعديل موعد حضور الطلب رقم : '.$id.' بنجاح');
                        } else {
                            return redirect()->route('demand_mang.index')->with('time_attendees_no', '('.$CardPersonaNew_update->center->na_center.') يوم ('.$request->time_attendees.')');
                        }
                    }
                    $CardPersonaNew_update->update([
                            'province_id' => $request->province_id,
                            'directorate_id' => $request->directorate_id,
                            'center_id' => $request->center_id,
                            'time_attendees' => $request->time_attendees,
                            'time_attendees_hijri' => $request->time_attendees_hijri,
                            'request_statu_id' =>  2,
                    ]);
                    return redirect()->route('demand_mang.index')->with('edit_time_attendees', 'تم تعديل موعد حضور الطلب رقم : '.$id.' بنجاح');
                }
            }
            if(request('type') == 'بطاقة شخصية تالف فاقد تجديد'){
                $CardDamageRenewal_update = CardDamageRenewal::find($id);
                $CardDamageRenewals = CardDamageRenewal::where('time_attendees', $request->time_attendees)->where('center_id', $request->center_id)->groupBy('time_attendees')->selectRaw('count(*) as count')->get();
                if ($request->time_attendees < $CardDamageRenewal_update->time_attendees && $request->center_id == $CardDamageRenewal_update->center_id) {
                    return redirect()->route('demand_mang.index')->with('holiday', 'لايمكن ان تختار يوم سابق للموعد الذي تم تحديده لك');
                }elseif ($request->time_attendees < now()->format('Y-m-d')) {
                    return redirect()->route('demand_mang.index')->with('holiday', 'لايمكن ان تختار يوم قد مضى');
                }else {
                    foreach ($CardDamageRenewals as $CardPersonaNew) {
                        if ($CardPersonaNew->count < 2) {
                            $CardDamageRenewal_update->update([
                                'province_id' => $request->province_id,
                                'directorate_id' => $request->directorate_id,
                                'center_id' => $request->center_id,
                                'time_attendees' => $request->time_attendees,
                                'time_attendees_hijri' => $request->time_attendees_hijri,
                                'request_statu_id' =>  2,
                            ]);
                            return redirect()->route('demand_mang.index')->with('edit_time_attendees', 'تم تعديل موعد حضور الطلب رقم : '.$id.' بنجاح');
                        } else {
                            return redirect()->route('demand_mang.index')->with('time_attendees_no', '('.$CardDamageRenewal_update->center->na_center.') يوم ('.$request->time_attendees.')');
                        }
                    }
                    $CardDamageRenewal_update->update([
                            'province_id' => $request->province_id,
                            'directorate_id' => $request->directorate_id,
                            'center_id' => $request->center_id,
                            'time_attendees' => $request->time_attendees,
                            'time_attendees_hijri' => $request->time_attendees_hijri,
                            'request_statu_id' =>  2,
                    ]);
                    return redirect()->route('demand_mang.index')->with('edit_time_attendees', 'تم تعديل موعد حضور الطلب رقم : '.$id.' بنجاح');
                }
            }
            if(request('type') == 'بطاقة عائلية جـديد'){
                $FamilyCard_update = FamilyCard::find($id);
                $FamilyCards = FamilyCard::where('time_attendees', $request->time_attendees)->where('center_id', $request->center_id)->groupBy('time_attendees')->selectRaw('count(*) as count')->get();
                if ($request->time_attendees < $FamilyCard_update->time_attendees && $request->center_id == $FamilyCard_update->center_id) {
                    return redirect()->route('demand_mang.index')->with('holiday', 'لايمكن ان تختار يوم سابق للموعد الذي تم تحديده لك');
                }elseif ($request->time_attendees < now()->format('Y-m-d')) {
                    return redirect()->route('demand_mang.index')->with('holiday', 'لايمكن ان تختار يوم قد مضى');
                }else {
                    foreach ($FamilyCards as $FamilyCard) {
                        if ($FamilyCard->count < 2) {
                            $FamilyCard_update->update([
                                'province_id' => $request->province_id,
                                'directorate_id' => $request->directorate_id,
                                'center_id' => $request->center_id,
                                'time_attendees' => $request->time_attendees,
                                'time_attendees_hijri' => $request->time_attendees_hijri,
                                'request_statu_id' =>  2,
                            ]);
                            return redirect()->route('demand_mang.index')->with('edit_time_attendees', 'تم تعديل موعد حضور الطلب رقم : '.$id.' بنجاح');
                        } else {
                            return redirect()->route('demand_mang.index')->with('time_attendees_no', '('.$FamilyCard_update->center->na_center.') يوم ('.$request->time_attendees.')');
                        }
                    }
                    $FamilyCard_update->update([
                            'province_id' => $request->province_id,
                            'directorate_id' => $request->directorate_id,
                            'center_id' => $request->center_id,
                            'time_attendees' => $request->time_attendees,
                            'time_attendees_hijri' => $request->time_attendees_hijri,
                            'request_statu_id' =>  2,
                    ]);
                    return redirect()->route('demand_mang.index')->with('edit_time_attendees', 'تم تعديل موعد حضور الطلب رقم : '.$id.' بنجاح');
                }
            }
            if(request('type') == 'قيد ميلاد'){
                $BirthRestriction_update = BirthRestriction::find($id);
                $BirthRestrictions = BirthRestriction::where('time_attendees', $request->time_attendees)->where('center_id', $request->center_id)->groupBy('time_attendees')->selectRaw('count(*) as count')->get();
                if ($request->time_attendees < $BirthRestriction_update->time_attendees && $request->center_id == $BirthRestriction_update->center_id) {
                    return redirect()->route('demand_mang.index')->with('holiday', 'لايمكن ان تختار يوم سابق للموعد الذي تم تحديده لك');
                }elseif ($request->time_attendees < now()->format('Y-m-d')) {
                    return redirect()->route('demand_mang.index')->with('holiday', 'لايمكن ان تختار يوم قد مضى');
                }else {
                    foreach ($BirthRestrictions as $BirthRestriction) {
                        if ($BirthRestriction->count < 2) {
                            $BirthRestriction_update->update([
                                'province_id' => $request->province_id,
                                'directorate_id' => $request->directorate_id,
                                'center_id' => $request->center_id,
                                'time_attendees' => $request->time_attendees,
                                'time_attendees_hijri' => $request->time_attendees_hijri,
                                'request_statu_id' =>  2,
                            ]);
                            return redirect()->route('demand_mang.index')->with('edit_time_attendees', 'تم تعديل موعد حضور الطلب رقم : '.$id.' بنجاح');
                        } else {
                            return redirect()->route('demand_mang.index')->with('time_attendees_no', '('.$BirthRestriction_update->center->na_center.') يوم ('.$request->time_attendees.')');
                        }
                    }
                    $BirthRestriction_update->update([
                            'province_id' => $request->province_id,
                            'directorate_id' => $request->directorate_id,
                            'center_id' => $request->center_id,
                            'time_attendees' => $request->time_attendees,
                            'time_attendees_hijri' => $request->time_attendees_hijri,
                            'request_statu_id' =>  2,
                    ]);
                    return redirect()->route('demand_mang.index')->with('edit_time_attendees', 'تم تعديل موعد حضور الطلب رقم : '.$id.' بنجاح');
                }
            }
            if(request('type') == 'قيد زواج'){
                $LogMarriage_update = LogMarriage::find($id);
                $LogMarriages = LogMarriage::where('time_attendees', $request->time_attendees)->where('center_id', $request->center_id)->groupBy('time_attendees')->selectRaw('count(*) as count')->get();
                if ($request->time_attendees < $LogMarriage_update->time_attendees && $request->center_id == $LogMarriage_update->center_id) {
                    return redirect()->route('demand_mang.index')->with('holiday', 'لايمكن ان تختار يوم سابق للموعد الذي تم تحديده لك');
                }elseif ($request->time_attendees < now()->format('Y-m-d')) {
                    return redirect()->route('demand_mang.index')->with('holiday', 'لايمكن ان تختار يوم قد مضى');
                }else {
                    foreach ($LogMarriages as $LogMarriage) {
                        if ($LogMarriage->count < 2) {
                            $LogMarriage_update->update([
                                'province_id' => $request->province_id,
                                'directorate_id' => $request->directorate_id,
                                'center_id' => $request->center_id,
                                'time_attendees' => $request->time_attendees,
                                'time_attendees_hijri' => $request->time_attendees_hijri,
                                'request_statu_id' =>  2,
                            ]);
                            return redirect()->route('demand_mang.index')->with('edit_time_attendees', 'تم تعديل موعد حضور الطلب رقم : '.$id.' بنجاح');
                        } else {
                            return redirect()->route('demand_mang.index')->with('time_attendees_no', '('.$LogMarriage_update->center->na_center.') يوم ('.$request->time_attendees.')');
                        }
                    }
                    $LogMarriage_update->update([
                            'province_id' => $request->province_id,
                            'directorate_id' => $request->directorate_id,
                            'center_id' => $request->center_id,
                            'time_attendees' => $request->time_attendees,
                            'time_attendees_hijri' => $request->time_attendees_hijri,
                            'request_statu_id' =>  2,
                    ]);
                    return redirect()->route('demand_mang.index')->with('edit_time_attendees', 'تم تعديل موعد حضور الطلب رقم : '.$id.' بنجاح');
                }
            }
            if(request('type') == 'قيد طلاق'){
                $LogDivorce_update = LogDivorce::find($id);
                $LogDivorces = LogDivorce::where('time_attendees', $request->time_attendees)->where('center_id', $request->center_id)->groupBy('time_attendees')->selectRaw('count(*) as count')->get();
                if ($request->time_attendees < $LogDivorce_update->time_attendees && $request->center_id == $LogDivorce_update->center_id) {
                    return redirect()->route('demand_mang.index')->with('holiday', 'لايمكن ان تختار يوم سابق للموعد الذي تم تحديده لك');
                }elseif ($request->time_attendees < now()->format('Y-m-d')) {
                    return redirect()->route('demand_mang.index')->with('holiday', 'لايمكن ان تختار يوم قد مضى');
                }else {
                    foreach ($LogDivorces as $LogDivorce) {
                        if ($LogDivorce->count < 2) {
                            $LogDivorce_update->update([
                                'province_id' => $request->province_id,
                                'directorate_id' => $request->directorate_id,
                                'center_id' => $request->center_id,
                                'time_attendees' => $request->time_attendees,
                                'time_attendees_hijri' => $request->time_attendees_hijri,
                                'request_statu_id' =>  2,
                            ]);
                            return redirect()->route('demand_mang.index')->with('edit_time_attendees', 'تم تعديل موعد حضور الطلب رقم : '.$id.' بنجاح');
                        } else {
                            return redirect()->route('demand_mang.index')->with('time_attendees_no', '('.$LogDivorce_update->center->na_center.') يوم ('.$request->time_attendees.')');
                        }
                    }
                    $LogDivorce_update->update([
                            'province_id' => $request->province_id,
                            'directorate_id' => $request->directorate_id,
                            'center_id' => $request->center_id,
                            'time_attendees' => $request->time_attendees,
                            'time_attendees_hijri' => $request->time_attendees_hijri,
                            'request_statu_id' =>  2,
                    ]);
                    return redirect()->route('demand_mang.index')->with('edit_time_attendees', 'تم تعديل موعد حضور الطلب رقم : '.$id.' بنجاح');
                }
            }
            if(request('type') == 'تصحيح او ابطال قيد'){
                $CorrectionInstRevConstr_update = CorrectionInstRevConstr::find($id);
                $CorrectionInstRevConstrs = CorrectionInstRevConstr::where('time_attendees', $request->time_attendees)->where('center_id', $request->center_id)->groupBy('time_attendees')->selectRaw('count(*) as count')->get();
                if ($request->time_attendees < $CorrectionInstRevConstr_update->time_attendees && $request->center_id == $CorrectionInstRevConstr_update->center_id) {
                    return redirect()->route('demand_mang.index')->with('holiday', 'لايمكن ان تختار يوم سابق للموعد الذي تم تحديده لك');
                }elseif ($request->time_attendees < now()->format('Y-m-d')) {
                    return redirect()->route('demand_mang.index')->with('holiday', 'لايمكن ان تختار يوم قد مضى');
                }else {
                    foreach ($CorrectionInstRevConstrs as $CorrectionInstRevConstr) {
                        if ($CorrectionInstRevConstr->count < 2) {
                            $CorrectionInstRevConstr_update->update([
                                'province_id' => $request->province_id,
                                'directorate_id' => $request->directorate_id,
                                'center_id' => $request->center_id,
                                'time_attendees' => $request->time_attendees,
                                'time_attendees_hijri' => $request->time_attendees_hijri,
                                'request_statu_id' =>  2,
                            ]);
                            return redirect()->route('demand_mang.index')->with('edit_time_attendees', 'تم تعديل موعد حضور الطلب رقم : '.$id.' بنجاح');
                        } else {
                            return redirect()->route('demand_mang.index')->with('time_attendees_no', '('.$CorrectionInstRevConstr_update->center->na_center.') يوم ('.$request->time_attendees.')');
                        }
                    }
                    $CorrectionInstRevConstr_update->update([
                            'province_id' => $request->province_id,
                            'directorate_id' => $request->directorate_id,
                            'center_id' => $request->center_id,
                            'time_attendees' => $request->time_attendees,
                            'time_attendees_hijri' => $request->time_attendees_hijri,
                            'request_statu_id' =>  2,
                    ]);
                    return redirect()->route('demand_mang.index')->with('edit_time_attendees', 'تم تعديل موعد حضور الطلب رقم : '.$id.' بنجاح');
                }
            }
            if(request('type') == 'شهادة وفاة'){
                $DeathStatement_update = DeathStatement::find($id);
                $DeathStatements = DeathStatement::where('time_attendees', $request->time_attendees)->where('center_id', $request->center_id)->groupBy('time_attendees')->selectRaw('count(*) as count')->get();
                if ($request->time_attendees < $DeathStatement_update->time_attendees && $request->center_id == $DeathStatement_update->center_id) {
                    return redirect()->route('demand_mang.index')->with('holiday', 'لايمكن ان تختار يوم سابق للموعد الذي تم تحديده لك');
                }elseif ($request->time_attendees < now()->format('Y-m-d')) {
                    return redirect()->route('demand_mang.index')->with('holiday', 'لايمكن ان تختار يوم قد مضى');
                }else {
                    foreach ($DeathStatements as $DeathStatement) {
                        if ($DeathStatement->count < 2) {
                            $DeathStatement_update->update([
                                'province_id' => $request->province_id,
                                'directorate_id' => $request->directorate_id,
                                'center_id' => $request->center_id,
                                'time_attendees' => $request->time_attendees,
                                'time_attendees_hijri' => $request->time_attendees_hijri,
                                'request_statu_id' =>  2,
                            ]);
                            return redirect()->route('demand_mang.index')->with('edit_time_attendees', 'تم تعديل موعد حضور الطلب رقم : '.$id.' بنجاح');
                        } else {
                            return redirect()->route('demand_mang.index')->with('time_attendees_no', '('.$DeathStatement_update->center->na_center.') يوم ('.$request->time_attendees.')');
                        }
                    }
                    $DeathStatement_update->update([
                            'province_id' => $request->province_id,
                            'directorate_id' => $request->directorate_id,
                            'center_id' => $request->center_id,
                            'time_attendees' => $request->time_attendees,
                            'time_attendees_hijri' => $request->time_attendees_hijri,
                            'request_statu_id' =>  2,
                    ]);
                    return redirect()->route('demand_mang.index')->with('edit_time_attendees', 'تم تعديل موعد حضور الطلب رقم : '.$id.' بنجاح');
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
