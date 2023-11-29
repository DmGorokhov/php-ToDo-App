<x-app-layout>
    <h2 class="font-semibold text-xl ml-5 my-3 text-gray-800 leading-tight">
        Name: {{ $todoName }}
    </h2>
    <h2 class="font-semibold text-xl ml-5 my-3 text-gray-800 leading-tight">
        Description: {{ $todoDescription }}
    </h2>
    <div class="content-start inset-x-0 flex flex-row h-screen">
        <div class="flex-grow max-w-0xl mx-end sm:px-0 lg:px-0 h-full">
            <div class="bg-white overflow-hidden shadow-sm h-full">
                <div>
                    @livewire('task-index-by-to-do', ['todoID' => $todoID])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
