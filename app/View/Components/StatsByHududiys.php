<?php

namespace App\View\Components;

use App\Models\Application;
use App\Models\MObject;
use App\Models\TObject;
use App\Repositories\ApplicationsRepository;
use App\Repositories\TerritoriesRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class StatsByHududiys extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    protected $app_rep;
    protected $ter_rep;
    public $stats = [];
    public $export = false;
    public $filters = [];
    public $timelimits = [];
    public $summ = [
        'applications_created' => 0,
        'objects_created' => 0,
        'objects_deleted' => 0,
        'endpoints_created' => 0,
    ];
    public function __construct(ApplicationsRepository $app_rep, TerritoriesRepository $ter_rep, $export = false)
    {
        $this->app_rep = $app_rep;
        $this->ter_rep = $ter_rep;
        $this->export = $export;
        $where = false;
        $this->filtration();
        if(Auth::user()->direction)
            $where = ['direction_id' => Auth::user()->direction->id];
        if(Auth::user()->territory)
            $where = ['hududiy_id' => Auth::user()->territory->id];
//        dd($where);

        $hududiys = $app_rep->getGroupBy($where, [],false, $this->setDateFilters());
//        dd($hududiys); //47
        $this->getStats($hududiys->groupBy('hududiy_id'));
    }

    protected function setDateFilters(){
        if(
            $this->getFilterCurrent('s-by-time') &&
            array_key_exists($this->getFilterCurrent('s-by-time'), $this->timelimits)
        )
            return ['date' => 'created_at','term' => $this->timelimits[$this->getFilterCurrent('s-by-time')]];
        return false;
    }

    protected function filtration(){
        $this->filters[] = [
            'name' => 'By time',
            'code' => 's-by-time',
            'list' => ['f-clear','week','month','quarter','year','custom'],
            'current' => $this->getFilterCurrent('s-by-time')
        ];
        $this->timelimits['week'] = [
            Carbon::parse('last monday')->startOfDay(),
            Carbon::parse('next friday')->endOfDay(),
        ];
        $this->timelimits['month'] = [
            Carbon::parse('first day of this month')->startOfDay(),
            Carbon::parse('last day of this month')->endOfDay(),
        ];
        $this->timelimits['quarter'] = [
            Carbon::now()->startOfQuarter()->startOfDay(),
            Carbon::now()->endOfQuarter()->endOfDay(),
        ];
        $this->timelimits['year'] = [
            Carbon::now()->startOfYear()->startOfDay(),
            Carbon::now()->endOfYear()->endOfDay(),
        ];
        $this->timelimits['custom'] = [
            ($this->getFilterCurrent('s-date-from') ? $this->getFilterCurrent('s-date-from') : Carbon::now()->startOfMonth()->startOfDay()),
            ($this->getFilterCurrent('s-date-to') ? $this->getFilterCurrent('s-date-to') : Carbon::now()->endOfMonth()->endOfDay()),
        ];
    }

    protected function getStats($bulkdata){
//        $sumObjects = TObject::where('deleted_at', '=', null)->get();
//        dd($sumObjects);
//        dd($bulkdata);
        $counter = 0;
//        dd($bulkdata);
        foreach($bulkdata as $key=>$stat){
//            dd($stat);
            $hududiy = $this->ter_rep->one($key);
//            dd($hududiy);
            $this->stats[$key]['counter'] = ++$counter;
            $this->stats[$key]['name'] = $hududiy->name;

            $this->stats[$key]['applications_created'] = $stat->count();
            $this->summ['applications_created'] += $this->stats[$key]['applications_created'];

            $this->stats[$key]['objects_created'] = $stat->sum->numberOfObjects();
//            dd($this->stats[$key]['objects_created']);
            $this->summ['objects_created'] += $this->stats[$key]['objects_created'];
//            dd($this->stats);

            $this->stats[$key]['objects_deleted'] = $stat->sum->numberOfDeletedObjects();
            $this->summ['objects_deleted'] += $this->stats[$key]['objects_deleted'];

            $this->stats[$key]['endpoints_created'] = $stat->sum->numberOfEndpoints();
            $this->summ['endpoints_created'] += $this->stats[$key]['endpoints_created'];
        }
    }

    public function getFilterCurrent($code){
        if(
            !request()->filled($code.'-clear') &&
            request()->get($code.'-clear') != 'clear' &&
            request()->filled($code) &&
            request()->get($code) != 'clear'
        ){
            return request()->get($code);
        }
        return false;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.stats-by-hududiys');
    }
}
