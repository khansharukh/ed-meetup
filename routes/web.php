<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParticipantsController;
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
Route::get('participants', [ParticipantsController::class, 'read']);
Route::post('participants', [ParticipantsController::class, 'store']);
Route::put('participants/{id}', [ParticipantsController::class, 'update']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
