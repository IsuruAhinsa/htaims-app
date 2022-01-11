<x-jet-dialog-modal wire:model="isOpen" :maxWidth="'5xl'">

    <x-slot name="title">
        <x-svg-icon stroke-width="2" class="mr-1">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M4 21c1.147 -4.02 1.983 -8.027 2 -12h6c.017 3.973 .853 7.98 2 12"></path>
            <path d="M12.5 13h4.5c.025 2.612 .894 5.296 2 8"></path>
            <path d="M9 5a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1"></path>
            <line x1="3" y1="21" x2="22" y2="21"></line>
        </x-svg-icon>
        {{ $updateMode ? __('Edit Manufacturer') : __('Add Manufacturer') }}
    </x-slot>

    <x-slot name="content">

        <div class="row">
            <div class="relative w-full px-2 sm:max-w-half sm:flex-half">
                <div class="mb-4">
                    <x-jet-label for="code" value="{{ __('Manufacturer Code') }}" />
                    <x-jet-input id="code" type="text" placeholder="Enter Manufacturer Code" class="mt-1 block w-full" wire:model.defer="state.code"/>
                    <x-jet-input-error for="code" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-jet-label for="name" value="{{ __('Manufacturer Name') }}" />
                    <x-jet-input id="name" type="text" placeholder="Enter Manufacturer Name" class="mt-1 block w-full" wire:model.defer="state.name"/>
                    <x-jet-input-error for="name" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-jet-label for="contact_person" value="{{ __('Contact Person') }}" />
                    <x-jet-input id="contact_person" type="text" placeholder="Enter Contact Person" class="mt-1 block w-full" wire:model.defer="state.contact_person"/>
                    <x-jet-input-error for="contact_person" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-jet-label for="address" value="{{ __('Address') }}" />
                    <x-text-area id="address" type="address" placeholder="Enter Address" class="mt-1 block w-full" wire:model.defer="state.address"/>
                    <x-jet-input-error for="address" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-jet-label for="state" value="{{ __('City') }}" />
                    <x-jet-input id="state" type="text" placeholder="Enter City" class="mt-1 block w-full" wire:model.defer="state.city"/>
                    <x-jet-input-error for="state" class="mt-2" />
                </div>
            </div>
            <div class="relative w-full px-2 sm:max-w-half sm:flex-half">
                <div class="mb-4">
                    <x-jet-label for="contact_person" value="{{ __('State / Province') }}" />
                    <x-jet-input id="contact_person" type="text" placeholder="Enter State / Province" class="mt-1 block w-full" wire:model.defer="state.state"/>
                    <x-jet-input-error for="contact_person" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-jet-label for="country" value="{{ __('Country') }}" />
                    <x-jet-input id="country" type="text" placeholder="Enter Country" class="mt-1 block w-full" wire:model.defer="state.country"/>
                    <x-jet-input-error for="country" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-jet-label for="zip" value="{{ __('Zip Code') }}" />
                    <x-jet-input id="zip" type="text" placeholder="Enter Zip Code" class="mt-1 block w-full" wire:model.defer="state.zip"/>
                    <x-jet-input-error for="zip" class="mt-2" />
                </div>

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
                    <x-jet-input id="email" type="text" placeholder="Enter Email" class="mt-1 block w-full" wire:model.defer="state.email"/>
                    <x-jet-input-error for="email" class="mt-2" />
                </div>
            </div>
        </div>

    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('isOpen', false)" wire:loading.attr="disabled">
            Nevermind
        </x-jet-secondary-button>

        <x-jet-button wire:click="{{ $updateMode ? 'update()' : 'store()' }}" wire:loading.attr="disabled">
            {{ $updateMode ? __('Save Changes') : __('Add Manufacturer') }}
        </x-jet-button>
    </x-slot>

</x-jet-dialog-modal>
