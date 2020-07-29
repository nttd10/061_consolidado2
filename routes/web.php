<?php

use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/listings', 'ListingController@index')->name('listings');
Route::get('/listings/registers/{id}','ListingController@listRegisters')->name('listings.registers');
Route::get('/listings/procespdf/{id}','ListingController@processPDF')->name('listings.pdf2');
Route::get('/listings/procedurepdf/{id}','ListingController@procedurePDF')->name('listings.pdf');

Route::resource('processes', 'ProcessController');
Route::resource('procedures', 'ProcedureController');
Route::resource('documents', 'DocumentController');
Route::get('/pivot','PivotController@index')->name('pivot');
Route::get('/pivot/insert','PivotController@insert')->name('pivot.insert');
Route::post('/pivot/attach','PivotController@attach')->name('pivot.attach');
