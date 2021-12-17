<div>

    <div class="py-3 px-6 border-t dark:border-dark-third lg:flex lg:items-center lg:justify-between">

        <div class="flex-1 min-w-0">

            {{ Breadcrumbs::render('manufacturers.index') }}

            <h2 class="text-2xl font-bold leading-7 text-gray-900 dark:text-white sm:text-3xl sm:truncate">
                Manufacturers
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

                <a href="{{ route('manufacturers.trash') }}">

                    <x-action-button>

                        <x-svg-icon class="-ml-1 -mr-1 sm:mr-2 text-gray-500">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />

                        </x-svg-icon>

                        <span class="hidden sm:block">{{ __('Deleted Manufacturers') }}</span>

                    </x-action-button>

                </a>

            </li>

        </ul>

    </div>

    <div class="bg-white dark:bg-dark-secondary rounded-xl py-10 px-12 mx-4">

        <livewire:manufacturers.manufacturer-table/>

    </div>

    @include('manufacturers.manufacturer-form-modal')

    @include('manufacturers.manufacturer-detail-panel')

    @include('manufacturers.delete-confirmation-modal')

</div>
