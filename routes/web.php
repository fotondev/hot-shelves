<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ShelfController;
use App\Http\Controllers\UserProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/publisher/{slug}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//Admin Middleware
Route::middleware('auth', 'admin')->group(function () {

    //Shelves
    Route::get('/shelves', [ShelfController::class, 'index'])->name('shelves.show');
    Route::get('/create-shelf', [ShelfController::class, 'create'])->name('shelf.create');
    Route::post('/shelves', [ShelfController::class, 'store'])->name('shelf.store');
    Route::get('/shelves/{shelf:slug}', [ShelfController::class, 'show'])->name('shelf.show');
    Route::get('/shelves/{slug}/edit', [ShelfController::class, 'edit'])->name('shelf.edit');
    Route::post('/shelves/{slug}', [ShelfController::class, 'update'])->name('shelf.update');
    Route::post('/shelves/{slug}', [ShelfController::class, 'destroy'])->name('shelf.delete');

    //Books   
    Route::get('/shelves/{shelfSlug}/create-book', [BookController::class, 'create'])->name('shelf.book.create');
    Route::post('/shelves/{shelfSlug}', [BookController::class, 'store'])->name('shelf.book.store');
    Route::get('/create-book', [BookController::class, 'create'])->name('book.create');
    Route::post('/books', [BookController::class, 'store'])->name('book.store');
    Route::get('/books', [BookController::class, 'index'])->name('books.show');
    Route::get('/books/{slug}', [BookController::class, 'show'])->name('book.show');
    Route::get('/books/{slug}/edit', [BookController::class, 'edit'])->name('book.edit');
    Route::post('/books/{slug}', [BookController::class, 'update'])->name('book.update');
    Route::post('/books', [BookController::class, 'destroy'])->name('book.delete');
    //Pages
    Route::get('/books/{bookSlug}/create-page', [PageController::class, 'create'])->name('page.create');
    Route::post('/books/{bookSlug}', [PageController::class, 'store'])->name('page.store');
    Route::post('/books/{bookSlug}/pages', [PageController::class, 'store'])->name('page.store');
    Route::get('/books/{bookSlug}/pages', [PageController::class, 'index'])->name('pages.show');
    Route::get('/books/{bookSlug}/pages/{slug}', [PageController::class, 'show'])->name('page.show');
    Route::get('/books/{bookSlug}/pages/{slug}/edit', [PageController::class, 'edit'])->name('page.edit');
    Route::post('/books/{bookSlug}/pages/{slug}', [PageController::class, 'update'])->name('page.update');
    Route::post('/books/{bookSlug}/pages', [PageController::class, 'destroy'])->name('book.delete');


    // User Profile routes
    Route::get('/user/{slug}', [UserProfileController::class, 'show'])->name('user.show');
});
