<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpecificsController;
use App\Http\Controllers\FlowersController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FlowerAdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('/', FlowersController::class, ['except' => 'index']);
Route::get('/', [FlowersController::class, 'index']);


Route::resource('user', UsersController::class, ['except' => ['create']]);
Route::get('/user/user/create', [UsersController::class, 'create']);

Route::resource('/', SpecificsController::class, ['except' => ['index', 'create']]);
Route::get('/flower/create', [SpecificsController::class, 'create']);

Route::resource('comments', CommentsController::class, ['except' => ['index', 'create']]);
Route::get('/flower/{id}', [SpecificsController::class, 'index']);
Route::get('/flower/comments/{id}', [CommentsController::class, 'index']);
Route::get('/flower/comments/{id}/create', [CommentsController::class, 'create']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('/admin', FlowerAdminController::class, ['except' => ['index', 'delete', 'edit', 'view', 'approve']]);
Route::get('/admin', [FlowerAdminController::class, 'index'])->middleware(['auth'])->name('adminDashboard');
Route::get('/admin/{id}/edit', [FlowerAdminController::class, 'edit'])->middleware(['auth'])->name('adminEdit');
Route::get('/admin/{id}/view', [FlowerAdminController::class, 'view'])->middleware(['auth'])->name('adminSpecifics');
Route::get('/admin/{id}/approve', [FlowerAdminController::class, 'approve'])->middleware(['auth'])->name('adminApprove');


require __DIR__.'/auth.php';
