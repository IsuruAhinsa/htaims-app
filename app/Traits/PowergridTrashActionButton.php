<?php

namespace App\Traits;

use PowerComponents\LivewirePowerGrid\Button;

trait PowergridTrashActionButton {

    public array $actionRoutes = [];

    public array $actionHeader = [];

    public array $actions = [];

    public function initActions()
    {
        $this->actions = collect($this->actions())
            ->where('can', true)
            ->toArray();

        /** @var Button $action */
        foreach ($this->actions as $action) {
            if (isset($action->route)) {
                $this->actionRoutes[$action->action] = $action->route;
            }
        }
    }

    public function actions(): array
    {
        $deleteSVGCaption = '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>';

        $restoreSVGCaption = '<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.33929 4.46777H7.33929V7.02487C8.52931 6.08978 10.0299 5.53207 11.6607 5.53207C15.5267 5.53207 18.6607 8.66608 18.6607 12.5321C18.6607 16.3981 15.5267 19.5321 11.6607 19.5321C9.51025 19.5321 7.58625 18.5623 6.30219 17.0363L7.92151 15.8515C8.83741 16.8825 10.1732 17.5321 11.6607 17.5321C14.4222 17.5321 16.6607 15.2935 16.6607 12.5321C16.6607 9.77065 14.4222 7.53207 11.6607 7.53207C10.5739 7.53207 9.56805 7.87884 8.74779 8.46777L11.3393 8.46777V10.4678H5.33929V4.46777Z" fill="currentColor" /></svg>';

        return [
            Button::add('restore')
                ->caption(__($restoreSVGCaption))
                ->emit('confirmRestore', ['key' => 'id']),

            Button::add('destroy')
                ->caption(__($deleteSVGCaption))
                ->emit('confirmForceDeletion', ['key' => 'id']),
        ];
    }

    public function header(): array
    {
        return [];
    }

}
