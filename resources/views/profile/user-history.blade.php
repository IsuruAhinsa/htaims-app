<x-jet-action-section>
    <x-slot name="title">
        {{ __('User History') }}
    </x-slot>

    <x-slot name="description">
        {{ __('User can see their last login details and history.') }}
    </x-slot>

    <x-slot name="content">

        <div class="max-w-xl text-sm text-gray-600">
            {{ __('The last time you interactively signed in to this account was,') }}
        </div>

        <div class="mt-5 space-y-6">
            <div class="flex items-center">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>

                <div class="ml-3">
                    <div class="text-sm">
                        Last Login
                    </div>

                    <div class="text-xs text-gray-600">
                        {{ \Carbon\Carbon::parse($this->user->last_login)->toDayDateTimeString() }} -
                        <span class="text-green-500 font-semibold">
                                {{ $this->user->last_login_ip }}
                            </span>
                    </div>
                </div>
            </div>

            <div class="flex items-center">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>

                <div class="ml-3">
                    <div class="text-sm">
                        Since at
                    </div>

                    <div class="text-xs text-gray-600">
                        {{ \Carbon\Carbon::parse($this->user->created_at)->toDayDateTimeString() }}
                    </div>
                </div>
            </div>
        </div>

    </x-slot>
</x-jet-action-section>
