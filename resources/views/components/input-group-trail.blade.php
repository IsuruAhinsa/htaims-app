<div class="relative">

    <x-jet-input {{ $attributes->merge(['class' => 'w-full']) }}/>

    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-gray-400 uppercase text-sm">
        {{ $trail }}
    </div>

</div>
