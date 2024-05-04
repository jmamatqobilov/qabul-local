<?php

namespace App\Notifications;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class ApplicationRefilled extends Notification implements ShouldQueue
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
        $url = url('/hududiy/applications/'.$this->application->id);
        return (new MailMessage)
            ->subject(__('In qabul user :user refilled his Application #:application', ['user' => $this->application->owner->company_name, 'application' => $this->application->id]))
            ->line(__('In qabul user :user refilled his Application #:application', ['user' => $this->application->owner->company_name, 'application' => $this->application->id]))
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
            'message' => 'notifications.application_refilled',
            'group' => 'applications',
            'label' => 'success'
        ];
    }
}
