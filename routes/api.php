<?php

use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CentersController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\diagnosisController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SpecsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
//Centers
Route::get('/center/list', [CentersController::class, 'index']);
Route::post('/center/new', [CentersController::class, 'store']);
Route::post('/center/update', [CentersController::class, 'update']);
Route::get('/center/delete/{id}', [CentersController::class, 'deleteCenter']);
Route::get('/center/get/{id}', [CentersController::class, 'getCenter']);
//Specialists
Route::get('/specs/list', [SpecsController::class, 'index']);
Route::post('/specs/new', [SpecsController::class, 'store']);
Route::post('/specs/update', [SpecsController::class, 'update']);
Route::get('/specs/delete/{id}', [SpecsController::class, 'deleteSpecs']);
Route::get('/specs/get/{id}', [SpecsController::class, 'getSpecs']);
//Doctors
Route::get('/doc/list', [DoctorsController::class, 'index']);
Route::post('/doc/new', [DoctorsController::class, 'store']);
Route::post('/doc/update', [DoctorsController::class, 'update']);
Route::get('/doc/delete/{id}', [DoctorsController::class, 'deleteDoctor']);
Route::get('/doc/get/{id}', [DoctorsController::class, 'getDoctor']);
//Diagonsis
Route::get('/dia/list', [diagnosisController::class, 'index']);
Route::post('/dia/new', [diagnosisController::class, 'store']);
Route::post('/dia/update', [diagnosisController::class, 'update']);
//Reservation
Route::post('/reserv/new', [ReservationController::class, 'store']);
Route::get('/note/list', [NotesController::class, 'index']);
Route::post('/note/new', [NotesController::class, 'store']);
Route::get('/note/{id}', [NotesController::class, 'notebyID']);
//Auth
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('password/email', [PasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');
Route::post('password/reset', [PasswordResetController::class, 'reset'])->name('password.reset');
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('user', function (Request $request) {
        return $request->user();
    });
});
Route::group(['middleware' => 'auth:sanctum'],function (){
    Route::post("SendMessage",[ChatController::class,"SendMessage"]);
    Route::get("load",[MessagesController::class,"LoadThePreviousMessages"]);
});
