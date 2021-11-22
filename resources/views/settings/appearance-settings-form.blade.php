<x-settings-form-section submit="updateAppearanceSettings">

    <x-slot name="title">
        {{ __('Appearance Settings') }}
    </x-slot>

    <x-slot name="form">

        <div class="col-span-6 sm:col-span-4">

            <x-select
                :searchable="false"
                label="Choose your color scheme"
                placeholder="Set Color Scheme"
                wire:model.defer="color"
            >
                <x-select.option label="Light" value="light"/>
                <x-select.option label="Dark" value="dark"/>
            </x-select>

            <x-jet-input-error for="color" class="mt-2" />
        </div>

        <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
            <!-- Login Background File Input -->
            <input type="file" class="hidden"
                   wire:model="loginBackground"
                   x-ref="loginBackground"
                   x-on:change="
                                    photoName = $refs.loginBackground.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.loginBackground.files[0]);
                            " />

            <x-jet-label for="loginBackground" value="{{ __('Login Background Image') }}" />

            <!-- Current Login Background -->
            <div class="mt-2" x-show="!photoPreview">
                @isset($this->setting->loginBackground_path)
                    <img src="{{ asset($this->setting->loginBackground_path) }}" alt="{{ $this->setting->loginBackground_path }}" class="block w-auto h-20 object-contain">
                @endisset
            </div>

            <!-- New Login Background Preview -->
            <div class="mt-2" x-show="photoPreview">
                <span class="block w-auto h-20 bg-contain bg-no-repeat"
                      x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                </span>
            </div>

            <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.loginBackground.click()">
                {{ __('Select A New Login Background') }}
            </x-jet-secondary-button>

            @if ($this->setting->loginBackground_path)
                <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteLoginBackground">
                    {{ __('Remove Login Background') }}
                </x-jet-secondary-button>
            @endif

            <x-input-help-text>
                {{ __('This image will appear in the login screen. Accepted filetypes are jpg, png, gif, and svg. Max upload size allowed is 10MB.') }}
            </x-input-help-text>

            <x-jet-input-error for="loginBackground" class="mt-2" />
        </div>

        <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
            <!-- Logo File Input -->
            <input type="file" class="hidden"
                   wire:model="logo"
                   x-ref="logo"
                   x-on:change="
                                    photoName = $refs.logo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.logo.files[0]);
                            " />

            <x-jet-label for="logo" value="{{ __('Site Logo') }}" />

            <!-- Current Logo -->
            <div class="mt-2" x-show="!photoPreview">
                @isset($this->setting->logo_path)
                    <img src="{{ asset($this->setting->logo_path) }}" alt="{{ $this->setting->logo_path }}" class="block w-auto h-20 object-contain">
                @endisset
            </div>

            <!-- New Logo Preview -->
            <div class="mt-2" x-show="photoPreview">
                    <span class="block w-20 h-20 bg-contain bg-no-repeat"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
            </div>

            <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.logo.click()">
                {{ __('Select A New Site Logo') }}
            </x-jet-secondary-button>

            @if ($this->setting->logo_path)
                <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteLogo">
                    {{ __('Remove Logo') }}
                </x-jet-secondary-button>
            @endif

            <x-input-help-text>
                {{ __('Square logos look best. Accepted filetypes are jpg, png, gif, and svg. Max upload size allowed is 10MB.') }}
            </x-input-help-text>

            <x-jet-input-error for="logo" class="mt-2" />
        </div>

        <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
            <!-- Favicon File Input -->
            <input type="file" class="hidden"
                   wire:model="favicon"
                   x-ref="favicon"
                   x-on:change="
                                    photoName = $refs.favicon.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.favicon.files[0]);
                            " />

            <x-jet-label for="favicon" value="{{ __('Favicon') }}" />

            <!-- Current Favicon -->
            <div class="mt-2" x-show="!photoPreview">
                @isset($this->setting->favicon_path)
                    <img src="{{ asset($this->setting->favicon_path) }}" alt="{{ $this->setting->favicon_path }}" class="h-20 w-20 object-cover bg-no-repeat bg-center">
                @endisset
            </div>

            <!-- New Favicon Preview -->
            <div class="mt-2" x-show="photoPreview">
                    <span class="block w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
            </div>

            <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.favicon.click()">
                {{ __('Select A Favicon') }}
            </x-jet-secondary-button>

            @if ($this->setting->favicon_path)
                <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteFavicon">
                    {{ __('Remove Favicon') }}
                </x-jet-secondary-button>
            @endif

            <x-input-help-text>
                {{ __('Favicons should be square images, 16x16 pixels. Accepted filetypes are ico, png, and gif. Other image formats may not work in all browsers.') }}
            </x-input-help-text>

            <x-jet-input-error for="favicon" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">

        <x-jet-button wire:target="loginBackground, logo, favicon" wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>

        <x-jet-action-message class="ml-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

    </x-slot>

</x-settings-form-section>
