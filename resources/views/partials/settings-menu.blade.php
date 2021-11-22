<ul class="mt-2 space-y-2">

    <x-settings-menu-item
        @click.prevent="showGeneralTab = true; showAppearanceTab = false; showLocalizationTab = false;"
        x-bind:class="showGeneralTab && 'border-l-2 border-blue-700 text-blue-600 bg-blue-50'"
    >

        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />

        <x-slot name="title">
            {{ __('General') }}
        </x-slot>

    </x-settings-menu-item>

    <x-settings-menu-item
        @click.prevent="showGeneralTab = false; showAppearanceTab = true; showLocalizationTab = false;"
        x-bind:class="showAppearanceTab && 'border-l-2 border-blue-700 text-blue-600 bg-blue-50'"
    >

        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />

        <x-slot name="title">
            {{ __('Appearance') }}
        </x-slot>

    </x-settings-menu-item>

    <x-settings-menu-item
        @click.prevent="showGeneralTab = false; showAppearanceTab = false; showLocalizationTab = true;"
        x-bind:class="showLocalizationTab && 'border-l-2 border-blue-700 text-blue-600 bg-blue-50'"
    >

        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />

        <x-slot name="title">
            {{ __('Localizations') }}
        </x-slot>

    </x-settings-menu-item>

    <x-settings-menu-item>

        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />

        <x-slot name="title">
            {{ __('Notifications') }}
        </x-slot>

    </x-settings-menu-item>

    <x-settings-menu-item>

        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />

        <x-slot name="title">
            {{ __('Subscriptions') }}
        </x-slot>

    </x-settings-menu-item>

</ul>
