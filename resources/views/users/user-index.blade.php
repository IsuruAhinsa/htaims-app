<div>

    <div class="py-3 px-6 border-t dark:border-dark-third lg:flex lg:items-center lg:justify-between">

        <div class="flex-1 min-w-0">

            {{ Breadcrumbs::render('users.index') }}

            <h2 class="text-2xl font-bold leading-7 text-gray-900 dark:text-white sm:text-3xl sm:truncate">
                Users
            </h2>

        </div>

        <ul class="mt-5 flex space-x-2 lg:mt-0 lg:ml-4">

            @canany(['roles.create', 'roles.view'])
                <li>
                    <a href="{{ route('roles.index') }}">

                        <x-primary-action-button>

                            <x-svg-icon class="-ml-1 -mr-1 sm:mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01" />
                            </x-svg-icon>

                            <span class="hidden sm:block">{{ __('Role & Permissions') }}</span>

                        </x-primary-action-button>

                    </a>
                </li>
            @endcanany

            @can('users.create')
                <li>
                    <x-action-button wire:click.prevent="create()">

                        <x-svg-icon class="-ml-1 -mr-1 sm:mr-2 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </x-svg-icon>

                        <span class="hidden sm:block">{{ __('Create') }}</span>

                    </x-action-button>
                </li>
            @endcan

            @can('users.view')
                <li>

                    <a href="{{ route('users.trash') }}">

                        <x-action-button>

                            <x-svg-icon class="-ml-1 -mr-1 sm:mr-2 text-gray-500">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />

                            </x-svg-icon>

                            <span class="hidden sm:block">{{ __('Deleted Users') }}</span>

                        </x-action-button>

                    </a>

                </li>
            @endcan

        </ul>

    </div>

    <div class="bg-white dark:bg-dark-secondary rounded-xl py-10 px-12 mx-4">

        <livewire:users.user-table/>

    </div>

    @include('users.user-form-modal')

    @include('users.delete-confirmation-modal')

    @include('users.user-detail-panel')

</div>
