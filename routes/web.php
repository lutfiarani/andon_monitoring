<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AndonController;

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

Route::get('/', [AndonController::class, 'index'],);
Route::get('all', [AndonController::class, 'display_all']);
Route::get('factory/{id}', [AndonController::class, 'display_per_fac']);
Route::get('factory_toast/{id}', [AndonController::class, 'display_toast']);
Route::get('view/{id}', [AndonController::class, 'factory']);
Route::get('count/{id}', [AndonController::class, 'countY']);
Route::get('counts/{id}', [AndonController::class, 'counts']);
Route::get('display/{id}', [AndonController::class, 'display']);
