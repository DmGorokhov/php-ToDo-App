<x-app-layout>
    <h2 class="font-semibold text-xl ml-5 my-3 text-gray-800 leading-tight">
        {{ $userName }} todo lists
    </h2>
    <div class="content-start inset-x-0 flex flex-row h-screen">
        <div class="flex-grow max-w-0xl mx-end sm:px-0 lg:px-0 h-full">
            <div class="bg-white overflow-hidden shadow-sm h-full">
                <div class="p-6 text-gray-900">
                    @livewire('user-show', ['userID'=>$userID])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
