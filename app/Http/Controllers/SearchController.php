<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Student;

use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class SearchController extends Controller
{
    public function searchThismonth(){
        $today = Carbon::today();
        $startOfMonth = Carbon::now()->startOfMonth(); // Get the start of the current month

        $data['borrows'] = Borrow::where('borrows.action', 0)
            ->whereBetween('borrows.borrow_date', [$startOfMonth, $today]) // Filter by the date range
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
    public function searchThisweek(){
        $today = Carbon::today();
    $startOfWeek = Carbon::now()->startOfWeek(); // Get the start of the current week

    $data['borrows'] = Borrow::where('borrows.action', 0)
        ->whereBetween('borrows.due_date', [$startOfWeek, $today]) // Filter by the date range
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
    public function searchYesterday(){
   $today = Carbon::today();
    $yesterday = Carbon::yesterday();

    // Define the start of yesterday and the end of today
    $startOfYesterday = $yesterday->startOfDay();
    $endOfToday = $today->endOfDay();

    // Query to get borrows between yesterday and today
    $borrows = Borrow::where('borrows.action', 0)
        ->whereBetween('borrows.due_date', [$startOfYesterday, $endOfToday])
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

    // Pass the data to the view
    return view('returns.storyreturnv', ['borrows' => $borrows]);
    }
    public function searchToday(){
        $today = Carbon::today();

        $data['borrows'] = Borrow::where('borrows.action', 0)
        ->whereDate('borrows.due_date', $today) // Filter by today's date
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
}
