<x-settings-form-section submit="updateGeneralSettings">

    <x-slot name="title">
        {{ __('General Settings') }}
    </x-slot>

    <x-slot name="form">

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Choose your color scheme') }}" />
            <x-select class="mt-1 block w-full">
                <option value="light">Light</option>
                <option value="dark">Dark</option>
            </x-select>
            <x-jet-input-error for="name" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">

        <x-jet-button wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>

        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

    </x-slot>

</x-settings-form-section>
