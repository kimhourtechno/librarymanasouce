<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\ReturnBook;
use App\Models\BrokenBookDetail;
use App\Models\ReturnBookDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboardbroken()
    {
        $studentCount = Student::count();
        $bookCount = Book::count();
        $borrowCount = Borrow::count();
        $returnCount = ReturnBookDetail::count();
        $brokenReturnCount = BrokenBookDetail::count(); // Count return book broken details
        
        return view('dashboards.dashboardreturnbrokenv', compact(
            'studentCount', 'bookCount', 'borrowCount',
            'returnCount', 'brokenReturnCount', 'borrows'
        ));
      }
    public function dashboardborrow()
    {
        $studentCount = Student::count();
        $bookCount = Book::count();
        $borrowCount = Borrow::count();
        $returnCount = ReturnBookDetail::count();
        $brokenReturnCount = BrokenBookDetail::count(); // Count return book broken details

        // Fetch borrow data with related book, librarian, and details
        $borrows = Borrow::select(
            'borrows.borrow_id', 'borrows.user_id', 'borrows.borrow_date',
            'borrows.return_date', 'borrows.librarian_id',
            'borrowdetails.book_id', 'borrowdetails.qty', 'borrowdetails.unit_price',
            'books.bookname as bookname',
            'users.name as librarain'
        )
        ->join('borrowdetails', 'borrows.borrow_id', '=', 'borrowdetails.borrow_id')
        ->join('books', 'borrowdetails.book_id', '=', 'books.id')
        ->join('users', 'borrows.librarian_id', '=', 'users.id')

        ->get();

        // Return data to the view
        return view('dashboards.dashboardborrowv', compact(
            'studentCount', 'bookCount', 'borrowCount',
            'returnCount', 'brokenReturnCount', 'borrows'
        ));
    }

    public function dashboard(){
        // Count statistics
        $studentCount = Student::count();
        $bookCount = Book::count();
        $borrowCount = Borrow::count();
        $returnCount = ReturnBookDetail::count();
        $brokenReturnCount = BrokenBookDetail::count(); // Count return book broken details



        // Fetch all borrow records with librarian's name from users table
        $borrows = Borrow::join('users', 'borrows.librarian_id', '=', 'users.id') // assuming 'librarian_id' exists in the borrows table
            ->select('borrows.*', 'users.name as librarian_name')
            ->get();

        // Fetch data from returnbooks and returnbookdetails tables
        $returnBooks = ReturnBook::join('returnbookdetails', 'returnbooks.id', '=', 'returnbookdetails.returnbook_id')

            ->join('books', 'returnbookdetails.book_id', '=', 'books.id') // assuming 'books.id' exists

            ->join('borrows', 'returnbooks.borrow_id', '=', 'borrows.borrow_id') // Join with borrows to fetch librarian_id
            ->join('users', 'borrows.librarian_id', '=', 'users.id') // Join with users table to fetch librarian name
            ->join('students', 'borrows.user_id', '=', 'students.id') // Join with students table to get student info

            ->select(
                'returnbooks.borrow_id',
                'returnbooks.return_date',
                'returnbookdetails.book_id',
                'returnbookdetails.qty_return',
                'books.bookname as book_name',
                'users.name as librarian_name', // Librarian name
                'students.name as student_name', // Include student name

            )
            ->get();

        // Return data to the view
        return view('dashboards.dashboardv', compact('studentCount', 'bookCount', 'borrowCount', 'returnCount', 'borrows', 'returnBooks',   'brokenReturnCount',));
    }

}
