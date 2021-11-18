<x-settings-form-section submit="updateGeneralSettings">

    <x-slot name="title">
        {{ __('General Settings') }}
    </x-slot>

    <x-slot name="form">

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="site_name" value="{{ __('Site Name') }}" />
            <x-jet-input wire:model.defer="site_name" placeholder="Enter Site Name" id="site_name" type="text" class="mt-1 block w-full"/>
            <x-input-help-text>{{ __('This text will appear in the login screen.') }}</x-input-help-text>
            <x-jet-input-error for="site_name" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">

        <x-jet-button wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>

        <x-jet-action-message class="ml-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

    </x-slot>

</x-settings-form-section>
