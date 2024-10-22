<?php
use App\Http\Controllers\EventoController;
use App\Http\Controllers\EntradaController;
use Illuminate\Support\Facades\Route;

Route::resource('evento', EventoController::class);

Route::resource('entrada', EntradaController::class);