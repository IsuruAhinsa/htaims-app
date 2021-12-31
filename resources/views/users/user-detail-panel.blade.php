<x-panel wire:model="isOpenPanel">

    <x-slot name="title">

        <x-svg-icon class="mr-1">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
        </x-svg-icon>

        {{ __('User Details') }}

    </x-slot>

    <x-slot name="content">
        @if($isOpenPanel)

            <ul class="space-y-4 text-sm">

                <div>
                    <li>
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-24 w-24">
                                <img class="h-24 w-24 rounded-full" src="{{ asset($this->state['profile_photo_url']) }}" alt="{{ $this->state['name'] }}">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $this->state['name'] }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ $this->state['email'] }}
                                </div>
                            </div>
                        </div>
                    </li>
                </div>

                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        Phone
                    </li>
                    <li>
                        {{ $this->state['phone'] ?? '-' }}
                    </li>
                </div>

                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        Last Login At
                    </li>
                    <li>
                        {{ $this->state['last_login'] ?? '-' }}
                    </li>
                </div>

                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        Last Login IP Address
                    </li>
                    <li>
                        {{ $this->state['last_login_ip'] ?? '-' }}
                    </li>
                </div>

                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        Role(s)
                    </li>
                    <li>
                        @foreach($this->state['roles'] as $role)
                            {{ $role->name }} <br>
                        @endforeach
                    </li>
                </div>

                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        Registered At
                    </li>
                    <li>
                        {{ $this->state['created_at'] }}
                    </li>
                </div>

                <div>
                    <li class="text-gray-500 dark:text-gray-400">
                        Updated At
                    </li>
                    <li>
                        {{ $this->state['updated_at'] }}
                    </li>
                </div>
            </ul>

        @endif
    </x-slot>

</x-panel>
