<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes - Tugas 4: Membangun Aplikasi Multi-View Profil Akademik
|--------------------------------------------------------------------------
| Seluruh rute diarahkan ke satu controller terpusat: PageController.
| Rute:
| 1. Beranda: '/' dan '/beranda'
| 2. Profil Mahasiswa: '/profil-mahasiswa'
| 3. Ide Riset Agentic AI: '/ide-agent' (GET & POST)
*/

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/beranda', [PageController::class, 'home'])->name('beranda');

Route::get('/profil-mahasiswa', [PageController::class, 'profil'])->name('profil');

Route::get('/ide-agent', [PageController::class, 'ideAgent'])->name('ide.agent');
Route::post('/ide-agent', [PageController::class, 'storeIdea'])->name('ide.agent.store');
