<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;

use Laravel\Sanctum\HasApiTokens;
use App\Models\ReqeDataCommonchan;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded=[];
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'numberphone',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'roles_name' => 'array',
    ];
    

    public function commondata(){
        return $this->hasOne(CommonData::class);
    }
    public function cardpersonanew(){
        return $this->hasOne(CardPersonaNew::class);
    }
    public function carddamagerenewal(){
        return $this->hasOne(CardDamageRenewal::class);
    }
    public function reqchangedatacommon(){
        return $this->hasOne(ReqChangeDataCommon::class);
    }
    public function birthrestriction(){
        return $this->hasOne(BirthRestriction::class);
    }
    public function logmarriage(){
        return $this->hasOne(LogMarriage::class);
    }
    public function logdivorce(){
        return $this->hasOne(LogDivorce::class);
    }
    public function correctioninstrevconstr(){
        return $this->hasOne(CorrectionInstRevConstr::class);
    }
    public function deathstatement(){
        return $this->hasOne(DeathStatement::class);
    }
    public function familycard(){
        return $this->hasOne(FamilyCard::class);
    }
    
}
