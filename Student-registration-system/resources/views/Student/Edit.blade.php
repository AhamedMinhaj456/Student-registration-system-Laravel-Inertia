
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <h1 class="text-white text-lg font-bold">Update Student</h1>
        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <form method="POST" action="{{ route('student.update', $student->id) }}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <!-- name -->
                <div class="mt-4">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" autofocus
                        value="{{ $student->name }}" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="age" :value="__('Age')" />
                    <x-text-input id="age" class="block mt-1 w-full" type="integer" name="Age" autofocus
                        value="{{ $student->age }}" />
                    <x-input-error :messages="$errors->get('age')" class="mt-2" />
                </div>

                <div class="mt-4">
                    @if ($student->image)
                        <a href="{{ '/storage/' . $student->image }}" class="text-white" target="_blank">See
                            Image</a>
                    @endif
                    <x-input-label for="image" :value="__('Image (if any)')" />
                    <x-file-input name="image" id="image" />
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-3">
                        Update
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

