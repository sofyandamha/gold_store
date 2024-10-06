<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TukarPointController;
use App\Http\Controllers\ReturController;

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

// Route::redirect('/', '/admin');



// Route::resource('members', MemberResource::class);
// Route::resource('merchandises', MerchandiseResource::class);
Route::post('/exchange-points', [TukarPointController::class, 'exchangePoints'])->name('exchange.points');
Route::get('/retur/{id}/print', [ReturController::class, 'printReceipt'])->name('retur.print');

Route::get('/custom', function () {
    return 'custom';
});
