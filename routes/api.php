<?php

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

Route::post('/upload', 'ImageUploadController@upload');

Route::fallback(function () {
    return response()->json([
        'message' => 'Page not found.',
        'status' => 404,
    ], 404);
});
