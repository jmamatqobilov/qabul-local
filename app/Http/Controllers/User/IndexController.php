<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;

class IndexController extends UserController
{
    public function __construct()
    {
        parent::__construct();
        $this->template = 'user.index';
    }

    public function index(){
        $this->title = __('Дашборд пользователя');
        return $this->renderOutput();
    }
}
