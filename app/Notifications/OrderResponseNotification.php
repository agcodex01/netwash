<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderResponseNotification extends Notification
{
    use Queueable;

    public $laundryName;
    public $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($laundryName,$message)
    {
        $this->laundryName = $laundryName;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

   

    public function toDatabase($notifiable){
        return [
             'laundry_name' => $this->laundryName,
             'message' => $this->message
        ];
    }
}
