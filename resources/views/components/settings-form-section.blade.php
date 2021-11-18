@props(['submit'])

<div class="grid grid-cols-1 lg:px-10 xl:px-20 2xl:px-60">

    <x-settings-form-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
    </x-settings-form-section-title>

    <div class="mt-5 md:mt-0">
        <form wire:submit.prevent="{{ $submit }}">
            <div class="py-3">
                <div class="grid grid-cols-1 space-y-6">
                    {{ $form }}
                </div>
            </div>

            <x-jet-section-border/>

            @if (isset($actions))
                <div class="flex items-center text-right">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>

</div>
