@props(['route', 'dataTitle'])

<li {{ $attributes->merge(['class' => 'rounded-lg hover:bg-gray-100']) }}>
    <a href="{{ $route }}" data-title="{{ $dataTitle }}" class="h-16 px-6 flex justify-center items-center w-full hover:text-blue-500 sidebar-link">
        {{ $slot }}
    </a>
</li>
