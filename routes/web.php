<?php


use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});




Auth::routes(['verify' => true]);


Route::get('/admin', 'AdminController@dashboard')->name('admin.dashboard');

Route::get('/admin/partners', function () {
    return view('admin.partners');
});

// Partner Route
Route::get('/partners/dashboard', 'User\PartnersController@dashboard')->name('partners.dashboard');
Route::get('/partners', 'User\PartnersController@index')->name('partners.index');

Route::get('/admin/partners', 'AdminPartnerController@index');


Route::get('/admin/partners/laundry/{id}','AdminPartnerController@userLaundry');
Route::put('/admin/partners/{id}','AdminPartnerController@update');
Route::get('/admin/partners/create', 'AdminPartnerController@create');
Route::post('/admin/partners', 'AdminPartnerController@store');
Route::get('/admin/partners', 'AdminPartnerController@index');
Route::get('/admin/partners/{id}','AdminPartnerController@show');
Route::delete('/admin/partners/delete','AdminPartnerController@destroy');
Route::get('/admin/partners/{id}/edit','AdminPartnerController@edit');



// Customer Route
Route::get('/customers/dashboard', 'User\CustomersController@dashboard')->name('customers.dashboard');  // customers dashboard
Route::get('/customers', 'User\CustomersController@index')->name('customers.index');  // customers list
Route::get('/customers/{customer}','User\CustomersController@show')->name('customers.show'); //customer details
Route::get('/customers/{customer}/profile','User\CustomersController@profile')->name('customers.profile');
Route::get('/customers/{customer}/orders','User\CustomersController@orders')->name('customers.orders');

// customer profile update
Route::put('/customer/{customer}/picture','User\CustomersController@updateProfilePicture')->name('customers.profile.picture.update');
Route::put('/customer/{customer}/city','User\CustomersController@updateCity')->name('customers.profile.city.update');
Route::put('/customer/{customer}/street','User\CustomersController@updateStreet')->name('customers.profile.street.update');
Route::put('/customer/{customer}/email','User\CustomersController@updateEmail')->name('customers.profile.email.update');
Route::put('/customer/{customer}/phoneNumber','User\CustomersController@updatePhoneNumber')->name('customers.profile.phoneNumber.update');

// End of customer route

Route::put('/admin/customers/{id}','AdminCustomerController@update');
Route::get('/admin/customers/create', 'AdminCustomerController@create');
Route::post('/admin/customers', 'AdminCustomerController@store');
Route::get('/admin/customers', 'AdminCustomerController@index');
Route::get('/admin/customers/{id}','AdminCustomerController@show');
Route::delete('/admin/customers/delete','AdminCustomerController@destroy');
Route::get('/admin/customers/{id}/edit','AdminCustomerController@edit');

Route::delete('/admin/laundries','Laundry\LaundriesController@destroy')->name('laundries.destroy');

Route::get('/laundry/{laundry}/services', 'Laundry\ServicesController@index')->name('services.index');
Route::post('laundry/services','Laundry\ServicesController@store')->name('services.store');
Route::post('laundry/services/pricing','Laundry\ServicesController@addPricing')->name('services.add_price');

Route::get('/laundry/dashboard', 'Laundry\LaundriesController@dashboard')->name('laundries.dashboard');
Route::get('/laundry', 'Laundry\LaundriesController@index')->name('laundry.index');
Route::get('/laundry/{laundry}/orders', 'Laundry\LaundriesController@orders')->name('laundry.orders.index');
Route::get('/laundry/{laundry}/profile', 'Laundry\LaundriesController@profile')->name('laundries.profile');
Route::get('/laundry/{laundry}/branches', 'Laundry\BranchesController@index')->name('branch.index');

Route::get('/laundries/{laundry}/branches/{branch}/dashboard', 'Laundry\BranchesController@dashboard')->name('branch.dashboard');

Route::get('/laundry/branch/{id}/services','Laundry\BranchesController@services')->name('branches.services');
Route::post('/laundries/branches','Laundry\BranchesController@store')->name('branches.store');
Route::post('/laundry/branch/order/{id}/update/status/{statusValue}','OrdersController@statusUpdate')->name('order.updateStatus');

Route::group(['middleware' => 'auth'], function () {

    Route::post('/laundry/category/price', 'LaundryController@storePrice');
    // <-----------Customer Route ---------------->

    Route::get('customer', 'User\CustomersController@index')->name('customer.index')->middleware('verified');


    // <-----------Order CRUD Route---------------->
    // Route::get('customer/{customer}/orders', 'OrdersController@customer')->name('customer.order.index');
    Route::get('/customers/{customer}/orders/create/{branch?}', 'OrdersController@create')->name('orders.create');
    Route::get('/orders/{order}/details','OrdersController@details')->name('order.details');
    Route::post('/orders/{customer}', 'OrdersController@store')->name('orders.store');
    Route::get('/order/edit/{order}', 'OrdersController@edit')->name('order.edit');
    Route::put('/order/{order}', 'OrdersController@update')->name('order.update');
    Route::delete('/order/{order}', 'OrdersController@destroy')->name('order.destroy');
    Route::put('/laundry/customer/order/accept/{order}', 'OrdersController@accepted')->name('order.accepted');
    Route::delete('/laundry/customer/order/decline/{order}', 'OrdersController@declined')->name('order.declined');
    Route::get('/laundry/{laundry}/branch/{branch}/orders','OrdersController@branchOrders')->name('branch.orders');
    Route::get('/laundry/{laundry}/branch/{branch}/waitinglist','OrdersController@waitingList')->name('branch.waitingList');
    Route::put('/laundry/branch/order/update/{order}','OrdersController@washIn')->name('branch.order.washIn');
    Route::put('/laundry/branch/order/{order}','OrdersController@markAsDone')->name('branch.order.markAsDone');
    //laundry owner route
    Route::put('/laundry/profile/{id}','LaundryController@profileUpdate');
    Route::put('/laundry/customer/order/{id}', 'LaundryController@update');

    Route::delete('/laundry/orders/delete','LaundryController@deleteOrders');
    Route::delete('/laundry/customer/delete','LaundryController@destroy');
    // Route::get('/laundry', 'Laundry\LaundriesController@index')->name('laundry.index');


    Route::get('/laundry/customer/orders/{id}', 'LaundryController@customerOrders');
    Route::get('/laundry/customer/order/{id}/edit', 'LaundryController@edit');


    Route::post('/laundry/category/{id}', 'LaundryController@storeCategory');
    Route::get('/laundry/category/create/{id}', 'LaundryController@createCategory');
    Route::get('/laundry/category/{id}', 'LaundryController@showCategoryList');




    // Route::get('/laundry/profile','LaundryController@profile');
    Route::get('/laundry/profile/{id}/edit','LaundryController@profileEdit');

    Route::get('/laundry/customers', 'LaundryController@customer')->name('laundry.customers.index');
    Route::get('/laundry/customers/{id}','LaundryController@customerShow');


    Route::get('/admin/dashboard',function(){
        return view('admin.dashboard');
    });


    Route::get('/staffs','User\StaffsController@index')->name('staffs.index');
    // All route your need authenticated
});

Route::get('/{any}',function(){
    return view('errors.404');
});
Route::get('/staffs','User\StaffsController@index')->name('staffs.index');
// <------------------- Branch Route ------------> //

// Route::get('/laundry/{laundry}/{branch}','User\StaffController@dashboard')->name('branch.index'); // dashboard
