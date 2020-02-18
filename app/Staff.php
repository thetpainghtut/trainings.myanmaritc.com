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
    	return $this->hasOne("App\Teacher");
    }

     public function mentor()
    {
        return $this->hasOne("App\Mentor");
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
