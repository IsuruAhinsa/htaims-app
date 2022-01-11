<x-restore-confirmation-modal wire:model.defer="confirmingRestore">

    <x-slot name="title">
        Restore Deleted Department
    </x-slot>

    <x-slot name="content">
        Would you like to restore this department record?
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('confirmingRestore', false)" wire:loading.attr="disabled">
            Nevermind
        </x-jet-secondary-button>

        <x-warning-button wire:click="restore({{ $confirmingRestore }})" class="ml-2" wire:loading.attr="disabled">
            Restore Department
        </x-warning-button>
    </x-slot>

</x-restore-confirmation-modal>
