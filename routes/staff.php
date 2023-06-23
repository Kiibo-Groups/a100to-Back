<?php

Route::group(['namespace' => 'App\Http\Controllers\Staff','prefix' => env('staff')], function(){

    /**
     * Funciones para unicio de sesion
     */
    Route::get('/','AdminController@index');
    Route::get('login','AdminController@index');
    Route::post('login','AdminController@login');
    Route::get('logout','AdminController@logout');

    /**
     * Funciones para obtencion de info principal
     */
    Route::get('home','AdminController@home');


});
?>