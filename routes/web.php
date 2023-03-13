<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\home;
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
    return view('fruntend.index');
});
Route::get('/index', [home::class,'index']);
Route::post('/index', [home::class,'index']);
Route::get('/login', [home::class,'login']);
Route::post('/login', [home::class,'login']);
Route::get('/logout', [home::class,'logout']);
Route::get('/cat', [home::class,'cat']);
Route::post('/cat', [home::class,'cat']);
Route::get('/show', [home::class,'show']);
Route::post('/show', [home::class,'show']);
Route::post('/del/{id}', [home::class,'del']);
Route::get('/edt/{id}', [home::class,'edt']);
Route::post('/edt/{id}', [home::class,'edt']);
Route::post('/update', [home::class,'update']);
?>
