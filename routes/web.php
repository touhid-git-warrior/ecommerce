<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;

// admin
use App\Http\Controllers\Admin\CategorieController;


// frontend
use App\Http\Controllers\Frontend\FrontendController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// frontend

Route::get('/',[FrontendController::class,'FrontendView'])->name('frontend.view');

// end frontend


// admin

Route::group(['prefix'=>'admin'],function(){

    Route::get('/login',[AuthController::class,'LoginView'])->name('admin.loginview');
    Route::post('/login',[AuthController::class,'DoLogin'])->name('admin.dologin');
    Route::get('/registration',[AuthController::class,'RegisterView'])->name('admin.registerview');
    Route::post('/registration',[AuthController::class,'DoRegister'])->name('admin.doregister');

    Route::middleware('admin')->group(function () {
    Route::get('/software',[AuthController::class,'AdminDashboardView'])->name('admin.dashboardview');
    Route::get('/addadmin',[AuthController::class,'AddAdminView'])->name('admin.addadmin');
    Route::get('/logout',[AuthController::class,'DoLogout'])->name('admin.dologout');
    Route::get('/categorie/manage',[CategorieController::class,'CategorieManage'])->name('categoriemanage');

});

});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// end admin


