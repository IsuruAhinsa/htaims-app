<x-jet-confirmation-modal wire:model="confirmingDeletion">

    <x-slot name="title">
        Delete Location?
    </x-slot>

    <x-slot name="content">
        Are you sure you want to delete this location? By checking following permanently delete checkbox, this location record permanently deleted and all of its related resources and data will be permanently deleted.

        <label class="inline-flex items-center py-3 cursor-pointer">
            <x-jet-checkbox wire:model="forceDelete" class="text-red-600 focus:border-red-300 focus:ring-red-200"/>
            <span class="ml-2 text-gray-700 dark:text-white">Permanently Delete</span>
        </label>

    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('confirmingDeletion', false)" wire:loading.attr="disabled">
            Nevermind
        </x-jet-secondary-button>

        <x-jet-danger-button wire:click="delete({{ $confirmingDeletion }})" class="ml-2" wire:loading.attr="disabled">
            Delete Location
        </x-jet-danger-button>
    </x-slot>

</x-jet-confirmation-modal>
