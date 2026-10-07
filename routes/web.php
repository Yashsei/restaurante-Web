<?php

use App\Http\Controllers\PlatilloController;
use Illuminate\Support\Facades\Route;

// Vista pública del menú
Route::get('/', [PlatilloController::class, 'index']);

// Panel de administración
Route::get('/admin', [PlatilloController::class, 'admin']);
Route::post('/admin/crear', [PlatilloController::class, 'store']);
Route::post('/admin/actualizar/{platillo}', [PlatilloController::class, 'update']);