<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Education extends Model
{
    use SoftDeletes;
    
    protected $table = 'educations';
    
    protected $fillable = [
        'name', 'type', 'user_id'
    ];

    public function inquires()
    {
    	return $this->hasMany('App\Inquire');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
