<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    //
    protected $table = 'staff';

    protected $fillable = [
        'dob','fathername','nrc','phone','photo','joineddate','leavedate','status', 'location_id','user_id'
    ];


    public function teacher()
    {
    	return $this->hasMany("App\Teacher");
    }

     public function mentor()
    {
        return $this->hasMany("App\Mentor");
    }


    public function location()
    {
    	return $this->belongsTo("App\Location");
    }

    
    public function user()
    {
    	return $this->belongsTo("App\User");
    }

   

    
}
