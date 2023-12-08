<?php

namespace App\Http\Controllers;

use App\Models\CardDamagedRenewal;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\CardDamageRenewal;
use Illuminate\Support\Facades\Auth;

class CardDamageRenewalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id())->commondata;
        return view('card_damaged_renewal',compact('user'));
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
        $user = User::find(Auth::id())->commondata;
        $user->id_card = request('id_card');
        $user->save();
        $card = new CardDamageRenewal();
        $card->user_id = Auth::user()->id;
        $card->common_data_id = $user->id;
        $card->req_type = request('req_type');
        $card->province_id = request('province_id');
        $card->directorate_id = request('directorate_id');
        $card->center_id = request('center_id');
        $card->province_version_card_id = request('province_version_card_id');
        $card->directorate_version_card_id = request('directorate_version_card_id');
        $card->card_version_center_id = request('card_version_center_id');
        $card->date_version = request('date_version');
        $card->request_statu_id = '1';
        $card->save();
        return redirect()->route('home')->with('success1', 'تم');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CardDamageRenewal  $cardDamageRenewal
     * @return \Illuminate\Http\Response
     */
    public function show($encryptedId)
    {
        $id = decrypt($encryptedId);
        $CardDamageRenewal = CardDamageRenewal::findOrFail($id);
        $common_data = CardDamageRenewal::findOrFail($id)->common_data;
        // return $CardDamageRenewal->cardversioncenterid->na_center;

        $province = $CardDamageRenewal->province->na_prov;
        $directorate = $CardDamageRenewal->directorate->na_dire;
        $center = $CardDamageRenewal->center->na_center;
        
        $province_version_card_id = $CardDamageRenewal->provinceversioncardid->na_prov;
        $directorate_version_card_id = $CardDamageRenewal->directorateversioncardid->na_dire;
        $card_version_center_id = $CardDamageRenewal->cardversioncenterid->na_center;
        
        return view('show_card_damage_renewal',compact(
            'id',
            'CardDamageRenewal',
            'common_data',
            'province',
            'directorate',
            'center',
            'province_version_card_id',
            'directorate_version_card_id',
            'card_version_center_id',
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CardDamageRenewal  $cardDamageRenewal
     * @return \Illuminate\Http\Response
     */
    public function edit($encryptedId)
    {
        $id = decrypt($encryptedId);
        $CardDamageRenewal = CardDamageRenewal::findOrFail($id);
        $common_data = CardDamageRenewal::findOrFail($id)->common_data;
        return view('edit_card_damaged_renewal',compact('CardDamageRenewal','common_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CardDamageRenewal  $cardDamageRenewal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $encryptedId)
    {
        $id = decrypt($encryptedId);
        $user = User::find(Auth::id())->commondata;
        $user->id_card = request('id_card');
        $user->save();
        $CardDamageRenewal = CardDamageRenewal::findOrFail($id);
        $CardDamageRenewal->req_type = request('req_type');
        $CardDamageRenewal->province_id = request('province_id');
        $CardDamageRenewal->directorate_id = request('directorate_id');
        $CardDamageRenewal->center_id = request('center_id');
        $CardDamageRenewal->province_version_card_id = request('province_version_card_id');
        $CardDamageRenewal->directorate_version_card_id = request('directorate_version_card_id');
        $CardDamageRenewal->card_version_center_id = request('card_version_center_id');
        $CardDamageRenewal->date_version = request('date_version');
        $CardDamageRenewal->save();
        return redirect()->route('demand_mang.index')->with('updated', 'تم تعديل الطلب رقم : '.$id.' بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CardDamageRenewal  $cardDamageRenewal
     * @return \Illuminate\Http\Response
     */
    public function destroy(CardDamageRenewal $cardDamageRenewal)
    {
        //
    }
}
