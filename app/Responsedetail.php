<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsedetail extends Model
{
    protected $fillable = ['check_id','question_id','response_id'];

    public function response($value='')
    {
    	return $this->belongsTo('App\Response');
    }
}
