<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class EntrysList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $entrys;
    public $counter = 1;
    public function __construct()
    {
        $this->entrys = Auth::user()->entryLogs()->paginate(20);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.entrys-list');
    }
}
