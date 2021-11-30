@props(['id' => null, 'maxWidth' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4">
        <div class="flex items-center text-lg dark:text-white">
            {{ $title }}
        </div>

        <div class="mt-4 dark:text-dark-typography">
            {{ $content }}
        </div>
    </div>

    <div class="px-6 py-4 bg-gray-100 dark:bg-dark-secondary text-right">
        {{ $footer }}
    </div>
</x-jet-modal>
