<?php

namespace App\Http\Controllers;
use App\models\BorrowDetail;
use App\models\Borrow;
use Illuminate\Http\Request;
use App\Rules\CheckReturnDate;


class BorrowDetailController extends Controller
{
    public function store(Request $request)
    {
        $borrow = Borrow::find($request->input('borrow_id'));

        // Determine if return_date should be validated
        $rules = [
            'borrow_id' => 'required|exists:borrows,borrow_id', // Adjust according to your table structure
            'book_id' => [
                'required',
                'exists:books,id',
                // Custom validation rule to check unique combination of borrow_id and book_id
                function ($attribute, $value, $fail) use ($request) {
                    $exists = BorrowDetail::where('borrow_id', $request->input('borrow_id'))
                                          ->where('book_id', $value)
                                          ->exists();
                    if ($exists) {
                        $fail('This book has already been added to the borrow record.');
                    }
                }
            ],
            'unit_price' => 'required|numeric',
            'qty' => 'required|integer',
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
        $borrowDetail->unit_price = $validated['unit_price'];
        $borrowDetail->qty = $validated['qty'];
        $borrowDetail->save();

        // Automatically set the librarian_id after saving, if not already set
        if (!$borrow->librarian_id) {
            $borrow->librarian_id = auth()->user()->id; // Assuming the logged-in user is the librarian
        }

        // Update the borrow record with return_date if not already set
        if (!$borrow->return_date && isset($validated['return_date'])) {
            $borrow->return_date = $validated['return_date'];
        }

        $borrow->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Borrow detail has been saved successfully.');
    }
}
