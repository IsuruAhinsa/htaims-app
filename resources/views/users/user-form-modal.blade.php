<x-jet-dialog-modal wire:model="isOpen" :maxWidth="'3xl'">

    <x-slot name="title">
        <x-svg-icon class="mr-1">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
        </x-svg-icon>
        {{ $updateMode ? __('Edit User') : __('Add New User') }}
    </x-slot>

    <x-slot name="content">

        <div class="row">
            <div class="relative w-full px-2 sm:max-w-half sm:flex-half">

                <div x-data="{photoName: null, photoPreview: null}" class="mb-4">
                    <!-- Profile Photo File Input -->
                    <input type="file" class="hidden"
                           wire:model="photo"
                           x-ref="photo"
                           x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                    <!-- Current Profile Photo -->
                    @if($updateMode)
                        <div class="mt-2" x-show="! photoPreview">
                            <img src="{{ $this->state['profile_photo_url'] }}" alt="{{ $this->state['name'] }}" class="rounded-full h-20 w-20 object-cover">
                        </div>
                    @endif

                <!-- New Profile Photo Preview -->
                    <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                    </div>

                    <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                        {{ __('Choose a avatar') }}
                    </x-jet-secondary-button>

                    @if($updateMode)
                        @if ($this->state['profile_photo_path'])
                            <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                                {{ __('Remove Photo') }}
                            </x-jet-secondary-button>
                        @endif
                    @endif

                    <x-jet-input-error for="photo" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" type="text" placeholder="Enter Name" class="mt-1 block w-full" wire:model.defer="state.name"/>
                    <x-jet-input-error for="state.name" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-jet-label for="email" value="{{ __('Email Address') }}" />
                    <x-jet-input id="email" type="email" placeholder="Enter Email Address" class="mt-1 block w-full" wire:model.defer="state.email"/>
                    <x-jet-input-error for="state.email" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-jet-label for="phone" value="{{ __('Phone') }}" />
                    <x-jet-input id="phone" type="text" placeholder="Enter Phone" class="mt-1 block w-full" wire:model.defer="state.phone"/>
                    <x-jet-input-error for="state.phone" class="mt-2" />
                </div>

            </div>

            <div class="relative w-full px-2 sm:max-w-half sm:flex-half">

                <div class="mb-4">
                    <x-select
                        :searchable="false"
                        label="Select Role(s)"
                        placeholder="Select many Roles"
                        wire:model.defer="roles"
                        multiselect
                    >
                        @foreach(\Spatie\Permission\Models\Role::all() as $role)
                            <x-select.option @if($updateMode) {{ $this->user->hasRole($role->name) ? 'selected' : '' }} @endif label="{{ $role->name }}" value="{{ $role->name }}" />
                        @endforeach
                    </x-select>
                </div>

                <div class="mb-4">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" type="password" placeholder="Enter Password" class="mt-1 block w-full" wire:model.defer="state.password"/>
                    <x-jet-input-error for="state.password" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-jet-input id="password_confirmation" type="password" placeholder="Re-enter Password" class="mt-1 block w-full" wire:model.defer="state.password_confirmation"/>
                </div>

            </div>

        </div>

    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('isOpen', false)" wire:loading.attr="disabled">
            Nevermind
        </x-jet-secondary-button>

        <x-jet-button wire:click="{{ $updateMode ? 'update()' : 'store()' }}" wire:loading.attr="disabled">
            {{ $updateMode ? __('Save Changes') : __('Add New User') }}
        </x-jet-button>
    </x-slot>

</x-jet-dialog-modal>
