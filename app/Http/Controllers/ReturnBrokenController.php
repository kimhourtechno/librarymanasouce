<?php

namespace App\Http\Controllers;
use App\Models\Student; // Import the Student model if you need it
use App\Models\Borrow; // Impo
use App\Models\Book;
use App\Models\BorrowDetail;
use App\Models\BrokenBook;
use App\Models\BrokenBookDetail;
use App\Models\ReturnBookDetail;
use Carbon\Carbon;

use Illuminate\Http\Request;



class ReturnBrokenController extends Controller
{
 public function createbroken($student, $borrow){
        // Fetch student and borrow records
        $studentRecord = Student::find($student);
        $borrowRecord = Borrow::find($borrow);

        // Check if student and borrow records exist
        if (!$studentRecord || !$borrowRecord) {
            return redirect()->back()->with('error', 'Invalid student or borrow record.');
        }

        // Get all book IDs associated with this borrow record from borrowdetails
        $bookIds = BorrowDetail::where('borrow_id', $borrow)->pluck('book_id');

        // Retrieve the books based on the book IDs found
        $books = Book::whereIn('id', $bookIds)->get();

// Retrieve broken book details and join with brokenbooks based on brokenbook_id
    $brokenBooks = BrokenBookDetail::join('brokenbooks', 'brokenbookdetails.brokenbook_id', '=', 'brokenbooks.brokenbook_id')
    ->join('books', 'brokenbookdetails.book_id', '=', 'books.id') // Join with books table
    ->join('users', 'brokenbookdetails.librarian_id', '=', 'users.id') // Join with users table
    ->where('brokenbooks.borrow_id', $borrow) // Filter by borrow_id
    ->select(
        'brokenbookdetails.brokenbook_id',
        'books.bookname', // Select book name from books table
        'users.name as user_name', // Select user name from users table
        'brokenbookdetails.qty_broken',
        'brokenbookdetails.librarian_id',
        'brokenbookdetails.unit_price',
        'brokenbookdetails.total_price'
    )
    ->get();

        // Pass the data to the view
        return view('returns.returnbrokenv', [
            'student' => $studentRecord,
            'brokenBooks' => $brokenBooks,
            'borrow' => $borrowRecord,
            'borrow_id' => $borrowRecord->borrow_id,
            'books' => $books,
        ]);
    }
    public function store(Request $request)
{
    // Validate the input
    $request->validate([
        'borrow_id' => 'required|exists:borrows,borrow_id', // Validate borrow_id
        'book_id' => 'required|exists:books,id', // Validate book_id exists in books table
        'qty_broken' => 'required|integer|min:1',
        'unit_price' => 'required|numeric|min:0',
        'total_price' => 'required|numeric|min:0',
    ]);

    // Retrieve the total quantity borrowed for the specific book_id
    $qtyBorrowed = BorrowDetail::where('borrow_id', $request->borrow_id)
        ->where('book_id', $request->book_id)
        ->sum('qty'); // Assuming 'qty' is the column name in borrowdetails

    // Retrieve the total quantity returned for the specific book_id
    $qtyReturned = ReturnBookDetail::where('book_id', $request->book_id)
        ->whereHas('returnbook', function ($query) use ($request) {
            $query->where('borrow_id', $request->borrow_id);
        })
        ->sum('qty_return'); // Sum of qty_return for the specific book_id and borrow_id

    // Retrieve the total quantity broken for the specific book_id
    $qtyBrokenReturned = BrokenBookDetail::where('book_id', $request->book_id)
        ->whereHas('brokenbook', function ($query) use ($request) {
            $query->where('borrow_id', $request->borrow_id);
        })
        ->sum('qty_broken'); // Sum of qty_broken for the specific book_id and borrow_id

    // Calculate the new total returned and broken quantity
    $newTotalQtyReturnedAndBroken = $qtyReturned + $qtyBrokenReturned + $request->qty_broken;

    // Check if the sum of returned and broken quantities exceeds the borrowed quantity
    if ($newTotalQtyReturnedAndBroken > $qtyBorrowed) {
        // return redirect()->back()->withErrors(['qty_broken' => 'The total quantity of returned and broken books exceeds the borrowed quantity.']);
        return redirect()->back()->with('error', 'The total quantity of returned and broken books exceeds the borrowed quantity.');

    }

    // Check if there is already an entry in the brokenbooks table with the same borrow_id and return_date (today)
    $existingBrokenBook = BrokenBook::where('borrow_id', $request->borrow_id)
        ->whereDate('return_date', now()->toDateString()) // Check if today's date matches the return date
        ->first();

    if (!$existingBrokenBook) {
        // If no existing record is found, create a new entry in brokenbooks table
        $newBrokenBook = new BrokenBook();
        $newBrokenBook->borrow_id = $request->borrow_id;
        $newBrokenBook->return_date = now(); // Save today's date as return_date
        $newBrokenBook->save();

        // Get the brokenbook_id of the newly created record
        $brokenbook_id = $newBrokenBook->brokenbook_id; // The ID of the new record
    } else {
        // If an existing record is found, use its brokenbook_id
        $brokenbook_id = $existingBrokenBook->brokenbook_id;
    }

    // Save the data into brokenbookdetails table using the brokenbook_id
    $brokenBookDetail = new BrokenBookDetail();
    $brokenBookDetail->brokenbook_id = $brokenbook_id; // Make sure the same brokenbook_id is used here
    $brokenBookDetail->book_id = $request->book_id;
    $brokenBookDetail->qty_broken = $request->qty_broken;
    $brokenBookDetail->unit_price = $request->unit_price;
    $brokenBookDetail->total_price = $request->total_price;
    $brokenBookDetail->notes = $request->notes; // Optional field
    $brokenBookDetail->librarian_id = auth()->user()->id; // Assign the current logged-in librarian
    $brokenBookDetail->save();

    // Redirect with success message
    return redirect()->back()->with('success', 'Broken book details saved successfully!');
}


    // public function store(Request $request)
    // {
    // // Validate the input
    // $request->validate([
    //     'borrow_id' => 'required|exists:borrows,borrow_id', // Validate borrow_id
    //     'book_id' => 'required|exists:books,id', // Validate book_id exists in books table
    //     'qty_broken' => 'required|integer|min:1',
    //     'unit_price' => 'required|numeric|min:0',
    //     'total_price' => 'required|numeric|min:0',
    // ]);

    // // Retrieve the total quantity borrowed for the specific book_id
    // $qtyBorrowed = BorrowDetail::where('borrow_id', $request->borrow_id)
    //     ->where('book_id', $request->book_id)
    //     ->sum('qty'); // Assuming 'qty' is the column name in borrowdetails

    // // Retrieve the total quantity broken for the specific book_id
    // $qtyBrokenReturned = BrokenBookDetail::where('book_id', $request->book_id)
    //     ->sum('qty_broken'); // Sum of qty_broken for the specific book_id

    // // Check if qty_broken exceeds the available quantity
    // if (($qtyBrokenReturned + $request->qty_broken) > $qtyBorrowed) {
    //     return redirect()->back()->withErrors(['qty_broken' => 'Cannot return more books than borrowed.']);
    // }

    // // Check if there is already an entry in the brokenbooks table with the same borrow_id and return_date (today)
    // $existingBrokenBook = BrokenBook::where('borrow_id', $request->borrow_id)
    //     ->whereDate('return_date', now()->toDateString()) // Check if today's date matches the return date
    //     ->first();

    // if (!$existingBrokenBook) {
    //     // If no existing record is found, create a new entry in brokenbooks table
    //     $newBrokenBook = new BrokenBook();
    //     $newBrokenBook->borrow_id = $request->borrow_id;
    //     $newBrokenBook->return_date = now(); // Save today's date as return_date
    //     $newBrokenBook->save();

    //     // Get the brokenbook_id of the newly created record
    //     $brokenbook_id = $newBrokenBook->brokenbook_id; // The ID of the new record
    // } else {
    //     // If an existing record is found, use its brokenbook_id
    //     $brokenbook_id = $existingBrokenBook->brokenbook_id;
    // }

    // // Save the data into brokenbookdetails table using the brokenbook_id
    // $brokenBookDetail = new BrokenBookDetail();
    // $brokenBookDetail->brokenbook_id = $brokenbook_id; // Make sure the same brokenbook_id is used here
    // $brokenBookDetail->book_id = $request->book_id;
    // $brokenBookDetail->qty_broken = $request->qty_broken;
    // $brokenBookDetail->unit_price = $request->unit_price;
    // $brokenBookDetail->total_price = $request->total_price;
    // $brokenBookDetail->notes = $request->notes; // Optional field
    // $brokenBookDetail->librarian_id = auth()->user()->id; // Assign the current logged-in librarian
    // $brokenBookDetail->save();

    // // Redirect with success message
    // return redirect()->back()->with('success', 'Broken book details saved successfully!');
    // }



}
