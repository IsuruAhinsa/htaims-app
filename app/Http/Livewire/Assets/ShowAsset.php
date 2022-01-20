<?php

namespace App\Http\Livewire\Assets;

use App\Models\Asset;
use Livewire\Component;

class ShowAsset extends Component
{
    public $asset;

    public function mount(Asset $asset)
    {
        $this->asset = $asset;
    }

    public function render()
    {
        return view('assets.show-asset');
    }
}
