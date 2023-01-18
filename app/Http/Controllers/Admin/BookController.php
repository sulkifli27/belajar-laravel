<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
        $books = Book::all();
        return view("admin.book.index", compact("books"));
    }

    public function  create(){
        return view('admin.book.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'author' => 'required',
            'year' => 'required',
        ]);

       Book::create($request->all());
       return redirect()->route("book-index");
    }

    public function edit($id){
        $book = Book::where("id", $id)->first();
        return view("admin.book.edit", compact("book"));
    }

    public function update(Request $request, $id){
        $book = Book::where("id", $id)->first();

        $this->validate($request, [
            'name' => 'required',
            'author' => 'required',
            'year' => 'required',
        ], [
            "name" => "wajib di isi"
        ]
        );

        

        $book->update($request->all());

        return redirect()->route("book-index");
    }

    public function destroy($id){
        $book = Book::where("id", $id)->first();
        $book->delete();

        return redirect()->route("book-index");
    }
}
