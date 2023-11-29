<div>
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Progress</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Create date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last update</th>


            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($todoIndex as $todo)
                <tr wire:poll = "{{ $todo->id }}">
                    <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 whitespace-normal">{{ $todo->name }}</td>
                    <td class="px-6 py-2 whitespace-normal">{{ $todo->description }}</td>

                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $todo->progress == 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">{{ $todo->progress }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $todo->todo_status }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $todo->created_at }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $todo->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
