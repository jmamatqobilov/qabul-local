<?php

namespace App\View\Components;

use App\Models\ApplicationStatus;
use App\Repositories\ApplicationStatusesRepository;
use Illuminate\View\Component;

class Status extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $applicationStatus;
    protected $app_status_rep;
    public function __construct($applicationStatus, ApplicationStatusesRepository $app_status_rep)
    {
        $this->applicationStatus = $app_status_rep->one($applicationStatus);
        $this->app_status_rep = $app_status_rep;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.status', [
            'app_statuses' => $this->app_status_rep->simpleGet(true)
        ]);
    }
}
