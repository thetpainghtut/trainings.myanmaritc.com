<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title','projecttype_id'
    ];

    public function projecttype()
    {
    	return $this->belongsTo('App\Projecttype');
    }

    public function students()
	{
	    return $this->belongsToMany('App\Student');
	}
}
