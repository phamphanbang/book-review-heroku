<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $book;
    protected $action;
    protected $by_user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($book, $action, $by_user)
    {
        $this->book = $book;
        $this->action = $action;
        $this->by_user = $by_user;
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

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'book'=>$this->book->title,
            'by_user'=>$this->by_user->name,
            'action'=>$this->action,
        ];
    }
}
