<x-jet-confirmation-modal wire:model="confirmingForceDeletion">

    <x-slot name="title">
        Delete Location Permanently?
    </x-slot>

    <x-slot name="content">
        Are you sure you want to delete this location permanently?
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('confirmingForceDeletion', false)" wire:loading.attr="disabled">
            Nevermind
        </x-jet-secondary-button>

        <x-jet-danger-button wire:click="delete({{ $confirmingForceDeletion }})" class="ml-2" wire:loading.attr="disabled">
            Delete Location
        </x-jet-danger-button>
    </x-slot>

</x-jet-confirmation-modal>
