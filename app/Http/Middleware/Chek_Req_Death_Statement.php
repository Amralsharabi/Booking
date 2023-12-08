<?php

namespace App\Http\Middleware;

use App\Models\DeathStatement;
use Closure;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Chek_Req_Death_Statement
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
        $user = User::find(Auth::id())->deathstatement;
        if(DeathStatement::where('user_id', Auth::id())->count()){
            $now = Carbon::now();
                $expiresAt = Carbon::parse($user->max('created_at'))->addDay();
                $diff = $now->diff($expiresAt);
                $remainingTime = $diff->invert ? '00:00:00' : $diff->format(' %H ساعة |%I دقيقة |%S ثانية');
                if($remainingTime == '00:00:00'){
                    return $next($request);
                }
                    return redirect()->route('home')->with('warning', "لقد تجاوزت عدد الطلبات المسموح لك بها اليوم لشهادة الوفاة يمكنك المحاولة بعد:  $remainingTime");
            }
        return $next($request);
    }
}
