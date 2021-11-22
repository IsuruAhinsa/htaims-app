<?php

namespace App\Http\Livewire\Settings;

use App\Models\Setting;
use Livewire\Component;
use Livewire\WithFileUploads;

class AppearanceSettingsForm extends Component
{
    use WithFileUploads;

    public $color;

    public $loginBackground;

    public $favicon;

    public $logo;

    public function mount()
    {
        $this->color = $this->setting->color;
    }

    protected $rules = [
        'loginBackground' => 'nullable|mimes:png,gif,jpg,jpeg,svg,bmp,svg+xml|max:10240',
        'logo' => 'nullable|mimes:png,gif,jpg,jpeg,svg,bmp,svg+xml|max:10240',
        'favicon' => 'nullable|mimes:png,gif,jpg,jpeg,svg,bmp,svg+xml',
    ];

    public function updateAppearanceSettings()
    {
        $this->resetErrorBag();

        $this->validate();

        if (isset($this->loginBackground)) {
            $this->setting->updatePhoto($this->loginBackground, 'loginBackground_path', 'img/settings/backgrounds');
        }

        if (isset($this->logo)) {
            $this->setting->updatePhoto($this->logo, 'logo_path', 'img/settings/logos');
        }

        if (isset($this->favicon)) {
            $this->setting->updatePhoto($this->favicon, 'favicon_path', 'img/settings/favicons');
        }

        $this->setting->color = $this->color ?? 'light';
        $this->setting->save();

        $this->emit('saved');

        $this->emit('refreshSidebar');
    }

    public function deleteLoginBackground()
    {
        $this->setting->deletePhoto('loginBackground_path');
    }

    public function deleteLogo()
    {
        $this->setting->deletePhoto('logo_path');

        $this->emit('refreshSidebar');
    }

    public function deleteFavicon()
    {
        $this->setting->deletePhoto('favicon_path');
    }

    public function getSettingProperty()
    {
        return Setting::getSettings();
    }

    public function render()
    {
        return view('settings.appearance-settings-form');
    }
}
