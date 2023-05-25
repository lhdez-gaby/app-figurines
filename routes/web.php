<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DetalleEventosController;
use App\Http\Controllers\FechaEventosController;
use App\Http\Controllers\ImagenesController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\FrontImagenesController;
use App\Http\Controllers\FrontVideosController;
use App\Http\Controllers\FrontEventosController;
use App\Http\Controllers\FrontContactController;
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



Route::get('/acerca', function () {
    return Inertia::render('Acerca', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('acerca');

Route::get('/imagenes',[FrontImagenesController::class, 'index'])->name('imagenes');
Route::get('/eventos',[FrontEventosController::class, 'index'])->name('eventos');
Route::get('/videos',[FrontVideosController::class, 'index'])->name('videos');

Route::get('/contacto', function () {
    return Inertia::render('Contacto', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('contacto');

Route::post('/contact',FrontContactController::class)->name('contact');



Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('miseventos',DetalleEventosController::class);
    Route::delete('miseventos/{id}',[DetalleEventosController::class,'destroy'])->name('miseventos.destroy');
    Route::post('miseventos/{id}',[DetalleEventosController::class,'update'])->name('miseventos.update');
    Route::resource('miseventosReservados',FechaEventosController::class);
    Route::resource('misimagenes',ImagenesController::class);
    Route::delete('misimagenes/{id}',[ImagenesController::class,'destroy'])->name('misimagenes.destroy');
    Route::post('misimagenes/{id}',[ImagenesController::class,'update'])->name('misimagenes.update');
    Route::resource('misvideos',VideosController::class);
    Route::delete('misvideos/{id}',[VideosController::class,'destroy'])->name('misvideos.destroy');
    Route::post('misvideos/{id}',[VideosController::class,'update'])->name('misvideos.update');
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
