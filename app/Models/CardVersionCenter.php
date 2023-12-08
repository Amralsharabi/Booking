<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CardVersionCenter extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded=[];
    
    public function directorate()
    {
        return $this->belongsTo(Directorate::class);
    }
}
