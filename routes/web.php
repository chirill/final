<?php
Route::get('/', function () { return redirect('/admin/home'); });

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('locations', 'Admin\LocationsController');
    Route::post('locations_mass_destroy', ['uses' => 'Admin\LocationsController@massDestroy', 'as' => 'locations.mass_destroy']);
    Route::post('locations_restore/{id}', ['uses' => 'Admin\LocationsController@restore', 'as' => 'locations.restore']);
    Route::delete('locations_perma_del/{id}', ['uses' => 'Admin\LocationsController@perma_del', 'as' => 'locations.perma_del']);
    Route::resource('computers', 'Admin\ComputersController');
    Route::post('computers_mass_destroy', ['uses' => 'Admin\ComputersController@massDestroy', 'as' => 'computers.mass_destroy']);
    Route::post('computers_restore/{id}', ['uses' => 'Admin\ComputersController@restore', 'as' => 'computers.restore']);
    Route::delete('computers_perma_del/{id}', ['uses' => 'Admin\ComputersController@perma_del', 'as' => 'computers.perma_del']);
    Route::resource('printers', 'Admin\PrintersController');
    Route::post('printers_mass_destroy', ['uses' => 'Admin\PrintersController@massDestroy', 'as' => 'printers.mass_destroy']);
    Route::post('printers_restore/{id}', ['uses' => 'Admin\PrintersController@restore', 'as' => 'printers.restore']);
    Route::delete('printers_perma_del/{id}', ['uses' => 'Admin\PrintersController@perma_del', 'as' => 'printers.perma_del']);
    Route::resource('apps', 'Admin\AppsController');
    Route::post('apps_mass_destroy', ['uses' => 'Admin\AppsController@massDestroy', 'as' => 'apps.mass_destroy']);
    Route::post('apps_restore/{id}', ['uses' => 'Admin\AppsController@restore', 'as' => 'apps.restore']);
    Route::delete('apps_perma_del/{id}', ['uses' => 'Admin\AppsController@perma_del', 'as' => 'apps.perma_del']);
    Route::resource('contact_companies', 'Admin\ContactCompaniesController');
    Route::post('contact_companies_mass_destroy', ['uses' => 'Admin\ContactCompaniesController@massDestroy', 'as' => 'contact_companies.mass_destroy']);
    Route::resource('contacts', 'Admin\ContactsController');
    Route::post('contacts_mass_destroy', ['uses' => 'Admin\ContactsController@massDestroy', 'as' => 'contacts.mass_destroy']);



 
});
