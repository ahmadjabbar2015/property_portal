<?php

use App\Http\Livewire\BootstrapTables;
use App\Http\Livewire\Components\Buttons;
use App\Http\Livewire\Components\Forms;
use App\Http\Livewire\Components\Modals;
use App\Http\Livewire\Components\Notifications;
use App\Http\Livewire\Components\Typography;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Err404;
use App\Http\Livewire\Err500;
use App\Http\Livewire\ResetPassword;
use App\Http\Livewire\ForgotPassword;
use App\Http\Livewire\Lock;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\ForgotPasswordExample;
use App\Http\Livewire\Index;
use App\Http\Livewire\LoginExample;
use App\Http\Livewire\ProfileExample;
use App\Http\Livewire\RegisterExample;
use App\Http\Livewire\Transactions;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ResetPasswordExample;
use App\Http\Livewire\UpgradeToPro;
use App\Http\Livewire\Users;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertytypeController;
use App\Http\Controllers\PropertyunitsController;
use App\Http\Controllers\TenantsController;
use App\Http\Controllers\LandlordController;
use App\Http\Controllers\LeaseController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\landlordreportsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/login');

Route::get('/register', Register::class)->name('register');

Route::get('/login', Login::class)->name('login');

Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');

Route::get('/reset-password/{id}', ResetPassword::class)->name('reset-password')->middleware('signed');

Route::get('/404', Err404::class)->name('404');
Route::get('/500', Err500::class)->name('500');
Route::get('/upgrade-to-pro', UpgradeToPro::class)->name('upgrade-to-pro');

Route::middleware('auth')->group(function () {
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/profile-example', ProfileExample::class)->name('profile-example');
    Route::get('/users', Users::class)->name('users');
    Route::get('/login-example', LoginExample::class)->name('login-example');
    Route::get('/register-example', RegisterExample::class)->name('register-example');
    Route::get('/forgot-password-example', ForgotPasswordExample::class)->name('forgot-password-example');
    Route::get('/reset-password-example', ResetPasswordExample::class)->name('reset-password-example');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/transactions', Transactions::class)->name('transactions');
    Route::get('/bootstrap-tables', BootstrapTables::class)->name('bootstrap-tables');
    Route::get('/lock', Lock::class)->name('lock');
    Route::get('/buttons', Buttons::class)->name('buttons');
    Route::get('/notifications', Notifications::class)->name('notifications');
    Route::get('/forms', Forms::class)->name('forms');
    Route::get('/modals', Modals::class)->name('modals');
    Route::get('/typography', Typography::class)->name('typography');
    //property
    Route::get('property', [PropertyController::class, 'create'])->name('property.create');
    Route::POST('property/store', [propertyController::class, 'store'])->name('property.store');
    Route::get('property/index', [PropertyController::class, 'index'])->name('property.index');
    Route::any('property/location/store', [propertyController::class, 'location'])->name('property.location');
    Route::POST('property/amenities/store', [propertyController::class, 'amenities'])->name('property.amenities');
    Route::post('/property/image/store', [propertyController::class, 'imageadd'])->name('property.image');
    Route::get('propertyshow/{id}', [propertyController::class, 'show'])->name('property.show');
    Route::get('property/edit/{id}', [propertyController::class, 'edit'])->name('property.edit');
    Route::post('property/update/{id}', [propertyController::class, 'update']);
    //tenants
    Route::get('tenants', [TenantsController::class, 'create'])->name('tenants.create');
    Route::get('tenants/index', [TenantsController::class, 'index'])->name('tenants.index');
    Route::post('tenant/store', [TenantsController::class, 'store']);
    Route::get('tenants/show/{id}', [TenantsController::class, 'show']);
    Route::get('tenants/edit/{id}', [TenantsController::class, 'edit']);
    Route::post('tenants/update/{id}', [TenantsController::class, 'update']);
    Route::get('tenants/delete/{id}', [TenantsController::class, 'delete']);
    //landlord
    Route::get('landlord', [LandlordController::class, 'create']);
    Route::post('landlord/store', [LandlordController::class, 'store']);
    Route::get('landlord/index', [LandlordController::class, 'index'])->name('landlord.index');
    Route::get('landlord/edit/{id}', [LandlordController::class, 'edit']);
    Route::post('landlord/update/{id}', [LandlordController::class, 'update']);
    Route::get('landlord/show/{id}', [LandlordController::class, 'show']);
    Route::get('landlord/delete/{id}', [LandlordController::class, 'delete']);
    //propertytype
    Route::get('propertytype', [PropertytypeController::class, 'type'])->name('property.type');
    Route::post('propertytype/store', [propertytypeController::class, 'store']);
    Route::get('propertytype/delete/{id}', [propertytypeController::class, 'delete']);
    //property units
    Route::get('propertyunits', [propertyunitsController::class, 'create']);
    Route::POST('propertyunits/store', [propertyunitsController::class, 'store']);
    Route::get('propertyunits/index', [propertyunitsController::class, 'index'])->name('propertyunits.index');
    Route::get('propertyunits/show/{id}', [propertyunitsController::class, 'show']);
    Route::get('propertyunits/delete/{id}', [propertyunitsController::class, 'delete']);
    Route::get('propertyunits/edit/{id}', [propertyunitsController::class, 'edit']);
    Route::post('propertyunits/update/{id}', [propertyunitsController::class, 'update']);
    //leaes 
    Route::get('lease', [LeaseController::class, 'create'])->name('lease.create');
    Route::get('lease/index', [LeaseController::class, 'index'])->name('lease.index');
    Route::get('lease/sale/index', [LeaseController::class, 'saleindex'])->name('lease.saleindex');

    Route::post('lease/store', [LeaseController::class, 'store']);
    Route::post('lease/store/sale',[LeaseController::class,'sale_store']);
    Route::get('lease/show/{id}', [LeaseController::class, 'show']);
    Route::get('lease/edit/{id}', [LeaseController::class, 'edit']);
    Route::post('lease/update/{id}', [LeaseController::class, 'update']);
    Route::get('lease/delete/{id}', [LeaseController::class, 'delete']);
    Route::get('lease/get-property-units/{id}',[LeaseController::class,'get_property_unit']);
    Route::get('lease/installment/{id}',[LeaseController::class,'installmentplane']);
    Route::get('/lease/rent_intallment/{id}',[LeaseController::class,'rentinstallmentplane']);
    //inventory
    Route::get('inventory', [InventoryController::class, 'create']);
    Route::get('inventory/index', [InventoryController::class, 'index'])->name('inventory.index');
    Route::post('/inventory/store', [InventoryController::class, 'store']);
    Route::get('inventory/show/{id}', [InventoryController::class, 'show'])->name('inventory.show');
    Route::get('inventory/delete/{id}', [InventoryController::class, 'delete']);
    Route::get('inventory/edit/{id}', [InventoryController::class, 'edit']);
    Route::post('inventory/update/{id}', [InventoryController::class, 'update']);
    //event 
    Route::get('calendar', [EventController::class, 'index'])->name('calendar.index');
    Route::post('/add_event', [EventController::class, 'add_event'])->name('add_event');
    Route::post('calendar/create-event', [EventController::class, 'create'])->name('calendar.create');
    Route::patch('calendar/edit-event', [EventController::class, 'edit'])->name('calendar.edit');
    Route::delete('calendar/remove-event', [EventController::class, 'destroy'])->name('calendar.destroy');
    //tickets
    Route::get('ticket/index', [TicketController::class, 'index'])->name('ticket.index');
    Route::any('ticket/store', [TicketController::class, 'store']);
    Route::get('ticket/show/{id}', [TicketController::class, 'show']);
    //customer 
    Route::get('customers/index', [CustomerController::class, 'index'])->name('customers.index'); 
    Route::get('customer/{id}', [CustomerController::class, 'create']);
    Route::get('customer/hello', [CustomerController::class, 'hello'])->name('customer.hello');
    Route::post('customer/store', [CustomerController::class, 'store']);
    Route::get('customer/show/{id}', [CustomerController::class, 'show']);
    Route::get('customer/edit/{id}', [CustomerController::class, 'edit']);
    Route::post('customer/update/{id}', [CustomerController::class, 'update']);
    Route::get('customer/delete/{id}', [CustomerController::class, 'delete']);
    //Agent
    Route::get('agent', [AgentController::class, 'create']);
    Route::get('agent/index', [AgentController::class, 'index'])->name('agent.index');
    Route::any('agent/store', [AgentController::class, 'store']);
    Route::get('agent/show/{id}', [AgentController::class, 'show']);
    Route::get('agent/edit/{id}', [AgentController::class, 'edit']);
    Route::post('agent/update/{id}', [AgentController::class, 'update']);
    Route::get('agent/delete/{id}', [AgentController::class, 'delete']);
    //lead
    Route::get('lead', [LeadController::class, 'create']);
    Route::any('lead/store', [LeadController::class, 'store']);
    Route::get('lead/index', [LeadController::class, 'index'])->name('lead.index');
    Route::get('lead/checknumber/{id}',[LeadController::class,'checknumber']);
    //attempt
    Route::get('lead/attempt/{id}', [LeadController::class, 'attempt'])->name('lead.attempt');
    Route::any('lead/update/{id}', [LeadController::class, 'update']);
    Route::get('lead/attempt_index', [LeadController::class, 'attempt_index'])->name('lead.attempt_index');
    Route::get('lead/attempt_edit/{id}', [LeadController::class, 'attempt_edit']);
    Route::post('lead/attempt_update/{id}', [LeadController::class, 'attempt_update']);
    //Source
    // Route::get('source', [SourceController::class, 'source_create']);
    Route::any('source/store', [SourceController::class, 'store']);
    Route::get('source/index', [SourceController::class, 'index'])->name('source.index');
    Route::get('source/delete/{id}', [SourceController::class, 'delete']);

    //reports
    Route::get('landlordreports', [LandlordreportsController::class, 'create']);
    //payment

    Route::post('payments/sale/store', [PaymentController::class, 'store']);
    Route::get('lease/sale/payment/{id}',[paymentController::class,'salepayment']);
    Route::post('payments/sale/rentstore',[PaymentController::class,'rent_payment']);
    Route::get('/lease/rent_payment/{id}',[PaymentController::class,'rentshowpayment']);
});
