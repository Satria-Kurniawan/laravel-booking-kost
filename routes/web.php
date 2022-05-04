<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TransactionController;
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

Route::get('/', function () {
    return view('landing-page');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Route::get('/list-ruangan', function () {
//     return view('guest/list-ruangan');
// })->middleware(['auth'])->name('listRuangan');

require __DIR__ . '/auth.php';

Route::group(attributes: ['middleware' => 'isAdmin'], routes: function () {
    Route::get('admin/dashboard', [PageController::class, 'dashboardPage'])->name('dashboard');

    Route::get('admin/data-ruangan', [RoomController::class, 'readData'])->name('dataRuangan');
    Route::get('admin/data-ruangan/tambah', [PageController::class, 'createDataPage'])->name('halamanTambahDataRuangan');
    Route::post('admin/data-ruangan/tambah', [RoomController::class, 'createData'])->name('tambahDataRuangan');
    Route::get('admin/data-ruangan/perbarui/{id}', [PageController::class, 'updateDataPage'])->name('halamanPerbaruiDataRuangan');
    Route::post('admin/data-ruangan/perbarui/{id}', [RoomController::class, 'updateData'])->name('perbaruiDataRuangan');
    Route::get('admin/data-ruangan/{id}', [RoomController::class, 'deleteData'])->name('hapusDataRuangan');
});

Route::get('list-ruangan', [PageController::class, 'roomListPage'])->name('listRuangan');
Route::get('overview-ruangan/{id}', [PageController::class, 'overviewPage'])->name('overviewRuangan');

Route::get('checkout/{id}', [PageController::class, 'checkoutPage'])->name('checkout')->middleware('auth');
Route::get('transaction/{reference}', [PageController::class, 'transactionPage'])->name('transaction')->middleware('auth');
