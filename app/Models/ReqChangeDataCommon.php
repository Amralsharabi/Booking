<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReqChangeDataCommon extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];
    public function requeststatu(){
        return $this->belongsTo(RequestStatu::class, 'request_statu_id');
    }
    public function reqChangeDataCommonDas(){
        return $this->hasMany(ReqChangeDataCommonDa::class, 'req_change_data_common_id');
    }
}
