<?php

namespace App\Http\Controllers;

use App\Models\BirthRestriction;
use App\Models\CardDamageRenewal;
use App\Models\User;
use App\Models\FamilyCard;
use App\Models\RequestStatu;
use Illuminate\Http\Request;
use App\Models\CardPersonaNew;
use App\Models\CorrectionInstRevConstr;
use App\Models\DeathStatement;
use App\Models\LogDivorce;
use App\Models\LogMarriage;
use App\Models\ReqChangeDataCommon;
use App\Models\ReqChangeDataCommonDa;
use App\Models\TyDataReqChange;
use Illuminate\Support\Facades\DB;
use App\Models\ReqeDataCommonchan;
use Illuminate\Support\Facades\Auth;

class DemandMangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        date_default_timezone_set('Asia/Aden');
        $provinces = DB::table('provinces')->get();
        $directorates = DB::table('directorates')->get();
        $card_version_centers = DB::table('card_version_centers')->get();
        $tyDataReqChanges = TyDataReqChange::all();
        $cardPersonaNews = CardPersonaNew::where('user_id', Auth::id())->get();
        $cardDamageRenewals = CardDamageRenewal::where('user_id', Auth::id())->get();
        $familyCards = FamilyCard::where('user_id', Auth::id())->get();
        $birthRestrictions = BirthRestriction::where('user_id', Auth::id())->get();
        $logMarriages = LogMarriage::where('user_id', Auth::id())->get();
        $logDivorces = LogDivorce::where('user_id', Auth::id())->get();
        $correctionInstRevConstrs = CorrectionInstRevConstr::where('user_id', Auth::id())->get();
        $deathStatements = DeathStatement::where('user_id', Auth::id())->get();
        $ReqChangeDataCommons = ReqChangeDataCommon::with('reqChangeDataCommonDas')
                        ->where('user_id', Auth::user()->id)
                        ->get();
        return view('demand_mang',compact(
            'provinces',
            'directorates',
            'card_version_centers',
            'cardPersonaNews',
            'familyCards',
            'tyDataReqChanges',
            'ReqChangeDataCommons',
            'cardDamageRenewals',
            'birthRestrictions',
            'logMarriages',
            'logDivorces',
            'correctionInstRevConstrs',
            'deathStatements',
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
    public function update(Request $request, $id)
    {
        //
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
