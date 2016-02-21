<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'PageController@index');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Field routes...
Route::resource('forms', 'Form\FormController');
Route::resource('fields', 'Field\FieldController');
Route::resource('fieldOptions', 'Field\FieldOptionsController');

Route::resource('submissions', 'Submit\SubmitController');

// Get Submissions for a specific form
Route::get('form/{id}/submissions', 'Submit\SubmitController@getFormSubmissions');

// Form Submission Routes
Route::post('forms/{id}/submit', 'Submit\SubmitController@store');

// Reports Routes
Route::resource('reports', 'Report\ReportController');

Route::get(
    'reports/form/{id}/overview',
    [
        'middleware' => 'auth',
        'uses' => 'Report\ReportController@getOverview'
    ]
);

Route::get(
    'reports/form/{id}',
    [
        'middleware' => 'auth',
        'uses' => 'Report\ReportController@getFormReports'
    ]
);
