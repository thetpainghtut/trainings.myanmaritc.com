<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquire extends Model
{
    //
     protected $fillable = [
        'inquireno', 'receiveno', 'name', 'gender', 'phno', 'installmentdate', 'installmentamount', 'knowledge',  'camp', 'education_id', 'acceptedyear', 'batch_id', 'township_id', 'user_id'
    ];
}
