<?php

namespace App\View\Components;

use App\Repositories\ApplicationsRepository;
use App\Repositories\DirectionsRepository;
use App\Repositories\TerritoriesRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class StatsByDirections extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    protected $app_rep;
    protected $dir_rep;
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
    public function __construct(ApplicationsRepository $app_rep, DirectionsRepository $dir_rep, $export = false)
    {
        $this->app_rep = $app_rep;
        $this->dir_rep = $dir_rep;
        $this->export = $export;
        $where = false;
        $this->filtration();
        if(Auth::user()->direction)
            $where = ['direction_id' => Auth::user()->direction->id];
        if(Auth::user()->territory)
            $where = ['hududiy_id' => Auth::user()->territory->id];

        $directions = $app_rep->getGroupBy($where, ['name'=>'status', 'field'=>'level', 'value'=> 20, 'operand'=> '>=', 'andvalue' => 34, 'operand2'=>'<'],false, $this->setDateFilters());
        $this->getStats($directions->groupBy('direction_id'));
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
//            dd(Carbon::parse('first day of this month')->startOfDay());
        $this->timelimits['month'] = [
            Carbon::parse('first day of this month')->startOfDay(),
            Carbon::parse('last day of this month')->endOfDay(),
        ]; // from the beginning of the current month
//            dd(Carbon::now()->startOfQuarter()->startOfDay());
        $this->timelimits['quarter'] = [
            Carbon::now()->startOfQuarter()->startOfDay(),
            Carbon::now()->endOfQuarter()->endOfDay(),
        ];// from the beginning of the current quarter
//            dd(Carbon::now()->startOfDecade()->startOfDay());
        $this->timelimits['year'] = [
            Carbon::now()->startOfYear()->startOfDay(),
            Carbon::now()->endOfYear()->endOfDay(),
        ]; // from the beginning of the current year
        $this->timelimits['custom'] = [
            ($this->getFilterCurrent('s-date-from') ? $this->getFilterCurrent('s-date-from') : Carbon::now()->startOfMonth()->startOfDay()),
            ($this->getFilterCurrent('s-date-to') ? $this->getFilterCurrent('s-date-to') : Carbon::now()->endOfMonth()->endOfDay()),
        ];
    }

    protected function getStats($bulkdata){
        $counter = 0;
        foreach($bulkdata as $key=>$stat){
            $direction = $this->dir_rep->one($key);
            $this->stats[$key]['counter'] = ++$counter;
            $this->stats[$key]['name'] = $direction->name;

            $this->stats[$key]['applications_created'] = $stat->count();
            $this->summ['applications_created'] += $this->stats[$key]['applications_created'];

            $this->stats[$key]['objects_created'] = $stat->sum->numberOfObjects();
            $this->summ['objects_created'] += $this->stats[$key]['objects_created'];

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
        return view('components.stats-by-directions');
    }
}
