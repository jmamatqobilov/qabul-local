<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Gate;

class IndexController extends AdminController
{
    //
    public function __construct()
    {
        parent::__construct();
        $this->template = 'admin.index';
    }

    public function index(){
        if(Gate::denies('VIEW_ADMIN')){
            abort(403);
        }

        $this->title = __('Панель администратора');
        return $this->renderOutput();
    }
}
