<div class="container mx-auto">
 <form wire:submit.prevent="save">
   <!-- Name -->
   <div>
       <x-input-label for="name" :value="__('New todo name')" />
       <x-text-input wire:model="form.name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
       @error('form.name') <span class="error">{{ $message }}</span> @enderror
   </div>

   <!-- Description -->
   <div class="mt-4">
       <x-input-label for="description" :value="__('Description')" />
       <textarea wire:model="form.description" id="description" class="block mt-3 w-full h-40" name="description" autocomplete="description"></textarea>
       @error('form.description') <span class="error">{{ $message }}</span> @enderror
   </div>

   <!-- Todo Status choice -->
   <div class="mt-8">
       <x-input-label for="todo_status" :value="__('ToDo Status')" />
       <div style="display: inline-block; margin-right: 15px;">
           <input type="radio" id="private" value="private" wire:model="form.todo_status" name="todo_status">
           <label for="private">Private</label>
       </div>
       <div style="display: inline-block;">
           <input type="radio" id="public" value="public" wire:model="form.todo_status" name="todo_status">
           <label for="public">Public</label>
       </div>
       @error('form.todo_status') <span class="error">{{ $message }}</span> @enderror
   </div>

   <div class="mt-6">
       <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600 ml-auto">
           Add ToDo list
       </button>
   </div>
 </form>
</div>
