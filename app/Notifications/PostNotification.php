<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostNotification extends Notification
{
    use Queueable;
    protected $postnoti;

    public function __construct($postnoti){
        $this->postnoti = $postnoti;
    }
    
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
             'id' => $this->postnoti['id'],
            'title' => $this->postnoti['title'],
            'topic_id' => $this->postnoti['topic_id'],
            'user_id' => $this->postnoti['user_id'],
            'batch_id' => $this->postnoti['batch']
        ];
    }
}
