<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use DB;


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

Route::post('/login',function(Request $r){
    if($r->username == 'admin'){
        return response()->json(['status' => 200, 'sms' => 'login successfully', 'token' => '$#!FKAMF!$nafa#!#']);
    } else{
        return response()->json(['status' => 404, 'sms' => 'login unsuccessfully']);
    }
});

Route::get('/home', function(Request $r){
    if($r->token != '$#!FKAMF!$nafa#!#'){
        return response()->json(['status' => 401, 'sms' => 'no Auth']);
    }

    return response()->json(['data' => 'hello']);
});

