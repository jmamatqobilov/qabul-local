<?php

namespace App\Http\Controllers\Ukn;

use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;

class UknController extends Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function renderOutput($hiddens = false, $exports = false){
        if($hiddens) $this->vars = Arr::add($this->vars,'hasHiddens', true);
        if($exports) $this->vars = Arr::add($this->vars,'hasExport', $exports);
        return $this->baseRenderOutput('ukn');
    }
}
