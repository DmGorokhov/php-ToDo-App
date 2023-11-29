<div>

    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Progress</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Create date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last update</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Link</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>

            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($toDoLists as $todo)
                <tr wire:poll = "{{ $todo->id }}">
                    <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('todolist.show', ['todo_id' => $todo->id]) }}" style="color: blue; text-decoration: underline">{{ $todo->name }}</a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $todo->progress == 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">{{ $todo->progress }}</span>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">{{ $todo->created_at }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $todo->updated_at }}</td>
                    
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ route('todolist.show', ['todo_id' => $todo->id]) }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $todo->todo_status }}</td>


                    
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button type="button" onclick="window.location='{{ route('todolist.update', ['todo_id' => $todo->id]) }}'" class="px-4 py-1 font-medium text-white bg-orange-400 rounded-md hover:bg-orange-500 focus:outline-none focus:shadow-outline-blue active:bg-blue-600 transition duration-150 ease-in-out">Edit</button>
                        <button wire:click.prevent = "delete({{ $todo->id }})" class="ml-2 px-4 py-1 font-medium text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:shadow-outline-red active:bg-red-600 transition duration-150 ease-in-out">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
