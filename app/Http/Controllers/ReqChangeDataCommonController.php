<?php

namespace App\Http\Controllers;
use phpseclib3\Crypt\RSA;
use Illuminate\Http\Request;
use App\Models\TyDataReqChange;
use App\Models\ReqeDataCommonchan;
use App\Models\ReqChangeDataCommon;
use Illuminate\Support\Facades\Auth;
use App\Models\ReqChangeDataCommonDa;

class ReqChangeDataCommonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $this->validate($request,[
        'ty_data_req_change_id' => 'required|max:255',
        'new_data' => 'required|max:255',
    ],[
        'ty_data_req_change_id.required' => 'خطاء يرجى  ادخال نوع البيانات المطلوب تغييرها',
        'new_data.required' => 'خطاء يرجى  ادخال البيانات الجديدة',
    ]);

    $ReqChangeDataCommon = new ReqChangeDataCommon();
    $ReqChangeDataCommon->user_id = Auth::user()->id;
    $ReqChangeDataCommon->request_statu_id = 1;
    $ReqChangeDataCommon->save();
   
    if ($request->has('new_data') && $request->has('ty_data_req_change_id')) {
        foreach ($request->input('new_data') as $key => $newFieldValue) { // تم إضافة $key لاستخدامه في الحصول على القيمة المحددة في الحقل ty_data_req_change_id
            $ReqChangeDataCommonDa = new ReqChangeDataCommonDa();
            $ReqChangeDataCommonDa->new_data = $newFieldValue;
            $ReqChangeDataCommonDa->req_change_data_common_id = $ReqChangeDataCommon->id;
            $ReqChangeDataCommonDa->ty_data_req_change_id = $request->input('ty_data_req_change_id')[$key]; // الحصول على القيمة المحددة في الحقل ty_data_req_change_id باستخدام المفتاح $key
            $ReqChangeDataCommonDa->save();
        }
    }
    return redirect('/profiles')->with('add','تم إرسال الطلب بنجاح رقم الطلب'.$ReqChangeDataCommon->id);
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReqChangeDataCommon  $reqChangeDataCommon
     * @return \Illuminate\Http\Response
     */
    public function show($encryptedId)
    {
        $id = decrypt($encryptedId);
        $ReqChangeDataCommons = ReqChangeDataCommon::with('reqChangeDataCommonDas')
        ->where('id', $id)
        ->get();
        return view('show_req_chang_data_common',compact(
            'ReqChangeDataCommons',
            )) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReqChangeDataCommon  $reqChangeDataCommon
     * @return \Illuminate\Http\Response
     */
    public function edit($encryptedId)
    {
        $id = decrypt($encryptedId);
        $ReqChangeDataCommons = ReqChangeDataCommon::with('reqChangeDataCommonDas')
        ->where('id', $id)
        ->get();
        $tyDataReqChanges = TyDataReqChange::all();
        return view('edit_req_chang_data_common',compact('tyDataReqChanges','ReqChangeDataCommons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReqChangeDataCommon  $reqChangeDataCommon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $encryptedId)
    {
        $id = decrypt($encryptedId);
        $ReqChangeDataCommon = ReqChangeDataCommon::find($id);
        if ($request->has('new_data') && $request->has('ty_data_req_change_id')) {
            $newDataValues = $request->input('new_data');
            $tyDataReqChangeIds = $request->input('ty_data_req_change_id');
    
            foreach ($ReqChangeDataCommon->reqChangeDataCommonDas as $key => $data) {
                $ReqChangeDataCommonDa = ReqChangeDataCommonDa::where('req_change_data_common_id', $id)
                                                            ->where('ty_data_req_change_id', $data->ty_data_req_change_id)
                                                            ->first();
                if ($ReqChangeDataCommonDa) {
                    $ReqChangeDataCommonDa->new_data = $newDataValues[$key];
                    $ReqChangeDataCommonDa->ty_data_req_change_id = $tyDataReqChangeIds[$key];
                    $ReqChangeDataCommonDa->save();
                }
            }
        }
        return redirect()->route('demand_mang.index')->with('updated','تم تعديل الطلب رقم :  '.$id.'   بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReqChangeDataCommon  $reqChangeDataCommon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $encrypted_id = request('encrypted_id');
        $id = decrypt($encrypted_id);
        ReqChangeDataCommon::destroy($id);
        return redirect()->route('demand_mang.index')->with('deleted','تم حذف الطلب رقم :  '.$id.'  بنجاح');
    }
}
