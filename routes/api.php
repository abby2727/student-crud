<?php

use App\Http\Controllers\AttendanceController;
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

Route::get('attendance/{name}', [AttendanceController::class, 'showAttendance']);

Route::get('add-attendance', [AttendanceController::class, 'create']);
Route::post('add-attendance', [AttendanceController::class, 'store']);

Route::get('edit-attendance', [AttendanceController::class, 'edit']);
Route::put('update-attendance/{id}', [AttendanceController::class, 'update']);

Route::delete('delete-attendance/{id}', [AttendanceController::class, 'destroy']);