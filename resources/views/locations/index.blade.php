<x-app-layout>

    <div class="py-3 px-6 border-t lg:flex lg:items-center lg:justify-between">

        <div class="flex-1 min-w-0">

            <x-breadcrumb :segments="$currentSegment"/>

            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                Locations
            </h2>

        </div>

        <ul class="mt-5 flex space-x-2 lg:mt-0 lg:ml-4">

            <li>
                <x-action-button>

                    <x-svg-icon class="-ml-1 -mr-1 sm:mr-2 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </x-svg-icon>

                    <span class="hidden sm:block">{{ __('Create') }}</span>

                </x-action-button>
            </li>

            <li>

                <x-action-button>

                    <x-svg-icon stroke="none" class="-ml-1 -mr-1 sm:mr-2 text-gray-500">
                        <path d="M5.33929 4.46777H7.33929V7.02487C8.52931 6.08978 10.0299 5.53207 11.6607 5.53207C15.5267 5.53207 18.6607 8.66608 18.6607 12.5321C18.6607 16.3981 15.5267 19.5321 11.6607 19.5321C9.51025 19.5321 7.58625 18.5623 6.30219 17.0363L7.92151 15.8515C8.83741 16.8825 10.1732 17.5321 11.6607 17.5321C14.4222 17.5321 16.6607 15.2935 16.6607 12.5321C16.6607 9.77065 14.4222 7.53207 11.6607 7.53207C10.5739 7.53207 9.56805 7.87884 8.74779 8.46777L11.3393 8.46777V10.4678H5.33929V4.46777Z" fill="currentColor" />
                    </x-svg-icon>

                    <span class="hidden sm:block">{{ __('Deleted Locations') }}</span>

                </x-action-button>

            </li>

        </ul>

    </div>


</x-app-layout>
