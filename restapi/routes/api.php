<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

route::get('country','Country\CountryController@country');
route::get('country/{id}','Country\CountryController@countryById');
route::post('country','Country\CountryController@countrySave');
route::put('country/{id}','Country\CountryController@countryUpdate');
route::delete('country/{id}','Country\CountryController@countryDelete');

route::apiResource('address','Address\AddressController');