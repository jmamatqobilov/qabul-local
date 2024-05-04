<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function renderOutput($buttons = false, $hiddens = false, $useDictionary = false){
        if($buttons) $this->vars = Arr::add($this->vars,'hasButtons', $buttons);
        if($hiddens) $this->vars = Arr::add($this->vars,'hasHiddens', true);
        if($useDictionary) $this->vars = Arr::add($this->vars,'useDictionary', true);
        return $this->baseRenderOutput('user');
    }

    public function returnButtons($name){
        switch($name){
            case 'application_add':
                if($this->authorizeAction('GIVE_APPLICATION',false, true))
                    return [
                        [
                            'link' => route('user.applications.create'),
                            'name' => 'Add Application',
                            'class' => 'bg-success',
                            'icon' => 'plus'
                        ]
                    ];
            break;
        }
    }
}
