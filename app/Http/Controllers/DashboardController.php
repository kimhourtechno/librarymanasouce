<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Book;
use App\Models\BorrowDetail;
use App\Models\Borrow;
use App\Models\User;
use App\Models\ReturnBook;
use App\Models\BrokenBookDetail;
use App\Models\ReturnBookDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function dashboard(){
        // Count statistics
        $studentCount = Student::count();
        $bookCount = Book::count();
        $borrowCount = Borrow::count();
        $returnCount = ReturnBookDetail::count();
        $brokenReturnCount = BrokenBookDetail::count(); // Count return book broken details

        // Count students where action = 1
        $activeStudentCount = Student::where('action', 1)->count();
            // Count books where action = 1
        $activeBookCount = Book::where('action', 1)->count();
            // Sum the total quantity of returned books from returnbookdetails
        $totalQtyReturn = ReturnBookDetail::sum('qty_return');
        $totalQtyBorrow = BorrowDetail::sum('qty');
            // Sum the total quantity of broken books from brokenbookdetails
        $totalQtyBroken = BrokenBookDetail::sum('qty_broken');
        $userCount = User::count();





        // Return data to the view
        return view('dashboards.dashboardv', compact(
            'studentCount',
            'bookCount',
            'borrowCount',
            'returnCount',
            'brokenReturnCount',
            'activeStudentCount', // Include activeStudentCount in the view
             'activeBookCount',
             'totalQtyReturn', // Include totalQtyReturn in the view
             'totalQtyBorrow', // Include totalQtyBorrow in the view
             'totalQtyBroken', // Include totalQtyBroken in the view
             'userCount' // Include userCount in the view
        ));
    }



}
