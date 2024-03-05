<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Livewire\Pages\User\UserComponent;
use App\Livewire\Pages\Auth\LoginComponent;
use App\Http\Controllers\Auth\loginController;
use App\Livewire\Pages\Data\LocationComponent;
use App\Livewire\Pages\User\UserListComponent;
use App\Livewire\Pages\User\UserRoleComponent;
use App\Livewire\Pages\AdminDashboardComponent;
use App\Livewire\Pages\Data\CustomerComponent;
use App\Livewire\Pages\User\UserPermissionComponent;
use App\Livewire\Pages\User\UserRolePermissionComponent;

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
    return redirect()->route('login');
})->name('home');

// Route::get('/login', [loginController::class,'login'])->name('login');
Route::get('/login', LoginComponent::class)->name('login');

Route::group(['prefix' => '_admin','middleware'=>['web','auth']], function () {

    Route::get('/', AdminDashboardComponent::class)->middleware(['permission:view_dashboard'])->name('dashboard');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    Route::get('/users', UserListComponent::class)->middleware(['permission:view_users'])->name('users');
    Route::get('/user/{id}/edit', UserComponent::class)->middleware(['permission:edit_users'])->name('users.edit');
    Route::get('/user/create', UserComponent::class)->middleware(['permission:add_users'])->name('users.add');

    Route::get('/user-permissions', UserPermissionComponent::class)->middleware(['permission:view_permissions'])->name('user-permissions');
    Route::get('/user-roles', UserRoleComponent::class)->middleware(['permission:view_roles'])->name('user-roles');
    Route::get('/user-role/{id}/permissions', UserRolePermissionComponent::class)->middleware(['permission:edit_role'])->name('user-role-permissions');
    Route::get('/user-role/create', UserRolePermissionComponent::class)->middleware(['permission:add_role'])->name('user-role-permissions-create');

    Route::get('/locations', LocationComponent::class)->middleware(['permission:view_locations'])->name('locations');
    Route::get('/customers', CustomerComponent::class)->middleware(['permission:view_customers'])->name('customers');

});
