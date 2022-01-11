@if(session()->has($status))

    <div x-data="{{ json_encode(['status' => $status]) }}" class="relative items-center w-full mx-auto max-w-7xl py-2">
        <div class="p-6 rounded-xl" :class="{'bg-green-50': status == 'success', 'bg-red-50': status == 'danger'}">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg x-show="status == 'success'" class="w-5 h-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>

                    <svg x-show="status == 'danger'" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-3">
                    <div class="text-sm" :class="{'text-green-600': status == 'success', 'text-red-600': status == 'danger'}">
                        <p>{{ session()->get($status) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endif
