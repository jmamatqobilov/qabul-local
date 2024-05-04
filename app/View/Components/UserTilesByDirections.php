<?php

namespace App\View\Components;

use App\Repositories\ApplicationsRepository;
use App\Repositories\DirectionsRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class UserTilesByDirections extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    protected $app_rep;
    protected $dir_rep;
    private $applications_by_direction;
    public function __construct(ApplicationsRepository $app_rep, DirectionsRepository $dir_rep)
    {
        $this->app_rep = $app_rep;
        $this->dir_rep = $dir_rep;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $directions = $this->dir_rep->simpleGet();
        foreach ($directions as $direction){
            if(isset(Auth::user()->territory))
                $direction->itemscount =
                    $this->app_rep->getcount([
                        'direction_id' => $direction->id,
                        'hududiy_id' => Auth::user()->territory->id
                    ]);
            else
                $direction->itemscount =
                    $this->app_rep->getcount([
                        'direction_id' => $direction->id,
                        'owner_id' => Auth::user()->id
                    ]);
            switch($direction->code){
                case 't': $direction->icon = 'wifi'; break;
                case 'r': $direction->icon = 'tv'; break;
                case 's': $direction->icon = 'database'; break;
                default: $direction->icon = 'smartphone'; break;
            }
        }
        return view('components.user-tiles-by-directions', ['directions'=>$directions]);
    }
}
