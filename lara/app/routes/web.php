<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\TrendsController;
use App\Http\Controllers\TechnologiesController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\AdminsProductsController;
use App\Http\Controllers\CategoriesController;

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
//returns welcome.blade
Route::get('/', 'PagesController@index')->name('/');

//returns admin panel
Route::get('/dashboard', 'AdminsController@index')->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';

//site routes
Route::get('products/cat', [ProductsController::class, 'category']);


Route::resource('/products', \ProductsController::class);
Route::resource('/pages', \PagesController::class);
Route::resource('/posts', \PostsController::class);
Route::resource('/trends', \TrendsController::class);
Route::resource('/projects', \ProjectsController::class);
Route::resource('/technologies', \TechnologiesController::class);
Route::resource('/categories', \CategoriesController::class);
Route::resource('/contact', \ContactsController::class);
Route::get('select/{id}', 'CategoriesController@select');
Route::get('/links', 'PagesController@links');
Route::resource('/admins', \AdminsController::class);
Route::resource('/admins/products',  \AdminsProductsController::class );


//custom page routes
Route::get('searchall', [PagesController::class, 'searchall']);
Route::get('techup', [TechnologiesController::class, 'sortup']);
Route::get('techdown', [TechnologiesController::class, 'sortdown']);

//test
Route::get('test', [\App\Http\Controllers\TestController::class, 'renamephotos']);
