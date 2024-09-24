<?php

namespace App\Http\Controllers;
use App\Models\Student; // Import the Student model if you need it
use App\Models\Borrow; // Impo
use App\Models\Book;
use App\Models\BorrowDetail;
use App\Models\BrokenBook;
use App\Models\BrokenBookDetail;
use Carbon\Carbon;

use Illuminate\Http\Request;



class ReturnBrokenController extends Controller
{
    public function createbroken($student, $borrow){

        $studentRecord = Student::find($student);
        $borrowRecord = Borrow::find($borrow);

        // Get all book IDs associated with this borrow record from borrowdetails
        $bookIds = BorrowDetail::where('borrow_id', $borrow)->pluck('book_id');

        // Retrieve the books based on the book IDs found
        $books = Book::whereIn('id', $bookIds)->get();

        // Get the current date in YYYY-MM-DD format
        $currentDate = \Carbon\Carbon::now()->format('d-m-Y');

        // Pass the data to the view
        return view('returns.returnbrokenv', [
            'student' => $studentRecord,
            'borrow' => $borrowRecord,
            'borrow_id' => $borrowRecord->borrow_id, // Pass borrow_id to the view
            'books' => $books, // Pass the retrieved books to the view
            'currentDate' => $currentDate, // Pass the current date to the view
        ]);
    }
    public function store(Request $request)
    {
        // Validate the input
    $request->validate([
        'book_id' => 'required',
        'qty_broken' => 'required|integer|min:1',
        'unit_price' => 'required|numeric|min:0',
        'total_price' => 'required|numeric|min:0',
    ]);

    // Convert return_date from 'DD-MM-YYYY' to 'YYYY-MM-DD'
    $formattedDate = Carbon::createFromFormat('d-m-Y', $request->return_date)->format('Y-m-d');

    // Check if there is already an entry in the brokenbooks table with the same borrow_id and return_date
    $existingBrokenBook = BrokenBook::where('borrow_id', $request->borrow_id)
        ->where('return_date', $formattedDate)
        ->first();

    if ($existingBrokenBook) {
        // If an existing record is found, use its brokenbook_id
        $brokenbook_id = $existingBrokenBook->brokenbook_id;
    } else {
        // If no existing record is found, create a new one
        $newBrokenBook = new BrokenBook();
        $newBrokenBook->borrow_id = $request->borrow_id;
        $newBrokenBook->return_date = $formattedDate;
        $newBrokenBook->save();

        // Get the brokenbook_id of the newly created record
        $brokenbook_id = $newBrokenBook->brokenbook_id;
    }

    // Save the data into brokenbookdetails table using the brokenbook_id
    $brokenBookDetail = new BrokenBookDetail();
    $brokenBookDetail->brokenbook_id = $brokenbook_id; // Use the retrieved or new brokenbook_id
    $brokenBookDetail->book_id = $request->book_id;
    $brokenBookDetail->qty_broken = $request->qty_broken;
    $brokenBookDetail->unit_price = $request->unit_price;
    $brokenBookDetail->total_price = $request->total_price;
    $brokenBookDetail->notes = $request->notes;
    $brokenBookDetail->librarian_id = auth()->user()->id;
    $brokenBookDetail->save();

    // Redirect with success message
    return redirect()->back()->with('success', 'Broken book details saved successfully!');
    }
}
