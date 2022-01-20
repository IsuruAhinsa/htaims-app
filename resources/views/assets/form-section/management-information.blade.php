<div class="bg-white dark:bg-dark-secondary rounded-xl py-5 px-8 mx-4 mb-3 shadow sm:rounded-lg">

    <div class="px-2 sm:inline-flex">
        <x-svg-icon class="h-7 w-7 text-yellow-500 self-center mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
        </x-svg-icon>
        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">
                Asset Management Information.
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-dark-typography">
                Asset ordering & managing information.
            </p>
        </div>
    </div>

    <div class="row mt-4"   >
        <div class="relative w-full px-2 sm:max-w-half sm:flex-half">
            <div class="mb-4">
                <x-select
                    :searchable="false"
                    label="Manuals"
                    placeholder="Choose Manual"
                    wire:model.defer="manuals"
                >
                    @foreach(\App\Models\Asset::assetManuals() as $key => $manual)
                        <x-select.option label="{{ $key . " - " . $manual }}" value="{{ $key }}" />
                    @endforeach

                </x-select>
            </div>

            <div class="mb-4">
                <x-select
                    :searchable="false"
                    label="Variations"
                    placeholder="Choose Variation"
                    wire:model.defer="variation"
                >
                    @foreach(\App\Models\Asset::assetVariations() as $key => $variation)
                        <x-select.option label="{{ $key . " - " . $variation }}" value="{{ $key }}" />
                    @endforeach

                </x-select>
            </div>

            <div class="mb-4">
                <x-datetime-picker
                    without-tips
                    without-timezone
                    without-time
                    parse-format="YYYY-MM-DD"
                    display-format="YYYY-MM-DD"
                    label="PPM Date"
                    placeholder="Set PPM Date"
                    wire:model.defer="ppm_date"
                />
            </div>

            <div class="mb-4">
                <x-select
                    :searchable="false"
                    label="PM Frequency"
                    placeholder="Choose PM Frequency"
                    wire:model.defer="pm_frequency"
                >
                    @for($i = 1; $i < 13; $i++)
                        <x-select.option label="{{ $i }}" value="{{ $i }}" />
                    @endfor
                </x-select>
            </div>
        </div>
        <div class="relative w-full px-2 sm:max-w-half sm:flex-half">
            <div class="mb-4">
                <x-select
                    :searchable="false"
                    label="Status"
                    placeholder="Choose Status"
                    wire:model.defer="status"
                >
                    @foreach(\App\Models\Asset::assetStatus() as $key => $status)
                        <x-select.option label="{{ $key . " - " . $status }}" value="{{ $key }}" />
                    @endforeach
                </x-select>
            </div>

            <div class="mb-4">
                <x-jet-label for="type" value="{{ __('Category') }}" />
                <div class="flex flex-wrap gap-3 mt-3">
                    <div>
                        <input class="hidden" id="FEMS" value="FEMS" type="radio" name="type" wire:model.defer="state.type">
                        <label class="p-1.5 px-4 border border-gray-300 cursor-pointer rounded-lg text-center shadow-sm text-gray-700 bg-white focus:outline-none" for="FEMS">
                            <span class="text-sm uppercase">FEMS</span>
                        </label>
                    </div>
                    <div>
                        <input class="hidden" id="BEMS" value="BEMS" type="radio" name="type" wire:model.defer="state.type">
                        <label class="p-1.5 px-4 border border-gray-300 cursor-pointer rounded-lg text-center shadow-sm text-gray-700 bg-white focus:outline-none" for="BEMS">
                            <span class="text-sm uppercase">BEMS</span>
                        </label>
                    </div>
                </div>
                <x-jet-input-error for="type" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-jet-label for="ownership" value="{{ __('Ownership') }}" />
                <div class="flex flex-wrap gap-3 mt-3">
                    <div>
                        <input class="hidden" id="H" value="H" type="radio" name="ownership" wire:model.defer="state.ownership">
                        <label class="p-1.5 px-4 border border-gray-300 cursor-pointer rounded-lg text-center shadow-sm text-gray-700 bg-white focus:outline-none" for="H">
                            <span class="text-sm uppercase">H</span>
                        </label>
                    </div>
                    <div>
                        <input class="hidden" id="L" value="L" type="radio" name="ownership" wire:model.defer="state.ownership">
                        <label class="p-1.5 px-4 border border-gray-300 cursor-pointer rounded-lg text-center shadow-sm text-gray-700 bg-white focus:outline-none" for="L">
                            <span class="text-sm uppercase">L</span>
                        </label>
                    </div>
                </div>
                <x-jet-input-error for="ownership" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-jet-label for="utilization" value="{{ __('Utilization') }}" />
                <div class="flex flex-wrap gap-3 mt-3">
                    <div>
                        <input class="hidden" id="1" value="1" type="radio" name="utilization" wire:model.defer="state.utilization">
                        <label class="p-1.5 px-4 border border-gray-300 cursor-pointer rounded-lg text-center shadow-sm text-gray-700 bg-white focus:outline-none" for="1">
                            <span class="text-sm uppercase">1</span>
                        </label>
                    </div>
                    <div>
                        <input class="hidden" id="2" value="2" type="radio" name="utilization" wire:model.defer="state.utilization">
                        <label class="p-1.5 px-4 border border-gray-300 cursor-pointer rounded-lg text-center shadow-sm text-gray-700 bg-white focus:outline-none" for="2">
                            <span class="text-sm uppercase">2</span>
                        </label>
                    </div>
                    <div>
                        <input class="hidden" id="3" value="3" type="radio" name="utilization" wire:model.defer="state.utilization">
                        <label class="p-1.5 px-4 border border-gray-300 cursor-pointer rounded-lg text-center shadow-sm text-gray-700 bg-white focus:outline-none" for="3">
                            <span class="text-sm uppercase">3</span>
                        </label>
                    </div>
                    <div>
                        <input class="hidden" id="4" value="4" type="radio" name="utilization" wire:model.defer="state.utilization">
                        <label class="p-1.5 px-4 border border-gray-300 cursor-pointer rounded-lg text-center shadow-sm text-gray-700 bg-white focus:outline-none" for="4">
                            <span class="text-sm uppercase">4</span>
                        </label>
                    </div>
                </div>
                <x-jet-input-error for="utilization" class="mt-2" />
            </div>

        </div>
    </div>

</div>

<style>
    /* The styling below is custom in that we require the :checked Pseudo class, which Tailwind doesn't offer out of the box. However the styling (border color and box shadow etc) the below applies is native Tailwind. */
    input:checked + label {
        --tw-bg-opacity: 1;
        background-color: rgba(79, 70, 229, var(--tw-bg-opacity));
        color: white;
        border-radius: 0.5rem;
        border: none;
        --tw-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
    }
</style>
