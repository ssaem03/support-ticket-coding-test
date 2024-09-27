<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AdminTicketController;
use App\Http\Controllers\AuthController;


Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit'); 
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');

Route::get('/admin', [AdminTicketController::class, 'index'])->name('admin.index');
Route::delete('admin/tickets/{id}', [TicketController::class, 'destroy'])->name('admin.tickets.destroy');

Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::get('tickets', [TicketController::class, 'index'])->name('tickets.index'); 
Route::get('tickets/create', [TicketController::class, 'create'])->name('tickets.create');
Route::post('tickets', [TicketController::class, 'store'])->name('tickets.store');

Route::post('admin/tickets/{id}/close', [TicketController::class, 'close'])->name('admin.tickets.close');



Route::get('admin/tickets', [AdminTicketController::class, 'index'])->name('admin.tickets.index'); 
Route::get('admin/tickets/{id}', [AdminTicketController::class, 'show'])->name('admin.tickets.show');

Route::get('/', function () {
    return redirect('/tickets');
});
