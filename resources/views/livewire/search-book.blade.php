<div>
    <input type="text" wire:model="search">
    <h1>Search Results:</h1>
    <ul>
        @foreach($books as $book)
            <li>{{ $book->title }}</li>
        @endforeach
    </ul>
    {{ $books->links() }}
</div>
