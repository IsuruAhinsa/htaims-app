<x-jet-confirmation-modal wire:model="confirmingForceDeletion">

    <x-slot name="title">
        Delete Task Permanently?
    </x-slot>

    <x-slot name="content">
        This task will be permanently deleted from the database. This cannot be undone.
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('confirmingForceDeletion', false)" wire:loading.attr="disabled">
            Nevermind
        </x-jet-secondary-button>

        <x-jet-danger-button wire:click="forceDelete({{ $confirmingForceDeletion }})" class="ml-2" wire:loading.attr="disabled">
            Delete Task
        </x-jet-danger-button>
    </x-slot>

</x-jet-confirmation-modal>
