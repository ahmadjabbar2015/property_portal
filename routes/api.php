<?php

use App\Http\Controllers\Api\LandloardController;
use App\Http\Controllers\Api\PropertyController;
use App\Http\Controllers\Api\SourceController;
use App\Http\Controllers\Api\TenantController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AgentController;
use App\Http\Controllers\Api\PropertyUnitController;
use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\inventoryController;
use App\Http\Controllers\Api\LeaseController;
use App\Http\Controllers\Api\RentController;
use App\Http\Controllers\Api\SaleController;
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

    // Property Types
    Route::get('property-types', [PropertyController::class, 'getPropertyTypes']);
    Route::get('property-types/{id}', [PropertyController::class, 'showPropertyType']);
    Route::post('property-type/store', [PropertyController::class, 'storePropertytype']);

    // Source 

    Route::get('sources', [SourceController::class, 'index']);
    Route::get('sources/{id}', [SourceController::class, 'show']);
    Route::post('sources/store', [SourceController::class, 'store']);

    // Property
    Route::get('properties', [PropertyController::class, 'index']);
    Route::get('property/{id}', [PropertyController::class, 'show']);
    Route::post('properties/store', [PropertyController::class, 'store']);

    //agent
    Route::get('agents', [AgentController::class, 'getAgents']);
    Route::get('agents/{id}', [AgentController::class, 'showAgent']);
    Route::post('agent/store', [AgentController::class, 'storeAgent']);

    //inventory
    Route::get('inventories', [InventoryController::class, 'getInventories']);
    Route::get('inventories/{id}', [InventoryController::class, 'showInventory']);
    Route::post('inventory/store', [InventoryController::class, 'storeInventory']);

    // Property Units
    Route::get('property-units', [PropertyUnitController::class, 'getPropertyUnits']);
    Route::get('property-units/{id}', [PropertyUnitController::class, 'showPropertyUnit']);
    Route::post('property-units/store', [PropertyUnitController::class, 'storePropertyUnit']);
    //lead
    Route::get('leads', [LeadController::class, 'getLeads']);
    Route::get('leads/{id}', [LeadController::class, 'showLead']);
    Route::post('lead/store', [LeadController::class, 'storeLead']);
    Route::get('attempts/{id}', [LeadController::class, 'getAttempt']);
    Route::post('attempt/store', [LeadController::class, 'storeAttempt']);
    //customer
    Route::get('customers', [CustomerController::class, 'getCustomer']);
    Route::get('customers/{id}', [CustomerController::class, 'showCustomer']);
    Route::post('customer/store', [CustomerController::class, 'storeCustomer']);
    //leases
    Route::get('leases', [LeaseController::class, 'index']);
    Route::post('leases/store', [LeaseController::class, 'store']);
    Route::post('Sale-leases/store', [LeaseController::class, 'storeSaleLease']);
    Route::get('leases/{id}', [LeaseController::class, 'show']);

    // rent installments
    Route::get('lease-rent-installments/{lease_id}', [RentController::class, 'getLeaseRentInstallments']);
    Route::get('rent-installment/{id}', [RentController::class, 'getRentInstallment']);

    // sale installments
    Route::get('lease-sale-installments/{lease_id}', [SaleController::class, 'getLeaseSaleInstallments']);
    Route::get('sale-installment/{id}', [SaleController::class, 'getSaleInstallment']);

    //rent payment
    Route::get('lease-rent-payment', [RentController::class, 'getLeaseRentPayment']);
    Route::get('lease-rent-payment/{rent_leases_id}', [RentController::class, 'showLeaseRentPayment']);
    Route::post('lease-rent-payment/store', [RentController::class, 'storeLeaseRentPayment']);
    //sale payment
    Route::get('lease-sale-payment', [SaleController::class, 'getLeaseSalePayment']);
    Route::post('lease-sale-payment/store', [SaleController::class, 'storeLeaseSalePayment']);
    Route::get('lease-sale-payment/{sale_lease_id}', [SaleController::class, 'showLeaseSalePayment']);

   //logout
    Route::post('/logout', [UserController::class, 'logout']);

});
//login
Route::post("login", [UserController::class, 'index']);

