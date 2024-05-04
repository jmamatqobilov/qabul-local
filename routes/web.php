<?php

use App\Role;
use App\User;
use Illuminate\Support\Facades\Hash;
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

Route::get('/delete-test-users', 'DeleteTestUsersController@delete_test_users' );
Route::get('/delete-test-things', 'DeleteTestUsersController@delete_test_things' );
Route::get('/create-deleted-uzkom-users', 'DeleteTestUsersController@create_deleted_uzkom_users' );
Route::get('/create-zam-user', 'DeleteTestUsersController@create_zam_user' );
Route::get('/fetch-users', 'DeleteTestUsersController@fetch_users' );
Route::get('/delete-object-types', 'DeleteTestUsersController@delete_object_types' );


Auth::routes(['register' => false, 'verify' => true]);
Auth::routes(['verify' => true]);

Route::get('lang/{locale}', 'Controller@lang')->name('lang');
Route::get('notification', 'Controller@notification_read')->name('notification.read');

Route::put('delete-profile-image/{id}', 'Controller@delete_profile_image')->name('delete-profile-image')->middleware('auth');
Route::put('delete-old-document/{object_type}/{object_id}/{document_type}', 'User\ObjectsController@delete_old_document')->name('delete-old-document')->middleware('auth');
Route::delete('delete-document/{id}', 'User\ObjectsController@delete_document')->name('delete-document')->middleware('auth');
Route::get('profile', 'Controller@profile')->name('profile.view')->middleware('auth');
Route::put('profile', 'Controller@profile_change')->name('profile.change')->middleware('auth');


Route::group(['prefix' => '', 'middleware' => ['auth', 'role:user'], 'as' => 'user.'], function () {
    Route::get('/', ['uses' => 'User\IndexController@index', 'as' => 'index']);

    Route::resource('applications', 'User\ApplicationsController', ['except' => 'apply'])->name('applications', 'applications');
    Route::get('/applications/{application}/validate', ['uses' => 'User\ApplicationsController@send_to_validate'])->name('applications.validate');

    Route::get('/applications/{application}/objects/{id}/copy', ['uses' => 'User\ObjectsController@copy'])->name('applications.objects.copy');
    Route::resource('applications.objects', 'User\ObjectsController');
    Route::resource('applications.messages', 'User\ExtendMessageController')
        ->except(['create', 'show', 'edit', 'update', 'destroy']);

    Route::get('/applications/{application}/refill_endpoints_done', ['uses' => 'User\ApplicationsController@refill_endpoints_done'])->name('applications.refill_endpoints_done');
    Route::get('/applications/{application}/endpoints/create/{option?}', ['uses' => 'User\EndpointsController@create'])->name('applications.endpoints.create');
    Route::get('/applications/{application}/endpoints/{endpoint}/copy', ['uses' => 'User\EndpointsController@copy'])->name('applications.endpoints.copy');
    Route::resource('applications.endpoints', 'User\EndpointsController')
        ->except(['create']);
    Route::post('/applications/{application}/attach_act', ['uses' => 'User\ApplicationsController@attach_act'])->name('applications.attach_act');
    Route::get('/applications/{application}/pdf', ['uses' => 'User\ApplicationsController@pdf'])->name('applications.pdf');
    Route::get('endpoints', ['as' => 'endpoints.index', 'uses' => 'User\EndpointsController@index']);
    Route::get('endpoint_types/{option?}', ['as' => 'endpoint_types.index', 'uses' => 'User\EndpointsController@endpoint_types']);
    Route::get('vendors/{option?}', ['as' => 'vendors.index', 'uses' => 'User\EndpointsController@vendors']);
    Route::get('objects', ['as' => 'objects.index', 'uses' => 'User\ObjectsController@index']);
});


Route::group(['prefix' => 'hududiy', 'middleware' => ['auth', 'role:hududiy'], 'as' => 'hududiy.'], function () {
    Route::get('/', ['uses' => 'Hududiy\IndexController@index', 'as' => 'index']);
    Route::get('/applications/{application}/objects_validated', ['uses' => 'Hududiy\ApplicationsController@objects_validated'])->name('applications.objects_validated');
    Route::get('/applications/{application}/pdf', ['uses' => 'Hududiy\ApplicationsController@pdf'])->name('applications.pdf');
    Route::get('stats/{option?}', ['as' => 'stats.index', 'uses' => 'Hududiy\IndexController@stats']);
    Route::get('objects/{option?}', ['as' => 'objects.index', 'uses' => 'Hududiy\ObjectsController@index']);
    Route::resource('applications', 'Hududiy\ApplicationsController')->name('applications', 'applications');
    Route::resource('applications.objects', 'Hududiy\ObjectsController');
    Route::resource('applications.endpoints', 'Hududiy\EndpointsController');
    Route::resource('applications.messages', 'Ukn\ExtendMessageController');
    Route::get('exports/{option?}', ['as' => 'exports.index', 'uses' => 'Ukn\IndexController@exports']);
});

Route::group(['prefix' => 'ukn', 'middleware' => ['auth', 'role:ukn'], 'as' => 'ukn.'], function () {
    Route::get('/', ['uses' => 'Ukn\IndexController@index', 'as' => 'index']);
    Route::get('/applications/{application}/apply', ['uses' => 'Ukn\ApplicationsController@apply'])->name('applications.apply');
    Route::get('/applications/{application}/pdf', ['uses' => 'Ukn\ApplicationsController@pdf'])->name('applications.pdf');
    Route::resource('applications', 'Ukn\ApplicationsController')->name('applications', 'applications');
    Route::get('objects/{option?}', ['as' => 'objects.index', 'uses' => 'Ukn\ObjectsController@index']);
    Route::get('endpoints/{option?}', ['as' => 'endpoints.index', 'uses' => 'Ukn\EndpointsController@index']);
    Route::get('stats/{option?}', ['as' => 'stats.index', 'uses' => 'Ukn\IndexController@stats']);
    Route::get('map/{option?}', ['as' => 'map.index', 'uses' => 'Ukn\ApplicationsController@map']);
    Route::get('exports/{option?}', ['as' => 'exports.index', 'uses' => 'Ukn\IndexController@exports']);
    Route::get('/application/{application}/objects/{object}/restore', ['as' => 'applications.objects.restore', 'uses' => 'Ukn\ObjectsController@restore']);
    Route::resource('applications.objects', 'Ukn\ObjectsController');
    Route::resource('applications.endpoints', 'Ukn\EndpointsController');
    Route::resource('applications.messages', 'Ukn\ExtendMessageController')
        ->except(['create', 'show', 'edit', 'update', 'destroy']);
    Route::get('applications/{application}/prolongs/create/{extendMessage}', ['as' => 'applications.prolongs.create', 'uses' => 'Ukn\ProlongsController@create']);
    Route::get('applications/{application}/prolongs', ['as' => 'applications.prolongs.index', 'uses' => 'Ukn\ProlongsController@index']);
    Route::get('applications/{application}/prolongs/{prolong}/accept', ['as' => 'applications.prolongs.accept', 'uses' => 'Ukn\ProlongsController@accept']);
    Route::post('applications/{application}/prolongs/{extendMessage}', ['as' => 'applications.prolongs.store', 'uses' => 'Ukn\ProlongsController@store']);
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin'], 'as' => 'admin.'], function () {
    Route::get('/', ['uses' => 'Admin\IndexController@index', 'as' => 'index']);
    Route::resource('objecttypes', 'Admin\ObjectTypesController')->name('objecttypes', 'objecttypes');
    Route::resource('users', 'Admin\UsersController')->name('users', 'users');
    Route::resource('menus', 'Admin\MenusController', ['except' => 'menus.show'])->name('menus', 'menus');
    Route::resource('applications', 'Admin\ApplicationsController')->name('applications', 'applications');
    Route::resource('documents', 'Admin\DocumentsController')->name('documents', 'documents');
    Route::resource('objects', 'Admin\ObjectsController')->name('objects', 'objects');
    Route::resource('dictionaries', 'Admin\DictionariesController')->name('dictionaries', 'dictionaries');
    Route::resource('dictionaries.values', 'Admin\DictionaryValuesController')->name('dictionaryValues', 'dictionaryValues');
});

Route::get('/file-get/{id}', 'GetFileController')->name('file.get');



