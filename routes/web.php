<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\crudcontroller;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\MailController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserInputController;

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

Route::get('/name',[crudcontroller::class,'name'])->name('column');
Route::get('crud.create',[crudcontroller::class,'index'])->name('crud.create');
Route::put('update/{id}',[dashboardcontroller::class,'update'])->name('update');//foods
Route::get('edit/{id}',[dashboardcontroller::class,'edit'])->name('edit');
// Route::get('edit/{id}/{name}/{api_name}/{image}',[dashboardcontroller::class,'edit'])->name('edit');
Route::get('delete/{id}',[dashboardcontroller::class,'destroy'])->name('delete');

Route::post('api_call',[crudcontroller::class,'api_call'])->name('api_call');
Route::post('/store',[dashboardcontroller::class,'store'])->name('store');
Route::resource('crud',dashboardcontroller::class);
Route::get('/show',[dashboardcontroller::class,'index'])->name('show');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');// user's dashboard
Route::get('/admindashboard', function () {
    return view('admindashboard');
})->middleware(['auth', 'verified'])->name('admindashboard')->middleware('isAdmin');// admin dashboard

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    
});
 
Route::get('SendEmail',[MailController::class,'index']);
Route::get('send-sms-notification',[NotificationController::class,'SendSmsNotification']);
//Get User Input for foods
Route::get('/auth.register-5/',[UserInputController::class,'index'])->name('Foodinput');
Route::get('/get-foods/{mealType}',[UserInputController::class,'getFoodsByMealType'])->name('get-foods');
Route::post('api_call',[crudcontroller::class,'api_call'])->name('api_call');



require __DIR__.'/auth.php';
