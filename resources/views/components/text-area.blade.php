@props(['disabled' => false])

<textarea cols="10" rows="5" {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['class' => 'form-textarea border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm']) }}></textarea>
