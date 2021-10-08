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
use App\Http\Controllers\NotificationController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/set-end-point/{topic}', NotificationController::class.'@setEndPoint')->name('setEndPoint');

Route::post('/test-webhook/{topic}', NotificationController::class.'@PublishToWebhook')->name('testWebhook');



Route::get('/name', function () {
    \Log::debug('An informational message.');
});