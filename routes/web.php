<?php

use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

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
    return 'welcome';
});

Route::get('ticket',[TicketController::class, 'ticket'])->name('template');
Route::post('ticket/store',[TicketController::class, 'storeData'])->name('store');
Route::get('MyTicket',[TicketController::class, 'myTicket'])->name('myticket')->middleware('auth');
Route::get('Reply/Blade/{id}', [TicketController::class, 'replyBlade']);
Route::post('user/reply/{id}',[TicketController::class,'userReply']);
Route::get('show/',[TicketController::class, 'show']);
Route::post('rating/{id}',[TicketController::class, 'rating']);


//Admin

Route::get('admin/ticket', [TicketController::class, 'adminTicket'])->name('admin/ticket')->middleware('auth','is_admin');
Route::get('edit/ticket/{id}',[TicketController::class, 'editTicket']);
Route::post('update/ticket/{id}',[TicketController::class, 'updateTicket']);
Route::delete('delete/{id}',[TicketController::class, 'deleteTicket'])->name('delete');
Route::get('admin/reply/{id}',[TicketController::class, 'adminReply']);
Route::post('reply/{id}',[TicketController::class,'reply']);














Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
