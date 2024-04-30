<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CasalController;

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
// LOGIN
Route::get('/', function () {
    return view('index');
})->name('index');
Route::post('/', [UserController::class, 'auth'])->name('login.post');
// MIDDLEWARE DE USER PARA EL AUTH
Route::prefix('/casals')->group(function() {
    Route::middleware(['user.auth'])->group( function() {
        //Obtener casales
        Route::get('', [CasalController::class, 'allCasals'])->name('user.casals');
        //logout
        Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
        //edit casal
        Route::get('/{id}/edit', [CasalController::class, 'edit'])->name('casal.edit');
        Route::put('/casals/{id}', [CasalController::class, 'update'])->name('casal.update');
        //delete casal
        Route::delete('/{id}', [CasalController::class, 'delete'])->name('casal.delete');
        //añadir casal
        Route::get('/add', [CasalController::class, 'create'])->name('casal.add');
        Route::post('/add', [CasalController::class, 'store'])->name('casal.store');
    });
});
