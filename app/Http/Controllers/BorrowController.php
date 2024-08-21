<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\models\BorrowDetail;
use App\Models\Student;
use App\Models\Book;
use App\Models\Borrow;
use Carbon\Carbon;

use Illuminate\Contracts\Cache\Store;

class BorrowController extends Controller
{


    public function index(){
        return view('layouts.borrow.borrowm');
    }
    public function edit($id, $borrow_id)

    {
        $data ['book'] = Book::all();
        $data ['student'] = Student::find($id);
        return view('borrow_books.borrowv',$data);
        // Logic to retrieve and edit the borrow record
        // Return view with necessary data
    }
    // public function edit($id){
    //     $data['borrows'] = Borrow::where('user_id',$id)
    //     ->where('action',1)
    //     ->join('books', 'borrows.book_id', '=', 'books.id')
    //     ->join('shelves','books.author_id','=','shelves.shelf_id')
    //     ->select(
    //         'borrows.*',
    //         'books.bookname as bookname',
    //         'shelves.shelf_name as shelfname'
    //     )
    //     ->get();

    //     $data ['student'] = Student::find($id);
    //     $data ['book'] = Book::all();
    //     return view('borrow_books.borrowv',$data);
    // }
    public function store(Request $r){
        $r->validate([
            'student_id' => 'required|exists:students,id',
            'book_id' => 'required|exists:books,id',
            'return_date' => 'required|date',
        ]);

        // Save the borrow record
        $borrow = Borrow::create([
            'user_id' => $r->student_id, // Ensure this maps correctly to your database schema
            'return_date' => $r->return_date,
            'action' => 1, // Assuming this field is required
        ]);

                $book = Book::find($r->book_id);
        // Save the borrow_id to borrowdetail table
        BorrowDetail::create([
            'borrow_id' => $borrow->borrow_id,
            'book_id' => $r->book_id,
        ]);

        // Redirect or return a response
        return redirect()->route('borrow.index')->with('success', 'Borrow record created successfully.');
    }

    // public function store(Request $r){
    //     $messages = [
    //         'book_id.required' => 'The book is required.',
    //         'return_date.required' => 'The return date is required.',
    //     ];

    //     $r->validate([
    //         'book_id' => 'required',
    //         'return_date' => 'required|date',
    //         'student_id' => 'required',
    //     ], $messages);

    //     $book = Book::find($r->book_id);

    //     // Check if the book exists
    //     if (!$book) {
    //         return redirect()->back()->with('error', 'The book does not exist.');
    //     }

    //     // Check if the book is available for borrowing
    //     if ($book->available <=0) {
    //         return redirect()->back()->with('checkbook', 'This book is currently unavailable.');
    //     }

    //     // Check if the book is currently borrowed
    //     $isBorrowed = Borrow::where('book_id', $r->book_id)
    //     ->where('user_id',$r->student_id)
    //     ->where('action', 1)
    //     ->exists();

    //     if ($isBorrowed) {
    //         return redirect()->back()->with('error', 'This book is already borrowed.');
    //     }
    //     $borrow = new Borrow();
    //     $borrow->user_id = $r->student_id;
    //     $borrow->book_id = $r->book_id;
    //     $borrow->return_date = $r->return_date;

    //     if ($borrow->save()) {
    //         $book->available -= 1;
    //         $book->save();
    //         return redirect()->back()->with('success', 'Book borrowed successfully.');
    //     } else {
    //         return redirect()->back()->with('error', 'Failed to borrow book.');
    //     }






    // }


}
