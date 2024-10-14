<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\models\BorrowDetail;
use App\Models\Student;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\ReturnBookDetail;
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
    // Fetch borrowed details with book information
    $borrowDetails = BorrowDetail::where('borrow_id', $borrow_id)
                ->join('books', 'borrowdetails.book_id', '=', 'books.id')
                ->select(
                    'borrowdetails.*',
                    'books.bookname as bookname',
                    'books.shelve_name as shelfname'
                )
                ->get();

    // Fetch all returns for this borrow_id
    $returnedQuantities = ReturnBookDetail::whereHas('returnbook', function($query) use ($borrow_id) {
        $query->where('borrow_id', $borrow_id);
    })->get();

    // Prepare an associative array to hold remaining quantities
    $remainingQuantities = [];

    // Loop through borrowed details to calculate remaining quantities
    foreach ($borrowDetails as $detail) {
        $borrowedQty = $detail->qty; // Total borrowed quantity
        $returnedQty = $returnedQuantities
            ->where('book_id', $detail->book_id) // Match by book_id
            ->sum('qty_return'); // Sum the returned quantities

        // Calculate remaining quantity
        $remainingQuantities[$detail->book_id] = max($borrowedQty - $returnedQty, 0); // Ensure non-negative
    }

    $book = Book::all();
    $borrow = Borrow::find($borrow_id);
    $student = Student::find($id);

    // Pass remaining quantities to the view
    return view('borrow_books.borrowv', compact('student', 'borrow', 'book', 'borrowDetails', 'remainingQuantities'));
}

    // public function edit($id, $borrow_id)
    // {
    //     $borrowDetails = BorrowDetail::where('borrow_id', $borrow_id)
    //                 ->join('books', 'borrowdetails.book_id', '=', 'books.id')

    //                 ->select(
    //                     'borrowdetails.*',
    //                     'books.bookname as bookname',
    //                     'books.shelve_name as shelfname'
    //                     )
    //                 ->get();
    //     $book = Book::all();
    //     $borrow = Borrow::find($borrow_id);
    //     $student = Student::find($id);
    //     return view('borrow_books.borrowv', compact('student', 'borrow', 'book','borrowDetails'));

    // }

    public function store(Request $r)
    {

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
