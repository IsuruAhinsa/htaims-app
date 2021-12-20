<x-jet-confirmation-modal wire:model="confirmingDeletion">

    <x-slot name="title">
        Delete Task?
    </x-slot>

    <x-slot name="content">
        Would you like to delete this task record? By checking following permanently delete checkbox, this task record, all of its related resources and data will be permanently deleted. It cannot be undone.

        <label class="flex flex-row items-center py-3 cursor-pointer">
            <x-jet-checkbox wire:model="forceDelete" class="text-red-600 focus:border-red-300 focus:ring-red-200"/>
            <span class="ml-2 text-gray-700 dark:text-white">Permanently Delete</span>
        </label>

    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('confirmingDeletion', false)" wire:loading.attr="disabled">
            Nevermind
        </x-jet-secondary-button>

        <x-jet-danger-button wire:click="delete({{ $confirmingDeletion }})" class="ml-2" wire:loading.attr="disabled">
            Delete Task
        </x-jet-danger-button>
    </x-slot>

</x-jet-confirmation-modal>
