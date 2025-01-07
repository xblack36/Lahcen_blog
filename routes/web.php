<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use Illuminate\Routing\RouteGroup;




Route::get('/',[PostsController::class,'index'])->name('postes.index');

Route::prefix('postes')->group(function(){
    Route::get('/',[PostsController::class,'index'])->name('postes.index');
    Route::get('/create',[PostsController::class,'create'])->name('postes.create');
    Route::post('/',[PostsController::class,'store'])->name('postes.store');
    Route::get('/{id}',[PostsController::class,'show'])->name('postes.show');
    Route::get('/{id}/edit',[PostsController::class,'edit'])->name('postes.edit');
    Route::put('/{id}',[PostsController::class,'update'])->name('postes.update');
    Route::delete('/{post}',[PostsController::class,'destroy'])->name('postes.destroy');
});



use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleController;

// Route::middleware('guest')->group(function(){
    Route::get('/auth/home', [AuthController::class, 'home'])->name('auth.home');
    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/register', [AuthController::class, 'store'])->name('auth.store');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
// });


Route::get('auth/google',[GoogleController::class,'redirectGoogle']);
Route::get('auth/google/callback',[GoogleController::class,'handleGoogle']);

