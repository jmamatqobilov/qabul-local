<?php


namespace App\Filters;


use App\Repositories\DirectionsRepository;
use App\Repositories\ObjectTypesRepository;
use App\Repositories\TerritoriesRepository;
use App\Repositories\UsersRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class ObjectFilters extends Filter
{
    protected $obj_type_rep;
    protected $dir_rep;
    protected $ter_rep;
    protected $usr_rep;

    public function __construct(
        ObjectTypesRepository $obj_type_rep,
        DirectionsRepository $dir_rep,
        TerritoriesRepository $ter_rep,
        UsersRepository $usr_rep,
        $query = false)
    {
        $this->obj_type_rep = $obj_type_rep;
        $this->dir_rep = $dir_rep;
        $this->ter_rep = $ter_rep;
        $this->usr_rep = $usr_rep;

        if($query) {
            $this->query = $query;
            $this->objectType();
        }
    }

    protected function detectDirection(){
        if (Auth::user()->direction)
            return Auth::user()->direction;
        if ($this->getFilterCurrent('o-direction'))
            return $this->dir_rep->one($this->getFilterCurrent('o-direction'));
        return false;
    }

    public function drawFilter($direction = true, $subject = true, $objectType = true, $territory = true){
        $current_direction = $this->detectDirection();
        if($direction)
            $this->filters[] = [
                'name' => 'By direction',
                'code' => 'o-direction',
                'list' => Arr::prepend($this->dir_rep->getToList()->toArray(), __('f-clear'), 'clear'),
                'current' => $this->getFilterCurrent('o-direction')
            ];

        if($territory)
            $this->filters[] = [
                'name' => 'By territory',
                'code' => 'o-territory',
                'list' => Arr::prepend($this->ter_rep->getToList()->toArray(), __('f-clear'), 'clear'),
                'current' => $this->getFilterCurrent('o-territory')
            ];

        if($subject)
            $this->filters[] = [
                'name' => 'By subject',
                'code' => 'o-subject',
                'list' => Arr::prepend($this->usr_rep->getSubjectsToList()->toArray(), __('f-clear'), 'clear'),
                'current' => $this->getFilterCurrent('o-subject')
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
                'code' => 'o-object-type',
                'list' => Arr::prepend($this->obj_type_rep->getToListOfDirection($current_direction)->toArray(), __('f-clear'), 'clear'),
                'current' => $this->getFilterCurrent('o-object-type')
            ];
        return $this->filters;
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

    public function activateFilter($query){
        if($query) {
            $this->query = $query;
        }
        $this->validateRequest();
        $this->direction();
        $this->territory();
        $this->subject();
        $this->objectType();
        return $this->query;
    }

    public function validateRequest(){
        $validated = request()->validate([
            'o-object-type' => 'exclude_if:o-object-type,clear|numeric|exists:d_object_types,id',
            'o-direction' => 'exclude_if:o-direction,clear|numeric|exists:directions,id',
            'o-territory' => 'exclude_if:o-territory,clear|numeric|exists:territories,id',
            'o-subject' => 'exclude_if:o-subject,clear|numeric|exists:users,id',
        ]);
    }

    protected function objectType($query = false){
        if($query)
            $this->query = $query;
        if($this->getFilterCurrent('o-object-type'))
            $this->query->where('object_type_id', $this->getFilterCurrent('o-object-type'));
    }

    protected function direction($query = false){
        if($query)
            $this->query = $query;
        if($this->getFilterCurrent('o-direction'))
            $this->query->whereHas('application', function($q){
                $q->where('direction_id', '=', $this->getFilterCurrent('o-direction'));
            });
    }

    protected function territory($query = false){
        if($query)
            $this->query = $query;
        if($this->getFilterCurrent('o-territory'))
            $this->query->whereHas('application', function($q){
                $q->where('hududiy_id', '=', $this->getFilterCurrent('o-territory'));
            });
    }

    protected function subject($query = false){
        if($query)
            $this->query = $query;
        if($this->getFilterCurrent('o-subject'))
            $this->query->whereHas('application', function($q){
                $q->where('owner_id', '=', $this->getFilterCurrent('o-subject'));
            });
    }

    public function getQuery(){
        return $this->query;
    }
}
