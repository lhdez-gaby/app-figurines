<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DetalleEventosController;
use App\Http\Controllers\FechaEventosController;
use App\Http\Controllers\ImagenesController;
use App\Http\Controllers\VideosController;
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
    return Inertia::render('Main', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('main');

Route::get('/imagenes', function () {
    return Inertia::render('Imagenes', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('imagenes');

Route::get('/acerca', function () {
    return Inertia::render('Imagenes', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('acerca');

Route::get('/videos', function () {
    return Inertia::render('Videos', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('videos');


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('miseventos',DetalleEventosController::class);
    Route::resource('miseventosReservados',FechaEventosController::class);
    Route::resource('misimagenes',ImagenesController::class);
    Route::resource('misvideos',VideosController::class);
    Route::get('reporte',[FechaEventosController::class,'reports'])->name('reporte');
});


// Route::group(['prefix'=>'admin','client'=>['role:admin|client']], function(){
//     Route::resource('eventos',DetalleEventosController::class);
//     Route::resource('eventosReservados',FechaEventosController::class);
//     Route::resource('imagenes',ImagenesController::class);
//     Route::resource('videos',VideosController::class);
//     // Route::inertia('/dashboard','Dashboard')->middleware(['auth', 'verified']);
// });




require __DIR__.'/auth.php';
