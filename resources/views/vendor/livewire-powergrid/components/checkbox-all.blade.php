@props([
    'theme' => null
])
<div>

    <th scope="col" class="{{ $theme->thClass }}" style="{{ $theme->thStyle }}">
        <div class="{{ $theme->divClass }}">
            <label class="{{ $theme->labelClass }}">
                <input class="{{ $theme->inputClass }} form-checkbox rounded border-gray-300 dark:border-transparent text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring dark:focus:ring-0 focus:ring-indigo-200 focus:ring-opacity-50"
                       type="checkbox"
                       wire:click="selectCheckboxAll()"
                       wire:model.defer="checkboxAll">
            </label>
        </div>
    </th>

</div>
