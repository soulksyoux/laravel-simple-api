<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::get('/status', [ApiController::class, 'status']);
Route::get('/clients', [ApiController::class, 'clients']);
Route::get('/client_by_id/{id}', [ApiController::class, 'clientById']);
Route::post('/client', [ApiController::class, 'client']);
Route::post('/add_client', [ApiController::class, 'addClient']);
Route::put('/update_client', [ApiController::class, 'updateClient']);
Route::delete('/delete_client', [ApiController::class, 'deleteClient']);
