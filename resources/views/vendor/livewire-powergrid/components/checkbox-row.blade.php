@props([
    'theme' => null,
    'checkbox' => null,
    'attribute' => null
])
@if($checkbox)
    <td class="{{ $theme->thClass }}" style="{{ $theme->thStyle }}">
        <div class="{{ $theme->divClass }}">
            <label class="{{ $theme->labelClass }}">
                <input class="{{ $theme->inputClass }} form-checkbox rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="checkbox" wire:model.defer="checkboxValues"
                       value="{{ $attribute }}">
            </label>
        </div>
    </td>
@endif
