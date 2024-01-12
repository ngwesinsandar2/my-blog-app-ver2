<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Pages
Route::get('/', [PageController::class, 'index'])->name('user.home');
Route::get('/user/blogs/show/{id}', [PageController::class, 'show_blog'])->name('user.show-blog');

Route::middleware(['guest'])->group(function () {
    // Auth
    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/login/store', [AuthController::class, 'store_login'])->name('auth.store-login');
});

Route::middleware(['authentication'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    // Admin Dashboard
    Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin.home');
    // Blogs
    Route::get('/admin-dashboard/blogs', [BlogController::class, 'blogs'])->name('admin.blogs');
    Route::get('/admin-dashboard/blogs/create', [BlogController::class, 'create_blogs'])->name('admin.create-blogs');
    Route::post('/admin-dashboard/blogs/store', [BlogController::class, 'store_blogs'])->name('admin.store-blogs');
    Route::get('/admin-dashboard/blogs/show/{id}', [BlogController::class, 'show_blog'])->name('admin.show-blog');
    Route::get('/admin-dashboard/blogs/edit/{id}', [BlogController::class, 'edit_blogs'])->name('admin.edit-blogs');
    Route::post('/admin-dashboard/blogs/update/{id}', [BlogController::class, 'update_blogs'])->name('admin.update-blogs');
    Route::get('/admin-dashboard/blogs/delete/{id}', [BlogController::class, 'delete_blogs'])->name('admin.delete-blogs');
    // Manage Users
    Route::get('/admin-dashboard/manage-users', [UserController::class, 'manage_users'])->name('admin.manage-users');
    Route::get('/admin-dashboard/manage-users/create', [UserController::class, 'create_users'])->name('admin.create-users');
    Route::post('/admin-dashboard/manage-users/store', [UserController::class, 'store_users'])->name('admin.store-users');
    Route::get('/admin-dashboard/manage-users/edit/{id}', [UserController::class, 'edit_users'])->name('admin.edit-users');
    Route::post('/admin-dashboard/manage-users/update/{id}', [UserController::class, 'update_users'])->name('admin.update-users');
    Route::get('/admin-dashboard/manage-users/delete/{id}', [UserController::class, 'delete_users'])->name('admin.delete-users');
    // Roles
    Route::get('/admin-dashboard/roles', [RoleController::class, 'roles'])->name('admin.roles');
    Route::get('/admin-dashboard/roles/create', [RoleController::class, 'create_roles'])->name('admin.create-roles');
    Route::post('/admin-dashboard/roles/store', [RoleController::class, 'store_roles'])->name('admin.store-roles');
    Route::get('/admin-dashboard/roles/edit/{id}', [RoleController::class, 'edit_roles'])->name('admin.edit-roles');
    Route::post('/admin-dashboard/roles/update/{id}', [RoleController::class, 'update_roles'])->name('admin.update-roles');
    Route::get('/admin-dashboard/roles/delete{id}', [RoleController::class, 'delete_roles'])->name('admin.delete-roles');
    // Categories
    Route::get('/admin-dashboard/categories', [CategoryController::class, 'categories'])->name('admin.categories');
    Route::get('/admin-dashboard/categories/create', [CategoryController::class, 'create_categories'])->name('admin.create-categories');
    Route::post('/admin-dashboard/categories/store', [CategoryController::class, 'store_categories'])->name('admin.store-categories');
    Route::get('/admin-dashboard/categories/edit/{id}', [CategoryController::class, 'edit_categories'])->name('admin.edit-categories');
    Route::post('/admin-dashboard/categories/update/{id}', [CategoryController::class, 'update_categories'])->name('admin.update-categories');
    Route::get('/admin-dashboard/categories/delete/{id}', [CategoryController::class, 'delete_categories'])->name('admin.delete-categories');
});
