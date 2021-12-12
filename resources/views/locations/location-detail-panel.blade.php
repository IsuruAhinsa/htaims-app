<x-panel wire:model="isOpenPanel">

    <x-slot name="title">

        <x-svg-icon stroke-width="2" class="mr-1">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
        </x-svg-icon>
        {{ __('Location Details') }}

    </x-slot>

    <x-slot name="content">
        @if($isOpenPanel)

            <ul class="space-y-4 text-sm">
                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        Code
                    </li>
                    <li>
                        {{ $this->state['code'] }}
                    </li>
                </div>
                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        Description
                    </li>
                    <li>
                        {!! $this->state['description'] !!}
                    </li>
                </div>
                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        Created At
                    </li>
                    <li>
                        {{ $this->state['created_at'] }}
                    </li>
                </div>
            </ul>

        @endif
    </x-slot>

</x-panel>
