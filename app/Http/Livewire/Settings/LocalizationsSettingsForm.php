<?php

namespace App\Http\Livewire\Settings;

use App\Models\Setting;
use Livewire\Component;

class LocalizationsSettingsForm extends Component
{
    public $date_format;
    public $time_format;
    public $timezone;
    public $currency;

    public function mount()
    {
        $this->date_format = $this->setting->date_format;
        $this->time_format = $this->setting->time_format;
        $this->timezone = $this->setting->timezone;
        $this->currency = $this->setting->currency;
    }

    protected $rules = [
        'date_format' => 'required',
        'time_format' => 'required',
    ];

    public function updateLocalizationSettings()
    {
        $this->resetErrorBag();

        $this->validate();

        $this->setting->date_format = $this->date_format ?? 'Y-m-d';
        $this->setting->time_format = $this->time_format ?? 'h:i A';
        $this->setting->timezone = $this->timezone ?? config('app.timezone');
        $this->setting->currency = $this->currency ?? '$';
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
