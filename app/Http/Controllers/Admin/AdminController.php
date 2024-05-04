<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function renderOutput(){
        return $this->baseRenderOutput('admin');
    }
}
