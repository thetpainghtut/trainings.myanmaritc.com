<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  	use SoftDeletes;

  	protected $fillable=['code_no', 'name', 'logo', 'outline', 'outline_photo', 'fees', 'during', 'duration'];

  	public function batches()
  	{
        return $this->hasMany('App\Batch');
  	}

    public function mentor()
    {
        return $this->hasOne('App\Mentor');
    }

    public function projecttypes()
    {
        return $this->belongsToMany('App\Projecttype');
    }

    public function subjects()
    {
        return $this->belongsToMany('App\Subject');
    }

    public function units()
    {
        return $this->hasMany('App\Unit');
    }
}