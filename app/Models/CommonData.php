<?php

namespace App\Models;

use App\Models\CountrieNationalit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

// use Illuminate\Contracts\Auth\Authenticatable;

class CommonData extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function nationality_req(){
        return $this->belongsTo(CountrieNationalit::class, 'nationality_req_id');
    }
    public function nationality_father(){
        return $this->belongsTo(CountrieNationalit::class, 'nationality_father_id');
    }
    public function nationality_mother(){
        return $this->belongsTo(CountrieNationalit::class, 'nationality_mother_id');
    }
    public function countrie_birth(){
        return $this->belongsTo(CountrieNationalit::class, 'countrie_birth_id');
    }
    public function province_birth(){
        return $this->belongsTo(Province::class, 'province_birth_id');
    }
    public function directorate_pirth(){
        return $this->belongsTo(Directorate::class, 'directorate_pirth_id');
    }
    public function religions(){
        return $this->belongsTo(Religion::class, 'religions_id');
    }
    public function social_statu(){
        return $this->belongsTo(SocialStatu::class, 'social_statu_id');
    }
    public function certificate(){
        return $this->belongsTo(Certificate::class, 'certificate_id');
    }
    public function specialtie(){
        return $this->belongsTo(Specialtie::class, 'specialtie_id');
    }
    public function profession(){
        return $this->belongsTo(Profession::class, 'profession_id');
    }
    public function jihat_work(){
        return $this->belongsTo(JihatWork::class, 'jihat_work_id');
    }
    public function countrie_accom(){
        return $this->belongsTo(CountrieNationalit::class, 'countrie_accom_id');
    }
    public function province_accom(){
        return $this->belongsTo(Province::class, 'province_accom_id');
    }
    public function directorate_accom(){
        return $this->belongsTo(Directorate::class, 'directorate_accom_id');
    }
    public function Card_persona_new(){
        return $this->belongsTo(CardPersonaNew::class);
    }

    // public static function getNames($term)
    // {
    //     return CommonData::where('req_fore_na', 'LIKE', '%'.$term.'%')->pluck('req_fore_na');
    // }
    public static function getNames($term)
    {
        return CommonData::where('req_fore_na', 'LIKE', '%'.$term.'%')
            ->orWhere('req_second_na', 'LIKE', '%'.$term.'%')
            ->select(DB::raw("CONCAT(req_fore_na, ' - ',req_second_na) AS value"), 'req_third_na')
            ->get();
            // ->map(function ($item) {
            //     // return $item->req_fore_na.' - '.$item->req_second_na;
            // });
    }

    public static function getUserData($name)
    {
        return CommonData::where('req_fore_na', $name)->first();
    }
}
