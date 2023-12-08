<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Province extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded=[];

    public function countrieNationalit()
    {
        return $this->belongsTo(CountrieNationalit::class);
    }

    public function directorate()
    {
        return $this->hasMany(Directorate::class);
    }
}
