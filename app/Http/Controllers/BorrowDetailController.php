<?php

namespace App\Http\Controllers;
use App\models\BorrowDetail;

use Illuminate\Http\Request;

class BorrowDetailController extends Controller
{
    public function store(Request $request)
    {
         // Validate the incoming request with the correct primary key columns
    $validated = $request->validate([
        'borrow_id' => 'required|exists:borrows,borrow_id', // Change 'id' to the actual column name
        'book_id' => 'required|exists:books,id',
    ]);

    // Create a new BorrowDetail record
    $borrowDetail = new BorrowDetail();
    $borrowDetail->borrow_id = $validated['borrow_id'];
    $borrowDetail->book_id = $validated['book_id'];
    $borrowDetail->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Borrow detail has been saved successfully.');
    }
}
