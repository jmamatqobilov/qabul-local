<?php
namespace App\Repositories;

class Repository  {
    protected $model = false;
    protected $filter = false;
    public function get($use_paginate = true, $paginate = 20, $where = false, $relation = false, $orderBy = false, $groupBy = false, $relation2 = false){
//        dd($where);
        $builder = $this->model->select('*');
//        dd($builder);
        if($where)
            $builder->where($where);
//        dd($builder->get());
        if($relation)
            $builder = $this->relation($builder,$relation, $relation2);
        if($relation2)
            $builder = $this->relation($builder,$relation2, true);
        if($this->filter)
            $builder = $this->filter->activateFilter($builder);
        if($orderBy)
            $builder->orderBy($orderBy['field'], $orderBy['order']);
        else
            $builder->orderBy('id', 'DESC');
//        dd($builder->get());
        if(in_array('Illuminate\Database\Eloquent\SoftDeletes', class_uses($this->model)))
            $builder->whereNull('deleted_at');
        if($groupBy)
            $builder->groupBy($groupBy);
        if($use_paginate)
            return $builder->paginate($paginate);
//        dd($builder->get());
        return $builder->get();
    }
    public function simpleGet($orderBy = false){
        $builder = $this->model->select('*');
        if($orderBy)
            $builder->orderBy('id', 'asc');
        return $builder->get();
    }
    public function getFilterInstance(){
        return $this->filter;
    }
    public function getcount($where = false, $whereBetween = false, $relation = false){
//        dd($where);
        $builder = $this->model;
//        dd($where, $builder);
        if($where)
            $builder = $builder->where($where); // wtf. +4 here
//        dd($builder);
        if($whereBetween)
            $builder = $builder->whereBetween($whereBetween['date'],$whereBetween['term']);
        if($relation)
            $builder = $this->relation($builder,$relation);
//        dd($builder->count());
        return $builder->count();
    }
    protected function relation($builder, $relation, $second = false){
        if($second) $functionName = 'orWhereHas';
        else $functionName = 'whereHas';
        return $builder->$functionName($relation['name'], function($q) use ($relation){
            if(array_key_exists('operand', $relation))
                $q->where($relation['field'], $relation['operand'], $relation['value']);
            else
                if($relation['value'])
                    $q->where($relation['field'], $relation['value']);
                else
                    $q->whereNull($relation['field']);
            if(array_key_exists('orvalue', $relation))
                $q->orWhere($relation['field'], $relation['orvalue']);
            if(array_key_exists('andvalue', $relation))
                $q->where($relation['field'], $relation['operand2'], $relation['andvalue']);
        });
    }
    public function one($id) {
        return $this->model->where('id', $id)->first();
    }

    public function multiple($id)
    {
//        dd($id);
//        dd($this->model);
//        dd($this->model->where('id', $id)->get());
        return $this->model->where('id', $id)->get();
    }

    public function oneByCode($code) {
        return $this->model->where('code', $code)->first();
    }
    public function getToList($name = 'name', $key = 'id'){
        return $this->model->get()->pluck($name, $key);
    }
    public function getGroupBy($where = false, $relation = false, $groupBy = false, $whereBetween = false){
        $builder = $this->model;
        if($groupBy)
            $builder = $builder->select($groupBy);
        else $builder = $builder->select('*');
        if($where)
            $builder = $builder->where($where);
        if($whereBetween)
            $builder = $builder->whereBetween($whereBetween['date'],$whereBetween['term']);
        if($relation)
            $builder = $this->relation($builder,$relation);
        if($groupBy)
            $builder->groupBy($groupBy);
        return $builder->get();
    }
    public function getToListWhere($needle, $name = 'name', $key = 'id'){
        if(!is_array($needle)) $needle = [$needle];
        return $this->model->whereIn('id', $needle)->get()->pluck($name, $key);
    }
}
