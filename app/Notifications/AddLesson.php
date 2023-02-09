<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Lesson;

class AddLesson extends Notification
{
    use Queueable;
    private $lesson_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($lesson_id)
    {
        $this->lesson_id = $lesson_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)

    {

        $url =  url('/dashboard/lessons') . "/" . $this->lesson_id;

        return (new MailMessage)
            ->subject('Add New Lesson')
            ->line('Add New Lesson')
            ->action('Show Lesson ', $url)
            ->line('XDEnglish');
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
            'title'   =>  'Add New Lesso!',
            'body'   =>  'Show Lesson',
            'user_id' => $this->lesson_id,
        ];
    }
}
