<x-jet-dialog-modal wire:model="isOpen" :maxWidth="'md'">

    <x-slot name="title">
        <x-svg-icon stroke-width="2" class="mr-1">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
        </x-svg-icon>
        {{ $updateMode ? __('Edit Location') : __('Add Location') }}
    </x-slot>

    <x-slot name="content">
        <div class="space-y-3">

            <div>
                <x-jet-label for="code" value="{{ __('Location Code') }}" />
                <x-jet-input id="code" type="text" placeholder="Enter Location Code" class="mt-1 block w-full" wire:model.defer="state.code" autocomplete="code" />
                <x-jet-input-error for="code" class="mt-2" />
            </div>

            <div>
                <x-jet-label for="description" value="{{ __('Location Description') }}" />
                <x-text-area id="description" type="description" placeholder="Enter Location Description" class="mt-1 block w-full" wire:model.defer="state.description" />
                <x-jet-input-error for="description" class="mt-2" />
            </div>

        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('isOpen', false)" wire:loading.attr="disabled">
            Nevermind
        </x-jet-secondary-button>

        <x-jet-button wire:click="{{ $updateMode ? 'update()' : 'store()' }}" wire:loading.attr="disabled">
            {{ $updateMode ? __('Save Changes') : __('Add Location') }}
        </x-jet-button>
    </x-slot>

</x-jet-dialog-modal>
