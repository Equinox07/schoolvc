<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['namespace' => 'API'], function() {

    Route::post('student_login', 'StudentAuthController@login');


    Route::apiResource('users', 'UserController');
    Route::post('generate_code', 'GenerateVoucherContoller@generateVoucher');
    Route::apiResource('schools', 'SchoolController');
    Route::apiResource('students', 'StudentController');
    Route::apiResource('vouchers', 'VoucherController');
});
