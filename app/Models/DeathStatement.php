<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeathStatement extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];
    
    public function user(){
        return $this->hasMany(User::class);
    }
    public function common_data(){
        return $this->belongsTo(CommonData::class, 'common_data_id');
    }
    public function requeststatu(){
        return $this->belongsTo(RequestStatu::class, 'request_statu_id');
    }
    public function province(){
        return $this->belongsTo(Province::class, 'province_id');
    }
    public function directorate(){
        return $this->belongsTo(Directorate::class, 'directorate_id');
    }
    public function center(){
        return $this->belongsTo(CardVersionCenter::class, 'center_id');
    }
    public function ty_document(){
        return $this->belongsTo(TyDocument::class, 'ty_document_id');
    }
    public function card_version_center(){
        return $this->belongsTo(CardVersionCenter::class, 'card_version_center_id');
    }

}
