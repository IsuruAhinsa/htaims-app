<x-app-layout>

    <div class="flex flex-row h-screen" x-data="{showGeneralTab: true, showAppearanceTab: false, showLocalizationTab: false, showSecurityTab: false}">

        @include('partials.settings-sidebar')

        <div class="flex-auto bg-gray-100 py-5 px-6">

            <div x-show="showGeneralTab">
                <livewire:settings.general-settings-form/>
            </div>

            <div x-show="showAppearanceTab" style="display:none;">
                <livewire:settings.appearance-settings-form/>
            </div>

            <div x-show="showSecurityTab" style="display:none;">
                <livewire:settings.security-settings-form/>
            </div>

            <div x-show="showLocalizationTab" style="display:none;">
                <livewire:settings.localizations-settings-form/>
            </div>

        </div>

    </div>

</x-app-layout>
