<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\BirthRestriction;
use App\Models\BirtRestriction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BirthRestrictionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id())->commondata;
        $birth_typs = DB::table('birth_typs')->get();
        $generated_whos = DB::table('generated_whos')->get();
        $place_births = DB::table('place_births')->get();
        $countrie_nationalits = DB::table('countrie_nationalits')->get();
        $religions = DB::table('religions')->get();
        $professions = DB::table('professions')->get();
        $ty_documents = DB::table('ty_documents')->get();
        $card_version_centers = DB::table('card_version_centers')->get();

        return view('birth_restriction',compact(
            'user',
            'birth_typs',
            'generated_whos',
            'place_births',
            'countrie_nationalits',
            'religions',
            'professions',
            'ty_documents',
            'card_version_centers',
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
        $commondata = User::find(Auth::id())->commondata;
        $BirthRestriction = new BirthRestriction();
        $BirthRestriction->user_id = Auth::user()->id;
        $BirthRestriction->common_data_id = $commondata->id;
        $BirthRestriction->province_id = request('province_id');
        $BirthRestriction->directorate_id = request('directorate_id');
        $BirthRestriction->center_id = request('center_id');
        $BirthRestriction->birth_type_id = request('birth_type_id');
        $BirthRestriction->generated_id = request('generated_id');
        $BirthRestriction->place_birth_id = request('place_birth_id');
        $BirthRestriction->date_pirth_Ad_father = request('date_pirth_Ad_father');
        $BirthRestriction->date_pirth_hegira_father = request('date_pirth_hegira_father');
        $BirthRestriction->countrie_parth_fath_id = request('countrie_parth_fath_id');
        $BirthRestriction->province_parth_father_id = request('province_parth_father_id');
        $BirthRestriction->directorate_parth_father_id = request('directorate_parth_father_id');
        $BirthRestriction->village_parth_father = request('village_parth_father');
        $BirthRestriction->countrie_accom_fath_id = request('countrie_accom_fath_id');
        $BirthRestriction->prov_accom_fath_id = request('prov_accom_fath_id');
        $BirthRestriction->directorate_accom_fath_id = request('directorate_accom_fath_id');
        $BirthRestriction->village_accomm_father = request('village_accomm_father');
        $BirthRestriction->religions_fath_id = request('religions_fath_id');
        $BirthRestriction->profession_father_id = request('profession_father_id');
        $BirthRestriction->educa_level_fath = request('educa_level_fath');
        $BirthRestriction->fath_age_first_marri = request('fath_age_first_marri');
        $BirthRestriction->ty_document_fath_id = request('ty_document_fath_id');
        $BirthRestriction->card_vers_cent_fath_id = request('card_vers_cent_fath_id');
        $BirthRestriction->card_id_fath = request('card_id_fath');
        $BirthRestriction->date_pirth_ad_moth = request('date_pirth_ad_moth');
        $BirthRestriction->date_pirth_he_moth = request('date_pirth_he_moth');
        $BirthRestriction->countrie_parth_moth_id = request('countrie_parth_moth_id');
        $BirthRestriction->province_parth_moth_id = request('province_parth_moth_id');
        $BirthRestriction->directorate_parth_moth_id = request('directorate_parth_moth_id');
        $BirthRestriction->village_parth_moth = request('village_parth_moth');
        $BirthRestriction->countrie_accom_moth_id = request('countrie_accom_moth_id');
        $BirthRestriction->prov_acom_moth_id = request('prov_acom_moth_id');
        $BirthRestriction->directorate_acom_moth_id = request('directorate_acom_moth_id');
        $BirthRestriction->village_accomm_moth = request('village_accomm_moth');
        $BirthRestriction->religion_moth_id = request('religion_moth_id');
        $BirthRestriction->profession_moth_id = request('profession_moth_id');
        $BirthRestriction->educa_level_moth = request('educa_level_moth');
        $BirthRestriction->moth_age_first_marri = request('moth_age_first_marri');
        $BirthRestriction->ty_document_moth_id = request('ty_document_moth_id');
        $BirthRestriction->card_vers_cent_moth_id = request('card_vers_cent_moth_id');
        $BirthRestriction->card_id_moth = request('card_id_moth');
        $BirthRestriction->request_statu_id = '1';
        $BirthRestriction->save();
        return redirect()->route('home')->with('success1', 'تم');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BirthRestriction  $birthRestriction
     * @return \Illuminate\Http\Response
     */
    public function show($encryptedId)
    {
        $id = decrypt($encryptedId);
        $BirthRestriction = BirthRestriction::findOrFail($id);
        $common_data = BirthRestriction::findOrFail($id)->common_data;


        $province = $BirthRestriction->province->na_prov;
        $directorate = $BirthRestriction->directorate->na_dire;
        $center = $BirthRestriction->center->na_center;

        $nationality_req = $common_data->nationality_req->nationality_na;
        $nationality_father = $common_data->nationality_father->nationality_na;
        $nationality_mother = $common_data->nationality_mother->nationality_na;
        $countrie_birth = $common_data->countrie_birth->countrie_na;
        $province_birth = $common_data->province_birth->na_prov;
        $directorate_pirth = $common_data->directorate_pirth->na_dire;
        $religions = $common_data->religions->na_relig;
        $social_statu = $common_data->social_statu->na_status;
        $certificate = $common_data->certificate->na_cert;
        $specialtie = $common_data->specialtie->na_spec;
        $profession = $common_data->profession->na_profes;
        $jihat_work = $common_data->jihat_work->na_jihatw;
        $countrie_accom = $common_data->countrie_accom->countrie_na;
        $province_accom = $common_data->province_accom->na_prov;
        $directorate_accom = $common_data->directorate_accom->na_dire;
        
        return view('show_birth_restriction',compact(
            'id',
            'BirthRestriction',
            'common_data',
            'province',
            'directorate',
            'center',
            'nationality_req',
            'nationality_father',
            'nationality_mother',
            'countrie_birth',
            'province_birth',
            'directorate_pirth',
            'religions',
            'social_statu',
            'certificate',
            'specialtie',
            'profession',
            'jihat_work',
            'countrie_accom',
            'province_accom',
            'directorate_accom',
        ));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BirthRestriction  $birthRestriction
     * @return \Illuminate\Http\Response
     */
    public function edit($encryptedId)
    {
        $id = decrypt($encryptedId);
        $birth_typs = DB::table('birth_typs')->get();
        $generated_whos = DB::table('generated_whos')->get();
        $place_births = DB::table('place_births')->get();
        // $countrie_nationalits = DB::table('countrie_nationalits')->get();
        $religions = DB::table('religions')->get();
        $professions = DB::table('professions')->get();
        $ty_documents = DB::table('ty_documents')->get();
        $card_version_centers = DB::table('card_version_centers')->get();
        $birth_restriction = BirthRestriction::findOrFail($id);
        return view('edit_birth_restriction',compact(
            'birth_restriction',
            'birth_typs',
            'generated_whos',
            'place_births',
            // 'countrie_nationalits',
            'religions',
            'professions',
            'ty_documents',
            'card_version_centers',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BirthRestriction  $birthRestriction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $encryptedId)
    {
        $id = decrypt($encryptedId);
        $BirthRestriction = BirthRestriction::find($id);
        $BirthRestriction->province_id = request('province_id');
        $BirthRestriction->directorate_id = request('directorate_id');
        $BirthRestriction->center_id = request('center_id');
        $BirthRestriction->birth_type_id = request('birth_type_id');
        $BirthRestriction->generated_id = request('generated_id');
        $BirthRestriction->place_birth_id = request('place_birth_id');
        $BirthRestriction->date_pirth_Ad_father = request('date_pirth_Ad_father');
        $BirthRestriction->date_pirth_hegira_father = request('date_pirth_hegira_father');
        $BirthRestriction->countrie_parth_fath_id = request('countrie_parth_fath_id');
        $BirthRestriction->province_parth_father_id = request('province_parth_father_id');
        $BirthRestriction->directorate_parth_father_id = request('directorate_parth_father_id');
        $BirthRestriction->village_parth_father = request('village_parth_father');
        $BirthRestriction->countrie_accom_fath_id = request('countrie_accom_fath_id');
        $BirthRestriction->prov_accom_fath_id = request('prov_accom_fath_id');
        $BirthRestriction->directorate_accom_fath_id = request('directorate_accom_fath_id');
        $BirthRestriction->village_accomm_father = request('village_accomm_father');
        $BirthRestriction->religions_fath_id = request('religions_fath_id');
        $BirthRestriction->profession_father_id = request('profession_father_id');
        $BirthRestriction->educa_level_fath = request('educa_level_fath');
        $BirthRestriction->fath_age_first_marri = request('fath_age_first_marri');
        $BirthRestriction->ty_document_fath_id = request('ty_document_fath_id');
        $BirthRestriction->card_vers_cent_fath_id = request('card_vers_cent_fath_id');
        $BirthRestriction->card_id_fath = request('card_id_fath');
        $BirthRestriction->date_pirth_ad_moth = request('date_pirth_ad_moth');
        $BirthRestriction->date_pirth_he_moth = request('date_pirth_he_moth');
        $BirthRestriction->countrie_parth_moth_id = request('countrie_parth_moth_id');
        $BirthRestriction->province_parth_moth_id = request('province_parth_moth_id');
        $BirthRestriction->directorate_parth_moth_id = request('directorate_parth_moth_id');
        $BirthRestriction->village_parth_moth = request('village_parth_moth');
        $BirthRestriction->countrie_accom_moth_id = request('countrie_accom_moth_id');
        $BirthRestriction->prov_acom_moth_id = request('prov_acom_moth_id');
        $BirthRestriction->directorate_acom_moth_id = request('directorate_acom_moth_id');
        $BirthRestriction->village_accomm_moth = request('village_accomm_moth');
        $BirthRestriction->religion_moth_id = request('religion_moth_id');
        $BirthRestriction->profession_moth_id = request('profession_moth_id');
        $BirthRestriction->educa_level_moth = request('educa_level_moth');
        $BirthRestriction->moth_age_first_marri = request('moth_age_first_marri');
        $BirthRestriction->ty_document_moth_id = request('ty_document_moth_id');
        $BirthRestriction->card_vers_cent_moth_id = request('card_vers_cent_moth_id');
        $BirthRestriction->card_id_moth = request('card_id_moth');
        $BirthRestriction->request_statu_id = '1';
        $BirthRestriction->save();
        return redirect()->route('demand_mang.index')->with('updated', 'تم تعديل الطلب رقم : '.$id.' بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BirthRestriction  $birthRestriction
     * @return \Illuminate\Http\Response
     */
    public function destroy(BirthRestriction $birthRestriction)
    {
        //
    }
}
