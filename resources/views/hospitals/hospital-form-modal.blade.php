<x-jet-dialog-modal wire:model="isOpen" :maxWidth="'5xl'">

    <x-slot name="title">
        <x-svg-icon stroke-width="2" class="mr-1">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <rect x="4" y="4" width="16" height="16" rx="2"></rect>
            <line x1="9" y1="8" x2="9" y2="16"></line>
            <line x1="9" y1="12" x2="15" y2="12"></line>
            <line x1="15" y1="8" x2="15" y2="16"></line>
        </x-svg-icon>
        {{ $updateMode ? __('Edit Hospital') : __('Add Hospital') }}
    </x-slot>

    <x-slot name="content">

        <div class="row">
            <div class="relative w-full px-2 sm:max-w-half sm:flex-half">

                <div class="mb-4">
                    <x-jet-label for="code" value="{{ __('Hospital Code') }}" />
                    <x-jet-input id="code" type="text" placeholder="Enter Hospital Code" class="mt-1 block w-full" wire:model.defer="state.code"/>
                    <x-jet-input-error for="code" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-jet-label for="hospital_code_prefix" value="{{ __('Hospital Code Prefix') }}" />
                    <x-jet-input id="hospital_code_prefix" type="text" placeholder="Enter Hospital Code Prefix" class="mt-1 block w-full" wire:model.defer="state.hospital_code_prefix"/>
                    <x-jet-input-error for="hospital_code_prefix" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-jet-label for="name" value="{{ __('Hospital Name') }}" />
                    <x-jet-input id="name" type="text" placeholder="Enter Hospital Name" class="mt-1 block w-full" wire:model.defer="state.name"/>
                    <x-jet-input-error for="name" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-jet-label for="region" value="{{ __('Region') }}" />
                    <x-jet-input id="region" type="text" placeholder="Enter Region" class="mt-1 block w-full" wire:model.defer="state.region"/>
                    <x-jet-input-error for="region" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-jet-label for="address" value="{{ __('Address') }}" />
                    <x-text-area id="address" type="address" placeholder="Enter Address" class="mt-1 block w-full" wire:model.defer="state.address"/>
                    <x-jet-input-error for="address" class="mt-2" />
                </div>

            </div>
            <div class="relative w-full px-2 sm:max-w-half sm:flex-half">

                <div class="mb-4">
                    <x-jet-label for="phone" value="{{ __('Phone') }}" />
                    <x-jet-input id="phone" type="text" placeholder="Enter Phone" class="mt-1 block w-full" wire:model.defer="state.phone"/>
                    <x-jet-input-error for="phone" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-jet-label for="fax" value="{{ __('Fax') }}" />
                    <x-jet-input id="fax" type="text" placeholder="Enter Fax" class="mt-1 block w-full" wire:model.defer="state.fax"/>
                    <x-jet-input-error for="fax" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" type="email" placeholder="Enter Email" class="mt-1 block w-full" wire:model.defer="state.email"/>
                    <x-jet-input-error for="email" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-jet-label for="wo_prefix" value="{{ __('WO Prefix') }}" />
                    <x-jet-input id="wo_prefix" type="text" placeholder="Enter WO Prefix" class="mt-1 block w-full" wire:model.defer="state.wo_prefix"/>
                    <x-jet-input-error for="wo_prefix" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-jet-label for="wocm_slno" value="{{ __('WOCM Serial No') }}" />
                    <x-jet-input id="wocm_slno" type="text" placeholder="Enter WOCM Serial No" class="mt-1 block w-full" wire:model.defer="state.wocm_slno"/>
                    <x-jet-input-error for="wocm_slno" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-jet-label for="wopm_slno" value="{{ __('WOPM Serial No') }}" />
                    <x-jet-input id="wopm_slno" type="text" placeholder="Enter WOPM Serial No" class="mt-1 block w-full" wire:model.defer="state.wopm_slno"/>
                    <x-jet-input-error for="wopm_slno" class="mt-2" />
                </div>

            </div>
        </div>

    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('isOpen', false)" wire:loading.attr="disabled">
            Nevermind
        </x-jet-secondary-button>

        <x-jet-button wire:click="{{ $updateMode ? 'update()' : 'store()' }}" wire:loading.attr="disabled">
            {{ $updateMode ? __('Save Changes') : __('Add Hospital') }}
        </x-jet-button>
    </x-slot>

</x-jet-dialog-modal>
