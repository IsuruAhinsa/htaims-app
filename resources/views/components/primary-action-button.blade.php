<button type="button" {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 border border-indigo-300 bg-indigo-500 rounded-md shadow-sm text-sm font-medium text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500']) }}>
    {{ $slot }}
</button>
