<nav class="flex flex-col absolute items-center bg-white dark:bg-black shadow">

    <div class="h-16 flex items-center w-full">
        <!-- Logo Section -->
        <div class="h-16 px-6 flex justify-center items-center w-full">
            <a href="{{ route('dashboard') }}">
                <x-jet-application-mark class="block h-9 w-9" />
            </a>
        </div>
    </div>

    <ul id="sidebar">

        <x-sidebar-item :route="route('dashboard')" :dataTitle="'Dashboard'">
            <x-svg-icon>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </x-svg-icon>
        </x-sidebar-item>


        <x-sidebar-item :route="'#'" :dataTitle="'Assets'">
            <x-svg-icon>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
            </x-svg-icon>
        </x-sidebar-item>

        @canany(['tasks.create', 'tasks.view', 'tasks.download'])

            <x-sidebar-item :route="route('tasks.index')" :dataTitle="'Tasks'">
                <x-svg-icon>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </x-svg-icon>
            </x-sidebar-item>

        @endcanany

        <x-sidebar-item :route="'#'" :dataTitle="'Accessories'">
            <x-svg-icon>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </x-svg-icon>
        </x-sidebar-item>

        @canany(['hospitals.create', 'hospitals.view'])

            <x-sidebar-item :route="route('hospitals.index')" :dataTitle="'Hospitals'">
                <x-svg-icon stroke-width="2">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <rect x="4" y="4" width="16" height="16" rx="2"></rect>
                    <line x1="9" y1="8" x2="9" y2="16"></line>
                    <line x1="9" y1="12" x2="15" y2="12"></line>
                    <line x1="15" y1="8" x2="15" y2="16"></line>
                </x-svg-icon>
            </x-sidebar-item>

        @endcanany

        @canany(['locations.create', 'locations.view'])

            <x-sidebar-item :route="route('locations.index')" :dataTitle="'Locations'">
                <x-svg-icon stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </x-svg-icon>
            </x-sidebar-item>

        @endcanany

        @canany(['manufacturers.create', 'manufacturers.view'])

            <x-sidebar-item :route="route('manufacturers.index')" :dataTitle="'Manufacturers'">
                <x-svg-icon stroke-width="2">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 21c1.147 -4.02 1.983 -8.027 2 -12h6c.017 3.973 .853 7.98 2 12"></path>
                    <path d="M12.5 13h4.5c.025 2.612 .894 5.296 2 8"></path>
                    <path d="M9 5a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1"></path>
                    <line x1="3" y1="21" x2="22" y2="21"></line>
                </x-svg-icon>
            </x-sidebar-item>

        @endcanany

        @canany(['departments.create', 'departments.view'])

            <x-sidebar-item :route="route('departments.index')" :dataTitle="'Departments'">
                <x-svg-icon stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </x-svg-icon>
            </x-sidebar-item>

        @endcanany

        @canany(['vendors.create', 'vendors.view'])

            <x-sidebar-item :route="route('vendors.index')" :dataTitle="'Vendors'">
                <x-svg-icon stroke-width="2">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <line x1="3" y1="21" x2="21" y2="21"></line>
                    <path d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4"></path>
                    <line x1="5" y1="21" x2="5" y2="10.85"></line>
                    <line x1="19" y1="21" x2="19" y2="10.85"></line>
                    <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4"></path>
                </x-svg-icon>
            </x-sidebar-item>

        @endcanany

        @canany(['contractors.create', 'contractors.view'])

            <x-sidebar-item :route="route('contractors.index')" :dataTitle="'Contractors'">
                <x-svg-icon stroke-width="2">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M18 9a5 5 0 0 0 -5 -5h-2a5 5 0 0 0 -5 5v6a5 5 0 0 0 5 5h2a5 5 0 0 0 5 -5"></path>
                </x-svg-icon>
            </x-sidebar-item>

        @endcanany

        <x-sidebar-item :route="'#'" :dataTitle="'Spare Parts'">
            <x-svg-icon stroke-width="2">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <rect x="4" y="4" width="16" height="16" rx="2"></rect>
                <circle cx="9" cy="12" r=".5" fill="currentColor"></circle>
                <circle cx="15" cy="12" r=".5" fill="currentColor"></circle>
            </x-svg-icon>
        </x-sidebar-item>

        <x-sidebar-item :route="'#'" :dataTitle="'Work Orders'">
            <x-svg-icon stroke-width="2">
                <circle cx="12" cy="12" r="3"></circle>
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <line x1="4" y1="20" x2="20" y2="20"></line>
                <line x1="9.4" y1="10" x2="14.6" y2="10"></line>
                <line x1="7.8" y1="15" x2="16.2" y2="15"></line>
                <path d="M6 20l5 -15h2l5 15"></path>
            </x-svg-icon>
        </x-sidebar-item>

        <x-sidebar-item :route="'#'" :dataTitle="'Preventive Maintenances'">
            <x-svg-icon stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </x-svg-icon>
        </x-sidebar-item>

        <div class="bg-green-100 rounded-3xl my-1">

            <x-sidebar-item :route="'#'" :dataTitle="'Material Requisitions'" class="hover:bg-transparent dark:text-black dark:hover:bg-green-100 rounded-3xl">
                <x-svg-icon>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 15v-1a4 4 0 00-4-4H8m0 0l3 3m-3-3l3-3m9 14V5a2 2 0 00-2-2H6a2 2 0 00-2 2v16l4-2 4 2 4-2 4 2z" />
                </x-svg-icon>
            </x-sidebar-item>

            <x-sidebar-item :route="'#'" :dataTitle="'Purchase Requisitions'" class="hover:bg-transparent dark:text-black dark:hover:bg-green-100 rounded-3xl">
                <x-svg-icon>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </x-svg-icon>
            </x-sidebar-item>

            <x-sidebar-item :route="'#'" :dataTitle="'Purchase Orders'" class="hover:bg-transparent dark:text-black dark:hover:bg-green-100 rounded-3xl">
                <x-svg-icon>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </x-svg-icon>
            </x-sidebar-item>

        </div>

        <div class="bg-yellow-100 rounded-3xl my-1">

            <x-sidebar-item :route="'#'" :dataTitle="'Items'" class="hover:bg-transparent dark:text-black dark:hover:bg-yellow-100 rounded-3xl">
                <x-svg-icon stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01" />
                </x-svg-icon>
            </x-sidebar-item>

            <x-sidebar-item :route="'#'" :dataTitle="'Bucket'" class="hover:bg-transparent dark:text-black dark:hover:bg-yellow-100 rounded-3xl">
                <x-svg-icon stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                </x-svg-icon>
            </x-sidebar-item>

        </div>

        <div class="bg-purple-100 rounded-3xl my-1">

            @canany(['users.create','users.view', 'roles.create', 'roles.view'])

                <x-sidebar-item :route="route('users.index')" :dataTitle="'Users'" class="hover:bg-transparent dark:text-black dark:hover:bg-purple-100 rounded-3xl">
                    <x-svg-icon>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </x-svg-icon>
                </x-sidebar-item>

            @endcanany

            <x-sidebar-item :route="'#'" :dataTitle="'Subscription'" class="hover:bg-transparent dark:text-black dark:hover:bg-purple-100 rounded-3xl">
                <x-svg-icon>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                </x-svg-icon>
            </x-sidebar-item>

        </div>

        @canany(['settings.view', 'settings.edit'])

            <x-sidebar-item :route="route('settings')" :dataTitle="'Settings'">
                <x-svg-icon stroke-width="2">
                    <circle cx="12" cy="12" r="3"></circle>
                    <path
                        d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1
                            0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0
                            0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2
                            2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0
                            0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1
                            0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0
                            0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65
                            0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0
                            1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0
                            1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2
                            0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0
                            1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0
                            2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0
                            0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65
                            1.65 0 0 0-1.51 1z"></path>
                </x-svg-icon>
            </x-sidebar-item>

        @endcanany

    </ul>

    <div class="mt-auto h-16 flex items-center w-full">
        <!-- Action Section -->
        <button
            class="h-16 mx-auto flex flex justify-center items-center
				w-full focus:text-orange-500 hover:bg-red-200 focus:outline-none">
            <x-svg-icon stroke-width="2" class="text-red-700">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                <polyline points="16 17 21 12 16 7"></polyline>
                <line x1="21" y1="12" x2="9" y2="12"></line>
            </x-svg-icon>
        </button>
    </div>

</nav>
