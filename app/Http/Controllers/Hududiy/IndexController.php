<?php

namespace App\Http\Controllers\Hududiy;

class IndexController extends HududiyController
{
    //
    public function __construct()
    {
        parent::__construct();
        $this->template = 'hududiy.index';
    }

    public function stats(){
        $this->title = __('Панель УзКомНазорат Худудий');
        $this->template = 'hududiy.stats';
        $this->icon = 'activity';
        return $this->renderOutput();
    }

    public function index(){
        $this->title = __('Панель Териториальной инспекции');
        return $this->renderOutput();
    }
}
