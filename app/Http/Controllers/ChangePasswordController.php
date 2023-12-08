<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\TyDataReqChange;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function changePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'password' => 'required|string|min:8|confirmed',
    ],[
        'current_password.required' => 'يرجى تعبئة حقل كلمة المرور السابقة',
        'password.required' => 'يرجى تعبئة حقل كلمة المرور الجديدة',
        'password' => 'يجب أن تكون كلمة المرور 8 أحرف على الأقل',
        'password.confirmed' => 'خطاء تأكيد كلمة المرور لا تتطابق',
    ]);

    $user = Auth::user();
    $currentPassword = $user->password;
    if (Hash::check($request['current_password'], $currentPassword)) {
        $user->fill([
            'password' => Hash::make($request->password)
        ])->save();
        return redirect()->route('profiles.index')->with('changed', 'تم تغيير كلمة المرور بنجاح.');
    } else {
        return back()->withErrors(['current_password' => 'كلمة المرور الحالية غير صحيحة.']);
    }
}
}
