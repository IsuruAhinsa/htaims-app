<div class="bg-white dark:bg-dark-secondary rounded-xl py-5 px-8 mx-4 mb-3 shadow sm:rounded-lg">

    <div class="px-2 sm:inline-flex">
        <x-svg-icon class="h-7 w-7 text-green-500 self-center mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
        </x-svg-icon>
        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">
                Asset Relation Information.
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-dark-typography">
                There are asset relation information Location, Vendor, Contractor etc...
            </p>
        </div>
    </div>

    <div class="row mt-4">
        <div class="relative w-full px-2 sm:max-w-half sm:flex-half">
            <div class="mb-4 flex items-end gap-2">
                <div class="w-full">
                    <x-select label="Asset Type Code & Description" placeholder="Select Asset Type Code & Description"
                        wire:model.defer="type_code">
                        @foreach($tasks as $task)
                        <x-select.option label="{{ $task->type_code . " -" . $task->description }}" value="{{ $task->id
                            }}"/>
                            @endforeach
                    </x-select>
                </div>
                <div class="flex justify-end">
                    <x-action-button>
                        +
                    </x-action-button>
                </div>
            </div>

            <div class="mb-4 flex items-end gap-2">
                <div class="w-full">
                    <x-select label="Location" placeholder="Select Location" wire:model.defer="location">
                        @foreach($locations as $location)
                        <x-select.option label="{{ $location->code }}" value="{{ $location->id }}" />
                        @endforeach
                    </x-select>
                </div>
                <div class="flex justify-end">
                    <x-action-button>
                        +
                    </x-action-button>
                </div>
            </div>

            <div class="mb-4 flex items-end gap-2">
                <div class="w-full">
                    <x-select label="Vendor" placeholder="Select Vendor" wire:model.defer="vendor">
                        @foreach($vendors as $vendor)
                        <x-select.option label="{{ $vendor->code . " - " . $vendor->name }}"
                            value="{{ $vendor->id }}" />
                        @endforeach
                    </x-select>
                </div>
                <div class="flex justify-end">
                    <x-action-button>
                        +
                    </x-action-button>
                </div>
            </div>

            <div class="mb-4 flex items-end gap-2">
                <div class="w-full">
                    <x-select label="Manufacturer" placeholder="Select Manufacturer" wire:model.defer="manufacturer">
                        @foreach($manufacturers as $manufacturer)
                        <x-select.option label="{{ $manufacturer->code . " - " . $manufacturer->name }}"
                            value="{{ $manufacturer->id }}" />
                        @endforeach
                    </x-select>
                </div>
                <div class="flex justify-end">
                    <x-action-button>
                        +
                    </x-action-button>
                </div>
            </div>
        </div>
        <div class="relative w-full px-2 sm:max-w-half sm:flex-half">
            <div class="mb-4 flex items-end gap-2">
                <div class="w-full">
                    <x-select label="Hospital" placeholder="Select Hospital" wire:model.defer="hospital">
                        @foreach($hospitals as $hospital)
                        <x-select.option label="{{ $hospital->code . " - " . $hospital->name }}"
                            value="{{ $hospital->id }}" />
                        @endforeach
                    </x-select>
                </div>
                <div class="flex justify-end">
                    <x-action-button>
                        +
                    </x-action-button>
                </div>
            </div>

            <div class="mb-4 flex items-end gap-2">
                <div class="w-full">
                    <x-select label="Department" placeholder="Select Department" wire:model.defer="department">
                        @foreach($departments as $department)
                        <x-select.option label="{{ $department->code }}" value="{{ $department->id }}" />
                        @endforeach
                    </x-select>
                </div>
                <div class="flex justify-end">
                    <x-action-button>
                        +
                    </x-action-button>
                </div>
            </div>

            <div class="mb-4 flex items-end gap-2">
                <div class="w-full">
                    <x-select label="Contractor" placeholder="Select Contractor" wire:model.defer="contractor">
                        @foreach($contractors as $contractor)
                        <x-select.option label="{{ $contractor->reference_code . " - " . $contractor->name }}"
                            value="{{ $contractor->id }}" />
                        @endforeach
                    </x-select>
                </div>
                <div class="flex justify-end">
                    <x-action-button>
                        +
                    </x-action-button>
                </div>
            </div>
        </div>
    </div>

</div>
