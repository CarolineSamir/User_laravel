<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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


Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('new-register', [RegisteredUserController::class, 'store'])->name('new_register');;

    Route::get('login', [AuthenticatedSessionController::class, 'viewLogin'])
        ->name('login');

    Route::post('submit-login', [AuthenticatedSessionController::class, 'login'])->name('submit_login');


});


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [UserController::class, 'view'])->name('user_view');
    Route::get('/new-user', [UserController::class, 'create'])->name('new_user');
    Route::post('/add-user', [UserController::class, 'add'])->name('add_user');
    Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('edit_user');
    Route::post('/update-user', [UserController::class, 'update'])->name('update_user');
    Route::post('/delete-user/{id}', [UserController::class, 'delete'])->name('delete_user');
    Route::get('/send-email', [UserController::class, 'sendEmail'])->name('send_email');
    Route::post('/send-User-Email', [UserController::class, 'sendUserEmail'])->name('send_User_Email');

    Route::get('logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');

});

