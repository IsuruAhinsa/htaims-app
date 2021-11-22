<?php

namespace App\Http\Livewire\Partials;

use Livewire\Component;

class Sidebar extends Component
{
    protected $listeners = ['refreshSidebar' => '$refresh'];

    public function render()
    {
        return view('partials.sidebar');
    }
}
