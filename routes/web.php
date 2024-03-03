<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Livewire\Pages\Auth\LoginComponent;
use App\Http\Controllers\Auth\loginController;
use App\Livewire\Pages\AdminDashboardComponent;
use App\Livewire\Pages\Data\LocationComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
})->name('home');

// Route::get('/login', [loginController::class,'login'])->name('login');
Route::get('/login', LoginComponent::class)->name('login');
Route::group(['prefix' => '_admin','middleware'=>['web','auth']], function () {

    Route::get('/', AdminDashboardComponent::class)->name('dashboard');

    Route::get('/locations', LocationComponent::class)->name('locations');

    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
});
