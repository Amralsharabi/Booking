<?php

namespace App\Http\Controllers;

use App\Models\CardVersionCenter;
use App\Models\Province;
use App\Models\Directorate;
use Illuminate\Http\Request;
use App\Models\CountrieNationalit;

class LocationController extends Controller
{
    // استرداد كل الدول
    public function index()
    {
        $countries = CountrieNationalit::pluck('countrie_na', 'id');
        return response()->json($countries);
    }
    
    // استرداد كل المحافظات
    public function indexprovince()
    {
        $province = Province::pluck('na_prov', 'id');
        return response()->json($province);
    }
    
    
    // استرداد المحافظات المرتبطة بدولة الإقامة المحددة
    public function getGovernoratesByCountry(Request $request)
    {
        $province = Province::where('countrie_nationalit_id', $request->countrie_accom_id)
        ->pluck('na_prov', 'id');
        return response()->json($province);
    }

    // استرداد المحافظات المرتبطة بدولة الإقامة المحددة
    public function getGovernoratesByCountryAccomForm(Request $request)
    {
        $province = Province::where('countrie_nationalit_id', $request->countrie_accom_form_id)
        ->pluck('na_prov', 'id');
        return response()->json($province);
    }
    
    // استرداد المحافظات المرتبطة بدولة الميلاد المحددة
    public function getProvincesByCountryBirth(Request $request)
    {
        $province = Province::where('countrie_nationalit_id', $request->countrie_birth_id)
                                    ->pluck('na_prov', 'id');
        return response()->json($province);
    }

    // استرداد المديريات المرتبطة بمحافظة الحجز المحددة
    public function getDirectoratesByGovernorateAccomForm(Request $request)
    {
        $directorates = Directorate::where('province_id', $request->province_acom_form_id)
        ->pluck('na_dire', 'id');
        return response()->json($directorates);
    }

    // استرداد المديريات المرتبطة بمحافظة الحجز المحددة
    public function getDirectoratesByGovernorateCons(Request $request)
    {
        $directorates = Directorate::where('province_id', $request->province_cons_id)
        ->pluck('na_dire', 'id');
        return response()->json($directorates);
    }

    // استرداد المحافظات المرتبطة بدولة ميلاد الاب المحددة
    public function getGovernoratesByCountryParthFather(Request $request)
    {
        $province = Province::where('countrie_nationalit_id', $request->countrie_parth_fath_id)
        ->pluck('na_prov', 'id');
        return response()->json($province);
    }

    // استرداد المديريات المرتبطة بمحافظة ميلاد الاب المحددة
    public function getDirectoratesByProvinceParthFather(Request $request)
    {
        $directorates = Directorate::where('province_id', $request->province_parth_father_id)
        ->pluck('na_dire', 'id');
        return response()->json($directorates);
    }

    // استرداد المحافظات المرتبطة بدولة ميلاد الام المحددة
    public function getGovernoratesByCountryParthMoth(Request $request)
    {
        $province = Province::where('countrie_nationalit_id', $request->countrie_parth_moth_id)
        ->pluck('na_prov', 'id');
        return response()->json($province);
    }

    // استرداد المديريات المرتبطة بمحافظة ميلاد الام المحددة
    public function getDirectoratesByProvinceParthMoth(Request $request)
    {
        $directorates = Directorate::where('province_id', $request->province_parth_moth_id)
        ->pluck('na_dire', 'id');
        return response()->json($directorates);
    }

    // استرداد المحافظات المرتبطة بدولة اقامة الاب المحددة
    public function getGovernoratesByCountryAccomFath(Request $request)
    {
        $province = Province::where('countrie_nationalit_id', $request->countrie_accom_fath_id)
        ->pluck('na_prov', 'id');
        return response()->json($province);
    }

    // استرداد المديريات المرتبطة بمحافظة اقامة الاب المحددة
    public function getDirectoratesByProvincAccomFath(Request $request)
    {
        $directorates = Directorate::where('province_id', $request->prov_accom_fath_id)
        ->pluck('na_dire', 'id');
        return response()->json($directorates);
    }

    // استرداد المحافظات المرتبطة بدولة اقامة الام المحددة
    public function getGovernoratesByCountryAccomMoth(Request $request)
    {
        $province = Province::where('countrie_nationalit_id', $request->countrie_accom_moth_id)
        ->pluck('na_prov', 'id');
        return response()->json($province);
    }

    // استرداد المديريات المرتبطة بمحافظة اقامة الام المحددة
    public function getDirectoratesByProvincAccomMoth(Request $request)
    {
        $directorates = Directorate::where('province_id', $request->prov_acom_moth_id)
        ->pluck('na_dire', 'id');
        return response()->json($directorates);
    }

    // استرداد المديريات المرتبطة بمحافظة الحجز المحددة
    public function getDirectoratesByGovernorate(Request $request)
    {
        $directorates = Directorate::where('province_id', $request->province_id)
        ->pluck('na_dire', 'id');
        return response()->json($directorates);
    }
    
    // استرداد المديريات المرتبطة بمحافظة الحجز المحددة
    public function getDirectoratesByGovernorateVersion(Request $request)
    {
        $directorates = Directorate::where('province_id', $request->province_version_card_id)
        ->pluck('na_dire', 'id');
        return response()->json($directorates);
    }
    
    // استرداد المديريات المرتبطة بمحافظة الميلاد المحددة
    public function getDirectoratesByProvinceBirth(Request $request)
    {
        $directorates = Directorate::where('province_id', $request->province_birth_id)
                                    ->pluck('na_dire', 'id');
        return response()->json($directorates);
    }

    //  استرداد المديريات المرتبطة بمحافظة الإقامة المحددة  
    public function getDirectoratesByProvinceAccom(Request $request)
    {
        $directorates = Directorate::where('province_id', $request->province_accom_id)
                                    ->pluck('na_dire', 'id');
        return response()->json($directorates);
    }

    //  استرداد المديريات المرتبطة بمحافظة عقد الزواج المحددة  
    public function getDirectoratesByProvinceLogMarraige(Request $request)
    {
        $directorates = Directorate::where('province_id', $request->province_contract_id)
                                    ->pluck('na_dire', 'id');
        return response()->json($directorates);
    }

    // استرداد المراكز المرتبطة بمديرية الحجز المحددة
    public function getCentersByDirectorate(Request $request)
    {
        $centers = CardVersionCenter::where('directorate_id', $request->directorate_id)
                            ->pluck('na_center', 'id');
        return response()->json($centers);
    }

    // استرداد المراكز المرتبطة بمديرية الحجز المحددة
    public function getCentersByDirectorateVersion(Request $request)
    {
        $centers = CardVersionCenter::where('directorate_id', $request->directorate_version_card_id)
                            ->pluck('na_center', 'id');
        return response()->json($centers);
    }

    // استرداد المحافظات المرتبطة بدولة ميلاد الزوج المحددة
    public function getGovernoratesByCountryParthMarraige(Request $request)
    {
        $province = Province::where('countrie_nationalit_id', $request->countrie_parth_id)
        ->pluck('na_prov', 'id');
        return response()->json($province);
    }

    // استرداد المديريات المرتبطة بمحافظة ميلاد الزوج المحددة
    public function getDirectoratesByProvinceParthMarraige(Request $request)
    {
        $directorates = Directorate::where('province_id', $request->province_parth_id)
        ->pluck('na_dire', 'id');
        return response()->json($directorates);
    }

    // استرداد المحافظات المرتبطة بدولة اقامة الزوج المحددة
    public function getGovernoratesByCountryAcomhMarraige(Request $request)
    {
        $province = Province::where('countrie_nationalit_id', $request->countrie_acom_id)
        ->pluck('na_prov', 'id');
        return response()->json($province);
    }

    // استرداد المديريات المرتبطة بمحافظة اقامة الزوج المحددة
    public function getDirectoratesByProvinceaAcomhMarraige(Request $request)
    {
        $directorates = Directorate::where('province_id', $request->province_acom_id)
        ->pluck('na_dire', 'id');
        return response()->json($directorates);
    }
    // استرداد المحافظات المرتبطة بدولة ميلاد الزوجة المحددة
    public function getGovernoratesByCountryParthMarraigew(Request $request)
    {
        $province = Province::where('countrie_nationalit_id', $request->countrie_parth_idw)
        ->pluck('na_prov', 'id');
        return response()->json($province);
    }

    // استرداد المديريات المرتبطة بمحافظة ميلاد الزوجة المحددة
    public function getDirectoratesByProvinceParthMarraigew(Request $request)
    {
        $directorates = Directorate::where('province_id', $request->province_parth_idw)
        ->pluck('na_dire', 'id');
        return response()->json($directorates);
    }

    // استرداد المحافظات المرتبطة بدولة اقامة الزوجة المحددة
    public function getGovernoratesByCountryAcomhMarraigew(Request $request)
    {
        $province = Province::where('countrie_nationalit_id', $request->countrie_acom_idw)
        ->pluck('na_prov', 'id');
        return response()->json($province);
    }

    // استرداد المديريات المرتبطة بمحافظة اقامة الزوجة المحددة
    public function getDirectoratesByProvinceaAcomhMarraigew(Request $request)
    {
        $directorates = Directorate::where('province_id', $request->province_acom_idw)
        ->pluck('na_dire', 'id');
        return response()->json($directorates);
    }
}
