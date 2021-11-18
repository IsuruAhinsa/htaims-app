<x-app-layout>

    <div class="flex flex-row h-screen">

        @include('partials.settings-sidebar')

        <div class="flex-auto bg-gray-100 py-5 px-6">

            @livewire('settings.general-settings-form')

        </div>

    </div>

</x-app-layout>
