<?php
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReturnBrokenController;

use App\Http\Controllers\BorrowDetailController;
use App\Http\Controllers\ReturnController;




use App\Models\Author;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/student/search/', [StudentController::class, 'search'])
//     ->name('student.search')
//     ->middleware('auth');
// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::resource('/student', StudentController::class)->except(['destroy']);
//     Route::get('/student/delete/{id}', [StudentController::class, 'delete'])->name('student.delete');
// });
///User////
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('/user', UserController::class);
    Route::delete('/user/{id}/delete', [UserController::class, 'delete'])->name('user.delete');
// In your web.php file
Route::post('/user/{id}/remove', [UserController::class, 'remove'])->name('user.remove');





});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// use resource
Route::middleware(['auth'])->group(function () {

    Route::get('/student/search', [StudentController::class, 'search'])->name('student.search');
    Route::get('/student/view/{id}', [StudentController::class, 'view'])->name('student.view');

    Route::resource('/student', StudentController::class)->except(['destroy','show']);
    Route::get('/student/delete/{id}', [StudentController::class, 'delete'])->name('student.delete');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/membership','App\Http\Controllers\MembershipController@addmember');

    ///Dash Board
    Route::get('/dashboardreturnbroken', [DashboardController::class, 'dashboardbroken'])->name('dashboard.returnbroken');

    Route::get('/dashboardborrow', [DashboardController::class, 'dashboardborrow'])->name('dashboard.borrow');

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.view');
    //return broken
    Route::get('/returnbroken/{student}/{borrow}', [ReturnBrokenController::class, 'createbroken'])->name('returnbroken.show');
    Route::post('/returnbroken/store', [ReturnBrokenController::class, 'store'])->name('returnbroken.store');

    //return

    Route::resource('/return','App\Http\Controllers\ReturnController')->except(['destroy']);
    Route::post('/return-book', [ReturnController::class, 'save'])->name('return.save');

    Route::get('/return/delete/{id}','App\Http\Controllers\StudentController@delete')->name('return.delete');
    Route::get('/returnbook/{student_id}/{borrow_id}', [ReturnController::class, 'returnbook'])->name('returnbook.return');
    Route::get('/books/details/{id}', [BookController::class, 'getBookDetails'])->name('books.details');
// Add this route in your web.php
    // Route::get('/fetch-book-details', [ReturnController::class, 'fetchBookDetails']);    //borrow
    // Route::get('/fetch-book-price', [BookController::class, 'fetchBookPrice'])->name('fetchBookPrice');
    Route::get('/book-price/{id}', [BookController::class, 'getPrice']);

    Route::get('/books/details/{id}', [BookController::class, 'details'])->name('books.details');

    Route::post('/borrow/add', [BorrowController::class, 'add'])->name('borrow.add');
    Route::resource('/borrow', 'App\Http\Controllers\BorrowController')->except('edit');
    Route::get('/borrow/edit/{id}/{borrow_id}', [BorrowController::class, 'edit'])->name('borrow.edit');


    Route::post('/borrowdetail/store', [BorrowDetailController::class, 'store'])->name('borrowdetail.store');

    Route::resource('/book', BookController::class)->except(['destroy','show']);
    Route::get('/book/delete{book}', [BookController::class, 'delete'])->name('book.delete');

    Route::get('/book/search', [BookController::class, 'search'])->name('book.search');
    Route::resource('/author', AuthorController::class);


    Route::get('/search/today', [SearchController::class, 'searchToday'])->name('search.today');
    Route::get('/search/yesterday', [SearchController::class, 'searchYesterday'])->name('search.yesterday');
    Route::get('/search/thisweek', [SearchController::class, 'searchThisweek'])->name('search.thisweek');
    Route::get('/search/thismonth', [SearchController::class, 'searchThismonth'])->name('search.thismonth');
});
Route::view('/register', 'register');
Route::post('/register/save','App\Http\Controllers\RegisterController@save')
        ->name('register.name');
Route::get('/product', 'App\Http\Controllers\ProductController@index');
Route::post('/product/sell', 'App\Http\Controllers\ProductController@sell');
Route::get('/upload', 'App\Http\Controllers\UploadController@index');
Route::post('/upload/save', 'App\Http\Controllers\UploadController@save');

Route::get('/customer','App\Http\Controllers\CustomerController@index1');
Route::get('/customer/create','App\Http\Controllers\CustomerController@create');
Route::get('customer/edit/{id}','App\Http\Controllers\CustomerController@edit');
Route::get('/customer/delete/{id}','App\Http\Controllers\CustomerController@delete');
Route::post('/customer/update','App\Http\Controllers\CustomerController@update');
Route::get('/customer/search','App\Http\Controllers\CustomerController@search');

Route::post('/customer/save','App\Http\Controllers\CustomerController@save');

//Category rout for resouce controller
Route::resource('/category','App\Http\Controllers\CategoryController')
                    ->except(['show', 'destroy']);
Route::get('/category/delete/{id}', 'App\Http\Controllers\CategoryController@delete')
        ->name('category.delete');

Route::get('/region','App\Http\Controllers\RegionController@index');
