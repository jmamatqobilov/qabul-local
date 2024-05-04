<?php


namespace App\Filters;


class Filter
{
    protected $query;
    protected $filters = [];
    public function __construct($query)
    {
        $this->query = $query;
    }

    public function getQuery(){
        return $this->query;
    }
}
