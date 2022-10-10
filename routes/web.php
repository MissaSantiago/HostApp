<?php

use App\Http\Controllers\AvisoController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HostalesController;
use App\Http\Controllers\ReservacionesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Mail\InfoMailable;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;

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
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', [HomeController::class, 'index']);
// Route::get('home/create', [HomeController::class, 'create']);
// Route::get('home/edit', [HomeController::class, 'edit']);

Route::get('storage-link', function() {
    if(file_exists(public_path('storage'))) {
        return 'The "public/storage" directory already exists.';
    }

    app('files')->link(
        storage_path('app/public'), public_path('storage')
    );

    return 'The [public/storage] directory has been linked.';
 });

Route::resource('home', HomeController::class);
Route::resource('guest', GuestController::class);
Route::resource('hostal', HostalesController::class);
Route::resource('reservacion', ReservacionesController::class);
Route::resource('aviso', AvisoController::class);
Route::get('infoReserva', function () {
    $email = new InfoMailable;
    Mail::to(Auth::user()->email)->send($email);

    return view('hostal.info_reserva')->with(Auth::user()->name);
});