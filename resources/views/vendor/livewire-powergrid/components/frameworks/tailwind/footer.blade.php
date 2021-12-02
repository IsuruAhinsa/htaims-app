<div class="md:flex md:flex-row w-full justify-between pt-3 bg-white dark:bg-dark-secondary overflow-y-auto pl-2 pr-2 pb-1 relative dark:bg-gray-700">

    @if($perPageInput)
        <div class="flex flex-row justify-center md:justify-start mb-2 md:mb-0">
            <div class="relative h-10">

                <select wire:model.lazy="perPage"
                        class="block appearance-none bg-white border border-gray-300 text-gray-700 py-2 px-3 pr-8 leading-tight focus:outline-none focus:bg-white dark:bg-dark-third dark:text-dark-typography dark:placeholder-gray-200 hover:cursor-pointer dark:border-transparent focus:border-indigo-300 focus:ring dark:focus:ring-0 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    @foreach($perPageValues as $value)
                        <option value="{{$value}}">
                            @if($value == 0)
                                {{ trans('livewire-powergrid::datatable.labels.all') }}
                            @else
                                {{ $value }}
                            @endif
                        </option>
                    @endforeach
                </select>

                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <x-livewire-powergrid::icons.down class="w-4 h-4 dark:text-dark-typography"/>
                </div>
            </div>
            <div class="pl-4 hidden sm:block md:block lg:block w-full" style="padding-top: 6px;">
            </div>
        </div>
    @endif

    @if(filled($data))
        <div>
            @if(method_exists($data, 'links'))
                {!! $data->links(powerGridThemeRoot().'.pagination', ['recordCount' => $recordCount]) !!}
            @endif
        </div>
    @endif
</div>


