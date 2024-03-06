<?php

use App\Http\Controllers\Admins\AdminsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Jobs\JobsController;
use App\Http\Controllers\UserController;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class,'index'])->name('index');
Route::get('/register/seeker', [UserController::class,'createSeeker'])->name('create.seeker');
Route::post('/register/seeker', [UserController::class,'storeSeeker'])->name('store.seeker');
Route::get('/login', [UserController::class,'login'])->name('login');
Route::post('/login', [UserController::class,'postLogin'])->name('login.post');
Route::group(['prefix'=>'jobs'],function(){
    Route::get('/show{id}', [JobsController::class,'show'])->name('show.jobs');
    Route::post('save', [JobsController::class,'saveJob'])->name('save.job');
    Route::post('apply', [JobsController::class,'jobApply'])->name('apply.job');
    Route::any('search', [JobsController::class,'search'])->name('search.job');
});


Route::get('/categories/single/{name}', [CategoriesController::class,'singleCategory'])->name('categories.single');
Route::group(['prefix'=>'user'],function(){
Route::get('profile', [UserController::class,'profile'])->name('profile');
Route::get('applications', [UserController::class,'applications'])->name('applications');
Route::get('savedJobs', [UserController::class,'savedJobs'])->name('saved.Jobs');
Route::get('edit_profile', [UserController::class,'edit_profile'])->name('edit.profile');
Route::post('edit_profile', [UserController::class,'update_profile'])->name('edit.profile');
Route::get('edit_cv', [UserController::class,'edit_cv'])->name('edit.cv');
Route::post('edit_cv', [UserController::class,'update_cv'])->name('edit.cv');
});

Route::post('/logout', [UserController::class,'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard')->middleware('auth');

Route::get('/admin/login', [AdminsController::class,'viewLogin'])->name('view.login');
Route::post('/admin/login', [AdminsController::class,'checkLogin'])->name('check.login')->middleware('checkForAuth');
Route::group(['prefix'=>'admin','middleware'=>'auth:admin'],function(){
Route::get('/', [AdminsController::class,'index'])->name('admins.dashboard');
Route::get('/all-admins', [AdminsController::class,'admins'])->name('view.admins');
Route::get('/create-admins', [AdminsController::class,'createAdmins'])->name('create.admins');
Route::post('/create-admins', [AdminsController::class,'storeAdmins'])->name('store.admins');
Route::get('/display-categories', [AdminsController::class,'displayCategories'])->name('display.categories');

Route::get('/create-categories', [AdminsController::class,'createCategories'])->name('create.categories');
Route::post('/create-categories', [AdminsController::class,'storeCategories'])->name('store.categories');
//update category
Route::get('/edit-categories/{id}', [AdminsController::class,'editCategories'])->name('edit.categories');
Route::post('/edit-categories/{id}', [AdminsController::class,'updateCategories'])->name('update.categories');
//delete category
Route::get('/delete-categories/{id}', [AdminsController::class,'deleteCategories'])->name('delete.categories');

//new jobs
Route::get('/display-jobs', [AdminsController::class,'allJobs'])->name('display.jobs');
Route::get('/create-jobs', [AdminsController::class,'createJobs'])->name('create.jobs');
Route::post('/create-jobs', [AdminsController::class,'storeJobs'])->name('store.jobs');

Route::get('/delete-jobs/{id}', [AdminsController::class,'deleteJobs'])->name('delete.jobs');

Route::get('/display-apps', [AdminsController::class,'allApps'])->name('display.apps');
Route::get('/delete-app/{id}', [AdminsController::class,'deleteApp'])->name('delete.App');
});






