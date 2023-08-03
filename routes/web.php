<?php


use App\Http\Controllers\AddPermissionAndRolesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\userController;
use App\Models\Permission;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
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
    Route::get('/add_new_user', function () {
        return view('add_new_user');
    })->name('add_new_user');
    Route::post('/add_user', [userController::class, 'create'])->name('add_user');
    Route::get('/edit/{id}', [userController::class, 'edit'])->name('edit');
    Route::post('/update_user/{id}', [userController::class, 'update'])->name('update_user');
    Route::get('/delete_user/{id}', [userController::class, 'delete'])->name('delete_user');
    Route::get('show_user/{id}', [userController::class, 'showUser'])->name('show_user');
    Route::post('/add_post', [PostController::class, 'addPost'])->name("add_post");
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/add_permission_and_role', [AddPermissionAndRolesController::class, 'addPermissionAndRoleForm'])->name("add_permission_and_role")->middleware('is_system');
    Route::post('/add_permission_and_role', [AddPermissionAndRolesController::class, 'add'])->name("add_permission_and_role");

    Route::get('/edit_user_role_permission/{id}', [AddPermissionAndRolesController::class, 'editUserRolePermission'])->name('edit_user_role_permission');
    Route::post('/update_user_role_permission', [AddPermissionAndRolesController::class, 'updateUserRolePermission'])->name('update_user_role_permission');

    Route::get('/add_role_form', [RoleController::class, 'addRoleForm'])->name("add_role_form");
    Route::post('/add_role', [RoleController::class, 'addRole'])->name("add_role");;
});

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'registerUser'])->name('register');

Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin/login');
Route::post('/admin/login', [AuthController::class, 'loginUser'])->name('admin/login');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'loginUser'])->name('login');


Route::get('/test', function (Request $request) {
    return Permission::pluck("id");
});
