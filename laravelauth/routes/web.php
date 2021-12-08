<?php

use App\Http\Livewire\Home;
use App\Http\Livewire\PostCrud;
use App\Http\Livewire\PembeliCrud;
use App\Http\Livewire\PelaporanCrud;
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

Route::get('/', Home::class)->name('/');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
}); 

// Route::get('/booking', function () {
//     return view('booking')
// });

Route::view('/booking', 'layouts.booking');
Route::view('/profile', 'layouts.profile');

Route::view('/booking-futsal', 'layouts.booking-futsal');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


   

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/redirects', 'App\Http\Controllers\HomeController@index');
   
    Route::get('posts', PostCrud::class)->name('posts');
    Route::get('pembelis', PembeliCrud::class)->name('pembelis');
    Route::get('pelaporans', PelaporanCrud::class)->name('pelaporans');

}); 


