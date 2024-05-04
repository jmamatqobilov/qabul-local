<?php

namespace App\View\Components;

use App\Models\Direction;
use App\Models\DObjectType;
use App\Models\Endpoint;
use App\Repositories\ApplicationsRepository;
use App\Repositories\DirectionsRepository;
use App\Repositories\TerritoriesRepository;
use App\Repositories\UsersRepository;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class UknStatsOfDirection extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    protected $app_rep;
    protected $usr_rep;
    protected $dir_rep;
    protected $ter_rep;
    public $array_head = [];
    public $array_data = [];
    public $array_reg_data = [];
    public $userRole;
    public $territories;
    public $object_types;
    public $object_type_endpoint_fields;
    public $stats = false;
    public $head = false;
    public $export = false;
    public $filters = [];
    public $timelimits = [];

    public function __construct(UsersRepository $usr_rep, DirectionsRepository $dir_rep, TerritoriesRepository $ter_rep, $export = false)
    {
        $this->usr_rep = $usr_rep;
        $this->dir_rep = $dir_rep;
        $this->ter_rep = $ter_rep;
        $this->export = $export;

        $currentDirection = false;
        $currentTerritory = false;

        $this->territories = $this->ter_rep->getToList();
        $this->validateRequest();
        $thisUser = Auth::user();
        $this->userRole = $thisUser->roles->first();

        if ($thisUser->direction) {
            $currentDirection = $thisUser->direction;
        } else {
            if ($this->getFilterCurrent('s-direction')) {
                $currentDirection = $this->dir_rep->one($this->getFilterCurrent('s-direction'));
            }
//            $currentDirection = Direction::all();
            $this->directionFilter();
        }

        if (Auth::user()->territory) {
            $currentTerritory = $thisUser->territory;
        } else {
            if ($this->getFilterCurrent('s-territory')) {
                $currentTerritory = $this->ter_rep->one($this->getFilterCurrent('s-territory'));
            }
            $this->territoryFilter();
        }

        $this->subjectFilter();
        $this->timeFilter();
        
        if ($currentDirection) {
            $this->object_types = Arr::pluck($currentDirection->object_types->toArray(), 'name', 'id');
            $this->object_type_endpoint_fields = Arr::pluck($currentDirection->object_types->toArray(), 'endpoint_fields', 'id');
//            dd($this->object_type_endpoint_fields);
            foreach ($this->object_type_endpoint_fields as $key => $endpoint_field)
                $this->object_type_endpoint_fields[$key] = json_decode($endpoint_field, true);
//                dd($this->object_type_endpoint_fields[$key]);
//            DObjectType::where();
            $lines = Endpoint::where('object_type_id', 6)->get();
//            dd($lines);
            $this->stats = $this->dir_rep->stats(
                $currentDirection,
                ( $this->getFilterCurrent('se-by-time') ? $this->timelimits[$this->getFilterCurrent('se-by-time')] : false ),
                $currentTerritory
            );
//            dd($this->stats);

            $max = 0;

            foreach ($this->stats as $regId => $stat) {
                foreach ($stat as $key => $item) {
                    if (!array_key_exists($key, $this->array_data)) {
                        $this->array_data[$key] = $item;
                    }
                    $this->array_reg_data[$regId][$key] = $item;
                    $this->array_head[$key][] = $regId;
                }

                if (count($stat) > $max) {
                    $this->head = $stat;
                    $max = count($stat);
                }
            }
//            dd($this->array_data);
        }
    }

    public function validateRequest()
    {
        $validated = request()->validate([
            's-direction' => 'exclude_if:s-direction,clear|numeric|exists:directions,id',
            'se-by-time' => 'exclude_if:se-by-time,clear|in:f-clear,week,month,quarter,year,custom',
            's-subject' => 'exclude_if:s-subject,clear|numeric|exists:users,id',
        ]);
    }

    protected function directionFilter()
    {
        $this->filters[] = [
            'name' => 'By direction',
            'code' => 's-direction',
            'list' => Arr::prepend($this->dir_rep->getToList()->toArray(), __('f-clear'), 'clear'),
            'current' => $this->getFilterCurrent('s-direction')
        ];
    }

    protected function territoryFilter()
    {
        $this->filters[] = [
            'name' => 'By territory',
            'code' => 's-territory',
            'list' => Arr::prepend($this->ter_rep->getToList()->toArray(), __('f-clear'), 'clear'),
            'current' => $this->getFilterCurrent('s-territory')
        ];
    }

    protected function subjectFilter()
    {
        $this->filters[] = [
            'name' => 'By subject',
            'code' => 's-subject',
            'list' => Arr::prepend($this->usr_rep->getSubjectsToList()->toArray(), __('f-clear'), 'clear'),
            'current' => $this->getFilterCurrent('s-subject')
        ];

//        dd($this->usr_rep->getSubjectsToList()->toArray());
    }

    protected function timeFilter()
    {
        $this->filters[] = [
            'name' => 'By time',
            'code' => 'se-by-time',
            'list' => ['clear' => 'f-clear', 'week' => 'week', 'month' => 'month', 'quarter' => 'quarter', 'year' => 'year', 'custom' => 'custom'],
            'current' => $this->getFilterCurrent('se-by-time')
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

    public function getFilterCurrent($code)
    {
        if (
            !request()->filled($code . '-clear') &&
            request()->get($code . '-clear') != 'clear' &&
            request()->filled($code) &&
            request()->get($code) != 'clear'
        ) {
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
        return view('components.ukn-stats-of-direction');
    }
}
