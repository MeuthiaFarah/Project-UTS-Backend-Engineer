<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route Pasien
// Mengambil seluruh data pasien GET
Route::get("/patients", [PatientController::class, 'index']);

// Menambah data pasien POST
Route::post("/patients", [PatientController::class, 'store']);

// Mengambil detail pasien GET
Route::get("/patients/{id}", [PatientController::class, 'show']);

// Mengedit data pasien PUT
Route::put("/patients/{id}", [PatientController::class, 'update']);

// Menghapus data pasien DELETE
Route::delete("/patients/{id}", [PatientController::class, 'destroy']);

// Mendapatkan data melalui nama GET
Route::get("/patients/search/{name}", [PatientController::class, 'search']);

// Mendapatkan data melalui nama GET
Route::get("/patients/status/positive", [PatientController::class, 'positive']);

// Mendapatkan data melalui nama GET
Route::get("/patients/status/recovered", [PatientController::class, 'recovered']);

// Mendapatkan data melalui nama GET
Route::get("/patients/status/dead", [PatientController::class, 'dead']);