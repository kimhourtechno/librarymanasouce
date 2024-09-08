<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Carbon\Carbon;


use App\Models\Book;
use App\Models\Borrow;
use App\Models\BorrowDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class ReturnController extends Controller
{
    public function returnbook($student_id, $borrow_id){
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
        // Calculate overdue days
    $currentDate = Carbon::now();
    $returnDate = $borrow->return_date ? Carbon::parse($borrow->return_date) : $currentDate;

    // Calculate overdue days only if returnDate is in the past
    if ($returnDate->lessThan($currentDate)) {
        $overdueDays = $currentDate->diffInDays($returnDate);
    } else {
        $overdueDays = 0;
    }

        return view('returns.returnbook', compact('student', 'borrow', 'books', 'overdueDays'));

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

        // $data['borrows'] = Borrow::where('borrow_id',$id)
        // ->update([
        //     'action' => 0,
        //     'due_date' => Carbon::now(),
        // ]);

        // return redirect()->back()->with('error', 'Book returned record.');


}
