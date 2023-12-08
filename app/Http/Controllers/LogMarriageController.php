<?php

namespace App\Http\Controllers;

use App\Models\HusbandWifeData;
use App\Models\LogMarriage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LogMarriageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countrie_nationalits = DB::table('countrie_nationalits')->get();
        $religions = DB::table('religions')->get();
        $professions = DB::table('professions')->get();
        $social_status = DB::table('social_status')->get();
        $card_version_centers = DB::table('card_version_centers')->get();
        $ty_documents = DB::table('ty_documents')->get();

        return view('marraige-form',compact('countrie_nationalits','religions','professions','social_status','card_version_centers','ty_documents'));
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
        DB::beginTransaction();
        try {

            $LogMarriage = new LogMarriage();
            $LogMarriage->user_id = Auth::user()->id;
            $LogMarriage->province_id = request('province_id');
            $LogMarriage->directorate_id = request('directorate_id');
            $LogMarriage->center_id = request('center_id');
            $LogMarriage->date_contract_ad = request('date_contract_ad');
            $LogMarriage->date_contract_he = request('date_contract_he');
            $LogMarriage->province_contract_id = request('province_contract_id');
            $LogMarriage->directorate_contract_id = request('directorate_contract_id');
            $LogMarriage->marri_type = request('marri_type');
            $LogMarriage->Court_na = request('Court_na');
            $LogMarriage->document_no = request('document_no');
            $LogMarriage->date_document = request('date_document');
            $LogMarriage->request_statu_id = '1';
            $LogMarriage->save();

            HusbandWifeData::create([
                'user_id'=>Auth::user()->id,
                'constraint_id'=>$LogMarriage->id,
                'type_constraint'=>'1',
                'type_husb_wife'=>'1',
                'forena'=>request('forena'),
                'secondna'=>request('secondna'),
                'thirdna'=>request('thirdna'),
                'Tit'=>request('Tit'),
                'date_pirth_Ad'=>request('date_pirth_Ad'),
                'date_pirth_hegira'=>request('date_pirth_hegira'),
                'countrie_parth_id'=>request('countrie_parth_id'),
                'province_parth_id'=>request('province_parth_id'),
                'directorate_parth_id'=>request('directorate_parth_id'),
                'village_parth'=>request('village_parth'),
                'countrie_acom_id'=>request('countrie_acom_id'),
                'province_acom_id'=>request('province_acom_id'),
                'directorate_acom_id'=>request('directorate_acom_id'),
                'village_accomm'=>request('village_accomm'),
                'nationality_id'=>request('nationality_id'),
                'religion_id'=>request('religion_id'),
                'profession_id'=>request('profession_id'),
                'educational_level'=>request('educational_level'),
                'age_first_marri'=>request('age_first_marri'),
                'social_statu_forme_id'=>request('social_statu_forme_id'),
                'former_no'=>request('former_no'),
                'forena_moth'=>request('forena_moth'),
                'secondna_moth'=>request('secondna_moth'),
                'thirdna_moth'=>request('thirdna_moth'),
                'tit_moth'=>request('tit_moth'),
                'no_form_biths_live_male'=>request('no_form_biths_live_male'),
                'no_form_biths_live_female'=>request('no_form_biths_live_female'),
                'ty_documents_id'=>request('ty_documents_id'),
                'card_No'=>request('card_No'),
                'date_card_version'=>request('date_card_version'),
                'card_version_center_id'=>request('card_version_center_id'),
            ]);

            HusbandWifeData::create([
                'user_id'=>Auth::user()->id,
                'constraint_id'=>$LogMarriage->id,
                'type_constraint'=>'1',
                'type_husb_wife'=>'2',
                'forena'=>request('forenaw'),
                'secondna'=>request('secondnaw'),
                'thirdna'=>request('thirdnaw'),
                'Tit'=>request('Titw'),
                'date_pirth_Ad'=>request('date_pirth_Adw'),
                'date_pirth_hegira'=>request('date_pirth_hegiraw'),
                'countrie_parth_id'=>request('countrie_parth_idw'),
                'province_parth_id'=>request('province_parth_idw'),
                'directorate_parth_id'=>request('directorate_parth_idw'),
                'village_parth'=>request('village_parthw'),
                'countrie_acom_id'=>request('countrie_acom_idw'),
                'province_acom_id'=>request('province_acom_idw'),
                'directorate_acom_id'=>request('directorate_acom_idw'),
                'village_accomm'=>request('village_accommw'),
                'nationality_id'=>request('nationality_idw'),
                'religion_id'=>request('religion_idw'),
                'profession_id'=>request('profession_idw'),
                'educational_level'=>request('educational_levelw'),
                'age_first_marri'=>request('age_first_marriw'),
                'social_statu_forme_id'=>request('social_statu_forme_idw'),
                'former_no'=>request('former_now'),
                'forena_moth'=>request('forena_mothw'),
                'secondna_moth'=>request('secondna_mothw'),
                'thirdna_moth'=>request('thirdna_mothw'),
                'tit_moth'=>request('tit_mothw'),
                'no_form_biths_live_male'=>request('no_form_biths_live_malew'),
                'no_form_biths_live_female'=>request('no_form_biths_live_femalew'),
                'ty_documents_id'=>request('ty_documents_idw'),
                'card_No'=>request('card_Now'),
                'date_card_version'=>request('date_card_versionw'),
                'card_version_center_id'=>request('card_version_center_idw'),
            ]);

            
            DB::commit();
            return redirect()->route('home')->with('success1', 'تم');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'message' => 'An error occurred while processing your request. Please try again later.'
            ], 500);
        }
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
        $LogMarriage = LogMarriage::findOrFail($id);
        $HusbandData = HusbandWifeData::where('constraint_id',$LogMarriage->id)->where('type_constraint',1)->where('type_husb_wife','1')->first();
        $WifeData = HusbandWifeData::where('constraint_id',$LogMarriage->id)->where('type_constraint',1)->where('type_husb_wife','2')->first();
        return view('show_log_marriage',compact(
            'id',
            'LogMarriage',
            'HusbandData',
            'WifeData',
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
        $log_marriage = LogMarriage::findOrFail($id);
        $husband_data = HusbandWifeData::where('constraint_id',$log_marriage->id)->where('type_constraint',1)->where('type_husb_wife','1')->first();
        $wife_data = HusbandWifeData::where('constraint_id',$log_marriage->id)->where('type_constraint',1)->where('type_husb_wife','2')->first();
        $countrie_nationalits = DB::table('countrie_nationalits')->get();
        $religions = DB::table('religions')->get();
        $professions = DB::table('professions')->get();
        $social_status = DB::table('social_status')->get();
        $card_version_centers = DB::table('card_version_centers')->get();
        $ty_documents = DB::table('ty_documents')->get();
        return view('edit_marraige_form',compact(
            'log_marriage',
            'husband_data',
            'wife_data',
            'countrie_nationalits',
            'religions',
            'professions',
            'social_status',
            'card_version_centers',
            'ty_documents',
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
        DB::beginTransaction();
        try {
            
            $log_marriage = LogMarriage::findOrFail($id);
            $log_marriage->province_id = request('province_id');
            $log_marriage->directorate_id = request('directorate_id');
            $log_marriage->center_id = request('center_id');
            $log_marriage->date_contract_ad = request('date_contract_ad');
            $log_marriage->date_contract_he = request('date_contract_he');
            $log_marriage->province_contract_id = request('province_contract_id');
            $log_marriage->directorate_contract_id = request('directorate_contract_id');
            $log_marriage->marri_type = request('marri_type');
            $log_marriage->Court_na = request('Court_na');
            $log_marriage->document_no = request('document_no');
            $log_marriage->date_document = request('date_document');
            $log_marriage->save();
            
            $husband_data = HusbandWifeData::where('constraint_id',$log_marriage->id)->where('type_constraint',1)->where('type_husb_wife','1')->first();
            $husband_data->forena = request('forena');
            $husband_data->secondna = request('secondna');
            $husband_data->thirdna = request('thirdna');
            $husband_data->Tit = request('Tit');
            $husband_data->date_pirth_Ad = request('date_pirth_Ad');
            $husband_data->date_pirth_hegira = request('date_pirth_hegira');
            $husband_data->countrie_parth_id = request('countrie_parth_id');
            $husband_data->province_parth_id = request('province_parth_id');
            $husband_data->directorate_parth_id = request('directorate_parth_id');
            $husband_data->village_parth = request('village_parth');
            $husband_data->countrie_acom_id = request('countrie_acom_id');
            $husband_data->province_acom_id = request('province_acom_id');
            $husband_data->province_acom_id = request('province_acom_id');
            $husband_data->directorate_acom_id = request('directorate_acom_id');
            $husband_data->village_accomm = request('village_accomm');
            $husband_data->nationality_id = request('nationality_id');
            $husband_data->religion_id = request('religion_id');
            $husband_data->profession_id = request('profession_id');
            $husband_data->educational_level = request('educational_level');
            $husband_data->age_first_marri = request('age_first_marri');
            $husband_data->social_statu_forme_id = request('social_statu_forme_id');
            $husband_data->former_no = request('former_no');
            $husband_data->forena_moth = request('forena_moth');
            $husband_data->secondna_moth = request('secondna_moth');
            $husband_data->thirdna_moth = request('thirdna_moth');
            $husband_data->tit_moth = request('tit_moth');
            $husband_data->no_form_biths_live_male = request('no_form_biths_live_male');
            $husband_data->no_form_biths_live_female = request('no_form_biths_live_female');
            $husband_data->ty_documents_id = request('ty_documents_id');
            $husband_data->card_No = request('card_No');
            $husband_data->date_card_version = request('date_card_version');
            $husband_data->card_version_center_id = request('card_version_center_id');
            $husband_data->save();
            
            $wife_data = HusbandWifeData::where('constraint_id',$log_marriage->id)->where('type_constraint',1)->where('type_husb_wife','2')->first();
            $wife_data->forena = request('forenaw');
            $wife_data->secondna = request('secondnaw');
            $wife_data->thirdna = request('thirdnaw');
            $wife_data->Tit = request('Titw');
            $wife_data->date_pirth_Ad = request('date_pirth_Adw');
            $wife_data->date_pirth_hegira = request('date_pirth_hegiraw');
            $wife_data->countrie_parth_id = request('countrie_parth_idw');
            $wife_data->province_parth_id = request('province_parth_idw');
            $wife_data->directorate_parth_id = request('directorate_parth_idw');
            $wife_data->village_parth = request('village_parthw');
            $wife_data->countrie_acom_id = request('countrie_acom_idw');
            $wife_data->province_acom_id = request('province_acom_idw');
            $wife_data->province_acom_id = request('province_acom_idw');
            $wife_data->directorate_acom_id = request('directorate_acom_idw');
            $wife_data->village_accomm = request('village_accommw');
            $wife_data->nationality_id = request('nationality_idw');
            $wife_data->religion_id = request('religion_idw');
            $wife_data->profession_id = request('profession_idw');
            $wife_data->educational_level = request('educational_levelw');
            $wife_data->age_first_marri = request('age_first_marriw');
            $wife_data->social_statu_forme_id = request('social_statu_forme_idw');
            $wife_data->former_no = request('former_now');
            $wife_data->forena_moth = request('forena_mothw');
            $wife_data->secondna_moth = request('secondna_mothw');
            $wife_data->thirdna_moth = request('thirdna_mothw');
            $wife_data->tit_moth = request('tit_mothw');
            $wife_data->no_form_biths_live_male = request('no_form_biths_live_malew');
            $wife_data->no_form_biths_live_female = request('no_form_biths_live_femalew');
            $wife_data->ty_documents_id = request('ty_documents_idw');
            $wife_data->card_No = request('card_Now');
            $wife_data->date_card_version = request('date_card_versionw');
            $wife_data->card_version_center_id = request('card_version_center_idw');
            $wife_data->save();

            DB::commit();
            return redirect()->route('demand_mang.index')->with('updated', 'تم تعديل الطلب رقم : '.$id.' بنجاح');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'message' => 'An error occurred while processing your request. Please try again later.'
            ], 500);
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
