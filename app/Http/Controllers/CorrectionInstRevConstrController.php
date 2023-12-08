<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CommonData;
use App\Models\CorrectionInstRevConstr;
use App\Models\StatementReqCorrection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CorrectionInstRevConstrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $q = CommonData::where('user_id', Auth::id())->pluck('id')->first();
        $user = User::find(Auth::id())->commondata;
        $user1 = CommonData::find($q);
        $constraints = DB::table('constraints')->get();
        $source_governances = DB::table('source_governances')->get();

        $countrie_birth = $user1->countrie_birth->countrie_na;
        $province_birth = $user1->province_birth->na_prov;
        $directorate_pirth = $user1->directorate_pirth->na_dire;
        return view('correction_inst_rev_constrs',compact(
            'user',
            'countrie_birth',
            'province_birth',
            'directorate_pirth',
            'constraints',
            'source_governances',
        ));
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
        $user = User::where('id',Auth::id())->first();
        $CorrectionInstRevConstr = new CorrectionInstRevConstr();
        $CorrectionInstRevConstr->user_id = Auth::user()->id;
        $CorrectionInstRevConstr->common_data_id = $user->commondata->id;
        $CorrectionInstRevConstr->province_id = request('province_id');
        $CorrectionInstRevConstr->directorate_id = request('directorate_id');
        $CorrectionInstRevConstr->center_id = request('center_id');
        $CorrectionInstRevConstr->constraint_type = request('constraint_type');
        $CorrectionInstRevConstr->no_Constraint = request('no_Constraint');
        $CorrectionInstRevConstr->date_constraint = request('date_constraint');
        $CorrectionInstRevConstr->province_cons_id = request('province_cons_id');
        $CorrectionInstRevConstr->directorate_Cons_id = request('directorate_Cons_id');
        $CorrectionInstRevConstr->source_governance = request('source_governance');
        $CorrectionInstRevConstr->ruling_No = request('ruling_No');
        $CorrectionInstRevConstr->ruling_date = request('ruling_date');
        $CorrectionInstRevConstr->summary_ruling = request('summary_ruling');
        $CorrectionInstRevConstr->request_statu_id = 1;
        $CorrectionInstRevConstr->save();

        if ($request->has('old_statement') && $request->has('old_statement_code') && $request->has('new_statement') && $request->has('new_statement_code')) {
            foreach ($request->input('old_statement') as $key => $old_statement) { // تم إضافة $key لاستخدامه في الحصول على القيمة المحددة في الحقل 
                $StatementReqCorrection = new StatementReqCorrection();
                $StatementReqCorrection->correction_inst_rev_constr_id = $CorrectionInstRevConstr->id;
                $StatementReqCorrection->old_statement = $old_statement;
                $StatementReqCorrection->old_statement_code = $request->input('old_statement_code')[$key]; // الحصول على القيمة المحددة في الحقل  باستخدام المفتاح $key
                $StatementReqCorrection->new_statement = $request->input('new_statement')[$key];
                $StatementReqCorrection->new_statement_code = $request->input('new_statement_code')[$key]; 
                $StatementReqCorrection->save();
            }
        }
        return redirect()->route('home')->with('success1', 'تم');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($encryptedId)
    {
        $id = decrypt($encryptedId);
        $correction_inst_rev_constr = CorrectionInstRevConstr::findOrFail($id);
        return view('show_correction_inst_rev_constrs',compact(
            'id',
            'correction_inst_rev_constr',
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($encryptedId)
    {
        $id = decrypt($encryptedId);
        $correction_inst_rev_constr = CorrectionInstRevConstr::findOrFail($id);
        $constraints = DB::table('constraints')->get();
        $source_governances = DB::table('source_governances')->get();
        return view('edit_correction_inst_rev_constrs',compact(
            'correction_inst_rev_constr',
            'constraints',
            'source_governances',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $encryptedId)
    {
        $id = decrypt($encryptedId);
        $correction_inst_rev_constr = CorrectionInstRevConstr::findOrFail($id);
        $correction_inst_rev_constr->province_id = request('province_id');
        $correction_inst_rev_constr->directorate_id = request('directorate_id');
        $correction_inst_rev_constr->center_id = request('center_id');
        $correction_inst_rev_constr->constraint_type = request('constraint_type');
        $correction_inst_rev_constr->no_Constraint = request('no_Constraint');
        $correction_inst_rev_constr->date_constraint = request('date_constraint');
        $correction_inst_rev_constr->province_cons_id = request('province_cons_id');
        $correction_inst_rev_constr->directorate_Cons_id = request('directorate_Cons_id');
        $correction_inst_rev_constr->source_governance = request('source_governance');
        $correction_inst_rev_constr->ruling_No = request('ruling_No');
        $correction_inst_rev_constr->ruling_date = request('ruling_date');
        $correction_inst_rev_constr->summary_ruling = request('summary_ruling');
        $correction_inst_rev_constr->save();
        
        if ($request->has('old_statement') && $request->has('old_statement_code') && $request->has('new_statement') && $request->has('new_statement_code')) {
            $old_statement = $request->input('old_statement');
            $old_statement_code = $request->input('old_statement_code');
            $new_statement = $request->input('new_statement');
            $new_statement_code = $request->input('new_statement_code');
    
            foreach ($correction_inst_rev_constr->statement_req_correction as $key => $statement) {
                $StatementReqCorrection = StatementReqCorrection::where('correction_inst_rev_constr_id', $id)
                                                            ->where('old_statement_code', $statement->old_statement_code)
                                                            ->where('new_statement', $statement->new_statement)
                                                            ->where('new_statement_code', $statement->new_statement_code)
                                                            ->first();
                if ($StatementReqCorrection) {
                    $StatementReqCorrection->old_statement = $old_statement[$key];
                    $StatementReqCorrection->old_statement_code = $old_statement_code[$key];
                    $StatementReqCorrection->new_statement = $new_statement[$key];
                    $StatementReqCorrection->new_statement_code = $new_statement_code[$key];
                    $StatementReqCorrection->save();
                }
            }
        }
        return redirect()->route('demand_mang.index')->with('updated','تم تعديل الطلب رقم :  '.$id.'   بنجاح');
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
