<div>

    <div class="py-3 px-6 border-t dark:border-dark-third lg:flex lg:items-center lg:justify-between">

        <div class="flex-1 min-w-0">

            {{ Breadcrumbs::render('assets.show', $asset) }}

        </div>

    </div>

    <div class="py-3 px-6 inline-flex items-center">

        <div class="bg-indigo-100 p-3 rounded-full">
            <x-svg-icon class="h-10 w-10 text-indigo-500">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
            </x-svg-icon>
        </div>
        <div class="ml-2">
            <h1 class="font-medium text-2xl dark:text-white">{{ $asset->asset_no }}</h1>
            <p class="text-sm font-normal text-gray-500">Registered on <span class="text-gray-800 dark:text-dark-typography">{{ $asset->created_at }}</span> type as a <span class="text-gray-800 dark:text-dark-typography">{{ $asset->type }}</span> </p>
        </div>

    </div>

    <ul class="px-6 mt-5 flex space-x-2 lg:mt-0">

        @can('assets.edit')
            <li>
                <a href="#">

                    <x-action-button>

                        <x-svg-icon class="-ml-1 -mr-1 sm:mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </x-svg-icon>

                        <span class="hidden sm:block">{{ __('Edit') }}</span>

                    </x-action-button>

                </a>
            </li>
        @endcan

        @can('assets.delete')
            <li>
                <a href="#">

                    <x-action-button>

                        <x-svg-icon class="-ml-1 -mr-1 sm:mr-2">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />

                        </x-svg-icon>

                        <span class="hidden sm:block">{{ __('Delete') }}</span>

                    </x-action-button>

                </a>
            </li>
        @endcan

            <li>
                <a href="#">

                    <x-action-button>

                        <x-svg-icon class="-ml-1 -mr-1 sm:mr-2">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />

                        </x-svg-icon>

                        <span class="hidden sm:block">{{ __('Export as PDF') }}</span>

                    </x-action-button>

                </a>
            </li>

            <li>
                <a href="#">

                    <x-action-button>

                        <x-svg-icon class="-ml-1 -mr-1 sm:mr-2" stroke-width="2">
                            <circle cx="12" cy="12" r="3"></circle>
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="4" y1="20" x2="20" y2="20"></line>
                            <line x1="9.4" y1="10" x2="14.6" y2="10"></line>
                            <line x1="7.8" y1="15" x2="16.2" y2="15"></line>
                            <path d="M6 20l5 -15h2l5 15"></path>
                        </x-svg-icon>

                        <span class="hidden sm:block">{{ __('Create Work Order') }}</span>

                    </x-action-button>

                </a>
            </li>

            <li>
                <a href="#">

                    <x-action-button>

                        <x-svg-icon class="-ml-1 -mr-1 sm:mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </x-svg-icon>

                        <span class="hidden sm:block">{{ __('Create PPM') }}</span>

                    </x-action-button>

                </a>
            </li>
    </ul>

    <div class="flex flex-wrap mx-3 mb-4">

        <div class="px-3 my-3 space-y-3 w-full lg:w-2/3 flex flex-col">

            <div class="bg-white dark:bg-dark-secondary shadow overflow-hidden sm:rounded-lg ">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-700 dark:text-white">
                        Asset General Information
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Common asset details in the hospital. Hospital Asset No, Model, Serial Number etc...
                    </p>
                </div>
                <div class="border-t border-gray-200 dark:border-dark-third">

                    <div class="max-w-7xl mx-auto px-4 py-5 sm:px-6 lg:px-6">

                        <dl class="grid grid-cols-1 gap-y-5 md:grid-cols-2 md:gap-x-8 md:gap-y-10">

                            <div>
                                <dt class="text-sm text-gray-500">
                                    Asset Number
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-dark-typography sm:mt-0">
                                    {{ $asset->asset_no }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm text-gray-500">
                                    Service
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-dark-typography sm:mt-0">
                                    {{ $asset->service }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm text-gray-500">
                                    Brand
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-dark-typography sm:mt-0">
                                    {{ $asset->brand }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm text-gray-500">
                                    Model
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-dark-typography sm:mt-0">
                                    {{ $asset->model }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm font-normal text-gray-500">
                                    Serial Number
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-dark-typography sm:mt-0">
                                    {{ $asset->serial }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm font-normal text-gray-500">
                                    Registration
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-dark-typography sm:mt-0">
                                    {{ $asset->registration }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm font-normal text-gray-500">
                                    Generic Name
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-dark-typography sm:mt-0">
                                    {{ $asset->generic_name }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm font-normal text-gray-500">
                                    Hospital Asset No
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-dark-typography sm:mt-0">
                                    {{ $asset->hospital_asset_no }}
                                </dd>
                            </div>

                        </dl>

                    </div>

                </div>
            </div>

            <div class="bg-white dark:bg-dark-secondary shadow overflow-hidden sm:rounded-lg ">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-700 dark:text-white">
                        Asset Management Information
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Asset ordering & managing information.
                    </p>
                </div>
                <div class="border-t border-gray-200 dark:border-dark-third">

                    <div class="max-w-7xl mx-auto px-4 py-5 sm:px-6 lg:px-6">

                        <dl class="grid grid-cols-1 gap-y-5 md:grid-cols-2 md:gap-x-8 md:gap-y-10">

                            <div>
                                <dt class="text-sm text-gray-500">
                                    Manual
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-dark-typography sm:mt-0">
                                    {{ $asset->manuals }} - {{ \App\Models\Asset::assetManuals()[$asset->manuals] }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm text-gray-500">
                                    Variation
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-dark-typography sm:mt-0">
                                    @if(isset($asset->variation))
                                        {{ $asset->variation }} - {{ \App\Models\Asset::assetVariations()[$asset->variation] }}
                                    @else
                                        -
                                    @endif
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm text-gray-500">
                                    PPM Date
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-dark-typography sm:mt-0">
                                    {{ $asset->ppm_date }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm text-gray-500">
                                    PM Frequency
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-dark-typography sm:mt-0">
                                    {{ $asset->pm_frequency }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm font-normal text-gray-500">
                                    Status
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-dark-typography sm:mt-0">
                                    {{ $asset->status }} - {{ \App\Models\Asset::assetStatus()[$asset->status] }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm font-normal text-gray-500">
                                    Category
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-dark-typography sm:mt-0">
                                    {{ $asset->type }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm font-normal text-gray-500">
                                    Ownership
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-dark-typography sm:mt-0">
                                    {{ $asset->ownership }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm font-normal text-gray-500">
                                    Utilization
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-dark-typography sm:mt-0">
                                    {{ $asset->utilization }}
                                </dd>
                            </div>

                        </dl>

                    </div>

                </div>
            </div>

            <div class="bg-white dark:bg-dark-secondary shadow overflow-hidden sm:rounded-lg ">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-700 dark:text-white">
                        Warranty & Payments Information
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Warranty details and payment details of the asset.
                    </p>
                </div>
                <div class="border-t border-gray-200 dark:border-dark-third">

                    <div class="max-w-7xl mx-auto px-4 py-5 sm:px-6 lg:px-6">

                        <dl class="grid grid-cols-1 gap-y-5 md:grid-cols-2 md:gap-x-8 md:gap-y-10">

                            <div>
                                <dt class="text-sm text-gray-500">
                                    Purchase Date
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-dark-typography sm:mt-0">
                                    {{ $asset->purchase_date }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm text-gray-500">
                                    Warranty Expire Date
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-dark-typography sm:mt-0">
                                    {{ $asset->warranty_expire_date }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm text-gray-500">
                                    Warranty Period
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-dark-typography sm:mt-0">
                                    {{ $asset->warranty_period }} Months
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm text-gray-500">
                                    Warranty Status
                                </dt>
                                <dd class="mt-1 sm:mt-0" x-data="{{ json_encode(['warranty_status' => $asset->warranty_status])}}">
                                    <div
                                        :class="{'bg-red-100 text-red-600 border-red-300': warranty_status == 'Expired', 'bg-green-100 text-green-600 border-green-300': warranty_status == 'In warranty'}"
                                        class="inline-flex text-xs leading-none py-1 px-2 font-medium rounded-full border">
                                        {{ $asset->warranty_status }}
                                    </div>
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm font-normal text-gray-500">
                                    Cost Center
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-dark-typography sm:mt-0">
                                    {{ $asset->cost_center }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm font-normal text-gray-500">
                                    Commissioned Date
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-dark-typography sm:mt-0">
                                    {{ $asset->date_commissioned }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm font-normal text-gray-500">
                                    Purchase Order
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-dark-typography sm:mt-0">
                                    {{ $asset->purchase_order }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm font-normal text-gray-500">
                                    Purchase Price
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-dark-typography sm:mt-0">
                                    {{ $asset->purchase_price }}
                                </dd>
                            </div>

                        </dl>

                    </div>

                </div>
            </div>

            <div class="bg-white dark:bg-dark-secondary shadow overflow-hidden sm:rounded-lg ">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-700 dark:text-white">
                        Other Assets Information
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Other relevant information of the asset. Electrical Name, Mechanical Name etc...
                    </p>
                </div>
                <div class="border-t border-gray-200 dark:border-dark-third">

                    <div class="max-w-7xl mx-auto px-4 py-5 sm:px-6">

                        <dl class="grid grid-cols-1 gap-y-5 md:grid-cols-2 md:gap-x-8 md:gap-y-10">

                            <div>
                                <dt class="text-sm text-gray-500">
                                    Electrical
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-dark-typography sm:mt-0">
                                    {{ $asset->electrical }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm text-gray-500">
                                    Mechanical
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-dark-typography sm:mt-0">
                                    {{ $asset->mechanical }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm text-gray-500">
                                    Capacity
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-dark-typography sm:mt-0">
                                    {{ $asset->capacity }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm text-gray-500">
                                    Staff Name
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-dark-typography sm:mt-0">
                                    {{ $asset->staff_name }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm font-normal text-gray-500">
                                    Created Date
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-dark-typography sm:mt-0">
                                    {{ $asset->date_created }}
                                </dd>
                            </div>

                            <div class="md:col-span-2">
                                <dt class="text-sm font-normal text-gray-500">
                                    Comments
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-dark-typography sm:mt-0">
                                    {!! $asset->comments !!}
                                </dd>
                            </div>

                        </dl>

                    </div>

                </div>
            </div>

        </div>

        <div class="px-3 my-3 space-y-3 w-full lg:w-1/3 flex flex-col">

            <div class="bg-white dark:bg-dark-secondary shadow overflow-hidden sm:rounded-lg text-sm">

                <div class="flex flex-col sm:flex-row items-start pt-4 px-4">
                    <h1 class="font-medium text-lg text-gray-700 dark:text-white">Asset Relation Information</h1>
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between max-w-lg mx-auto border-b dark:border-dark-third py-4 my-1 px-4 space-x-4 leading-tight">
                    <div class="inline-flex items-center space-x-4">
                        <div class="bg-green-100 p-2 rounded-full">
                            <x-svg-icon class="h-6 w-6 text-green-600" stroke-width="2">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <rect x="4" y="4" width="16" height="16" rx="2"></rect>
                                <line x1="9" y1="8" x2="9" y2="16"></line>
                                <line x1="9" y1="12" x2="15" y2="12"></line>
                                <line x1="15" y1="8" x2="15" y2="16"></line>
                            </x-svg-icon>
                        </div>
                        <div>
                            <h1 class="font-medium dark:text-gray-100">Hospital</h1>
                            <p class="text-gray-500 font-light dark:text-gray-300">{{ $asset->hospital->code  . ' - ' . $asset->hospital->name }}</p>
                        </div>
                    </div>
                    <div class="hidden sm:block">
                        <x-action-button class="rounded-full text-xs py-1 px-2 focus:ring-0 focus:outline-none focus:ring-offset-0">View</x-action-button>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between max-w-lg mx-auto border-b dark:border-dark-third py-4 my-1 px-4 space-x-4 leading-tight">
                    <div class="flex inline-flex items-center space-x-4">
                        <div class="bg-blue-100 p-2 rounded-full">
                            <x-svg-icon class="h-6 w-6 text-blue-600" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </x-svg-icon>
                        </div>
                        <div>
                            <h1 class="font-medium dark:text-gray-100">Location</h1>
                            <p class="text-gray-500 font-light dark:text-gray-300">{{ $asset->location->code }}</p>
                        </div>
                    </div>
                    <div class="hidden sm:block">
                        <x-action-button class="rounded-full text-xs py-1 px-2 focus:ring-0 focus:outline-none focus:ring-offset-0">View</x-action-button>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between max-w-lg mx-auto border-b dark:border-dark-third py-4 my-1 px-4 space-x-4 leading-tight">
                    <div class="flex inline-flex items-center space-x-4">
                        <div class="bg-yellow-100 p-2 rounded-full">
                            <x-svg-icon class="h-6 w-6 text-yellow-600" stroke-width="2">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 21c1.147 -4.02 1.983 -8.027 2 -12h6c.017 3.973 .853 7.98 2 12"></path>
                                <path d="M12.5 13h4.5c.025 2.612 .894 5.296 2 8"></path>
                                <path d="M9 5a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1"></path>
                                <line x1="3" y1="21" x2="22" y2="21"></line>
                            </x-svg-icon>
                        </div>
                        <div>
                            <h1 class="font-medium dark:text-gray-100">Manufacturer</h1>
                            <p class="text-gray-500 font-light dark:text-gray-300">{{ $asset->manufacturer->code  . ' - ' . $asset->manufacturer->name }}</p>
                        </div>
                    </div>
                    <div class="hidden sm:block">
                        <x-action-button class="rounded-full text-xs py-1 px-2 focus:ring-0 focus:outline-none focus:ring-offset-0">View</x-action-button>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between max-w-lg mx-auto border-b dark:border-dark-third py-4 my-1 px-4 space-x-4 leading-tight">
                    <div class="flex inline-flex items-center space-x-4">
                        <div class="bg-pink-100 p-2 rounded-full">
                            <x-svg-icon class="h-6 w-6 text-pink-600" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </x-svg-icon>
                        </div>
                        <div>
                            <h1 class="font-medium dark:text-gray-100">Department</h1>
                            <p class="text-gray-500 font-light dark:text-gray-300">{{ $asset->department->code }}</p>
                        </div>
                    </div>
                    <div class="hidden sm:block">
                        <x-action-button class="rounded-full text-xs py-1 px-2 focus:ring-0 focus:outline-none focus:ring-offset-0">View</x-action-button>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between max-w-lg mx-auto border-b dark:border-dark-third py-4 my-1 px-4 space-x-4 leading-tight">
                    <div class="flex inline-flex items-center space-x-4">
                        <div class="bg-purple-100 p-2 rounded-full">
                            <x-svg-icon class="h-6 w-6 text-purple-600" stroke-width="2">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="3" y1="21" x2="21" y2="21"></line>
                                <path d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4"></path>
                                <line x1="5" y1="21" x2="5" y2="10.85"></line>
                                <line x1="19" y1="21" x2="19" y2="10.85"></line>
                                <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4"></path>
                            </x-svg-icon>
                        </div>
                        <div>
                            <h1 class="font-medium dark:text-gray-100">Vendor</h1>
                            <p class="text-gray-500 font-light dark:text-gray-300">{{ $asset->vendor->code  . ' - ' . $asset->vendor->name }}</p>
                        </div>
                    </div>
                    <div class="hidden sm:block">
                        <x-action-button class="rounded-full text-xs py-1 px-2 focus:ring-0 focus:outline-none focus:ring-offset-0">View</x-action-button>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between max-w-lg mx-auto py-4 my-1 px-4 space-x-4 leading-tight">
                    <div class="flex inline-flex items-center space-x-4">
                        <div class="bg-red-100 p-2 rounded-full">
                            <x-svg-icon class="h-6 w-6 text-red-600" stroke-width="2">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M18 9a5 5 0 0 0 -5 -5h-2a5 5 0 0 0 -5 5v6a5 5 0 0 0 5 5h2a5 5 0 0 0 5 -5"></path>
                            </x-svg-icon>
                        </div>
                        <div>
                            <h1 class="font-medium dark:text-gray-100">Contractor</h1>
                            <p class="text-gray-500 font-light dark:text-gray-300">{{ $asset->contractor->contractor_no  . ' - ' . $asset->contractor->name }}</p>
                        </div>
                    </div>
                    <div class="hidden sm:block">
                        <x-action-button class="rounded-full text-xs py-1 px-2 focus:ring-0 focus:outline-none focus:ring-offset-0">View</x-action-button>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-dark-secondary shadow overflow-hidden sm:rounded-lg">

                <div class="flex flex-col sm:flex-row items-start pt-4 px-4">
                    <h1 class="font-medium text-lg text-gray-700 dark:text-white">Asset Photos</h1>
                </div>

                <div class="flex flex-wrap p-4">

                    @forelse($asset->photos as $photo)

                        <div class="flex flex-wrap w-1/2">
                            <div class="w-full p-1 md:p-2">
                                <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg hover:cursor-pointer hover:ring-2 hover:ring-offset-2 hover:ring-indigo-500"
                                     src="{{ asset($photo->image) }}">
                            </div>
                            <div class="text-xs leading-tight mx-4 my-2 break-all">
                                <p>{{ basename($photo->image) }}</p>
                                <p class="text-gray-500">{{ number_format(\Illuminate\Support\Facades\Storage::disk('public')->size($photo->image) / 1048576, 2) . ' MB' }}</p>
                            </div>
                        </div>

                    @empty

                        <div class="block w-full text-center flex-row">
                            <p class="text-sm text-gray-500">Sorry! There are not any photos related to this asset.</p>
                        </div>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

</div>
