<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class EntryBadge extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $entry;
    public function __construct()
    {
        $this->entry = Auth::user()->lastEntry();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.entry-badge');
    }
}
