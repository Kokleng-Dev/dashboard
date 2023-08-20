<?php
use Inertia\Inertia;

Route::get('/login', 'AuthController@login')->name('admin.login');
Route::post('/login', 'AuthController@login')->name('admin.login');

Route::group(['middleware' => ['checkAuth']], function(){
    Route::get('/logout', 'AuthController@logout')->name('admin.logout');
    Route::get('/', 'HomeController@index')->name('admin.home');

    //company
    Route::get('/company', 'CompanyController@index')->name('admin.company');
    Route::post('/company/update', 'CompanyController@update')->name('admin.company.update');

    //role
    Route::get('/role', 'RoleController@index')->name('admin.role');

    //Permission
    Route::get('/permission', 'PermissionController@index')->name('admin.permission');
    Route::get('/permission/{id}/feature', 'PermissionFeatureController@index')->name('admin.permission_feature');

    //RolePermission
    Route::get('/role-permission/{id}/permission', 'RolePermissionController@index')->name('admin.role_permission');
    Route::get('/role-permission/{condition}/data', 'RolePermissionController@changePermission')->name('admin.changePermission');

    //bulk
    Route::get('/bulk/detail/{tbl}/{id}/data', 'BulkController@detail')->name('admin.bulk.detail');
    Route::post('/bulk/store', 'BulkController@store')->name('admin.bulk.store');
    Route::post('/bulk/update', 'BulkController@update')->name('admin.bulk.update');
    Route::get('/bulk/delete/{tbl}/{id}/data/{per}', 'BulkController@delete')->name('admin.bulk.delete');
    Route::get('/bulk/delele-all', 'BulkController@deleteAll')->name('admin.bulk.deleteAll');

    //change language
    Route::get('/change-language', 'ChangeLanguageController@index')->name('admin.change_language');

    //Translate Khmer
    Route::get('/translate/kh', 'TranslateController@translateKh')->name('admin.translate.kh');
    Route::get('/translate/changeTranslateKh', 'TranslateController@changeTranslateKh')->name('admin.translate.changeTranslateKh');
    Route::get('/translate/translateEn', 'TranslateController@translateEn')->name('admin.translate.create');
    Route::post('/translate/translateEn', 'TranslateController@translateEn')->name('admin.translate.create');
    
    // about me
    Route::get('/about-me', 'AuthController@aboutMe')->name('admin.about_me');
    Route::post('/about-me/update', 'AuthController@updateAboutMe')->name('admin.about_me.update');

    //users
    Route::get('/user','UserController@index')->name('admin.user');
    Route::post('/user/store','UserController@store')->name('admin.user.store');
    Route::post('/user/update','UserController@update')->name('admin.user.update');

    //404 page no permission
    Route::get('/404', function(){
        return Inertia::render('backends/404/index');
    })->name('admin.404');
});
