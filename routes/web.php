<?php

use App\Http\Controllers\Admin\DatasetController;
use App\Http\Controllers\Admin\NilaiKController;
use App\Http\Controllers\Admin\TestingDataController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/prediksi-penjurusan', [SiswaController::class, 'prediksi'])->name('prediksi-penjurusan');
Route::get('/jurusan', [SiswaController::class, 'jurusan'])->name('jurusan');
Route::post('/tampil-hasil', [SiswaController::class, 'hasil'])->name('hasil');

Route::prefix('/home')->group(function() {
    Route::get('/kosongkan-dataset', [DatasetController::class, 'truncateDataset'])->name('kosongkan_dataset');
    Route::get('/template-csv', [DatasetController::class, 'templateCsv'])->name('template_csv');
    Route::get('/dataset', [DatasetController::class, 'index'])->name('dataset');
    Route::post('/dataset', [DatasetController::class, 'addData'])->name('tambah_data');
    Route::post('/dataset/import-csv', [DatasetController::class, 'importFromCsv'])->name('import_csv');
    Route::delete('/dataset/{siswa:id}', [DatasetController::class, 'deleteOne'])->name('delete_one');

    Route::post('/datatest', [TestingDataController::class, 'uploadCsvFile'])->name('upload_testing');
    Route::post('/datatest/delete', [TestingDataController::class, 'deleteTesting'])->name('hapus_datatest');
    Route::post('/datatest/testing', [TestingDataController::class, 'testing'])->name('testing_data');

    Route::get('/detail-testing', [TestingDataController::class, 'detailTesting'])->name('detail_testing');
    Route::post('/detail-testing/export', [TestingDataController::class, 'exportTestingResult'])->name('export_hasil');

    Route::post('/nilaik/{k}', [NilaiKController::class, 'update'])->name('nilaik');
});
