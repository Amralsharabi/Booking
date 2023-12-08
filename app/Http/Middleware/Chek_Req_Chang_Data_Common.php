<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ReqeDataCommonchan;
use App\Models\ReqChangeDataCommon;
use Illuminate\Support\Facades\Auth;

class Chek_Req_Chang_Data_Common
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = User::find(Auth::id())->reqchangedatacommon;

        if(ReqChangeDataCommon::where('user_id', Auth::id())->whereDate('created_at', Carbon::today())->count()){
            $now = Carbon::now();
                $expiresAt = Carbon::parse($user->max('created_at'))->addDay();
                $diff = $now->diff($expiresAt);
                $remainingTime = $diff->invert ? '00:00:00' : $diff->format(' %H ساعة |%I دقيقة |%S ثانية');
                if($remainingTime == '00:00:00'){
                    return $next($request);
                }
                    return redirect()->route('profiles.index')->with('warning', "لقد تجاوزت عدد الطلبات المسموح لك بها اليوم يمكنك المحاولة بعد:  $remainingTime");
            }
                return $next($request);
            
    }
}
