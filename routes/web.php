<?php

use Illuminate\Support\Facades\Route;

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

Route::view('/', 'index');
Route::view('/about', 'about');
Route::view('/blog', 'blog');
Route::view('/listpost', \App\Http\Livewire\ListPost::class);
Route::get('post/create', \App\Http\Livewire\PostCreate::class);
Route::get('post/{slug}', \App\Http\Livewire\Post::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
