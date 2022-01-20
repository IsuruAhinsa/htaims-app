<div class="bg-white dark:bg-dark-secondary rounded-xl py-5 px-8 mx-4 mb-3 shadow sm:rounded-lg">

    <div class="px-2 sm:inline-flex">
        <x-svg-icon class="h-7 w-7 text-purple-500 self-center mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
        </x-svg-icon>
        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">
                Other Assets Information.
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-dark-typography">
                Other relevant information of the asset. Electrical Name, Mechanical Name etc...
            </p>
        </div>
    </div>

    <div class="row mt-4">
        <div class="relative w-full px-2 sm:max-w-half sm:flex-half">
            <div class="mb-4">
                <x-jet-label for="electrical" value="{{ __('Electrical') }}" />
                <x-jet-input id="electrical" type="text" placeholder="Enter Electrical" class="mt-1 block w-full" wire:model.defer="state.electrical"/>
                <x-jet-input-error for="electrical" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-jet-label for="mechanical" value="{{ __('Mechanical') }}" />
                <x-jet-input id="mechanical" type="text" placeholder="Enter Mechanical" class="mt-1 block w-full" wire:model.defer="state.mechanical"/>
                <x-jet-input-error for="mechanical" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-jet-label for="capacity" value="{{ __('Capacity') }}" />
                <x-jet-input id="capacity" type="text" placeholder="Enter Capacity" class="mt-1 block w-full" wire:model.defer="state.capacity"/>
                <x-jet-input-error for="capacity" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-jet-label for="staff_name" value="{{ __('Staff Name') }}" />
                <x-jet-input id="staff_name" type="text" placeholder="Enter Staff Name" class="mt-1 block w-full" wire:model.defer="state.staff_name"/>
                <x-jet-input-error for="staff_name" class="mt-2" />
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
                    label="Created Date"
                    placeholder="Set Created Date"
                    wire:model.defer="date_created"
                />
            </div>

            <div class="mb-4">
                <x-jet-label for="comments" value="{{ __('Comments') }}" />
                <x-text-area id="comments" type="text" placeholder="Type Comments" class="mt-1 block w-full" wire:model.defer="state.comments"/>
                <x-jet-input-error for="comments" class="mt-2" />
            </div>
        </div>
    </div>

</div>
