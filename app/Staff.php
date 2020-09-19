<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use SoftDeletes;

    protected $table = 'staffs';

    protected $fillable = [ 'dob', 'fathername', 'nrc', 'phone', 'photo', 'joineddate', 'leavedate', 'status', 'location_id', 'user_id'
    ];

    public function location()
    {
        return $this->belongsTo("App\Location");
    }

    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function teacher()
    {
    	return $this->hasMany("App\Teacher");
    }

     public function mentor()
    {
        return $this->hasMany("App\Mentor");
    }

}
