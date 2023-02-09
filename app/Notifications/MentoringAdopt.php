<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Comento\SensAlimtalk\SensAlimtalkChannel;
use Comento\SensAlimtalk\SensAlimtalkMessage;

class MentoringAdopt extends Notification
{
    use Queueable;

    private $mobiles;
    private $weblink_url;

    public function __construct($mobiles, $weblink_url)
    {
        $this->mobiles = $mobiles;
        $this->weblink_url = $weblink_url;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [SensAlimtalkChannel::class];
    }

    public function toSensAlimtalk($notifiable)
    {
        return (new SensAlimtalkMessage())
            ->templateCode('adopt')
            ->to($this->mobiles)
            ->content('축하합니다!
현직자님의 답변이 채택되었습니다!
어떤 답변인지 확인하러 가볼까요?')
            ->button(['type' => 'WL', 'name' => '지금 보러가기', 'linkMobile' => $this->weblink_url, 'linkPc' => $this->weblink_url])
            ->utmSource('utm_source=crm-kakao&utm_medium=alimtalk&utm_campaign=mentoring-adopt&utm_term=지금 보러가기&utm_content=');
    }
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
