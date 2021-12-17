<x-jet-confirmation-modal wire:model="confirmingForceDeletion">

    <x-slot name="title">
        Delete Location Manufacturer?
    </x-slot>

    <x-slot name="content">
        This manufacturer will be permanently deleted from the database. This cannot be undone.
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('confirmingForceDeletion', false)" wire:loading.attr="disabled">
            Nevermind
        </x-jet-secondary-button>

        <x-jet-danger-button wire:click="forceDelete({{ $confirmingForceDeletion }})" class="ml-2" wire:loading.attr="disabled">
            Delete Manufacturer
        </x-jet-danger-button>
    </x-slot>

</x-jet-confirmation-modal>
