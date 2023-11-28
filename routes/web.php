<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\JenisPemasukanController;
use App\Http\Controllers\JenisPengeluaranController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;


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
    return redirect('/dashboard');
});
Route::get('/home', function () {
    return redirect('/dashboard');
});
Route::get('/layout', [Controller::class, 'index']);



Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [Registered::class, 'register']);


Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::prefix('/dashboard')->middleware('auth')->group(function () {

Route::controller(DashboardController::class)->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/cetak', [PengeluaranController::class, 'cetakpengeluaran']);


    
});

});

Route::middleware(['role:dkm,superadmin'])->group(function () {
    Route::group(['prefix' => 'pemasukan'], function () {
        Route::get('/', [PemasukanController::class, 'index']);
        Route::post('/tambah', [PemasukanController::class, 'store']);
        Route::post('/{id}/edit', [PemasukanController::class, 'update']);
        Route::get('/cetak', [PemasukanController::class, 'cetakpemasukan']);
        Route::delete('/{id}/hapus', [PemasukanController::class, 'delete']);
    });

    Route::group(['prefix' => 'pengeluaran'], function () {
        Route::get('/', [PengeluaranController::class, 'index']);
        Route::post('/tambah', [PengeluaranController::class, 'store']);
        Route::post('/{id}/edit', [PengeluaranController::class, 'update']);
        Route::get('/cetak', [PengeluaranController::class, 'cetakpengeluaran']);
        Route::delete('/{id}/hapus', [PengeluaranController::class, 'delete']);
    });
    Route::group(['prefix' => 'jenis_pemasukan'], function () {
        Route::get('/', [JenisPemasukanController::class, 'index']);
        Route::post('/tambah', [JenisPemasukanController::class, 'store']);
        Route::post('/{id}/edit', [JenisPemasukanController::class, 'store']);
        Route::delete('/{id}/hapus', [JenisPemasukanController::class, 'delete']);
    });

    Route::group(['prefix' => 'jenis_pengeluaran'], function () {
        Route::get('/', [JenisPengeluaranController::class, 'index']);
        Route::post('/tambah', [JenisPengeluaranController::class, 'store']);
        Route::post('/{id}/edit', [JenisPengeluaranController::class, 'store']);
        Route::delete('/{id}/hapus', [JenisPengeluaranController::class, 'delete']);
    });

    Route::group(['prefix' => 'log'], function () {
        Route::get('/', [LogController::class, 'index']);
    });
});



Route::middleware(['role:superadmin'])->group(function () {

Route::controller(UserController::class)->group(function () {
    Route::get('/user', 'index');
    Route::post('/user/tambah', 'store');
    Route::post('/user/{id}/edit', 'update');
    Route::delete('/user/{id}/hapus', 'delete');

});
});


// Route::controller(JenisPemasukanController::class)->group(function () {
//         Route::get('/jenis_pemasukan', 'index');
//         Route::post('/jenis_pemasukan/tambah', 'store');
//         Route::post('/jenis_pemasukan/{id}/edit', 'store');
//         Route::delete('/jenis_pemasukan/{id}/hapus', 'delete');
// });

// Route::controller(JenisPengeluaranController::class)->group(function () {
//     Route::get('/jenis_pengeluaran', 'index');
//     Route::post('/jenis_pengeluaran/tambah', 'store');
//     Route::post('/jenis_pengeluaran/{id}/edit', 'store');
//     Route::delete('/jenis_pengeluaran/{id}/hapus', 'delete');
// });


// Route::controller(LogController::class)->group(function () {
//     Route::get('/log', 'index');
// });
