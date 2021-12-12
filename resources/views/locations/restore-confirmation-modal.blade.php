<x-restore-confirmation-modal wire:model.defer="confirmingRestore">

    <x-slot name="title">
        Restore Deleted Location?
    </x-slot>

    <x-slot name="content">
        Are you sure you want to delete this location? By checking following permanently delete checkbox, this location record permanently deleted and all of its related resources and data will be permanently deleted.

    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('confirmingRestore', false)" wire:loading.attr="disabled">
            Nevermind
        </x-jet-secondary-button>

        <x-warning-button wire:click="restore({{ $confirmingRestore }})" class="ml-2" wire:loading.attr="disabled">
            Restore Location
        </x-warning-button>
    </x-slot>

</x-restore-confirmation-modal>
