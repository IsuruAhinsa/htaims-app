<div class="bg-white dark:bg-dark-secondary rounded-xl py-5 px-8 mx-4 mb-3 shadow sm:rounded-lg">

    <div class="px-2 sm:inline-flex">
        <x-svg-icon class="h-7 w-7 text-red-500 self-center mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
        </x-svg-icon>
        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">
                Warranty & Payments Information.
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-dark-typography">
                Warranty details and payment details of the asset.
            </p>
        </div>
    </div>

    <div class="row mt-4">
        <div class="relative w-full px-2 sm:max-w-half sm:flex-half">
            <div class="mb-4">
                <x-datetime-picker
                    without-tips
                    without-timezone
                    without-time
                    parse-format="YYYY-MM-DD"
                    display-format="YYYY-MM-DD"
                    label="Purchase Date"
                    placeholder="Set Purchase Date"
                    wire:model.defer="purchase_date"
                />
            </div>

            <div class="mb-4">
                <x-datetime-picker
                    without-tips
                    without-timezone
                    without-time
                    parse-format="YYYY-MM-DD"
                    display-format="YYYY-MM-DD"
                    label="Warranty Expire Date"
                    placeholder="Set Warranty Expire Date"
                    wire:model.defer="warranty_expire_date"
                />
            </div>

            <div class="mb-4">
                <x-jet-label for="warranty_period" value="{{ __('Warranty Period') }}" />
                <x-input-group type="text" id="warranty_period" trail="Months" placeholder="Enter Warranty Period" class="mt-1 block" wire:model.defer="state.warranty_period"/>
                <x-jet-input-error for="state.warranty_period" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-select
                    :searchable="false"
                    label="Warranty Status"
                    placeholder="Choose Warranty Status"
                    wire:model.defer="warranty_status"
                >
                    @foreach(\App\Models\Asset::warrantyStatus() as $key => $warrantyStatus)
                        <x-select.option label="{{ $warrantyStatus }}" value="{{ $key }}" />
                    @endforeach

                </x-select>
            </div>
        </div>
        <div class="relative w-full px-2 sm:max-w-half sm:flex-half">
            <div class="mb-4">
                <x-jet-label for="cost_center" value="{{ __('Cost Center') }}" />
                <x-jet-input id="cost_center" type="text" placeholder="Enter Cost Center" class="mt-1 block w-full" wire:model.defer="state.cost_center"/>
                <x-jet-input-error for="cost_center" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-datetime-picker
                    without-tips
                    without-timezone
                    without-time
                    parse-format="YYYY-MM-DD"
                    display-format="YYYY-MM-DD"
                    label="Date Commissioned"
                    placeholder="Set Date Commissioned"
                    wire:model.defer="date_commissioned"
                />
            </div>

            <div class="mb-4">
                <x-jet-label for="purchase_order" value="{{ __('Purchase Order') }}" />
                <x-jet-input id="purchase_order" type="text" placeholder="Enter Purchase Order" class="mt-1 block w-full" wire:model.defer="state.purchase_order"/>
                <x-jet-input-error for="purchase_order" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-jet-label for="purchase_price" value="{{ __('Purchase Price') }}" />
                <x-input-group type="text" id="purchase_price" prefix="$" placeholder="Enter Purchase Price" class="mt-1 block" wire:model.defer="state.purchase_price"/>
                <x-jet-input-error for="state.purchase_price" class="mt-2" />
            </div>
        </div>
    </div>

</div>
