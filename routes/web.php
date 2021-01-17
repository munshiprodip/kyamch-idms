<?php

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


Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('products','ProductController');
    Route::resource('servicecard','ServicecardController');
    Route::resource('blood','BloodController');
    Route::resource('door','DoorController');
    Route::resource('department','DepartmentController');
    Route::resource('accesslist','AccesslistController');
    Route::resource('consumptions','ConsumptionController');
    Route::resource('employee','EmployeeController');

    Route::get('kyamch/employee/nonaccess', 'EmployeeController@nonaccess')->name('nonaccess');
    Route::get('kyamch/employee/nonaccess/edit/{id}', 'EmployeeController@nonaccess_edit')->name('nonaccess_edit');
    Route::get('kyamch/employee/nonaccess/update/{id}', 'EmployeeController@nonaccess_update')->name('nonaccess_update');
    Route::get('kyamch/employee/nonaccess/create', 'EmployeeController@nonaccess_create')->name('nonaccess_create');
    Route::get('kyamch/employee/access_card', 'EmployeeController@access_card')->name('access_card');
    Route::get('kyamch/service/access_card', 'ServicecardController@access_card_service')->name('access_card_service');

    Route::get('employee/update/status/{id}', 'EmployeeController@updatestatus')->name('updatestatus');
    Route::get('service/update/status/{id}', 'ServicecardController@updatestatus_service')->name('updatestatus_service');

    
    Route::get('kyamch/employee/service', 'EmployeeController@service')->name('service');



/* Reports Routes*/
    Route::get('kyamch/reports/inventory', 'ReportController@inventory_report')->name('inventory_report');
    Route::get('kyamch/reports/inventory/view', 'ReportController@inventory_report_view')->name('inventory_report_view');
    Route::get('kyamch/reports/consumption/view', 'ReportController@consumption_report_view')->name('consumption_report_view');

    Route::get('kyamch/reports/gatepass', 'ReportController@gatepass_report')->name('gatepass_report');
    Route::get('kyamch/reports/gatepass/doorwise', 'ReportController@doorwise_report_view')->name('doorwise_report_view');
    Route::get('kyamch/reports/gatepass/employeewise', 'ReportController@employeewise_report_view')->name('employeewise_report_view');
});
