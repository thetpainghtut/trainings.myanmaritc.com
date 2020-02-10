<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    //
    protected $table = 'staffs';

    protected $fillable = [
        'dob','fathername','nrc','phone','photo','joineddate','leavedate','status', 'location_id','user_id'
    ];
}
