<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use Illuminate\Routing\Route;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::ApiResource('/class', 'Api\SclassController');
Route::ApiResource('/subject', 'Api\SubjectController');
Route::ApiResource('/section', 'Api\SectionController');
Route::ApiResource('/student', 'Api\StudentController');

Route::group([

    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('register', 'AuthController@register');

});