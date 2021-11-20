<?php

namespace App\Http\Livewire\Settings;

use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LocalizationsSettingsForm extends Component
{
    public $state = [];

    public $timezone;

    public function mount()
    {
        $this->state = $this->setting->withoutRelations()->toArray();
    }

    public function updateLocalizationSettings()
    {
        $this->setting->user_id = Auth::id();
        $this->setting->date_format = $this->state['date_format'];
        $this->setting->time_format = $this->state['time_format'];
        $this->setting->timezone = $this->state['timezone'];
        $this->setting->currency = $this->state['currency'];
        $this->setting->save();

        $this->emit('saved');
    }

    public function getSettingProperty()
    {
        return Setting::getSettings();
    }

    public function render()
    {
        return view('settings.localizations-settings-form');
    }
}
