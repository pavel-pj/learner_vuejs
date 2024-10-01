<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WordCheckingController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;

use App\Http\Controllers\Vue\WordVueController;
use App\Http\Controllers\Vue\WordCheckController;

use App\Models\Word;
use App\Livewire\CreatePost;



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

 Route::get('/',[WordCheckController::class,'easyStart'])->name('easy-start');

//Route::middleware(['auth', 'verified'])->prefix('vue')->name('vue.')->group(function() {
Route::prefix('vue')->name('vue.')->group(function() {
        Route::resource('words',WordVueController::class );

        Route::get('easy-start',[WordCheckController::class,'easyStart'])->name('easy-start');

  }) ;
 