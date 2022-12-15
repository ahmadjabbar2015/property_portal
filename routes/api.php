<?php

use App\Http\Controllers\Api\AgentController;
use App\Http\Controllers\Api\LandloardController;
use App\Http\Controllers\Api\PropertyController;
use App\Http\Controllers\Api\SourceController;
use App\Http\Controllers\Api\TenantController;
use App\Http\Controllers\Api\Property_unitsController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\InventoryController;
use App\Http\Controllers\Api\LeadController;
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

Route::get('hello', function (Request $request) {
    return 'Hello';
});

// Landlords



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/current-user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/current-usersss', function (Request $request) {
        return $request->all();
    });

    // Landlords
    Route::get('landlords', [LandloardController::class, 'index']);
    Route::get('landlord/{id}', [LandloardController::class, 'show']);
    Route::post('landlords/store', [LandloardController::class, 'store']);

    // Tenants
    Route::get('tenants', [TenantController::class, 'index']);
    Route::get('tenant/{id}', [TenantController::class, 'show']);
    Route::post('tenants/store', [TenantController::class, 'store']);
    // Property Units


    Route::get('property-units', [Property_unitsController::class, 'getPropertyUnits']);
    Route::get('property-units/{id}', [Property_unitsController::class, 'showPropertyUnit']);
    Route::post('property-units/store', [Property_unitsController::class, 'storePropertyUnit']);

    // Property Types
    Route::get('property-types', [PropertyController::class, 'getPropertyTypes']);
    Route::get('property-types/{id}', [PropertyController::class, 'showPropertyType']);
    Route::post('property-type/store', [PropertyController::class, 'storePropertytype']);

    //agent
    Route::get('agents', [AgentController::class, 'getAgents']);
    Route::get('agents/{id}', [AgentController::class, 'showAgent']);
    Route::post('agent/store', [AgentController::class, 'storeAgent']);

    //inventory
    Route::get('inventories', [InventoryController::class, 'getInventories']);
    Route::get('inventories/{id}', [InventoryController::class, 'showInventory']);
    Route::post('inventory/store', [InventoryController::class, 'storeInventory']);
    //lead
    Route::get('leads',[LeadController::class,'getleads']);
    Route::get('leads/{id}', [LeadController::class, 'showlead']);
    Route::post('lead/store', [LeadController::class, 'storelead']);
    Route::get('attempts/{id}', [LeadController::class, 'getAttempt']);

    });
    Route::get('properties' , [PropertyController::class , 'index']);

Route::post("login",[UserController::class,'index']);