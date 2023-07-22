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

Auth::routes();
Route::redirect('/', '/login', 301);

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', 'HomeController@index')->name('dashboard');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');

    Route::resource('profile', 'ProfileController', ['only' => ['index', 'store']]);

    Route::resource('users', 'UsersController');

    Route::resource('registrations', 'RegistrationController');
    Route::get('registrations/print/{registration}', 'RegistrationController@print')->name('registrations.print');

    Route::resource('payments', 'PaymentsController');
    Route::post('payments-renew/{id}', 'PaymentsController@renew')->name('payments.renew');

    Route::get('dashboard-recent-transactions', 'RegistrationController@recent')->name('registrations.recent');

    Route::resource('reports', 'ReportsController');
    Route::get('dashboard-summary', 'ReportsController@dashboardSummary')->name('dashboard.summary');

    Route::resource('expense', 'ExpenseController');

    Route::resource('nutritions', 'NutritionsController');
    Route::get('nutritions/print/{registration}', 'NutritionsController@print')->name('nutritions.print');
});
