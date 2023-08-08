<?php


use App\Http\Controllers\AddPermissionAndRolesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\userController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Models\UserRole;
use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/welcome', [HomeController::class, 'showUserAndPermissions'])->name('welcome');

    Route::get('/users', [userController::class, 'index'])->name("show_all_users");

    Route::get('/show_or_edit_form/{id?}', [userController::class, 'showOrEditForm'])->name('show_or_edit_form');
    Route::post('/update_or_create/{id?}', [userController::class, 'UpdateOrCreate'])->name('update_or_create');


    Route::get('/delete_user/{id}', [userController::class, 'delete'])->name('delete_user');
    Route::get('show_user/{id}', [userController::class, 'showUser'])->name('show_user');
    Route::post('/add_post', [PostController::class, 'addPost'])->name("add_post");
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('is_system:Admin')->group(function () {
        Route::get('/add_permission_and_role', [AddPermissionAndRolesController::class, 'addPermissionAndRoleForm'])->name("add_permission_and_role");
    });
    Route::post('/add_permission_and_role', [AddPermissionAndRolesController::class, 'add'])->name("add_permission_and_role");

    Route::get('/edit_user_role_permission/{id}', [AddPermissionAndRolesController::class, 'editUserRolePermission'])->name('edit_user_role_permission');
    Route::post('/update_user_role_permission', [AddPermissionAndRolesController::class, 'updateUserRolePermission'])->name('update_user_role_permission');

    Route::middleware('is_system')->group(function () {
        Route::get('/add_role_form', [RoleController::class, 'addRoleForm'])->name("add_role_form");
    });
    Route::post('/add_role', [RoleController::class, 'addRole'])->name("add_role");;
});

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'registerUser'])->name('register');

Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin/login');
Route::post('/admin/login', [AuthController::class, 'loginUser'])->name('admin/login');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'loginUser'])->name('login');


Route::get('/test', function (Request $request) {
    Artisan::call('db:seed');
    // return collect(Auth::user()->userRole->permission)->pluck("name")->toArray();
    // return collect(User::where('name', "Admin")->first()->userRole->permission);
    // return Auth::user()->name;
    // return Auth::user()->userRole->name;
    // dd($request->route()->uri());
    // return User::find(1)->email;
    // return request()->getContent();
});
