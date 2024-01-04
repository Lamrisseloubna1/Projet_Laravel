<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;

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

Route::get('/', function () {
    return view('home');
  
});

Route::get('/logout', function () {
    return view('layouts.app');
})->name('logout');

Auth::routes();

Route::get('forgot-password', [App\Http\Controllers\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [App\Http\Controllers\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');


Route::middleware(['auth'])->group(function () {
  
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/profile', [App\Http\Controllers\Auth\ProfileController::class,'profile'])->name('profile');
    Route::resource('tasks', TaskController::class);
    Route::get('/tasks', [TaskController::class, 'forms'])->name('tasks.index');
    Route::get('/tasks/{task}', [TaskController::class, 'forms'])->name('tasks.show');

    // Route::patch('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');

    // Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::get('/task', [TaskController::class, 'show'])-> name('tasks.show');
    Route::patch('/tasks/{task}/update-status', [TaskController::class, 'updateStatus'])->name('tasks.updateStatus');
    Route::patch('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');

    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::post('/profile', [App\Http\Controllers\Auth\ProfileController::class, 'profile'])->name('profile');
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
  
    Route::get('/chat', [App\Http\Controllers\ChatController::class, 'index'])->name('chat');
    Route::post('/chat/send', [App\Http\Controllers\ChatController::class, 'sendMessage'])->name('chat.sendMessage');
    Route::get('/chat/messages',  [App\Http\Controllers\ChatController::class, 'getMesssage'])->name('chat.getMessage');
});
// Route::middleware(['auth'])->group(function () {
//     Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//     Route::post('/profile', [App\Http\Controllers\Auth\ProfileController::class,'profile'])->name('profile');
//     Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
//     // Route::resource('tasks', TaskController::class);
//     Route::resource('tasks', 'TaskController');
//     // Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
//     // Route::get('/task', [TaskController::class, 'show'])->name('tasks.show');
//     // Route::delete('/tasks/{task}', 'TaskController@destroy')->name('tasks.destroy');
//     // Route::put('/tasks/{task}/mark-completed', [TaskController::class, 'markCompleted'])
//     // ->name('tasks.markCompleted');
//     // Define the route for updating the status of a task
//     //Route::patch('/tasks/{task}/update-status', [TaskController::class, 'updateStatus'])->name('tasks.updateStatus');
//     Route::get('/chat', [App\Http\Controllers\ChatController::class,'index'])->name('chat');
//     Route::post('/chat/send', [App\Http\Controllers\ChatController::class,'sendMessage'])->name('chat.sendMessage');
//     Route::get('/chat/messages',  [App\Http\Controllers\ChatController::class,'getMesssage'])->name('chat.getMessage');

// });
