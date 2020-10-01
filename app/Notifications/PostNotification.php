<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostNotification extends Notification
{
    use Queueable;
    protected $post;

    public function __construct($post){
        $this->post = $post;
    }
    
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase(){

    }
    public function toArray($notifiable)
    {
        return [
            'data'=>'We Have New Post'.$this->post->title.'Added By'.auth()->user()->name
        ];
    }
}
