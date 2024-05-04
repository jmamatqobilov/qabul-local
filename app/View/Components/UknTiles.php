<?php

namespace App\View\Components;

use App\Models\Application;
use App\Models\Document;
use App\Models\Endpoint;
use App\Models\TObject;
use App\Repositories\ApplicationsRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class UknTiles extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    protected $app_rep;
    public $stats = [];
    public function __construct(ApplicationsRepository $app_rep)
    {
        $this->app_rep = $app_rep;
        $where = false;
//        dd(Auth::user()->direction);
        if(Auth::user()->direction)
            $where = ['direction_id' => Auth::user()->direction->id];
//        dd($where);
        $this->stats['applications_in_week'] = $app_rep->getcount($where);
        $this->stats['objects_created'] = $app_rep->get(false,false, $where)->sum->numberOfObjects();
//        $this->stats['objects_deleted'] = $app_rep->get(false,false, $where)->sum->numberOfDeletedObjects();
        $this->stats['endpoints_created'] = $app_rep->get(false,false, $where)->sum->numberOfEndpoints();
//        dd($this->stats['endpoints_created']);

//        $nullApl = Application::where('hududiy_id', null)->get();
//        $nullApl = Application::where('deleted_at', null)->get();
//        dd($nullApl);

//        $apl = Application::where('direction_id', 1)->where('deleted_at', null)->get();
//        dd($apl);

//        $TObj = TObject::all();  // t obj 507
//        dd($TObj);

//        $allendp = Endpoint::where('deleted_at','!=', null)->get();
//        dd($allendp);
//        $endp = Endpoint::where('t_object_id', '!=', null)->get();  // t enp 458
//        dd($endp);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.ukn-tiles');
    }
}
