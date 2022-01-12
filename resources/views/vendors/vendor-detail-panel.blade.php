<x-panel wire:model="isOpenPanel">

    <x-slot name="title">

        <x-svg-icon stroke-width="2" class="mr-1">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <line x1="3" y1="21" x2="21" y2="21"></line>
            <path d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4"></path>
            <line x1="5" y1="21" x2="5" y2="10.85"></line>
            <line x1="19" y1="21" x2="19" y2="10.85"></line>
            <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4"></path>
        </x-svg-icon>
        {{ __('Vendor Details') }}

    </x-slot>

    <x-slot name="content">
        @if($isOpenPanel)

            <ul class="space-y-4 text-sm">
                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        Vendor Code
                    </li>
                    <li>
                        {{ $this->state['code'] }}
                    </li>
                </div>
                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        Vendor Name
                    </li>
                    <li>
                        {{ $this->state['name'] }}
                    </li>
                </div>
                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        Contact Person
                    </li>
                    <li>
                        {{ $this->state['contact_person'] }}
                    </li>
                </div>
                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        Address
                    </li>
                    <li>
                        {!! $this->state['address'] !!}
                    </li>
                </div>
                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        City
                    </li>
                    <li>
                        {{ $this->state['city'] }}
                    </li>
                </div>
                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        Zip
                    </li>
                    <li>
                        {{ $this->state['zip'] }}
                    </li>
                </div>
                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        Country
                    </li>
                    <li>
                        {{ $this->state['country'] }}
                    </li>
                </div>
                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        Phone
                    </li>
                    <li>
                        {{ $this->state['phone'] }}
                    </li>
                </div>
                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        Fax
                    </li>
                    <li>
                        {{ $this->state['fax'] }}
                    </li>
                </div>
                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        Email
                    </li>
                    <li>
                        {{ $this->state['email'] }}
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
