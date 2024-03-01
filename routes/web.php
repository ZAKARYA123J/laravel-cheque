<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\CarnetController;
use App\Http\Controllers\SocieteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckDesignerController;
use App\Http\Controllers\ChiquesController;
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


Route::resource('Banques', BankController::class);
Route::delete('Banques/{id}', [BankController::class,'destroy'])->name('deletbank');
Route::resource('Comptes', SocieteController::class);
Route::post('Societe/{socity_id}', [SocieteController::class,'StoreCompte'])->name('StoreCompte');
Route::delete('{id}', [SocieteController::class,'destroyCompte'])->name('destroyCompte');
Route::resource('Carnets', CarnetController::class);
Route::post('Carnets/{socity_id}', [CarnetController::class,'store'])->name('StoreCarnets');


Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('loginPost');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('registerPost');
Route::post('/signin', [AuthController::class, 'signin'])->name('signin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('banks')->group(function () {
    // Index route (display a listing of the resource)
    Route::get('/', [BankController::class, 'index'])->name('banks.index');

    // Show route (display a specific resource)
    Route::get('/show', [BankController::class, 'show'])->name('banks.show');

    // Create route (show form for creating a new resource)
    Route::get('/create', [BankController::class, 'create'])->name('banks.create');

    // Store route (store a newly created resource in storage)
    Route::post('/', [BankController::class, 'store'])->name('banks.store');

    // Edit route (show form for editing a specified resource)
    Route::get('/{id}/edit', [BankController::class, 'edit'])->name('banks.edit');

    // Update route (update the specified resource in storage)
    Route::put('/{id}', [BankController::class, 'update'])->name('banks.update');
    // Destroy route (delete the specified resource)
    Route::delete('/{id}', [BankController::class, 'destroy'])->name('banks.destroy');
});



Route::resource('carnets', CarnetController::class);
Route::post('/carnets/{socity_id}', [CarnetController::class, 'store'])->name('carnets.store');
Route::get('/check-designer', [CheckDesignerController::class, 'index'])->name('check-designer.index');
Route::delete('/Carnets/{id}', [CheckDesignerController::class, 'destroy'])->name('Carnets.destroy');


// Route to save check design
Route::post('/check-designer/save', [CheckDesignerController::class, 'save'])->name('check-designer.save');
// Route to generate PDF check
Route::post('/check-designer/generate-check', [CheckDesignerController::class, 'generateCheck'])->name('check-designer.generate-check');
// Display all data
Route::get('/cheques/showalldata', [ChiquesController::class, 'showalldata'])->name('cheques.showalldata');
// Add a new cheque
Route::post('/cheques/addnewCheque', [ChiquesController::class, 'addnewCheque'])->name('cheques.addnewCheque');
// Delete a cheque
Route::get('/cheques/delete/{id}', [ChiquesController::class, 'DeletChique'])->name('cheques.delete');
// Update cheque letter
Route::post('/cheques/update/{id}', [ChiquesController::class, 'updatechequeLetter'])->name('cheques.update');
// Print a cheque
Route::get('/cheques/print/{id}', [ChiquesController::class, 'PrintCheque'])->name('cheques.print');
// You can add more routes as needed for your application
