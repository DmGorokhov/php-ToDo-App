<form wire:submit="saveTask" class="w-1/2">
    <!-- Name -->
        <div>
            <div>
                <x-input-label for="name" :value="__('New task name')" />
                <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
                @error('form.name') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <button type="submit" class="px-4 py-1 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600">
                    Add task
                </button>
            </div>
        </div>
</form>

