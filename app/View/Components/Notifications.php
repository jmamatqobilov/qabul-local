<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Notifications extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $notifications;
    public $unreadNotifications;
    public $user;
    public function __construct()
    {
        $this->user = Auth::user();
        $this->notifications = $this->user->notifications;
        $this->unreadNotifications = $this->user->unreadNotifications;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.notifications');
    }
}
