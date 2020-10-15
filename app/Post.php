<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\PostNotification;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    use Notifiable;
    
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
}
