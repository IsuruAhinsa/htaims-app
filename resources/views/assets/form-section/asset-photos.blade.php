<div class="bg-white dark:bg-dark-secondary rounded-xl py-5 px-8 mx-4 mb-3 shadow sm:rounded-lg">

    <div class="px-2 sm:inline-flex">
        <x-svg-icon class="h-7 w-7 text-pink-500 self-center mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </x-svg-icon>
        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">
                Asset Photos.
            </h3>
            <p class="mt-[0.5] max-w-2xl text-sm text-gray-500 dark:text-dark-typography">
                You can upload asset images using this section.
            </p>
        </div>
    </div>

    <div class="mt-3">

        <input
            wire:model.defer="images"
            type="file"
            class="hidden"
            id="images"
            accept="image/*"
            multiple
        >

        <!-- upload section custom ui-->
        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">

            <div class="space-y-1 text-center">

                <div class="flex text-sm text-gray-600">

                    <label for="images" class="relative cursor-pointer bg-white dark:bg-dark-secondary rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">

                        <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-white" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span>Upload Asset Images</span>
                    </label>

                </div>

                <p class="text-xs text-gray-500">
                    PNG, JPG, GIF up to 10MB
                </p>

            </div>

        </div>

        @if($images)

            <div class="grid grid-cols-2 gap-4 mt-4 md:grid-cols-6">

                @foreach($images as $key => $image)

                    <div class="relative flex flex-col items-center overflow-hidden text-center bg-gray-100 border dark:border-dark-third rounded cursor-pointer select-none"
                         style="padding-top: 100%;">

                        <button class="absolute top-0 right-0 z-50 p-1 bg-white dark:bg-dark-third rounded-bl focus:outline-none" type="button" wire:click.prevent="$emit('removeFile', {{$key}})">
                            <svg class="w-4 h-4 text-gray-700 dark:text-white hover:text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>

                        <img class="absolute inset-0 z-0 object-cover w-full h-full border-4 border-white dark:border-dark-third preview" src="{{ $image->temporaryUrl() }}" alt="">

                    </div>

                @endforeach

            </div>

        @endif

        <x-jet-input-error for="images" class="mt-2" />

    </div>

</div>

@push('js')

    <script>
        window.livewire.on('removeFile', function(index){
            return window.livewire.emit('clear_file', index);
        });
    </script>

@endpush
