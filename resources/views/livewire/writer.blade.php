<div>
    <div class="relative w-full">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
        </div>
        <input wire:model="search" type="search" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search">
    </div>
    <h1 class="my-4">Search Results:</h1>
    <div class="overflow-x-auto relative">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="py-3 px-6">Name</th> 
                    <th class="py-3 px-6">&nbsp;</th> 
                </tr>
            </thead>
            <tbody>
                @forelse($authors as $author)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $author->name }}
                        </td>
                        <td>
                            <div class="flex justify-center">
                                <button wire:click="add({{ $author }})" class="font-medium text-green-600 dark:text-green-500 hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>                                                                                                                      
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="py-4 px-6" colspan="3">
                            <div class="flex justify-center items-center">
                                <span class="my-4 font-medium text-gray-400 text-xl">
                                    {{ __('No transaction found') }}
                                </span>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $authors->links() }}
    </div>
    <div class="overflow-x-auto relative border border-gray-500 my-4 rounded-lg p-4">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="py-3 px-6">{{ __('Selected Authors')}}</th> 
                    <th class="py-3 px-6">&nbsp;</th> 
                </tr>
            </thead>
            <tbody>
                @forelse($writers as $writer)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $writer->name }}
                        </td>
                        <td>
                            <div class="flex justify-center">
                                <button wire:click="remove({{ $writer }})" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>                                                                                                                      
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="py-2" colspan="3">
                            <div class="flex justify-center items-center">
                                <span class="my-4 font-medium text-gray-400 text-xl">
                                    {{ __('Has not yet select authors') }}
                                </span>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
