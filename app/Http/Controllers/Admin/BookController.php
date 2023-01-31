<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index() {
        // mysql 
        // select * from books
        // select * from books limit 4 
        $books = Book::paginate(5);
        return view("admin.book.index", compact("books"));
    }

    public function  create(){
        $category = Category::all();
        return view('admin.book.create', compact("category"));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'author' => 'required',
            'year' => 'required',
            'category_id' => 'required',
        ]);

       Book::create($request->all());
       return redirect()->route("book-index")->with('status', 'Sukses Insert Data Book');
    }

    public function edit($id){
        $book = Book::where("id", $id)->first();
        $category = Category::all();
        return view("admin.book.edit", compact("book","category"));
    }

    public function update(Request $request, $id){
        $book = Book::where("id", $id)->first();

        $this->validate($request, [
            'name' => 'required',
            'author' => 'required',
            'year' => 'required',
            'category_id' => 'required',
        ], [
            "name" => "wajib di isi"
        ]
        );

        $book->update($request->all());

        return redirect()->route("book-index")->with('status', 'Sukses Update Data Book');
    }

    public function destroy($id){
        $book = Book::where("id", $id)->first();
        $book->delete();

        return redirect()->route("book-index")->with('status', 'Sukses Delete Data Book');
    }
}
