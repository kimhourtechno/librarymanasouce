<?php

namespace App\Http\Controllers;
use App\models\BorrowDetail;
use App\models\Borrow;
use Illuminate\Http\Request;
use App\Rules\CheckReturnDate;


class BorrowDetailController extends Controller
{
    public function store(Request $request)
    {// Retrieve the borrow record to check return_date
    $borrow = Borrow::find($request->input('borrow_id'));

    // Determine if return_date should be validated
    $rules = [
        'borrow_id' => 'required|exists:borrows,borrow_id', // Adjust according to your table structure
        'book_id' => 'required|exists:books,id',
    ];

    if (!$borrow->return_date) {
        // If return_date is not set, add it to validation rules
        $rules['return_date'] = 'required|date';
    }

    // Validate the incoming request
    $validated = $request->validate($rules);

    // Create a new BorrowDetail record
    $borrowDetail = new BorrowDetail();
    $borrowDetail->borrow_id = $validated['borrow_id'];
    $borrowDetail->book_id = $validated['book_id'];
    $borrowDetail->save();

    // Update the borrow record with return_date if not already set
    if (!$borrow->return_date && isset($validated['return_date'])) {
        $borrow->return_date = $validated['return_date'];
        $borrow->save();
    }

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Borrow detail has been saved successfully.');
    }
}
