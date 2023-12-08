<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\ReqChangeDataCommon;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $userRequests = ReqChangeDataCommon::with('reqChangeDataCommonDas')
                        ->where('user_id', Auth::user()->id)
                        ->get();

    // تمرير البيانات إلى العرض
    return view('posts', compact('userRequests'));
        // Carbon::setTranslation('ar', 'IslamicYemen');
        // Carbon::setTranslation('ar', 'IslamicUmmAlQura');
        // setlocale(LC_TIME, 'ar');
        
        // $dt = Carbon::now();
        // echo $dt->isoFormat('LLLL');                // Tuesday, May 25, 2021 7:00 PM  

        // $h = $dt->toHijri()->isoFormat('Y/m/d');
        // $g = DateTime::createFromFormat('Y/m/d', $h ,new DateTimeZone('Asia/Aden'))->setTimezone(new DateTimeZone('UTC'))->format('Y/M/D');
        // echo $h;
        
//         $dateGregorian = Carbon::parse('2023-06-29');
// Carbon::setIslamicType(Carbon::ISLAMIC_TYPE_UMALQURA);
// $dateHijri = $dateGregorian->format('iYYYY/iMM/iDD');
// echo $dateHijri; // يعرض التاريخ الهجري المحول

        // date_default_timezone_set('Asia/Aden');
        // $dateGregorian = Carbon::parse('2023-6-29');
        // Carbon::setUtf8(true);
        // Carbon::setLocale('ar'); 
        // // Carbon::setIslamicCiv();
        // echo $dateGregorian->toHijri()->isoFormat('iYYYY/iMM/iDD');

        // $date = Carbon::createFromFormat('')
        // $dateHijri = Carbon::parse($request->input('hijripicker'));
        // echo $dateGregorian->toHijri()->isoFormat('YYYY/MM/DD');


        // $user = User::find(Auth::id())->cardpersonanew;
        // $create_at = $user->created_at->format('Y-m-d');
        // $card_request_limit = 1;
        // $user_id = auth()->user()->id;
        // if(Cache::has('card_request_limit_' . $user_id)){
        //     $card_request_count = Cache::get('card_request_limit_' . $user_id);
        //     if($card_request_count >= $card_request_limit){
        //         return redirect()->back()->withErrors(['limit_exceeded' => 'لقد تجاوزت الحد الاقصى لعدد طلبات البطاقة الشخصية اليوم']);
        //     }
        // }else{
        //     $card_request_count = 0;
        // }
        // $card_request_count++;

        // Cache::put('card_request_limit_' . $user_id, $card_request_count, now()->endOfDay());
        // $today = Carbon::today()->format('Y-m-d');
        // if (!empty($create_at)) {
        //     if ($create_at == $today) {
        //         return Cache::put($today, true, 86400);;
        //     }
        // }else{
        //         return 'no';
        //     }
        // $user = User::find(Auth::id())->cardpersonanew;
        // return $user->user_id;
        // $user = User::find(Auth::id())->cardpersonanew;
        // $now = Carbon::now();
        // $expiresAt = Carbon::parse($user->created_at)->addDay();
        // $diff = $now->diff($expiresAt);
        // $remainingTime = $diff->invert ? '00:00:00' : $diff->format('%H:%I:%S');
        // $message = $diff->invert ? "you can request another ID card now.":"you cam request another ID card in $remainingTime.";
        // return response()->json(['message' => $message])
            // return CommonData::where('user_id', Auth::id())->pluck('id')->first();
        //     session()->put('previousUrl',url()->previous());
        // $previousUrl = session()->get('previousUrl');
        // return redirect()->to($previousUrl);
        // session()->put('previousUrl', url()->previous());
        //     return redirect()->to('data');
        // return redirect('data')->with('previousUrl', $request->url());
        // return session()->put('previousUrl',url()->previous());
        // $previousUrl = session()->get('previousUrl');
        // return redirect()->to($previousUrl);
        // $user = CommonData::weher();
        // return $user->;
        // $commonData = CommonData::select('req_fore_na','req_second_na','req_third_na','req_tit','mother_fore_na','mother_second_na','mother_third_na','mother_tit')->get();
        // return $commonData->req_fore_na;
        // $cardPersonaNews = CardPersonaNew::where('user_id', Auth::id())->get();
        // foreach ($cardPersonaNews as $user){
        //         echo "نوع الطلب:بطاقة شخصية<br>";
        //         // echo "حالة الطلب:".$user->requeststatu->na_req_status."<br>";
        //         echo  Carbon::parse($user->created_at)->addDay();

                // echo "created_at:".$user->max('id')."<br>";
                // echo "created_at:".$user->created_at."<br>";
                // echo "updated_at:".$user->updated_at."<br>";
            // }

        // return         $user = User::find(Auth::id())->cardpersonanew;
        // ;
        // $user = User::find(Auth::id())->cardpersonanew;
        // if(CardPersonaNew::where('user_id', Auth::id())->count()){
        //     $now = Carbon::now();
        //     // if($now->format('Y-m-d') == $user->created_at->format('Y-m-d')){
        //         $expiresAt = Carbon::parse($user->created_at)->addDay();
        //         $diff = $now->diff($expiresAt);
        //         $remainingTime = $diff->invert ? '00:00:00' : $diff->format(' %H ساعة |%I دقيقة |%S ثانية');
        //         if($remainingTime == '00:00:00'){
        //             return "ddddddddddd";
        //         }
        //         return $remainingTime;
        //     // }

        // }

        // $cardPersonaNew = CardPersonaNew::find(1);
        // $common_data = CardPersonaNew::find(1)->common_data;
        // $dataWitnesse = DataWitnesse::where('req_id',$cardPersonaNew->id)->get();
        // return CommonData::where('id', $CardPersonaNew->common_data_id)->first();
        // $q = CommonData::where('user_id', Auth::id())->pluck('id')->first();

        // CardPersonaNew::find('1')->common_data_id;

        // $dataWitnesse = DataWitnesse::where('req_id','1')->first();
        // $dataWitnesse2 = DataWitnesse::where('req_id','1')->skip(1)->take(1)->first();
        // return $dataWitnesse2->foreNa_witn;

        // $user = User::all(Auth::id())->reqchangedatacommon;
        // $users = ReqChangeDataCommon::where('user_id', Auth::id())->where(max('created_at'))->orderBy('created_at', 'desc')->get();
        // // if($users->max('created_at') == 3){
        // //     return 'ok';
        // // }
        // return $users;
        // foreach ($users as $user) {
        // }
            // return view('post');
            // $date = '2023-6-29';
            // $hijriDate = Hijri::hijriDate($date);

            // return $hijriDate;
            
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
       
        // $dateGregorian = Carbon::parse('2023-6-29');
        // Carbon::setLocale('ar'); 
        // echo $dateGregorian->toHijri()->isoFormat('LLLL');
        // $dateHijri = Carbon::parse($request->input('hijripicker'));
        // echo $dateGregorian->toHijri()->isoFormat('YYYY/MM/DD');
        // if ($dateGregorian->isFriday()) {
        //     return 'لايمكن ان تختار يوم الجمعة اختار يوماً اخر';
        // }elseif ($dateGregorian->isThursday()) {
        //     return 'لايمكن ان تختار يوم الخميس اختار يوماً اخر';
        // }elseif ($dateGregorian->day == 1 && $dateGregorian->month == 5) {
        //     return 'لايمكن ان تختار يوم 1 مايو إجازة رسمية اختار يوماً اخر';
        // }elseif ($dateGregorian->day == 22 && $dateGregorian->month == 5) {
        //     return 'لايمكن ان تختار يوم 22 مايو إجازة رسمية اختار يوماً اخر';
        // }elseif ($dateGregorian->day == 26 && $dateGregorian->month == 9) {
        //     return 'لايمكن ان تختار يوم 26 سبتمبر إجازة رسمية اختار يوماً اخر';
        // }elseif ($dateGregorian->day == 14 && $dateGregorian->month == 10) {
        //     return 'لايمكن ان تختار يوم 14 أكتوبر إجازة رسمية اختار يوماً اخر';
        // }elseif ($dateHijri->day == 1 && $dateHijri->month == 1) {
        //     return 'يصادف هذا اليوم 1 محرم سنة هجرية جديدة إجازة رسمية اختار يوماً اخر';
        // }elseif ($dateHijri->day == 12 && $dateHijri->month == 3) {
        //     return 'يصادف هذا اليوم 12 ربيع أول مولد النبي إجازة رسمية اختار يوماً اخر';
        // }elseif ($dateHijri->day >= 27 && $dateHijri->month == 9 || $dateHijri->day <= 7 && $dateHijri->month == 10) {
        //     return 'يصادف هذا اليوم إجازة عيد الفطر المبارك.. تستمر الإجازة الى 7 شول اختار يوماً اخر';
        // }elseif ($dateHijri->day == 8 && $dateHijri->month == 12 || $dateHijri->day == 9 && $dateHijri->month == 12 || $dateHijri->day == 10 && $dateHijri->month == 12 || $dateHijri->day == 11 && $dateHijri->month == 12 || $dateHijri->day == 12 && $dateHijri->month == 12 || $dateHijri->day == 13 && $dateHijri->month == 12 || $dateHijri->day == 14 && $dateHijri->month == 12 || $dateHijri->day == 15 && $dateHijri->month == 12 || $dateHijri->day == 16 && $dateHijri->month == 12) {
        //     return 'يصادف هذا اليوم إجازة عيد الأضحى المبارك.. تستمر الإجازة الى 16 ذوالحجة اختار يوماً اخر';
        // }
        // else{

        //     return 'okkkkkk';
        // }
        // $dateHijri = $dateGregorian->formatLocalized('%A');
        // $time_attendees = $request->time_attendees;

        // if ($dateHijri->month == 12 && $dateHijri->day == 10 || $dateHijri->month == 12 && $dateHijri->day == 9) {
        //     return 'عيد الاضحى المبارك';
        // }elseif (condition) {
        // }
        // تحويل التاريخ الميلادي إلى التاريخ الهجري

        // $time_attendees->locale('ar')->formatLocalized('%A %d %B %Y');
        // return $dateHijri;
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
