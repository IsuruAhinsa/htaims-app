<x-jet-dialog-modal wire:model="isOpen" :maxWidth="'4xl'">

    <x-slot name="title">
        <x-svg-icon stroke-width="2" class="mr-1">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M18 9a5 5 0 0 0 -5 -5h-2a5 5 0 0 0 -5 5v6a5 5 0 0 0 5 5h2a5 5 0 0 0 5 -5"></path>
        </x-svg-icon>
        {{ $updateMode ? __('Edit Contractor') : __('Add Contractor') }}
    </x-slot>

    <x-slot name="content">

        <div class="row">
            <div class="relative w-full px-2 sm:max-w-half sm:flex-half">
                <div class="mb-4">
                    <x-jet-label for="reference_code" value="{{ __('Reference Code') }}" />
                    <x-jet-input id="reference_code" type="text" placeholder="Enter Reference Code" class="mt-1 block w-full" wire:model.defer="state.reference_code"/>
                    <x-jet-input-error for="reference_code" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-jet-label for="contractor_no" value="{{ __('Contractor No') }}" />
                    <x-jet-input id="contractor_no" type="text" placeholder="Enter Contractor No" class="mt-1 block w-full" wire:model.defer="state.contractor_no"/>
                    <x-jet-input-error for="contractor_no" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-jet-label for="name" value="{{ __('Contractor Name') }}" />
                    <x-jet-input id="name" type="name" placeholder="Enter Contractor Name" class="mt-1 block w-full" wire:model.defer="state.name"/>
                    <x-jet-input-error for="name" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-jet-label for="value" value="{{ __('Contractor value') }}" />
                    <x-jet-input id="value" type="value" placeholder="Enter Contractor value" class="mt-1 block w-full" wire:model.defer="state.value"/>
                    <x-jet-input-error for="value" class="mt-2" />
                </div>
            </div>
            <div class="relative w-full px-2 sm:max-w-half sm:flex-half">
                <div class="mb-4">
                    <x-datetime-picker
                        without-tips
                        without-timezone
                        without-time
                        parse-format="YYYY-MM-DD"
                        display-format="YYYY-MM-DD"
                        label="Start Date"
                        placeholder="Set Start Date"
                        wire:model.defer="start_date"
                    />
                </div>

                <div class="mb-4">
                    <x-datetime-picker
                        without-tips
                        without-timezone
                        without-time
                        parse-format="YYYY-MM-DD"
                        display-format="YYYY-MM-DD"
                        label="End Date"
                        placeholder="Set End Date"
                        wire:model.defer="end_date"
                    />
                </div>

                <div class="mb-4">
                    <x-select
                        :searchable="false"
                        label="Choose Contractor Type"
                        placeholder="Set Contractor Type"
                        wire:model.defer="type"
                    >
                        @foreach(\App\Models\Contractor::contractorTypes() as $contractorType)
                            <x-select.option label="{{ $contractorType }}" value="{{ $contractorType }}" />
                        @endforeach
                    </x-select>
                </div>
            </div>
        </div>

    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('isOpen', false)" wire:loading.attr="disabled">
            Nevermind
        </x-jet-secondary-button>

        <x-jet-button wire:click="{{ $updateMode ? 'update()' : 'store()' }}" wire:loading.attr="disabled">
            {{ $updateMode ? __('Save Changes') : __('Add Contractor') }}
        </x-jet-button>
    </x-slot>

</x-jet-dialog-modal>
