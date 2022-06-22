<?php

use App\Http\Controllers\API\WisataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('wisata', [WisataController::class, 'index']);
Route::get('show-wisata/{id}', [WisataController::class, 'show']);
Route::post('create-wisata', [WisataController::class, 'store']);
Route::put('update-wisata/{id}', [WisataController::class, 'update']);
Route::delete('delete-wisata/{id}', [WisataController::class, 'destroy']);
