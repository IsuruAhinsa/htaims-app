<div>

    <div class="py-3 px-6 border-t dark:border-dark-third lg:flex lg:items-center lg:justify-between">

        <div class="flex-1 min-w-0">

            {{ Breadcrumbs::render('locations.trash') }}

            <h2 class="text-2xl font-bold leading-7 text-gray-900 dark:text-white sm:text-3xl sm:truncate">
                Deleted Locations
            </h2>

        </div>

        <ul class="mt-5 flex space-x-2 lg:mt-0 lg:ml-4">

            <li>
                <x-action-button wire:click.prevent="create()">

                    <x-svg-icon class="-ml-1 -mr-1 sm:mr-2 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </x-svg-icon>

                    <span class="hidden sm:block">{{ __('Create') }}</span>

                </x-action-button>
            </li>

            <li>

                <a href="{{ route('locations.index') }}">

                    <x-action-button>

                        <x-svg-icon class="-ml-1 -mr-1 sm:mr-2 text-gray-500">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />

                        </x-svg-icon>

                        <span class="hidden sm:block">{{ __('Back To Locations') }}</span>

                    </x-action-button>

                </a>

            </li>

        </ul>

    </div>

    <div class="bg-white dark:bg-dark-secondary rounded-xl py-10 px-12 mx-4">

        <livewire:locations.location-trash-table/>

    </div>

    @include('locations.restore-confirmation-modal')

    @include('locations.force-delete-confirmation-modal')

</div>
