<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReqChangeDataCommonDa extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded=[];
    public function tydatareqchange(){
        return $this->belongsTo(TyDataReqChange::class, 'ty_data_req_change_id');
    }
    // public function reqchangedatacommonda(){
    //     return $this->belongsTo(ReqChangeDataCommonDa::class, 'req_chan_id');
    // }
    public function reqChangeDataCommon(){
        return $this->belongsTo(ReqChangeDataCommon::class);
    }
}
