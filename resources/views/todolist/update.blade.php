<x-app-layout>
    <div class="content-start inset-x-0 flex flex-row h-screen">
        <div class="w-1/6 max-w-2xl mx-start sm:px-0 lg:px-0 h-full">
            <div class="bg-white overflow-hidden shadow-sm h-full">
                <div class="p-6 text-gray-900">
                    @livewire('update-to-do-list', ['todoID' => $todoID])
                </div>
            </div>
        </div>
        <div class="flex-grow max-w-0xl mx-end sm:px-0 lg:px-0 h-full">
            <div class="bg-white overflow-hidden shadow-sm h-full">
                <div class="p-6 text-gray-900">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
