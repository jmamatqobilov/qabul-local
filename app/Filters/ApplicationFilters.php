<?php


namespace App\Filters;


use App\Repositories\DirectionsRepository;
use App\Repositories\TerritoriesRepository;
use Illuminate\Support\Arr;

class ApplicationFilters extends Filter
{
    protected $dir_rep;
    protected $ter_rep;
    public function __construct(DirectionsRepository $dir_rep, TerritoriesRepository $ter_rep, $query = false)
    {
        $this->dir_rep = $dir_rep;
        $this->ter_rep = $ter_rep;
        if($query) {
            $this->query = $query;
            $this->direction();
            $this->hududiy();
        }
    }

    public function drawFilter($direction = true, $hududiy = true){
        if($direction)
            $this->filters[] = [
                'name' => 'By direction',
                'code' => 'a-direction',
                'list' => Arr::prepend($this->dir_rep->getToList()->toArray(), __('f-clear'), 'clear'),
                'current' => $this->getFilterCurrent('a-direction')
            ];
        if($hududiy)
            $this->filters[] = [
                'name' => 'By hududiy',
                'code' => 'a-hududiy',
                'list' => Arr::prepend($this->ter_rep->getToList()->toArray(), __('f-clear'), 'clear'),
                'current' => $this->getFilterCurrent('a-hududiy')
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
        $this->hududiy();
        return $this->query;
    }

    public function validateRequest(){
        $validated = request()->validate([
            'a-direction' => 'exclude_if:a-direction,clear|numeric|exists:directions,id',
            'a-hududiy' => 'exclude_if:a-hududiy,clear|numeric|exists:territories,id'
        ]);
    }

    protected function direction($query = false){
        if($query)
            $this->query = $query;
        if($this->getFilterCurrent('a-direction'))
            $this->query->where('direction_id', $this->getFilterCurrent('a-direction'));
    }

    protected function hududiy($query = false){
        if($query)
            $this->query = $query;
        if($this->getFilterCurrent('a-hududiy'))
            $this->query->where('hududiy_id', $this->getFilterCurrent('a-hududiy'));
    }

    public function getQuery(){
        return $this->query;
    }
}
