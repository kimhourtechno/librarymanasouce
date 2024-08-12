<?php

namespace App\Http\Controllers;
use App\Models\Student;

use App\Models\Book;
use App\Models\Borrow;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ReturnController extends Controller
{
    public function index(){
        $data['borrows'] = Borrow::where('borrows.action', 0)
        ->join('students', 'borrows.user_id', '=', 'students.id')
        ->join('books', 'borrows.book_id', '=', 'books.id')
        ->join('shelves', 'books.shelf_id', '=', 'shelves.shelf_id')
        ->select(
            'borrows.*',
            'books.bookname as bookname',
            'shelves.shelf_name as shelfname',
            'students.name as studentname'
        )
        ->get();

    return view('returns.storyreturnv', $data);
    }
    public function edit($id){

        $borrow = Borrow::find($id);
        if (!$borrow) {
            return redirect()->back()->with('error', 'Borrow record not found.');
        }
        $borrow->action = 0;
        $borrow->due_date = Carbon::now();
        $borrow->save();

        $book = Book::find($borrow->book_id);
        if ($book) {
            // Increment the available field
            $book->available += 1;
            $book->save();
        } else {
            return redirect()->back()->with('error', 'Book not found.');
        }

        return redirect()->back()->with('success', 'Book returned and availability updated.');
    }

        // $data['borrows'] = Borrow::where('borrow_id',$id)
        // ->update([
        //     'action' => 0,
        //     'due_date' => Carbon::now(),
        // ]);

        // return redirect()->back()->with('error', 'Book returned record.');


}
