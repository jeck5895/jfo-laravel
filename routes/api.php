<?php

use Illuminate\Http\Request;

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

Route::post('/jobseekers/sign-up', 'Auth\RegisterController@jobseeker');
Route::post('/employers/sign-up', 'Auth\RegisterController@employer');

Route::middleware('auth:api')->group(function () {
    Route::apiResource('jobseekers', 'Jobseekers\JobseekerController');
    Route::apiResource('employers', 'Employers\EmployerController');
});
