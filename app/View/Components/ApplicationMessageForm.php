<?php

namespace App\View\Components;

use App\Models\Application;
use Illuminate\View\Component;

class ApplicationMessageForm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $application;
    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.application-message-form');
    }
}
