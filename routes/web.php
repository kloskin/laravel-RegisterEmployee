<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkedHoursController;
use App\Http\Controllers\CommentsController;
use App\Exceptions\UnauthorizedAccessException;


Route::middleware('auth')->group(function () {
    Route::get('/', [CommentsController::class, 'index'])->name('home');
    Route::resource('comments', CommentsController::class);
    Route::get('/my_comments',[CommentsController::class, 'myComments'])->name('comments.my_comments');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin_dashboard', [UserController::class, 'showAllUsers'])->name('admin_dashboard');
    Route::put('/employees/{employeeID}/edit', [UserController::class, 'updatePassword'])->name('employees.updatePassword');
    Route::resource('employees', UserController::class);
});
Route::resource('employees', UserController::class)
    ->only(['index','show'])
    ->middleware(['auth', 'role:admin,moderator']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin,moderator'])->group(function () {
    Route::post('worked-hours', [WorkedHoursController::class, 'store'])->name('workedhours.store');
    Route::get('employees/{employeeID}/worked-hours', [WorkedHoursController::class, 'create'])->name('workedhours.create');
});


Route::fallback(function () {
    throw new UnauthorizedAccessException();
});

require __DIR__.'/auth.php';
