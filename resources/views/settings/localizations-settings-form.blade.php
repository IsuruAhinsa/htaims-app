<x-settings-form-section submit="updateLocalizationSettings">

    <x-slot name="title">
        {{ __('Localizations Settings') }}
    </x-slot>

    <x-slot name="form">

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="date_format" value="{{ __('Date Format') }}" />
            <x-select wire:model.defer="state.date_format" class="mt-1 block w-full">
                @foreach(\App\Models\Setting::dateformats() as $format)
                    <option value="{{ $format }}">
                        {{ \Carbon\Carbon::parse(date('Y').'-'.date('m').'-'.date('d'))->format($format) }}
                    </option>
                @endforeach
            </x-select>
            <x-jet-input-error for="date_format" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="time_format" value="{{ __('Time Format') }}" />
            <x-select wire:model.defer="state.time_format" class="mt-1 block w-full">
                @foreach(\App\Models\Setting::timeFormats() as $format)
                    <option value="{{ $format }}">
                        {{ \Carbon\Carbon::now()->format($format) }}
                    </option>
                @endforeach
            </x-select>
            <x-jet-input-error for="time_format" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="timezone" value="{{ __('Timezone') }}" />
            <x-select wire:model.defer="state.timezone" class="mt-1 block w-full">
                @foreach(\App\Models\Setting::timezones() as $timezone)
                    <option
                        value="{{ $timezone }}"
                    >
                        {{ $timezone }}
                    </option>
                @endforeach
            </x-select>
            <x-input-help-text>
                The Current Date & Time: {{ date('F l d, Y - g:i:s A') }}
            </x-input-help-text>
            <x-jet-input-error for="timezone" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="currency" value="{{ __('Currency Code') }}" />
            <x-jet-input wire:model.defer="state.currency" id="currency" type="text" class="mt-1 block w-full"/>
            <x-jet-input-error for="currency" class="mt-2" />
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
