<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Journal extends Model
{
    use SoftDeletes;

  	protected $fillable = ['title','content', 'file', 'type', 'user_id'];

  	public function user()
  	{
    	return $this->belongsTo('App\User');
  	}

  	public function subjects()
    {
        return $this->belongsToMany('App\Subject');
    }
}
