<?php

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

//Route::get('/', function () {
//    return view('users.view');
//});

Route::get('/', [UserController::class, 'view'])->name('user_view');
Route::get('/new-user', [UserController::class, 'create'])->name('new_user');
Route::post('/add-user', [UserController::class, 'add'])->name('add_user');
Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('edit_user');
Route::post('/update-user', [UserController::class, 'update'])->name('update_user');
Route::get('/delete-user/{id}', [UserController::class, 'delete'])->name('delete_user');
Route::get('/send-email', [UserController::class, 'sendEmail'])->name('send_email');
Route::post('/send-User-Email', [UserController::class, 'sendUserEmail'])->name('send_User_Email');
