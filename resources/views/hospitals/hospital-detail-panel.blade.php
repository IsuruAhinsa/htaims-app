<x-panel wire:model="isOpenPanel">

    <x-slot name="title">

        <x-svg-icon stroke-width="2" class="mr-1">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <rect x="4" y="4" width="16" height="16" rx="2"></rect>
            <line x1="9" y1="8" x2="9" y2="16"></line>
            <line x1="9" y1="12" x2="15" y2="12"></line>
            <line x1="15" y1="8" x2="15" y2="16"></line>
        </x-svg-icon>
        {{ __('Hospital Details') }}

    </x-slot>

    <x-slot name="content">
        @if($isOpenPanel)

            <ul class="space-y-4 text-sm">
                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        Hospital Code
                    </li>
                    <li>
                        {{ $this->state['code'] }}
                    </li>
                </div>
                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        Hospital Code Prefix
                    </li>
                    <li>
                        {{ $this->state['hospital_code_prefix'] }}
                    </li>
                </div>
                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        Hospital Name
                    </li>
                    <li>
                        {{ $this->state['name'] }}
                    </li>
                </div>
                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        Region
                    </li>
                    <li>
                        {{ $this->state['region'] }}
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
                        WO Prefix
                    </li>
                    <li>
                        {{ $this->state['wo_prefix'] }}
                    </li>
                </div>
                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        WOCM Serial No
                    </li>
                    <li>
                        {{ $this->state['wocm_slno'] }}
                    </li>
                </div>
                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        WOPM Serial No
                    </li>
                    <li>
                        {{ $this->state['wopm_slno'] }}
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
