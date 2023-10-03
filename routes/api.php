<?php

use App\Http\Controllers\ApiController;
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

Route::get('v1/notebook', [ApiController::class, 'getNotebook']);
Route::get('v1/notebook/{id}', [ApiController::class, 'getNotebookById']);

Route::post('v1/notebook', [ApiController::class, 'addContact']);
Route::post('v1/notebook/{id}', [ApiController::class, 'updateContactById']);
Route::delete('v1/notebook/{id}', [ApiController::class, 'deleteContact']);


