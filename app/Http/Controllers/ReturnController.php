<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Carbon\Carbon;


use App\Models\Book;
use App\Models\Borrow;
use App\Models\BorrowDetail;
use App\Models\ReturnBookDetail;
use App\Models\ReturnBook;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class ReturnController extends Controller
{
    // ReturnBookController.php

    public function save(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'qty' => 'required|integer|min:1',
            'unit_price' => 'nullable|numeric|min:0',
            'total_price' => 'nullable|numeric|min:0',
            'notes' => 'nullable|string',
        ]);

        // Check if there is an existing ReturnBook record with the same borrow_id and today's date
        $existingReturnBook = ReturnBook::where('borrow_id', $request->input('borrow_id'))
                                        ->whereDate('return_date', now()->toDateString())
                                        ->first();

        if (!$existingReturnBook) {
            // No existing record for the same borrow_id with today's date, so create a new ReturnBook record
            $returnBook = new ReturnBook();
            $returnBook->borrow_id = $request->input('borrow_id');
            $returnBook->return_date = now(); // Set the return date to now
            $returnBook->save();
        } else {
            // Use the existing ReturnBook record
            $returnBook = $existingReturnBook;
        }
        
        // Save to returnbookdetails table
        $returnBookDetail = new ReturnBookDetail();
        $returnBookDetail->returnbook_id = $returnBook->id; // Foreign key reference to returnbooks table
        $returnBookDetail->book_id = $request->input('book_id');
        $returnBookDetail->qty_return = $request->input('qty');
        $returnBookDetail->totalprice = $request->input('total_price');
        $returnBookDetail->note = $request->input('notes');
        $returnBookDetail->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Book return recorded successfully!');
    }


    public function returnbook($student_id, $borrow_id){

        $returnBooks = ReturnBook::join('returnbookdetails', 'returnbooks.id', '=', 'returnbookdetails.returnbook_id')
        ->join('books', 'returnbookdetails.book_id', '=', 'books.id')
        ->select(
            'returnbooks.borrow_id',
            'returnbookdetails.book_id',
            'books.bookname as book_name',
            'returnbooks.return_date',   // Include return_date field
            'returnbookdetails.qty_return as qty_return',
            'returnbookdetails.totalprice as total_price'  // Include totalprice field

        )
        ->where('returnbooks.borrow_id', $borrow_id)  // Filter by borrow_id
        ->get();

        // $returnBooks = ReturnBook::join('returnbookdetails', 'returnbooks.id', '=', 'returnbookdetails.returnbook_id')
        // ->join('books', 'returnbookdetails.book_id', '=', 'books.id')
        // ->select(

        //     'returnbookdetails.book_id',
        //          'books.bookname as book_name',
        //          DB::raw('SUM(returnbookdetails.qty_return) as total_qty_return'))
        // ->where('returnbooks.borrow_id', $borrow_id)  // Filter by borrow_id
        // ->groupBy('returnbookdetails.book_id', 'books.bookname')
        // ->get();
        // $returnBookDetails = ReturnBookDetail::join('books', 'returnbookdetails.book_id', '=', 'books.id')
        // ->select('returnbookdetails.returnbook_id',
        //

        //   'returnbookdetails.qty_return')
        // ->get();


            // Find the borrow record using the borrow_id
            $borrow = Borrow::find($borrow_id);

            // Fetch the student record using the student_id
            $student = Student::find($student_id);

            // Get all book IDs associated with the given borrow_id from the borrowdetail table
            $bookIds = BorrowDetail::where('borrow_id', $borrow_id)->pluck('book_id');

            // Retrieve all books associated with the borrow_id
            $books = Book::whereIn('id', $bookIds)->get();
            // Calculate overdue days
                    // Calculate overdue days
            $currentDate = Carbon::now();
            $returnDate = $borrow->return_date ? Carbon::parse($borrow->return_date) : $currentDate;

            // Calculate overdue days only if returnDate is in the past
            if ($returnDate->lessThan($currentDate)) {
                $overdueDays = $currentDate->diffInDays($returnDate);
            } else {
                $overdueDays = 0;
            }

                return view('returns.returnbook', compact('student', 'borrow', 'books', 'overdueDays', 'returnBooks'));
        }

    public function fetchBookDetails(Request $request)
    {
        $borrowId = $request->input('borrow_id');
        $borrowDetail = BorrowDetail::where('borrow_id', $borrowId)->first();
        $book = Book::find($borrowDetail->book_id);
        return response()->json(['book_name' => $book->bookname]);
    }

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




}
