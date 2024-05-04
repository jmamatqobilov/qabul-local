<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Notification extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $notifications;
    public function __construct()
    {
        $this->notifications = Auth::user()->unreadNotifications;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.notification');
    }
}
