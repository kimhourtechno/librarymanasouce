<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import DB facade
use App\Models\Book;

use App\Models\Student;
use App\Models\Borrow;

use function Laravel\Prompts\select;

class MembershipController extends Controller
{
    public function addmember(){
        $students = Student::leftJoin('borrows', 'students.id', '=', 'borrows.user_id')
        ->leftJoin('users', 'borrows.librarian_id', '=', 'users.id')
        ->where('students.action', 1) // Ensure that only students with action = 1 are included
        ->whereNotNull('borrows.borrow_id') // Only include students with a borrow_id
        ->select('students.*', 'borrows.borrow_id', 'borrows.borrow_date', 'borrows.return_date', 'borrows.due_date', 'users.name as librarian_name')
        ->get();


        $books = Book::all();

        return view('memberships.membershipv', [
            'students' => $students,
            'books' => $books
        ]);


    }
}
