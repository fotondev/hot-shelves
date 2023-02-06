<?php

use App\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShelfController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;

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

require __DIR__.'/auth.php';


Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/publisher/{user}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




// Middleware
Route::middleware('auth')->group(function () {

    //Shelves
    Route::get('/shelves', [ShelfController::class, 'index'])->name('shelves.show');
    Route::get('/create-shelf', [ShelfController::class, 'create'])->name('shelf.create');
    Route::post('/shelves', [ShelfController::class, 'store'])->name('shelf.store');
    Route::get('/shelves/{shelf}', [ShelfController::class, 'show'])->name('shelf.show');
    Route::get('/shelves/{shelf}/edit', [ShelfController::class, 'edit'])->name('shelf.edit');
    Route::put('/shelves/{shelf}', [ShelfController::class, 'update'])->name('shelf.update');
    Route::delete('/shelves/{shelf}', [ShelfController::class, 'destroy'])->name('shelf.delete');

    //Books   
    Route::get('/shelves/{shelf}/create-book', [BookController::class, 'create'])->name('shelf.book.create');
    Route::post('/shelves/{shelf}', [BookController::class, 'store'])->name('shelf.book.store');
    Route::get('/create-book', [BookController::class, 'create'])->name('book.create');
    Route::post('/books', [BookController::class, 'store'])->name('book.store');
    Route::get('/books', [BookController::class, 'index'])->name('books.show');
    Route::get('/books/{book}', [BookController::class, 'show'])->name('book.show');
    Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
    Route::put('/books/{book}', [BookController::class, 'update'])->name('book.update');
    Route::delete('/books', [BookController::class, 'destroy'])->name('book.delete');
    
    //Pages
    Route::get('/books/{book}/create-page', [PageController::class, 'create'])->name('page.create');
    Route::post('/books/{book}/pages/', [PageController::class, 'store'])->name('page.store');
    Route::get('/pages', [PageController::class, 'index'])->name('pages.show');
    Route::get('/books/{book}/pages/{page}', [PageController::class, 'show'])->name('page.show');
    Route::get('/books/{book}/pages/{page}/edit', [PageController::class, 'edit'])->name('page.edit');
    Route::put('/books/{book}/pages/', [PageController::class, 'update'])->name('page.update');
    Route::delete('/books/{book}/pages/{page}', [PageController::class, 'destroy'])->name('page.delete');

    //Admin routes
    Route::middleware('admin')->prefix('admin')->group(function(){
        //Settings
        Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
        //Users settings
        Route::get('/settings/users', [UserController::class, 'index'])->name('users');
        Route::get('/settings/users/{user:username}', [UserController::class, 'edit'])->name('user.edit');
        //Roles and permissions settings
        Route::get('/settings/roles', [RoleController::class, 'index'])->name('roles');
    });
});
