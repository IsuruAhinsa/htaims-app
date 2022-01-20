<x-jet-dialog-modal wire:model="isOpen" :maxWidth="'md'">

    <x-slot name="title">
        <x-svg-icon class="mr-1">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </x-svg-icon>
        {{ $updateMode ? __('Edit Task') : __('Add Task') }}
    </x-slot>

    <x-slot name="content">

        <div class="space-y-3">

            <div>
                <x-jet-label for="type_code" value="{{ __('Type Code') }}" />
                <x-jet-input id="type_code" type="text" placeholder="Enter Type Code" class="mt-1 block w-full" wire:model.defer="state.type_code"/>
                <x-jet-input-error for="state.type_code" class="mt-2" />
            </div>

            <div>
                <x-jet-label for="description" value="{{ __('Task Description') }}" />
                <x-text-area id="description" type="description" placeholder="Enter Task Description" class="mt-1 block w-full" wire:model.defer="state.description" />
                <x-jet-input-error for="state.description" class="mt-2" />
            </div>

            <div>
                <x-jet-label for="service_life" value="{{ __('Service Life') }}" />
                <x-input-group type="text" id="service_life" trail="Year(s)" placeholder="Enter Service Life" class="mt-1 block" wire:model.defer="state.service_life"/>
                <x-jet-input-error for="state.service_life" class="mt-2" />
            </div>

            <!-- checklist attachment -->
            <div x-data="{fileName: null, showIcon: false}">

                <!-- checklist attachment File Input -->
                <input
                    wire:model="checklist"
                    x-ref="checklist"
                    x-on:change="
                        fileName = $refs.checklist.files[0].name;
                        const reader = new FileReader();
                        reader.readAsDataURL($refs.checklist.files[0]);
                        showIcon = true;"
                    type="file"
                    class="hidden"
                    id="checklist"
                    accept="application/pdf"
                >

                <!-- current attachment -->
                @if($updateMode)
                    @isset($this->state['checklist_path'])
                        <div x-show="! showIcon" class="flex flex-row items-center space-x-1">

                            <x-svg-icon class="h-5 w-5 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                            </x-svg-icon>

                            <div class="text-xs text-gray-400">{{ basename($this->state['checklist_path']) }}</div>

                            <div class="text-red-500 text-xs hover:cursor-pointer hover:text-red-400 ml-2" wire:click.prevent="deleteAttachment({{$state['id']}})">Remove</div>

                        </div>
                    @endisset
                @endif

                <!-- uploaded attachment -->
                <div x-show="showIcon" class="flex flex-row items-center space-x-1">

                    <x-svg-icon class="h-6 w-6 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                    </x-svg-icon>

                    <div class="text-sm text-gray-400" x-text="fileName"></div>

                </div>

                <!-- upload section custom ui-->
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">

                    <div class="space-y-1 text-center">

                        <div class="flex text-sm text-gray-600">

                            <label x-on:click.prevent="$refs.checklist.click()" for="checklist" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">

                                <x-svg-icon class="mx-auto h-12 w-12 text-indigo-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </x-svg-icon>
                                <span>Upload Checklist</span>
                            </label>

                        </div>

                        <p class="text-xs text-gray-500">
                            Only PDF up to 10MB
                        </p>

                    </div>

                </div>

                <x-jet-input-error for="checklist" class="mt-2" />

            </div>

        </div>

    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('isOpen', false)" wire:loading.attr="disabled">
            Nevermind
        </x-jet-secondary-button>

        <x-jet-button wire:click="{{ $updateMode ? 'update()' : 'store()' }}" wire:loading.attr="disabled">
            {{ $updateMode ? __('Save Changes') : __('Add Task') }}
        </x-jet-button>
    </x-slot>

</x-jet-dialog-modal>
