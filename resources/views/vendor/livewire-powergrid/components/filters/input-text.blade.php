@props([
    'theme' => '',
    'column' => null,
    'inline' => null,
    'inputText' => null
])
<div>
    @if(filled($inputText))
        <div class="@if(!$inline) pt-2 p-2 @endif">
            @if(!$inline)
                <label class="text-gray-700 dark:text-gray-300">{{ data_get($inputText, 'label') }}</label>
            @endif
            <div class="@if($inline) flex flex-col @else flex flex-row justify-between @endif">
                <div class="@if(!$inline) pl-0 pt-1 pr-3 @endif">
                    <div class="relative">
                        <select id="input_text_options"
                                class="power_grid {{ $theme->selectClass }} {{ data_get($column, 'headerClass') }} bg-white border-gray-300 dark:border-transparent focus:border-indigo-300 dark:focus:border-indigo-500 focus:ring dark:focus:ring-0 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm dark:bg-dark-third"
                                wire:model.debounce.800ms="filters.input_option_text.{{ data_get($inputText, 'field')  }}"
                                wire:input.debounce.300ms="filterInputTextOptions('{{ data_get($inputText, 'field') }}', $event.target.value, '{{ data_get($inputText, 'label') }}')">
                            <option value="contains">{{ trans('livewire-powergrid::datatable.input_text_options.contains') }}</option>
                            <option value="contains_not">{{ trans('livewire-powergrid::datatable.input_text_options.contains_not') }}</option>
                            <option value="is">{{ trans('livewire-powergrid::datatable.input_text_options.is') }}</option>
                            <option value="is_not">{{ trans('livewire-powergrid::datatable.input_text_options.is_not') }}</option>
                            <option value="starts_with">{{ trans('livewire-powergrid::datatable.input_text_options.starts_with') }}</option>
                            <option value="ends_with">{{ trans('livewire-powergrid::datatable.input_text_options.ends_with') }}</option>
                        </select>
                        <div class="{{ $theme->relativeDivClass }}">
                            <x-livewire-powergrid::icons.down class="w-4 h-4"/>
                        </div>
                    </div>
                </div>
                <div class="mt-1">
                    <input
                            data-id="{{ data_get($inputText, 'field') }}"
                            wire:model.debounce.800ms="filters.input_text.{{ data_get($inputText, 'field')  }}"
                            wire:input.debounce.800ms="filterInputText('{{ data_get($inputText, 'field') }}', $event.target.value, '{{ data_get($inputText, 'label') }}')"
                            type="text"
                            class="power_grid {{ $theme->inputClass }} form-input border-gray-300 focus:border-indigo-300 dark:focus:border-indigo-500 focus:ring dark:focus:ring-0 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm dark:bg-dark-third dark:text-dark-typography dark:border-transparent"
                            placeholder="{{ empty($column)?data_get($inputText, 'label'):($column->placeholder?:$column->title) }}">
                </div>
            </div>
        </div>
    @endif
</div>
