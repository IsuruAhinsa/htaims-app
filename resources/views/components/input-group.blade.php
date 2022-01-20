@props([
    'prefix' => null,
    'trail' => null
])

<div class="relative">

    @if($prefix)

        <div class="absolute inset-y-0 left-0 flex items-center pl-2.5 pointer-events-none text-gray-400 uppercase text-sm">
            <div class="pl-1 flex items-center self-center">
                {{ $prefix }}
            </div>
        </div>

    @endif

    <x-jet-input {{ $attributes->class([$prefix ? 'pl-10' : ''])->merge(['class' => 'w-full']) }}/>

    @if($trail)

        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-gray-400 uppercase text-sm">
            {{ $trail }}
        </div>

    @endif

</div>
