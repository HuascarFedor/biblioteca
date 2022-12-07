<?php

namespace App\Http\Livewire;

use App\Models\Author;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class Writer extends Component
{
    use WithPagination;

    public $search;
    protected $queryString = ['search'];

    public function __construct(){
        if(!Session::has('writers'))
            Session::put('writers', array());
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.writer', [
            'authors' => Author::where('name', 'like', '%'.$this->search.'%')->orderBy('id', 'DESC')->paginate(3),
            'writers' => Session::get('writers')
        ]);
    }

    public function add(Author $author){
        $writers = Session::get('writers');
        $writers[$author->id] = $author;
        Session::put('writers', $writers);
    }

    public function remove(Author $author){
        $writers = Session::get('writers');
        unset($writers[$author->id]);
        Session::put('writers', $writers);
    }
}
