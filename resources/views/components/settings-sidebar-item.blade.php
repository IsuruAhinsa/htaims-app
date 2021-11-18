<li {{ $attributes->merge(['class' => 'flex py-6 px-6 border-b hover:cursor-pointer hover:bg-blue-50']) }}>

    <div class="flex items-center">
        <x-svg-icon class="text-gray-500">
            {{ $slot }}
        </x-svg-icon>

        <div class="hidden ml-3 sm:inline-block">
            <h1 class="font-normal text-gray-800">{{ $title }}</h1>
            <p class="text-xs text-gray-400">{{ $description }}</p>
        </div>
    </div>

</li>
