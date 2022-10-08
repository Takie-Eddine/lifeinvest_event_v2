<?php

namespace App\Notifications;

use App\Models\Investor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvestorNotification extends Notification
{
    use Queueable;

    private  $investor;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Investor $investor)
    {
        $this-> investor = $investor ;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        //return ['mail'];
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    // public function toArray($notifiable)
    // {
    //     return [
    //         //
    //     ];
    // }



    public function toDatabase($notification){
        return[
            //'data' => $this->details['body'],
            'id' => $this->investor->id,
            'title' => 'New Investor',
            'first_name' => $this->investor->first_name ,
            'last_name' => $this->investor->last_name,
        ];
    }
}
