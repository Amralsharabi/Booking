<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\CommonData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function showRegistrationForm()
    {
        $user = CommonData::where('user_id',Auth::id())->pluck('user_id')->first();
        $provinces = DB::table('provinces')->get();
        $directorates = DB::table('directorates')->get();
        $countrie_nationalits = DB::table('countrie_nationalits')->get();
        $religions = DB::table('religions')->get();
        $social_status = DB::table('social_status')->get();
        $certificates = DB::table('certificates')->get();
        $specialties = DB::table('specialties')->get();
        $professions = DB::table('professions')->get();
        $jihat_works = DB::table('jihat_works')->get();
    
        // if(!empty($user)){
        //         if ($user == Auth::id()) {
        //             return view('index');
        //         }
        // }
        return view('auth.register', compact(
            'provinces',
            'directorates',
            'countrie_nationalits',
            'religions',
            'social_status',
            'certificates',
            'specialties',
            'professions',
            'jihat_works',
            'user',
        ));
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'numberphone' => ['required', 'regex:/^((\+|00)\d{1,3})?\s?[67]\d{8}$/'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // $req_fore_na = $data['req_fore_na'];
        // $req_second_na = $data['req_second_na'];
        // $req_third_na = $data['req_third_na'];
        // $req_tit = $data['req_tit'];
        
        // if (CommonData::where('req_fore_na', $req_fore_na)->where('req_second_na', $req_second_na)->where('req_third_na', $req_third_na)->where('req_tit', $req_tit)->count() > 0) {
        //     return back()->withInput()->withErrors(['message'=>'هناك نفس هذا الاسم بالفعل.', 400]);
        // }else{


    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'numberphone' => $data['numberphone'],
        'password' => Hash::make($data['password']),
    ]);
    $commonData = CommonData::create([
        'user_id' => $user->id,
        'req_fore_na' => $data['req_fore_na'],
        'req_second_na' => $data['req_second_na'],
        'req_third_na' => $data['req_third_na'],
        'req_tit' => $data['req_tit'],
        'nationality_req_id' => $data['nationality_req_id'],
        'father_fore_na' => $data['father_fore_na'],
        'father_second_na' => $data['father_second_na'],
        'father_third_na' => $data['father_third_na'],
        'father_tit' => $data['father_tit'],
        'nationality_father_id' => $data['nationality_father_id'],
        'mother_fore_na' => $data['mother_fore_na'],
        'mother_second_na' => $data['mother_second_na'],
        'mother_third_na' => $data['mother_third_na'],
        'mother_tit' => $data['mother_tit'],
        'nationality_mother_id' => $data['nationality_mother_id'],
        'gender' => $data['gender'],
        'date_pirth_ad' => $data['date_pirth_ad'],
        'date_pirth_he' => $data['date_pirth_he'],
        'countrie_birth_id' => $data['countrie_birth_id'],
        'province_birth_id' => $data['province_birth_id'],
        'directorate_pirth_id' => $data['directorate_pirth_id'],
        'village_parth' => $data['village_parth'],
        'religions_id' => $data['religions_id'],
        'social_statu_id' => $data['social_statu_id'],
        'learning_condition' => $data['learning_condition'],
        'certificate_id' => $data['certificate_id'],
        'specialtie_id' => $data['specialtie_id'],
        'profession_id' => $data['profession_id'],
        'jihat_work_id' => $data['jihat_work_id'],
        'countrie_accom_id' => $data['countrie_accom_id'],
        'province_accom_id' => $data['province_accom_id'],
        'directorate_accom_id' => $data['directorate_accom_id'],
        'village_accom' => $data['village_accom'],
        'neigh_accom' => $data['neigh_accom'],
        'street_accom' => $data['street_accom'],
        'house_accom' => $data['house_accom'],
        'num_phone' => $data['num_phone'],
    ]);
    event(new Registered($user));

    return $user;
    // $this->guard()->login($user);
    // redirect()->route('form_card_per');
// }
    }
}
