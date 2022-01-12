<x-panel wire:model="isOpenPanel">

    <x-slot name="title">

        <x-svg-icon stroke-width="2" class="mr-1">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M18 9a5 5 0 0 0 -5 -5h-2a5 5 0 0 0 -5 5v6a5 5 0 0 0 5 5h2a5 5 0 0 0 5 -5"></path>
        </x-svg-icon>
        {{ __('Contractor Details') }}

    </x-slot>

    <x-slot name="content">
        @if($isOpenPanel)

            <ul class="space-y-4 text-sm">
                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        Reference Code
                    </li>
                    <li>
                        {{ $this->state['reference_code'] }}
                    </li>
                </div>
                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        Contractor No
                    </li>
                    <li>
                        {{ $this->state['contractor_no'] }}
                    </li>
                </div>
                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        Contractor Name
                    </li>
                    <li>
                        {{ $this->state['name'] ?? '-' }}
                    </li>
                </div>
                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        Start Date
                    </li>
                    <li>
                        {{ $this->state['start_date'] ?? '-' }}
                    </li>
                </div>
                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        End Date
                    </li>
                    <li>
                        {{ $this->state['end_date'] ?? '-' }}
                    </li>
                </div>
                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        Type
                    </li>
                    <li>
                        {{ $this->state['type'] ?? '-' }}
                    </li>
                </div>
                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        Value
                    </li>
                    <li>
                        {{ $this->state['value'] ?? '-' }}
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
