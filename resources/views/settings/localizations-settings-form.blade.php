<x-settings-form-section submit="updateLocalizationSettings">

    <x-slot name="title">
        {{ __('Localizations Settings') }}
    </x-slot>

    <x-slot name="form">

        <div class="col-span-6 sm:col-span-4">

            <x-select
                :searchable="false"
                label="Date Format"
                placeholder="Set Date Format"
                wire:model.defer="state.date_format"
            >
                @foreach(\App\Models\Setting::dateformats() as $format)
                    <x-select.option label="{{ \Carbon\Carbon::parse(date('Y').'-'.date('m').'-'.date('d'))->format($format) }}" value="{{ $format }}" />
                @endforeach

            </x-select>

            <x-jet-input-error for="date_format" class="mt-2" />

        </div>

        <div class="col-span-6 sm:col-span-4">

            <x-select
                :searchable="false"
                label="Time Format"
                placeholder="Set Time Format"
                wire:model.defer="state.time_format"
            >
                @foreach(\App\Models\Setting::timeFormats() as $format)
                    <x-select.option label="{{ \Carbon\Carbon::now()->format($format) }}" value="{{ $format }}" />
                @endforeach

            </x-select>

            <x-jet-input-error for="time_format" class="mt-2" />

        </div>

        <div class="col-span-6 sm:col-span-4">

            <x-select
                label="Timezone"
                placeholder="Select Timezone"
                wire:model.defer="state.timezone"
            >
                @foreach(\App\Models\Setting::timezones() as $timezone)
                    <x-select.option label="{{ $timezone }}" value="{{ $timezone }}" />
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

        <x-jet-action-message class="ml-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

    </x-slot>

</x-settings-form-section>
