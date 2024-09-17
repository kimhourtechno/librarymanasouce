<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\models\BorrowDetail;
use App\Models\Student;
use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Contracts\Cache\Store;

class BorrowController extends Controller
{



   public function add(Request $request){
    $request->validate([
        'student_id' => 'required|exists:students,id',
    ]);

    // Create a new borrow entry
    $borrow = new Borrow();
    $borrow->user_id = $request->student_id; // Assign student_id to user_id field
    $borrow->librarian_id = auth()->user()->id; // Set the librarian_id to the current user's ID

    // Add any other fields that need to be saved
    $borrow->save();

    // Redirect or return response
    return back()->with('success', 'Borrow record added successfully.');
   }

    public function index(){
        return view('layouts.borrow.borrowm');
    }
    public function edit($id, $borrow_id)
    {
        $borrowDetails = BorrowDetail::where('borrow_id', $borrow_id)
                    ->join('books', 'borrowdetails.book_id', '=', 'books.id')
                    // ->join('shelves', 'books.shelf_id', '=', 'shelves.shelf_id')
                    ->select(
                        'borrowdetails.*',
                        'books.bookname as bookname',
                        'books.shelve_name as shelfname'
                        // 'shelf_name as shelfname'
                        )
                    ->get();
        $book = Book::all();
        $borrow = Borrow::find($borrow_id);
        $student = Student::find($id);
        return view('borrow_books.borrowv', compact('student', 'borrow', 'book','borrowDetails'));

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
    public function store(Request $r)
    {
        // Validate the incoming request data

         // Validate the incoming request data
         $r->validate([
        'book_id' => 'required|exists:books,id',
    ]);


        // Optionally, create a new borrow detail record
        $borrowDetail = new BorrowDetail();
        $borrowDetail->borrow_id = $r->borrow_id;
        $borrowDetail->book_id = $r->input('book_id');
        $borrowDetail->save();


    }


}
