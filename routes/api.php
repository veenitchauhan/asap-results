<?php

use App\Http\Controllers\PatientCollectionController;
use App\Http\Controllers\SymptomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('symptoms', [SymptomController::class, 'api_get_symptoms']);
Route::post('eligibilty', [PatientCollectionController::class, 'api_check_eligibilty'])->name('api.check.eligibilty');