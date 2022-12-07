<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('id', 'DESC')->paginate(3);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|unique:books',
            'editorial' => 'required',
            'cover' => 'image|mimes:jpeg,jpg,png,gif,svg'
        ]);
        $cover = 'public/covers/no-image.png';
        if($request->hasFile('cover'))
            $cover = $request->cover->store('public/covers');
        $book = Book::create([
            'title' => $request->title,
            'editorial' => $request->editorial,
            'cover' => $cover
        ]);
        $book->save();
        $writers = Session::get('writers');
        foreach($writers as $writer){
            $book->authors()->attach($writer['id']);
        }
        Session::forget('writers');
        return redirect()->route('books.index')->with('success', 'Item added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->deleteCover();
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Item deleted');
    }
}
