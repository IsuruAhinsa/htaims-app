<?php

namespace App\Http\Livewire\Settings;

use App\Models\Setting;
use Livewire\Component;

class GeneralSettingsForm extends Component
{
    public $site_name;

    public function mount()
    {
        $this->site_name = $this->setting->site_name;
    }

    protected $rules = [
        'site_name' => 'nullable|min:2|max:100',
    ];

    public function updateGeneralSettings()
    {
        $this->resetErrorBag();

        $this->validate();

        if (is_null($this->site_name)) {
            $this->site_name = 'Healthtronics Assets Information Management System';
        }

        $this->setting->site_name = $this->site_name;
        $this->setting->save();

        $this->emit('saved');
    }

    public function getSettingProperty()
    {
        return Setting::getSettings();
    }

    public function render()
    {
        return view('settings.general-settings-form');
    }
}
