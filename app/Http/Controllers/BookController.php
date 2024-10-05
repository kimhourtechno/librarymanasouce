<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Book;

class BookController extends Controller
{
    public function getPrice($id)
    {
        $book = Book::find($id);
        if ($book) {
            return response()->json(['price' => $book->book_price]);
        }
        return response()->json(['error' => 'Book not found'], 404);
    }
    public function fetchBookPrice(Request $request)
    {
        $book = Book::find($request->book_id);

        if ($book) {
            return response()->json(['unit_price' => $book->book_price]);
        }

        return response()->json(['unit_price' => 0]);
    }

    public function delete($id){
        $book = Book::findOrFail($id);

        // Update the action field to 0
        $book->action = 0;
        $book->save();

        // Redirect or return response
        return redirect()->route('book.index')->with('success', 'Book status delete successfully.');


    }
    // public function getBookDetails($id)
    // {
    //     $book = Book::find($id);

    //     if ($book) {
    //         return response()->json([
    //             'unit_price' => $book->	book_price,
    //         ]);
    //     }
    //     return response()->json(['error' => 'Book not found'], 404);

    // }
    public function search(Request $request)
{
    $query = $request->input('query');

    // Check if the search query is empty
    if (empty($query)) {
        return redirect()->route('book.index')->with('error', 'Please enter a search term.');
    }

    // Searching across multiple fields in the books table and related tables
    $books = Book::join('book_categorys', 'books.book_category_id', '=', 'book_categorys.book_category_id')
        ->join('authors', 'books.author_id', '=', 'authors.author_id')
        // ->join('shelves', 'books.shelf_id', '=', 'shelves.shelf_id')
        ->where('books.bookname', 'like', "%{$query}%")
        ->orWhere('books.book_qty', 'like', "%{$query}%")
        ->orWhere('books.book_price', 'like', "%{$query}%")
        ->orWhere('books.date_post', 'like', "%{$query}%")
        ->orWhere('books.years_published', 'like', "%{$query}%")
        ->orWhere('books.lost_price', 'like', "%{$query}%")
        ->orWhere('authors.author_name', 'like', "%{$query}%")
        ->orWhere('books.shelve_name', 'like', "%{$query}%")

        // ->orWhere('shelves.shelf_name', 'like', "%{$query}%")
        ->orWhere('book_categorys.book_category_name', 'like', "%{$query}%")
        ->select(
            'books.*',
            'book_categorys.book_category_name as bookcategory',
            'authors.author_name as gname',
            // 'shelves.shelf_name as shelfname'
        )
        ->get();

    return view('books.listbookv', ['books' => $books, 'query' => $query]);
}



    public function index(){

        $data['books'] = Book::join('book_categorys', 'books.book_category_id', '=', 'book_categorys.book_category_id')
        ->join('authors', 'books.author_id', '=', 'authors.author_id')
        ->where('books.action', 1) // Add the condition here
         ->select(
        'books.*',

        'book_categorys.book_category_name as bookcategory',
        'authors.author_name as gname',
    )
    ->get();

        return view('books.listbookv',$data);
    }
    public function create(){
        $data['authors'] = DB::table('authors')
        ->get();
        $data['shelves'] = DB::table('shelves')
        ->get();
        $data['book_categorys'] = DB::table('book_categorys')
        ->get();
        return view('books.addbookv',$data);
    }
    public function store(Request $r)
    {
        $book = new Book();
        $book->bookname = $r->bookname;
        $book->book_qty = $r->book_qty;
        $book->available = $r->book_qty;
        $book->book_price = $r->book_price;
        $book->date_post = $r->date_post;
        $book->author_id = $r->author_id ;
        $book->shelve_name = $r->shelve_name;
        // $book->shelf_id = $r->shelf_id;
        $book->book_category_id = $r->book_category_id;
        $book->years_published = $r->years_published;
        $book->lost_price = $r->lost_price;


        $i = $book->save();

        if($i){
            return redirect()->route('book.create')
            ->with('success','Data has been saved');
            // return redirect()->route('student.edit',$id)
            // ->with('success','Data has been saved');

      }
        else{
            return redirect('book/create')
            ->with('error','Fail to saved data');
        }

    }
    public function edit($id){
        $data['authors'] = DB::table('authors')
        ->get();
        $data['shelves'] = DB::table('shelves')
        ->get();
        $data['book_categorys'] = DB::table('book_categorys')
        ->get();
        $data ['books'] = Book::find($id);
        return view('books.editv',$data);
    }
    public function update(Request $r, $id){
        $book = Book::find($id);
        $book->bookname = $r->bookname;
        $book->book_qty = $r->book_qty;
        $book->available = $r->book_qty;
        $book->book_price = $r->book_price;
        $book->date_post = $r->date_post;
        $book->book_category_id = $r->book_category_id;
        $book->author_id = $r->author_id;
        $book->shelf_id = $r->shelf_id;
        $book->years_published = $r->years_published;
        $book->lost_price = $r->lost_price;




        $i = $book->save();
        if($i){
            return redirect()->route('book.edit',$id)
            ->with('success','Data has been saved');
        }
        else{
            return redirect()->route('book.edit',$id)
            ->with('errore','Fial to saved data!');
        }
    }

//     public function index()
// {


//     $data['books'] = DB::table('books')
//          ->join('book_categorys', 'books.book_category_id', '=', 'book_categorys.book_category_id')
//         // ->join('book_categorys','books.book_category_id','=','book_categorys.book_category_id')

//         ->join('authors', 'books.author_id', '=', 'authors.author_id')
//         ->select(
//             'books.*',
//             'book_categorys.book_category_name as bookcategory',
//             'authors.author_name as gname'
//         ) // Adjust column names as neede
//         // ->select('books.*', 'author_name as gname')  // Adjust column names as needed
//        ->orderBy('id', 'Asc')
//         ->paginate(config('app.row'));  // Ensure 'row' is set in your config/app.php

//     return view('books.listbook', $data);
// }
// public function save(Request $r){
//     $data = array (
//         'bookname' => $r-> bookname,
//         'date_post' => $r -> date_post,
//         'author_id' => $r -> author_id,
//         'book_category_id' => $r ->book_category_name,
//         'book_qty' => $r -> book_qty,
//         'years_published' => $r-> years_published,

//     );
//     $i = DB::table('books') -> insert($data);
//     if($i){
//         return redirect('/addbook')
//         ->with('success', 'Data has beeb saved');
//     }
//     else{
//         return redirect('/addbook');
//     }
//     // $data = $r->except('_token');
//     // dd($data);
// }
// public function add(){


//     $data['book_categorys'] = DB::table('book_categorys')->get();
//     $data['authors'] = DB::table('authors')->get();


//     // $data['regions'] = DB::table('regions')->get();
//     return view('books.addbook', $data);

//     // $data['book_categorys'] = DB::table('book_categorys')
//     // ->get();
//     // return view('books.addbook',$data);
// }
// public function delete($id){
//     $i = DB::table('books')
//     ->where('id',$id)
//     ->delete();
//     return redirect('listbook')
//     ->with('success','Data has been Delete');
// }
// public function edit($id){

//     $book = DB::table('books')
//     ->find($id);
//     $authors = DB::table('authors')
//     ->get();
//     $book_categorys = DB::table('book_categorys')
//     ->get();

//     return view('books.edite',compact('book','authors','book_categorys'));
// }
// public function update(Request $r){
//     $data = $r->except('_token','id');

//     $i = DB::table('books')
//     ->where('id',$r->id)
//     ->update($data);

//     if($i){
//         return redirect('book/edit/'.$r->id)
//         ->with('success','Data has been saved');
//     }
//     else{
//         return redirect('book/edit/'.$r->id)
//         ->with('success','Data has been saved');
//     }
// }


}
