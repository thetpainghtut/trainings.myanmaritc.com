<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    protected $fillable = ['answer','rightanswer','question_id'];

    public function responsedetail($value='')
    {
    	return $this->hasOne('App\Responsedetail');
    }
}
