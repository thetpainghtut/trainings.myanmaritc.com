<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
<<<<<<< HEAD

class Post extends Model
{
    use SoftDeletes;
=======
use Illuminate\Notifications\PostNotification;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    use SoftDeletes,Notifiable;
>>>>>>> 1b1e106a77ff3874d04bdc42f006b7c5c86ca7f7
  	protected $fillable = ['title','content', 'file', 'topic_id', 'user_id'];

  	public function topic()
  	{
    	return $this->belongsTo('App\Topic');
  	}

  	public function user()
  	{
    	return $this->belongsTo('App\User');
  	}

  	public function batches()
  	{
    	return $this->belongsToMany('App\Batch');
  	}
<<<<<<< HEAD
=======

>>>>>>> 1b1e106a77ff3874d04bdc42f006b7c5c86ca7f7
}
