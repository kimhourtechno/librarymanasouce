<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import DB facade

use App\Models\Student;
use App\Models\Borrow;

use function Laravel\Prompts\select;

class MembershipController extends Controller
{
    public function addmember(){
        $data['students'] = Student::where('students.action', 0)
        ->join('members', 'students.member_id', '=', 'members.id')
        ->leftJoin('borrows', function($join) {
            $join->on('students.id', '=', 'borrows.user_id')
                ->where('borrows.action', 1); // Only get records where action is 1
        })
        ->leftJoin('books', 'borrows.book_id', '=', 'books.id')
        ->select(
            'students.id',
            'students.name',
            'students.gender',
            'students.phone',
            'students.birthdate', // Assuming you have a birthdate field
            'members.member_name as member_name',
            
            DB::raw('GROUP_CONCAT(books.bookname SEPARATOR ", ") as borrowbook') // Combine book names
        )
        ->groupBy(
            'students.id',
            'students.name',
            'students.gender',
            'students.phone',
            'students.birthdate', // Include all student fields in GROUP BY
            'members.member_name'
        )
        ->get();

    $data['members'] = DB::table('members')->get();

    return view('memberships.membershipv', $data);

        // ===testing===
    //     $data['students'] = Student::where('students.action', 0)
    //     ->join('members', 'students.member_id', '=', 'members.id')
    //     ->leftJoin('borrows', 'students.id', '=', 'borrows.user_id')
    //     ->leftJoin('books', 'borrows.book_id', '=', 'books.id')
    //     ->select(
    //         'students.*',
    //         'members.member_name as member_name',
    //         DB::raw('IF(borrows.action = 1, books.bookname, "N/A") as borrowbook')
    //     )
    //     ->get();

    // $data['members'] = DB::table('members')->get();

    // return view('memberships.membershipv', $data);
    }
}
