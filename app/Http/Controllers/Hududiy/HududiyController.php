<?php

namespace App\Http\Controllers\Hududiy;

use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;

class HududiyController extends Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function renderOutput($hiddens = false){
        if($hiddens) $this->vars = Arr::add($this->vars,'hasHiddens', true);
        return $this->baseRenderOutput('hududiy');
    }
}
