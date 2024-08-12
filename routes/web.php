<?php
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;


use App\Models\Author;

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
    // Route::resource('/users');
    Route::resource('/user', UserController::class);
    Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

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
// Route::get('/student/search/','App\Http\Controllers\StudentController@search')->name('student.search');
// Route::resource('/student','App\Http\Controllers\StudentController')->except(['destroy']);
// Route::get('/student/delete/{id}','App\Http\Controllers\StudentController@delete')->name('student.delete');
// //search
Route::middleware(['auth'])->group(function () {
    Route::resource('/book', BookController::class)->except(['destroy','show']);
    Route::get('/book/search', [BookController::class, 'search'])->name('book.search');
    Route::resource('/author', AuthorController::class);


    Route::get('/search/today', [SearchController::class, 'searchToday'])->name('search.today');
    Route::get('/search/yesterday', [SearchController::class, 'searchYesterday'])->name('search.yesterday');
    Route::get('/search/thisweek', [SearchController::class, 'searchThisweek'])->name('search.thisweek');
    Route::get('/search/thismonth', [SearchController::class, 'searchThismonth'])->name('search.thismonth');
});
// Route::get('/search/today','App\Http\Controllers\SearchController@searchToday')->name('search.today');
// Route::get('/search/yesterday','App\Http\Controllers\SearchController@searchYesterday')->name('search.yesterday');
// Route::get('/search/thisweek','App\Http\Controllers\SearchController@searchThisweek')->name('search.thisweek');
// Route::get('/search/thimonth','App\Http\Controllers\SearchController@searchThismonth')->name('search.thismonth');
// ///user
//  Route::get('/login', 'App\Http\Controllers\UserController@login')->name('login');
//  Route::post('/login/dologin', 'App\Http\Controllers\UserController@dologin');
//
//
// Route::get('/return/{borrow_id}','App\Http\Controllers\BorrowController@return')->name('return.edit');
;
// Route::get('/return/edit/{borrow_id}','App\Http\Controllers\StudentController@edit')->name('return.edit');
Route::resource('/return','App\Http\Controllers\ReturnController')->except(['destroy']);
Route::get('/return/delete/{id}','App\Http\Controllers\StudentController@delete')->name('return.delete');
//
Route::get('/membership','App\Http\Controllers\MembershipController@addmember');
//
// Route::get('/return','App\Http\Controllers\ReturnController@return');
Route::resource('/borrow','App\Http\Controllers\BorrowController');

// Route::get('/login', 'App\Http\Controllers\UserController@login');
// Route::post('/login/dologin', 'App\Http\Controllers\UserController@do_login');
// Route::get('/logout', 'App\Http\Controllers\UserController@logout');
// =====mainform===
Route::get('/homemenu', 'App\Http\Controllers\HomemenuController@index');
//student
// Route::get('/student','App\Http\Controllers\StudentController@index');
// Route::get('/studentregister','App\Http\Controllers\StudentController@register');
// Route::post('/student/save','App\Http\Controllers\StudentController@save');
//book====
// Route::get('/listbook', 'App\Http\Controllers\BookController@index');
// Route::get('/addbook','App\Http\Controllers\BookController@add');
// Route::post('/book/add','App\Http\Controllers\BookController@save');
// Route::get('/book/delete/{id}','App\Http\Controllers\BookController@delete');
// Route::get('/book/edit/{id}','App\Http\Controllers\BookController@edit');
// Route::post('book/update','App\Http\Controllers\BookController@update');

// Route::get('/', function () {
//     return view('welcome');
// });

//design master page
Route::get('/master','App\Http\Controllers\masterController@index');
Route::get('/master1','App\Http\Controllers\master1Controller@index1');

Route::get('/about', 'App\Http\Controllers\AboutController@index');
Route::get('/contact', 'App\Http\Controllers\ContactController@index');
//view rout
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
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Testing session
//Route::get('/test','App\Http\Controllers\SessionController@test');

//login test
// Route::get('/login', 'App\Http\Controllers\UserController@login');
// Route::post('/login/dologin', 'App\Http\Controllers\UserController@do_login');
// Route::get('/logout', 'App\Http\Controllers\UserController@logout');
