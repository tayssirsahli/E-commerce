<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\testController;
use App\Http\Controllers\CategoryController;



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
    return view('welcome');
});
Route::get('/home', [HomeController::class,'index'])->name('home');



//authentification

//register
Route::get('/register', [AuthController::class,'registerPage'])->name('register');
Route::post('/register', [AuthController::class,'registerPost'])->name('register');
//login
Route::get('/login', [AuthController::class,'loginPage'])->name('login');
Route::post('/login', [AuthController::class,'loginPost'])->name('login');

//dashbord
Route::middleware(['auth','role:admin'])->group(function (){


Route::get('/dashboard', [AdminController::class,'dashboardPage'])->name('dashboard');
Route::get('/categories', [CategoryController::class,'categoryPage'])->name('categories');

});

Route::middleware(['auth','role:user'])->group(function (){
    Route::get('/listcategorie', [CategoryController::class,'allcategory'])->name('categories');  
});
//categorie

//add 
Route::post('/addcategorie', [CategoryController::class,'AddCategory'])->name('addcategorie');
//show

//delete
Route::get('/delete/{id}', [CategoryController::class,'deleteCat']);
//edite
Route::get('/edite/{id}', [CategoryController::class,'recherchEdite']);

Route::post('/edite/{id}', [CategoryController::class,'update']);




