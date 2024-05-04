<?php

namespace App\View\Components;

use App\Models\Application;
use Illuminate\View\Component;

class Inspections extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $application;
    public $inspections;
    public function __construct(Application $application)
    {
        $this->application = $application;
        $builder = $application->inspections();
        $this->inspections = $builder->paginate(10);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.application.inspections');
    }
}
