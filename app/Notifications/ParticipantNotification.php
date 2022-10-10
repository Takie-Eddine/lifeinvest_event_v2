<?php

namespace App\Notifications;

use App\Models\participant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ParticipantNotification extends Notification
{
    use Queueable;
    private  $participant;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(participant $participant)
    {
        $this-> participant = $participant ;
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
    public function toMail($notifiable)
    {
        // return (new MailMessage)
        //             ->line('The introduction to the notification.')
        //             ->action('Notification Action', url('/'))
        //             ->line('Thank you for using our application!');
    }

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
            'id' => $this->participant->id,
            'title' => 'New Participant',
            'first_name' => $this->participant->first_name ,
            'last_name' => $this->participant->last_name,
        ];
    }
}
