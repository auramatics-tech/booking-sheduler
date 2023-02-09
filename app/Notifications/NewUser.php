<?php

namespace App\Notifications;

use App\Inovice;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class NewUser extends Notification
{
    use Queueable;

    private $user_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public function __construct($user_id)
    {
        $this->user_id = $user_id;
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

        $user = User::find($this->user_id);
        $url =  url('/login');
        $msg = "
        안녕하세요, $user->name 님.
        XDEnglish에 등록 해 주셔서 감사합니다!
        등록을 확인하려면 아래 링크를 클릭하십시오.
        ";
        // ->line($msg)
        //  ->line("안녕하세요, $user->name 님")


        return (new MailMessage)
            ->greeting('안녕하세요  ' . $user->name . '님')
            ->subject('주셔서 감사합니다!')
            ->line('XDEnglish에 등록 해 주셔서 감사합니다!')
            ->line('등록을 확인하려면 아래 링크를 클릭하십시오.')
            ->action('로그 인', $url)
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
            'title'   =>  '주셔서 감사합니다!',
            'body'   =>  'Account registered successfully.',
            'user_id' => $this->user_id,
        ];
    }

    public function toDatabase($notifiable)
    {
        return [

            //'data' => $this->details['body']


        ];
    }
}
