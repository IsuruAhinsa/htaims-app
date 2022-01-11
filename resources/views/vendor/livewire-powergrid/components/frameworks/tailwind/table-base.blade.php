<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full w-full sm:px-6 lg:px-8">

            @include($theme->layout->header, [
                'enabledFilters' => $enabledFilters
            ])

            @if(config('livewire-powergrid.filter') === 'outside')
                @if(count($makeFilters) > 0)
                    <div>
                        <x-livewire-powergrid::frameworks.tailwind.filter
                            :makeFilters="$makeFilters"
                            :theme="$theme"
                        />
                    </div>
                @endif
            @endif

            <div class="overflow-hidden overflow-x-auto mt-3 bg-white overflow-y-auto relative rounded">
                @include($table)
            </div>

            @include($theme->footer->view)
        </div>
    </div>
</div>
