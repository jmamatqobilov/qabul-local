<?php

namespace App\Notifications;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\MailMessage as MailMessageAlias;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class ApplicationClosed extends Notification implements ShouldQueue
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
        return (new MailMessageAlias)
            ->subject(__('In qabul system your Application #:application is successfully closed!', ['application'=>$this->application->id]))
            ->line(__('In qabul system your Application #:application is successfully closed!', ['application'=>$this->application->id]))
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
            'message' => 'notifications.application_closed',
            'group' => 'applications',
            'label' => 'success'
        ];
    }
}
