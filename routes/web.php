<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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


Route::get('/table', [EmployeeController::class, 'index'])->name('table');


Route::get('/create', function () {
    return view('create_employee_form');
})->name('create_employee_form');


Route::post('/create', [EmployeeController::class,'store'])->name('create_employye_form_post');



Route::get('/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
// updates a post
Route::put('/employee/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');




Route::get('/read/{id}', [EmployeeController::class, 'show'])->name('employee.show');


// deletes a post
Route::delete('/delete/{id}', [EmployeeController::class ,'destroy'])->name('employee.destroy');