@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-input border-gray-300 dark:bg-dark-third dark:text-dark-typography dark:border-transparent focus:border-indigo-300 dark:focus:border-indigo-500 focus:ring dark:focus:ring-0 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm']) !!}>
