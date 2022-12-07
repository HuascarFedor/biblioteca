<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;


class SearchBook extends Component
{   
    use WithPagination;

    public $search;
    protected $queryString = ['search'];

    public function updatingSearch(){
        $this->resetPage();
    }
    
    public function render()
    {
        return view('livewire.search-book', [
            'books' => Book::where('title', 'like', '%'.$this->search.'%')->paginate(5)
        ]);
    }
}
