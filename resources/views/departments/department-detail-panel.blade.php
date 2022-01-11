<x-panel wire:model="isOpenPanel">

    <x-slot name="title">

        <x-svg-icon stroke-width="2" class="mr-1">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
        </x-svg-icon>
        {{ __('Department Details') }}

    </x-slot>

    <x-slot name="content">
        @if($isOpenPanel)

            <ul class="space-y-4 text-sm">
                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        Department Code
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
