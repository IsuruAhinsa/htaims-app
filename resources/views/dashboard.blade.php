<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">

        @include('partials.dashboard-widgets.statistic-cards')

        @include('partials.dashboard-widgets.statistic-cards-v2')

    </div>
</x-app-layout>
