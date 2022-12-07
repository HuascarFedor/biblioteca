<?php

namespace App\Http\Livewire;

use App\Models\Author;
use Livewire\Component;
use Livewire\WithPagination;

class SearchAuthor extends Component
{
    use WithPagination;

    public $search;
    protected $queryString = ['search'];

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.search-author', [
            'authors' => Author::where('name', 'like', '%'.$this->search.'%')->orderBy('id', 'DESC')->paginate(5),
        ]);
    }
}
