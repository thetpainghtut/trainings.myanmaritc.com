<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['questiontext','photo','type','timer','quiz_id','user_id',];
}
