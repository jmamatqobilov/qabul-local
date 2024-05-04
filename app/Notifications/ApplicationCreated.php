<?php

namespace App\Notifications;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class ApplicationCreated extends Notification implements ShouldQueue
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
        $url = url('/'.$notifiable->roles()->first()->code.'/applications/'.$this->application->id);
        return (new MailMessage)
            ->subject(__('In qabul for :direction user :owner added new Application.', ['direction' => $this->application->direction->name, 'owner'=>$this->application->owner->company_name]))
            ->line(__('In qabul for :direction user :owner added new Application.', ['direction' => $this->application->direction->name, 'owner'=>$this->application->owner->company_name]))
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
            'message' => 'notifications.application_created',
            'group' => 'applications',
            'label' => 'success'
        ];
    }
}
