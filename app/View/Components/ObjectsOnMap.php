<?php

namespace App\View\Components;

use App\Models\Application;
use App\Repositories\ObjectsRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;


class ObjectsOnMap extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $application;
    public $objects;
    public $userRole;
    public $filters;
    public $whole = false;
    public function __construct(Application $application = null, ObjectsRepository $obj_rep)
    {
//        dd($obj_rep);
        $thisUser = Auth::user();
//        dd('salam');
//        dd($thisUser->direction_id);
//        dd($application);
        if($application->direction) {
            $this->application = $application;
            $this->objects = $application->objects;
//            dd($this->objects);
        }else{
            $this->whole = true;
//            dd($this->whole); /* true */
            $this->filters = $obj_rep->getFilterInstance()->drawFilter(!$thisUser->direction);
        }
        $this->userRole = $thisUser->roles->first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
//dd($this->application,
//$this->objects,
//$this->userRole,
//$this->filters,
//$this->whole);
        return view('components.application.objects-on-map');
    }
}
