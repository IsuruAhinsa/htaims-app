<div class="bg-white dark:bg-dark-secondary rounded-xl py-5 px-8 mx-4 mb-3 shadow sm:rounded-lg">

    <div class="px-2 sm:inline-flex">
        <x-svg-icon class="h-7 w-7 text-blue-500 self-center mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </x-svg-icon>
        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">
                General Assets Information.
            </h3>
            <p class="mt-[0.5] max-w-2xl text-sm text-gray-500 dark:text-dark-typography">
                Common asset details in the hospital. Hospital Asset No, Model, Serial Number etc...
            </p>
        </div>
    </div>

    <div class="row mt-4">
        <div class="relative w-full px-2 sm:max-w-half sm:flex-half">
            <div class="mb-4">
                <x-jet-label for="asset_no" value="{{ __('Asset Number') }}" />
                <x-jet-input id="asset_no" type="text" placeholder="Enter Asset Number" class="mt-1 block w-full" wire:model.defer="state.asset_no"/>
                <x-jet-input-error for="asset_no" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-jet-label for="service" value="{{ __('Service') }}" />
                <x-jet-input id="service" type="text" placeholder="Enter Service" class="mt-1 block w-full" wire:model.defer="state.service"/>
                <x-jet-input-error for="service" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-jet-label for="brand" value="{{ __('Brand') }}" />
                <x-jet-input id="brand" type="text" placeholder="Enter Brand" class="mt-1 block w-full" wire:model.defer="state.brand"/>
                <x-jet-input-error for="brand" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-jet-label for="model" value="{{ __('Model') }}" />
                <x-jet-input id="model" type="text" placeholder="Enter Model" class="mt-1 block w-full" wire:model.defer="state.model"/>
                <x-jet-input-error for="model" class="mt-2" />
            </div>
        </div>
        <div class="relative w-full px-2 sm:max-w-half sm:flex-half">
            <div class="mb-4">
                <x-jet-label for="serial" value="{{ __('Serial Number') }}" />
                <x-jet-input id="serial" type="text" placeholder="Enter Serial Number" class="mt-1 block w-full" wire:model.defer="state.serial"/>
                <x-jet-input-error for="serial" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-jet-label for="registration" value="{{ __('Registration') }}" />
                <x-jet-input id="registration" type="text" placeholder="Enter Registration" class="mt-1 block w-full" wire:model.defer="state.registration"/>
                <x-jet-input-error for="registration" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-jet-label for="generic_name" value="{{ __('Generic Name') }}" />
                <x-jet-input id="generic_name" type="text" placeholder="Enter Generic Name" class="mt-1 block w-full" wire:model.defer="state.generic_name"/>
                <x-jet-input-error for="generic_name" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-jet-label for="hospital_asset_no" value="{{ __('Hospital Asset No') }}" />
                <x-jet-input id="hospital_asset_no" type="text" placeholder="Enter Hospital Asset No" class="mt-1 block w-full" wire:model.defer="state.hospital_asset_no"/>
                <x-jet-input-error for="hospital_asset_no" class="mt-2" />
            </div>
        </div>
    </div>

</div>
