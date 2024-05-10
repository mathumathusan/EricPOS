<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Livewire\Pages\User\UserComponent;
use App\Livewire\Pages\Auth\LoginComponent;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\PrintController;
use App\Livewire\Pages\Data\LocationComponent;
use App\Livewire\Pages\User\UserListComponent;
use App\Livewire\Pages\User\UserRoleComponent;
use App\Livewire\Pages\AdminDashboardComponent;
use App\Livewire\Pages\Data\BrandComponent;
use App\Livewire\Pages\Data\CategoryComponent;
use App\Livewire\Pages\Data\CustomerComponent;
use App\Livewire\Pages\Data\FrameShapeComponent;
use App\Livewire\Pages\Job\JobComponent;
use App\Livewire\Pages\Job\JobListComponent;
use App\Livewire\Pages\Product\ProductComponent;
use App\Livewire\Pages\Product\ProductListComponent;
use App\Livewire\Pages\Sales\SaleComponent;
use App\Livewire\Pages\Sales\SaleComponentv2;
use App\Livewire\Pages\Sales\SaleListComponent;
use App\Livewire\Pages\Sales\SalePrintComponent;
use App\Livewire\Pages\Sales\SalesComponent;
use App\Livewire\Pages\User\UserPermissionComponent;
use App\Livewire\Pages\User\UserRolePermissionComponent;
use App\Livewire\SalePrintComponent as LivewireSalePrintComponent;

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
    Route::get('/products', ProductListComponent::class)->middleware(['permission:view_products'])->name('products');
    Route::get('/products/edit/{id}', ProductComponent::class)->middleware(['permission:edit_product'])->name('products.edit');
    Route::get('/products/create', ProductComponent::class)->middleware(['permission:add_product'])->name('products.add');

    Route::get('/jobs/add', JobComponent::class)->name('jobs.add');
    Route::get('/jobs', JobListComponent::class)->name('jobs');
    Route::get('/jobs/edit/{id}', JobComponent::class)->name('jobs.edit');

    

    Route::get('/brands', BrandComponent::class)->middleware(['permission:view_brands'])->name('brands');
    Route::get('/categories', CategoryComponent::class)->middleware(['permission:view_categories'])->name('categories');
    Route::get('/frame-shapes', FrameShapeComponent::class)->middleware(['permission:view_frame_shapes'])->name('frame-shapes');


    Route::get('/sales', SaleListComponent::class)->middleware(['permission:view_sales'])->name('sales');
    Route::get('/sales/add', SaleComponent::class)->middleware(['permission:add_sales'])->name('sales.add');
    Route::get('/sales/add2',SaleComponentv2::class)->middleware(['permission:add_sales2'])->name('sales.add2');
    Route::get('/sales/edit/{id}',SaleComponent::class)->middleware(['permission:edit_sales'])->name('sales.edit');


   // Route::get('/print',LivewireSalePrintComponent::class)->middleware(['permission:view_print'])->name('print');
    Route::get('/print/{id}', [PrintController::class,'index'])->name('print');

});
