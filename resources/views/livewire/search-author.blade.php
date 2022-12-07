
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
                                <a class="font-medium text-orange-600 dark:text-orange-500 hover:underline" href="{{ route('authors.edit', ['author' => $author]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                    </svg>                                          
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="flex justify-center">
                                <form action="{{ route('authors.destroy', ['author' => $author]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="font-medium text-red-600 dark:text-red-500 hover:underline" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>                                              
                                    </button>
                                </form>
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
                    <tr>
                        <td colspan="2">&nbsp;</td>
                        <td class="py-4">
                            <div class="flex justify-center">
                                <a class="font-medium text-green-600 dark:text-green-500 hover:underline" href="{{ route('authors.create') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>                                          
                                </a>
                            </div>
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $authors->links() }}
    </div>
</div>