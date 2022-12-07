<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-start">
                        <a class="font-medium text-green-600 dark:text-green-500 hover:underline" href="{{ route('books.create') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>                                          
                        </a>
                    </div>

                    @if ($books->count())    
                    <div class="mb-4">
                        {{ $books->links() }}
                    </div>
                    <div class="lg:flex">
                        @foreach ($books as $book)
                            <div class="w-full flex flex-col justify-between lg:max-w-sm mb-2 lg:mx-2 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                                <div>
                                    <a href="#">
                                        <img class="rounded-t-lg w-full" src="{{ $book->getUrlCover() }}" alt="" />
                                    </a>
                                    <div class="p-5">
                                        <a href="#">
                                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                {{ $book->title }}
                                            </h5>
                                        </a>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                            {{ $book->editorial }}
                                        </p>
                                        <p>
                                            @foreach ($book->authors as $author)
                                                {{ $author->name }},
                                            @endforeach
                                        <p/>
                                    </div>
                                </div>
                                <div class="flex justify-end p-4">
                                    <a class="mr-4 font-medium text-orange-600 dark:text-orange-500 hover:underline" href="{{ route('authors.edit', ['author' => $author]) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                        </svg>                                          
                                    </a>
                                    <form action="{{ route('books.destroy', ['book' => $book]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="font-medium text-red-600 dark:text-red-500 hover:underline" type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>                                              
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
