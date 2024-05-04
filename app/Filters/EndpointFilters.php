<?php


namespace App\Filters;


use App\Repositories\DictionariesRepository;
use App\Repositories\DirectionsRepository;
use App\Repositories\ObjectTypesRepository;
use App\Repositories\TerritoriesRepository;
use App\Repositories\UsersRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class EndpointFilters extends Filter
{
    protected $obj_type_rep;
    protected $dics_rep;
    protected $dir_rep;
    protected $ter_rep;
    protected $usr_rep;

    public function __construct(
        ObjectTypesRepository $obj_type_rep,
        DictionariesRepository $dics_rep,
        DirectionsRepository $dir_rep,
        TerritoriesRepository $ter_rep,
        UsersRepository $usr_rep,
        $query = false)
    {
        $this->obj_type_rep = $obj_type_rep;
        $this->dics_rep = $dics_rep;
        $this->dir_rep = $dir_rep;
        $this->ter_rep = $ter_rep;
        $this->dics_rep = $dics_rep;
        $this->usr_rep = $usr_rep;

        if($query) {
            $this->query = $query;
            $this->objectType();
        }
    }

    protected function detectDirection(){
        if (Auth::user()->direction)
            return Auth::user()->direction;
        if ($this->getFilterCurrent('e-direction'))
            return $this->dir_rep->one($this->getFilterCurrent('e-direction'));
        return false;
    }

    public function drawFilter($direction = true, $subject = true, $objectType = true, $wireType = true, $territory = true){
        $current_direction = $this->detectDirection();
        if($direction)
            $this->filters[] = [
                'name' => 'By direction',
                'code' => 'e-direction',
                'list' => Arr::prepend($this->dir_rep->getToList()->toArray(), __('f-clear'), 'clear'),
                'current' => $this->getFilterCurrent('e-direction')
            ];
        if($territory)
            $this->filters[] = [
                'name' => 'By territory',
                'code' => 'e-territory',
                'list' => Arr::prepend($this->ter_rep->getToList()->toArray(), __('f-clear'), 'clear'),
                'current' => $this->getFilterCurrent('e-territory')
            ];
        if($subject)
            $this->filters[] = [
                'name' => 'By subject',
                'code' => 'e-subject',
                'list' => Arr::prepend($this->usr_rep->getSubjectsToList()->toArray(), __('f-clear'), 'clear'),
                'current' => $this->getFilterCurrent('e-subject')
            ];
        if($objectType &&
            (
                $current_direction &&
                (
                    $current_direction->code == 't' ||
                    $current_direction->code == 's'
                )
            )
        )
            $this->filters[] = [
                'name' => 'By Object type',
                'code' => 'e-object-type',
                'list' => Arr::prepend($this->obj_type_rep->getToListOfDirection($current_direction)->toArray(), __('f-clear'), 'clear'),
                'current' => $this->getFilterCurrent('e-object-type')
            ];
        if(
            $wireType &&
            (
                $current_direction &&
                (
                    $current_direction->code == 't' ||
                    $current_direction->code == 's'
                )
            )
        )
            $this->filters[] = [
                'name' => __('By Cable Type'),
                'code' => 'e-cable-type',
                'list' => Arr::prepend($this->dics_rep->oneByCode($current_direction->code.'_cable_type')->values->pluck('name','id')->toArray(), __('f-clear'), 'clear'),
                'list' => Arr::prepend($this->dics_rep->oneByCode($current_direction->code.'_cable_vols')->values->pluck('name','id')->toArray(), __('f-clear'), 'clear'),
                'current' => $this->getFilterCurrent('e-cable-type')
            ];
        return $this->filters;
    }

    public function getFilterCurrent($code){
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

    public function activateFilter($query){
        if($query) {
            $this->query = $query;
        }
        $this->validateRequest();
        $this->objectType();
        $this->cableType();
        $this->subject();
        $this->direction();
        $this->territory();
        return $this->query;
    }

    public function validateRequest(){
        $validated = request()->validate([
            'e-object-type' => 'exclude_if:e-object-type,clear|numeric|exists:d_object_types,id',
            'e-cable-type' => 'exclude_if:e-cable-type,clear|numeric|exists:dictionary_values,id',
            'e-direction' => 'exclude_if:e-direction,clear|numeric|exists:directions,id',
            'e-territory' => 'exclude_if:e-territory,clear|numeric|exists:territories,id',
            'e-subject' => 'exclude_if:e-subject,clear|numeric|exists:users,id',
        ]);
    }

    protected function objectType($query = false){
        if($query)
            $this->query = $query;
        if($this->getFilterCurrent('e-object-type'))
            $this->query->where('object_type_id', $this->getFilterCurrent('e-object-type'));
    }

    protected function direction($query = false){
        if($query)
            $this->query = $query;
        if($this->getFilterCurrent('e-direction'))
            $this->query->whereHas('application', function($q){
                    $q->where('direction_id', '=', $this->getFilterCurrent('e-direction'));
            });
    }

    protected function territory($query = false){
        if($query)
            $this->query = $query;
        if($this->getFilterCurrent('e-territory'))
            $this->query->whereHas('application', function($q){
                $q->where('hududiy_id', '=', $this->getFilterCurrent('e-territory'));
            });
    }

    protected function subject($query = false){
        if($query)
            $this->query = $query;
        if($this->getFilterCurrent('e-subject'))
            $this->query->whereHas('application', function($q){
                $q->where('owner_id', '=', $this->getFilterCurrent('e-subject'));
            });
    }

    protected function cableType($query = false){
        if($query)
            $this->query = $query;
        if($this->getFilterCurrent('e-cable-type'))
            $this->query->where('ts_cable_vols', $this->getFilterCurrent('e-cable-type'));

    }

    public function getQuery(){
        return $this->query;
    }
}
