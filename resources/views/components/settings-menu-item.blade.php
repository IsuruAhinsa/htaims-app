<li {{ $attributes->merge(['class' => 'py-2 font-medium text-gray-600 border-l-2 border-transparent hover:border-l-2 hover:border-blue-700 hover:bg-blue-50 hover:text-blue-600 cursor-pointer']) }}>

    <div class="flex items-center w-full ml-3">

        <x-svg-icon>
            {{ $slot }}
        </x-svg-icon>

        <a href="#" class="ml-2">
            {{ $title }}
        </a>

    </div>
    
</li>