<?php

use App\Http\Controllers\Api\LandloardController;
use App\Http\Controllers\Api\PropertyController;
use App\Http\Controllers\Api\TenantController;
use App\Http\Controllers\Api\UserController;
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
Route::get('hello' , function(Request $request){
    return 'Hello';
});

// Landlords



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/current-user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => 'auth:sanctum'], function(){
        Route::post('/current-usersss' , function (Request $request) {
            return $request->all();
        });

        // Landlords
        Route::get('landlords' , [LandloardController::class , 'index']);
        Route::get('landlord/{id}' , [LandloardController::class , 'show']);
        Route::post('landlords/store' , [LandloardController::class , 'store']);

        // Tenants
        Route::get('tenants' , [TenantController::class , 'index']);
        Route::get('tenant/{id}' , [TenantController::class , 'show']);
        Route::post('tenants/store' , [TenantController::class , 'store']);
        // Property Units
        Route::get('property-units' , [PropertyController::class , 'getPropertyUnits']);

        // Property Types
        Route::get('property-types' , [PropertyController::class , 'getPropertyTypes']);
        Route::get('property-types/{id}' , [PropertyController::class , 'showPropertyType']);
        Route::post('property-type/store' , [PropertyController::class , 'storePropertytype']);

    });
Route::post("login",[UserController::class,'index']);