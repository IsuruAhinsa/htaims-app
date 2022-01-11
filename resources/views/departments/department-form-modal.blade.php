<x-jet-dialog-modal wire:model="isOpen" :maxWidth="'md'">

    <x-slot name="title">
        <x-svg-icon stroke-width="2" class="mr-1">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
        </x-svg-icon>
        {{ $updateMode ? __('Edit Department') : __('Add Department') }}
    </x-slot>

    <x-slot name="content">
        <div class="space-y-3">

            <div>
                <x-jet-label for="code" value="{{ __('Department Code') }}" />
                <x-jet-input id="code" type="text" placeholder="Enter Department Code" class="mt-1 block w-full" wire:model.defer="state.code" autocomplete="code" />
                <x-jet-input-error for="code" class="mt-2" />
            </div>

            <div>
                <x-jet-label for="description" value="{{ __('Department Description') }}" />
                <x-text-area id="description" type="description" placeholder="Enter Department Description" class="mt-1 block w-full" wire:model.defer="state.description" />
                <x-jet-input-error for="description" class="mt-2" />
            </div>

        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('isOpen', false)" wire:loading.attr="disabled">
            Nevermind
        </x-jet-secondary-button>

        <x-jet-button wire:click="{{ $updateMode ? 'update()' : 'store()' }}" wire:loading.attr="disabled">
            {{ $updateMode ? __('Save Changes') : __('Add Department') }}
        </x-jet-button>
    </x-slot>

</x-jet-dialog-modal>
