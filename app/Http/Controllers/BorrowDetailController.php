<?php

namespace App\Http\Controllers;
use App\models\BorrowDetail;
use App\models\Borrow;
use App\models\Book;
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
            'qty' => [
                'required',
                'integer',
                // Custom validation rule to check available quantity in the books table
                function ($attribute, $value, $fail) use ($request) {
                    $book = Book::find($request->input('book_id'));
                    if ($book->available < $value) {
                        $fail('The quantity requested exceeds the available stock.');
                    }
                }
            ],
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

        // Deduct the borrowed quantity from the available stock in the books table
        $book = Book::find($validated['book_id']);
        $book->available -= $validated['qty'];
        $book->save();

        // Automatically set the librarian_id after saving, if not already set
        if (!$borrow->librarian_id) {
            $borrow->librarian_id = auth()->user()->id; // Assuming the logged-in user is the librarian
        }

        // Set borrow_date to now if not already set
        if (!$borrow->borrow_date) {
            $borrow->borrow_date = now();
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
