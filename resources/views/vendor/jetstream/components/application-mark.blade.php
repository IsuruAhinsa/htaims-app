@if(\App\Models\Setting::getSettings()->logo_path)

    <img src="{{ asset(\App\Models\Setting::getSettings()->logo_path) }}" alt="{{ \App\Models\Setting::getSettings()->logo_path }}" {{ $attributes }}>

@else

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" {{ $attributes->merge(['class' => 'text-indigo-600']) }}>
        <path fill-rule="evenodd"
              d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z"
              clip-rule="evenodd" />
    </svg>

@endif
