<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function store(Request $r ){
        $author = new Author();
        $author->author_name = $r->author_name;
        $i = $author->save();
        return redirect()->back()->with('message', 'Author added successfully.');

        // $book->bookname = $r->bookname;

    }
}
