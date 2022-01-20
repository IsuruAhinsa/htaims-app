<div>

    <div class="py-3 px-6 border-t dark:border-dark-third lg:flex lg:items-center lg:justify-between">

        <div class="flex-1 min-w-0">

            {{ Breadcrumbs::render('assets.create') }}

            <h2 class="text-2xl font-bold leading-7 text-gray-900 dark:text-white sm:text-3xl sm:truncate">
                Create New Asset
            </h2>

        </div>

    </div>

    @include('assets.form-section.general-information')

    @include('assets.form-section.management-information')

    @include('assets.form-section.relation-information')

    @include('assets.form-section.warranty-information')

    @include('assets.form-section.other-information')

    @include('assets.form-section.asset-photos')

    <div class="px-6 py-4 bg-gray-100 dark:bg-dark-secondary text-right">
        <a href="{{ route('assets.index') }}">
            <x-jet-secondary-button>
                Nevermind
            </x-jet-secondary-button>
        </a>

        <x-jet-button wire:click="store()" wire:loading.attr="disabled" wire:target="images">
            {{ __('Add Asset') }}
        </x-jet-button>
    </div>

</div>
