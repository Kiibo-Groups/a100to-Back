<?php

/**
 * Funciones para obtencion de informacion
 */
Route::get('store/homepage','StoreController@homepage');

/**
 * Funciones para inicio de sesion y gestion de info de usuario
 */
Route::post('store/login','StoreController@login');
Route::get('store/userInfo/{id}','StoreController@userInfo');
Route::post('store/updateInfo','StoreController@updateInfo');
Route::get('store/changeStatus','StoreController@changeStatus');

/**
 * Funciones 
 */
Route::get('store/storeOpen/{id}','StoreController@storeOpen');
Route::get('store/startRide','StoreController@startRide');


/**
 * Funciones para la gestion de pedidos
 */
Route::post('store/updateLocation','StoreController@updateLocation');
Route::get('store/orderProcess','StoreController@orderProcess');
Route::get('store/getItem','StoreController@getItem');
Route::get('store/getStaffNearby/{id}','StoreController@getStaffNearby');
Route::get('store/city','StoreController@city');
Route::get('store/updateCity','StoreController@updateCity');

// Funcion para las estadisticas
Route::get('store/overview','StoreController@overview');

// Funcion para el idiom (No funciona)
Route::get('store/lang','ApiController@lang');

?>