<?php

namespace App\Http\Controllers\Ukn;


use App\Exports\StatsExport;
use Maatwebsite\Excel\Facades\Excel;

class IndexController extends UknController
{
    //
    public function __construct()
    {
        parent::__construct();
        $this->template = 'ukn.index';
    }

    public function index(){
        $this->title = __('Панель УзКомНазорат');
        return $this->renderOutput();
    }

    public function stats(){
        $this->title = __('Панель УзКомНазорат');
        $this->template = 'ukn.stats';
        $this->icon = 'activity';
        return $this->renderOutput();
    }

    public function exports($option = 'stats-by-hududiys')
    {
//        dd('exports');
        $result = Excel::download(new StatsExport('exports.'.$option), __($option.'-title').'.xlsx');
        // return dd($result);
        return $result;
    }
}
