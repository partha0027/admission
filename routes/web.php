<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\AddmisionController;

use App\Http\Controllers\Admin\EnquiryController;
use Symfony\Component\Mime\DependencyInjection\AddMimeTypeGuesserPass;

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


// Dashboard
Route::get('/', [DashBoardController::class, 'index'])->name('index');


//Admin Login
Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/login', [AdminController::class, 'loginUser'])->name('auth.login');
Route::get('/register', [AdminController::class, 'register'])->name('register');
Route::post('/register', [AdminController::class, 'saveUser'])->name('auth.register');


Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {

    Route::get('logout', [AdminController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/dashboard', [DashBoardController::class, 'dashboard'])->name('admin.dashboard');



    //Enquiry
    Route::get('/view-enquiry', [EnquiryController::class, 'getEnquiry'])->name('view-enquiry');
    Route::get('/enquiry', [EnquiryController::class, 'enquiry'])->name('enquiry');
    Route::post('/enquiry-store', [EnquiryController::class, 'enquiryStore'])->name('enquiry-store');


    //Addmission 

    Route::get('/view-add', [AddmisionController::class, 'getAdd'])->name('view-add');
    Route::get('/addmission', [AddmisionController::class, 'addmission'])->name('addmission');
    Route::post('/addmission-store', [AddmisionController::class, 'admitStore'])->name('addmission-store');
});






// route for teachers
Route::group(['prefix' => 'teacher'], function () {
});

//Enquiry




//Addmission 
