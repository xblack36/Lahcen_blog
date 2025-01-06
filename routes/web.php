<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use Illuminate\Routing\RouteGroup;
// to groupe routes make 
// Route::group(['prefix'=>'posts'],function(){
//     Route::get('', [PostController::class,'index'])->name('posts.index');
//     Route::get('show/{post}', [PostController::class,'show'])->name('posts.show');
//     Route::get('create',[PostController::class,'create'])->name('posts.create');
//     Route::post('',[PostController::class,'store'])->name('posts.store');
//     Route::get('{post}/edit',[PostController::class,'edit'])->name('posts.edit');
// });

// Route::get('/', [PostController::class,'index'])->name('posts.index');
// /////////////////////////-----------------------------/////////////////////////
// Route::get('/posts', [PostController::class,'index'])->name('posts.index');
// Route::get('/posts/show/{post}', [PostController::class,'show'])->name('posts.show');
// Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
// Route::post('/posts',[PostController::class,'store'])->name('posts.store');
// Route::get('/posts/{id}/edit',[PostController::class,'edit'])->name('posts.edit');
// Route::put('/posts/update',[PostController::class,'update'])->name('posts.update');



// Route::middleware('auth')->group(function(){
    Route::get('/postes',[PostsController::class,'index'])->name('postes.index');
    Route::get('/postes/create',[PostsController::class,'create'])->name('postes.create');
    Route::post('/postes',[PostsController::class,'store'])->name('postes.store');
    Route::get('postes/{id}',[PostsController::class,'show'])->name('postes.show');
    Route::get('/postes/{id}/edit',[PostsController::class,'edit'])->name('postes.edit');
    Route::put('/postes/{id}',[PostsController::class,'update'])->name('postes.update');
    Route::delete('postes/{post}',[PostsController::class,'destroy'])->name('postes.destroy');
// });



use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleController;



// Route::middleware('guest')->group(function(){
    Route::get('/', [AuthController::class, 'home'])->name('auth.home');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/register', [AuthController::class, 'store'])->name('auth.store');
// });


Route::get('auth/google',[GoogleController::class,'redirectGoogle']);
Route::get('auth/google/callback',[GoogleController::class,'handleGoogle']);

