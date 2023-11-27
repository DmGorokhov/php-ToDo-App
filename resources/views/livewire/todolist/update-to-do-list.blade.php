<div class="container mx-auto">
 <form wire:submit.prevent="update">
   <!-- Name -->
   <div>
       <x-input-label for="name" :value="__('Name')" />
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

   <!-- Progress choice -->
   <div class="mt-8">
       <x-input-label for="progress" :value="__('Progress')" />
       <div style="display: inline-block; margin-right: 15px;">
           <input type="radio" id="private" value="active" wire:model="form.progress" name="progress">
           <label for="active">Active</label>
       </div>
       <div style="display: inline-block;">
           <input type="radio" id="completed" value="completed" wire:model="form.progress" name="progress">
           <label for="completed">Completed</label>
       </div>
       @error('form.todo_status') <span class="error">{{ $message }}</span> @enderror
   </div>

   <div class="mt-6">
       <button type="submit" class="px-4 py-2 bg-orange-500 text-white font-semibold rounded  ml-auto">
           Update ToDo list
       </button>
   </div>
 </form>
</div>
