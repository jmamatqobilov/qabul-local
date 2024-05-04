<?php

namespace App\Notifications;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage as MailMessageAlias;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class ApplicationDenied extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $application;
    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('/applications/'.$this->application->id.'/edit');
        return (new MailMessageAlias)
            ->subject(__('In qabul system :direction returned to refill your Application #:application', ['direction'=>$this->application->direction->name, 'application'=>$this->application->id]))
            ->line(__('In qabul system :direction returned to refill your Application #:application', ['direction'=>$this->application->direction->name, 'application'=>$this->application->id]))
            ->action(__('Go to application'), $url)
            ->line($notifiable->company_name.__(', we hope you will work better with our system!'));
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
            'id' => $this->application->id,
            'from' => Auth::user()->company_name,
            'message' => 'notifications.application_denied',
            'group' => 'applications',
            'label' => 'warning'
        ];
    }
}