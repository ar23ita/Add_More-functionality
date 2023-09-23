<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductAddMoreController;


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
// Route::get("addmore","App\Http\Controllers\ProductAddMoreController@addMore");
//  Route::post("addmore","ProductAddMoreController@addMorePost")->name('addmorePost');


 Route::get('/showform', [ProductAddMoreController::class, 'addMore'])->name('showform');
 Route::post('/addmorePost', [ProductAddMoreController::class, 'saveData'])->name('addmorePost');
 
Route::get('get-data', 'ProductAddMoreController@getData')->name('getData');
