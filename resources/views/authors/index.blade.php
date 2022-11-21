<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Authors') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if( $authors->count() )
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{ __('Name') }}</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($authors as $author)
                            <tr>
                                <td>{{ $author->id }}</td>
                                <td>{{ $author->name }}</td>
                                <td>
                                    <a href="{{ route('authors.edit', ['author' => $author]) }}">
                                        {{ __('Update') }}
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('authors.destroy', ['author' => $author]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit">
                                            {{ __('Delete') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="3">&nbsp;</td>
                                <td>
                                    <a href="{{ route('authors.create') }}">
                                        {{ __('Insert') }}
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div>
                        {{ $authors->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>