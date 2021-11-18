<?php

namespace App\Http\Livewire\Settings;

use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class GeneralSettingsForm extends Component
{
    public $site_name;

    public function mount()
    {
        $this->site_name = Setting::getSettings()->site_name;
    }

    protected $rules = [
        'site_name' => 'nullable|min:2|max:100',
    ];

    public function updateGeneralSettings()
    {
        $this->resetErrorBag();

        $this->validate();

        $setting = Setting::getSettings();
        $setting->user_id = Auth::id();
        $setting->site_name = $this->site_name;
        $setting->save();

        $this->emit('saved');
    }

    public function render()
    {
        return view('settings.general-settings-form');
    }
}
