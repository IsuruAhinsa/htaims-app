<x-app-layout>

    <div
        x-data="{showGeneralTab: true, showAppearanceTab: false, showLocalizationTab: false}"
        x-cloak
        class="flex flex-row bg-white dark:bg-dark-secondary mx-5 h-full my-4 rounded-lg"
    >

        <div class="flex flex-col md:flex-row w-full">

            <div class="w-full md:w-1/4 border-r dark:border-dark-third my-2">

                @include('partials.settings-menu')

            </div>

            <div class="w-full md:w-3/4 md:mx-2 my-2">

                <div x-show="showGeneralTab">
                    <livewire:settings.general-settings-form/>
                </div>

                <div x-show="showAppearanceTab" style="display:none;">
                    <livewire:settings.appearance-settings-form/>
                </div>

                <div x-show="showLocalizationTab" style="display:none;">
                    <livewire:settings.localizations-settings-form/>
                </div>

            </div>

        </div>

    </div>

</x-app-layout>
