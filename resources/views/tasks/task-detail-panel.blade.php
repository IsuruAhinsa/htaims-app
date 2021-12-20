<x-panel wire:model="isOpenPanel">

    <x-slot name="title">

        <x-svg-icon class="mr-1">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </x-svg-icon>
        {{ __('Task Details') }}

    </x-slot>

    <x-slot name="content">
        @if($isOpenPanel)

            <ul class="space-y-4 text-sm">
                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        Type Code
                    </li>
                    <li>
                        {{ $this->state['type_code'] }}
                    </li>
                </div>
                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        Task Description
                    </li>
                    <li>
                        {!! $this->state['description'] !!}
                    </li>
                </div>
                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        Service Life
                    </li>
                    <li>
                        {{ $this->state['service_life'] }} Years
                    </li>
                </div>
                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        Checklist
                    </li>
                    <li>
                        <div class="flex flex-row align-middle hover:underline text-blue-500 hover:text-blue-400 hover:cursor-pointer break-all" wire:click.prevent="downloadAttachment({{ $this->state['id'] }})">
                            <x-svg-icon class="h-5 w-5 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                            </x-svg-icon>
                            {{ basename($this->state['checklist_path']) }}
                        </div>
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
