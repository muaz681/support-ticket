<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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



    Route::get('allticket',[ApiController::class, 'getTicket']);
    Route::post('createticket', [ApiController::class, 'createTicket']);
    Route::post('updateticket/{id}', [ApiController::class, 'updateTicket']);
    Route::get('delete/{id}',[ApiController::class, 'deleteTicket']);

