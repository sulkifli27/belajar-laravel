<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
        $books = Book::with("category")->paginate(5);

        return response()->json([
            "succes" => true,
            "message" => "success get data book",
            "data" =>  $books
        ], 200);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'author' => 'required',
            'year' => 'required',
            'category_id' => 'required',
        ]);

       $book = Book::create($request->all());

       return response()->json([
        "succes" => true,
        "message" => "success create data",
        "data" =>  $book
    ], 200);
    }

    public function destroy($id){
        $book = Book::where("id", $id)->first();
        $book->delete();
        
        return response()->json([
            "succes" => true,
            "message" => "success delete data",
        ], 200);
    }
}
