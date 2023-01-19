<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Court
    Route::delete('courts/destroy', 'CourtController@massDestroy')->name('courts.massDestroy');
    Route::resource('courts', 'CourtController');

    // Customer
    Route::delete('customers/destroy', 'CustomerController@massDestroy')->name('customers.massDestroy');
    Route::resource('customers', 'CustomerController');

    // Lawyer
    Route::delete('lawyers/destroy', 'LawyerController@massDestroy')->name('lawyers.massDestroy');
    Route::resource('lawyers', 'LawyerController');

    // Base
    Route::delete('basis/destroy', 'BaseController@massDestroy')->name('basis.massDestroy');
    Route::resource('basis', 'BaseController');

    // Setting
    Route::delete('settings/destroy', 'SettingController@massDestroy')->name('settings.massDestroy');
    Route::post('settings/media', 'SettingController@storeMedia')->name('settings.storeMedia');
    Route::post('settings/ckmedia', 'SettingController@storeCKEditorImages')->name('settings.storeCKEditorImages');
    Route::resource('settings', 'SettingController');

    // Proccess
    Route::delete('proccesses/destroy', 'ProccessController@massDestroy')->name('proccesses.massDestroy');
    Route::resource('proccesses', 'ProccessController');

    // Procedural Process
    Route::delete('procedural-processes/destroy', 'ProceduralProcessController@massDestroy')->name('procedural-processes.massDestroy');
    Route::resource('procedural-processes', 'ProceduralProcessController');

    // Case File
    Route::delete('case-files/destroy', 'CaseFileController@massDestroy')->name('case-files.massDestroy');
    Route::resource('case-files', 'CaseFileController');

    // Case Types
    Route::delete('case-types/destroy', 'CaseTypesController@massDestroy')->name('case-types.massDestroy');
    Route::resource('case-types', 'CaseTypesController');

    // Case Status
    Route::delete('case-statuses/destroy', 'CaseStatusController@massDestroy')->name('case-statuses.massDestroy');
    Route::resource('case-statuses', 'CaseStatusController');

    // One Time Fees
    Route::delete('one-time-fees/destroy', 'OneTimeFeesController@massDestroy')->name('one-time-fees.massDestroy');
    Route::resource('one-time-fees', 'OneTimeFeesController');

    // Contract
    Route::delete('contracts/destroy', 'ContractController@massDestroy')->name('contracts.massDestroy');
    Route::resource('contracts', 'ContractController');

    // Contract Type
    Route::delete('contract-types/destroy', 'ContractTypeController@massDestroy')->name('contract-types.massDestroy');
    Route::resource('contract-types', 'ContractTypeController');

    // Company Type
    Route::delete('company-types/destroy', 'CompanyTypeController@massDestroy')->name('company-types.massDestroy');
    Route::resource('company-types', 'CompanyTypeController');

    // Company Contract
    Route::delete('company-contracts/destroy', 'CompanyContractController@massDestroy')->name('company-contracts.massDestroy');
    Route::resource('company-contracts', 'CompanyContractController');

    // Company Contract Alterations
    Route::delete('company-contract-alterations/destroy', 'CompanyContractAlterationsController@massDestroy')->name('company-contract-alterations.massDestroy');
    Route::resource('company-contract-alterations', 'CompanyContractAlterationsController');

    // Other Cases
    Route::delete('other-cases/destroy', 'OtherCasesController@massDestroy')->name('other-cases.massDestroy');
    Route::resource('other-cases', 'OtherCasesController');

    // Other Case Type
    Route::delete('other-case-types/destroy', 'OtherCaseTypeController@massDestroy')->name('other-case-types.massDestroy');
    Route::resource('other-case-types', 'OtherCaseTypeController');

    // Hearings
    Route::delete('hearings/destroy', 'HearingsController@massDestroy')->name('hearings.massDestroy');
    Route::resource('hearings', 'HearingsController');

    // Finances
    Route::delete('finances/destroy', 'FinancesController@massDestroy')->name('finances.massDestroy');
    Route::resource('finances', 'FinancesController');

    // Calendar
    Route::delete('calendars/destroy', 'CalendarController@massDestroy')->name('calendars.massDestroy');
    Route::resource('calendars', 'CalendarController');

    // Payments
    Route::delete('payments/destroy', 'PaymentsController@massDestroy')->name('payments.massDestroy');
    Route::resource('payments', 'PaymentsController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
