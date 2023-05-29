<?php

/** 
 * Funciones para inicio de sesion y registro
 */
Route::post('dboy/login','DboyController@login');
Route::post('dboy/signup','DboyController@signup');

/**
 * Funciones para obtener info del usuario y actualizarla
 */
Route::get('dboy/userInfo/{id}','DboyController@userInfo');
Route::post('dboy/updateInfo','DboyController@updateInfo');
Route::get('dboy/staffStatus/{id}','DboyController@staffStatus');

/**
 * Funcioes para obtencion de informacion de usuarios logeados
 */
Route::get('dboy/homepage_ext','DboyController@homepage_ext');
Route::get('dboy/homepage','DboyController@homepage');

/**
 * Funciones para Estadisticas
 */
Route::get('dboy/overview','DboyController@overview');

/**
 * Funciones de control del pedido
 */
Route::get('dboy/startRide','DboyController@startRide');
Route::post('dboy/updateLocation','DboyController@updateLocation');
Route::get('dboy/getPolylines','DboyController@getPolylines');
Route::post('dboy/rejected','DboyController@rejected');
Route::get('dboy/chkNotify','DboyController@chkNotify');
Route::get('dboy/cancelOrder','DboyController@cancelOrder');

// Obtencion de idioma (No trabajando)
Route::get('dboy/lang','ApiController@lang');
?>