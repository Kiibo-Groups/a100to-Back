<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
|   Desarrollado por: kiibogroups@gmail.com
|   Fecha de Inicio: 4/04/2023
|
| Aquí es donde puede registrar rutas API para su aplicación.
| las rutas son cargadas por el RouteServiceProvider dentro de un grupo que
| se le asigna el grupo de middleware "api". ¡Disfruta construyendo tu API!
|
|
*/

Route::group(array('namespace' => 'App\Http\Controllers\Api'), function () {


    //------------------------A100to ------------------------------
    Route::get('homepage_init/{city}','ApiController@homepage_init');
    Route::get('homepage/{city}','ApiController@homepage');
    Route::get('getStore/{id}','ApiController@getStore');
    Route::get('GetNearbyCity','ApiController@GetNearbyCity');


    //Route::get('getStoreOpen/{city}','ApiController@getStoreOpen');
    //Route::get('city','ApiController@city');

   
    //--------------------------------------------------------------
  
    Route::get('welcome','ApiController@welcome');
    Route::get('getDataInit','ApiController@getDataInit');
    
    /**
     * Obtencion de ciudades en que se tiene servicio
     */
    Route::get('city','ApiController@city');
    Route::get('GetNearbyCity','ApiController@GetNearbyCity');
    Route::post('searchLocation','ApiController@searchLocation');
    Route::get('getPolylines','ApiController@getPolylines');
    Route::get('updateCity','ApiController@updateCity');

    /**
     * Datos iniciales para usuarios registrados
     */
    Route::get('homepage/{city}','ApiController@homepage');
    Route::get('homepage_init/{city}','ApiController@homepage_init');
    
    /**
     * Obtencion de informacion de negocios
     */
    Route::get('getStores/{city}','ApiController@getStores');
    Route::get('getStore/{id}','ApiController@getStore');
    Route::get('getStoreOpen/{city}','ApiController@getStoreOpen');
    Route::get('getTypeDelivery/{id}','ApiController@getTypeDelivery');
    Route::get('search/{query}/{type}/{city}','ApiController@search');
    Route::get('SearchCat/{city}','ApiController@SearchCat');
    Route::get('SearchFilters/{city}','ApiController@SearchFilters');
    Route::get('ViewAllCats','ApiController@ViewAllCats');
    Route::post('addToCart','ApiController@addToCart');
    Route::get('cartCount/{cartNo}','ApiController@cartCount');
    Route::get('updateCart/{id}/{type}','ApiController@updateCart');
    Route::get('getCart/{cartNo}','ApiController@getCart');
    Route::get('getOffer/{cartNo}','ApiController@getOffer');
    Route::get('applyCoupen/{id}/{cartNo}','ApiController@applyCoupen');
    Route::post('signup','ApiController@signup');
    Route::post('signupOP','ApiController@signupOP');
    Route::post('sendOTP','ApiController@sendOTP');
    Route::post('chkUser','ApiController@chkUser');
    Route::post('SignPhone','ApiController@SignPhone');
    Route::post('login','ApiController@login');
    Route::post('Newlogin','ApiController@Newlogin');
    Route::post('loginfb','ApiController@loginfb');
    Route::post('forgot','ApiController@forgot');
    Route::post('verify','ApiController@verify');
    Route::post('updatePassword','ApiController@updatePassword');
    Route::get('getAddress/{id}','ApiController@getAddress');
    Route::get('getAllAdress/{id}','ApiController@getAllAdress');
    Route::post('addAddress','ApiController@addAddress');
    Route::get('removeAddress/{id}','ApiController@removeAddress');
    Route::post('searchLocation','ApiController@searchLocation');
    Route::post('order','ApiController@order');
    Route::get('userinfo/{id}','ApiController@userinfo');
    Route::post('updateInfo/{id}','ApiController@updateInfo');
    Route::get('cancelOrder/{id}/{uid}','ApiController@cancelOrder');
    Route::post('loginFb','ApiController@loginFb');
    Route::post('sendChat','ApiController@sendChat');
    Route::post('rate','ApiController@rate');
    Route::get('pages','ApiController@pages');
    Route::get('myOrder/{id}','ApiController@myOrder');
    Route::get('lang','ApiController@lang');
    Route::get('makeStripePayment', 'ApiController@stripe');
    Route::get('getStatus/{id}', 'ApiController@getStatus');
    Route::get('sendPushprueba/{id}', 'ApiController@sendPushprueba');
    Route::get('getPolylines','ApiController@getPolylines');
    Route::get('getChat/{id}','ApiController@getChat');
    Route::get('getEventsDetails/{id}','ApiController@getEventsDetails');
    Route::get('updateCity','ApiController@updateCity');
    Route::get('GetInfiniteScroll/{id}','ApiController@GetInfiniteScroll');
    Route::post('deleteOrders','ApiController@deleteOrders');
   
    Route::get('deleteAll/{id}','ApiController@deleteAll'); 
    Route::get("setTableCustomer/{table}",'ApiController@setTableCustomer');

    /**
     * Categorias
     */
    Route::get("getCategory/{id}",'ApiController@getCategory');
    Route::get("getSelectSubCat/{id}",'ApiController@getSelectSubCat');

    /**
     * OpenPay
     */

    Route::post('getClient','ApiController@getClient');
    Route::post('SetCardClient','ApiController@SetCardClient');
    Route::post('GetCards','ApiController@GetCards');
    Route::post('DeleteCard','ApiController@DeleteCard');
    Route::post('getCard','ApiController@getCard');
    Route::post('chargeClient','ApiController@chargeClient');
    Route::post('addBalance','ApiController@addBalance');

    /**
     * Favorites
     */
    Route::post('SetFavorite','ApiController@SetFavorite');
    Route::get('GetFavorites/{id}','ApiController@GetFavorites');
    Route::get('TrashFavorite/{id}/{user}','ApiController@TrashFavorite');

    /**
     * Nuevas funciones para repartidores cercanos
     */
    Route::get('getNearbyStaffs/{order}/{type_staff}','ApiController@getNearbyStaffs');
    Route::get('setStaffOrder/{order}/{dboy}','ApiController@setStaffOrder');
    Route::get('delStaffOrder/{order}','ApiController@delStaffOrder');
    Route::get('updateStaffDelivery/{staff}/{external_id}','ApiController@updateStaffDelivery');

    /**
     * Mandaditos
     */

    Route::post('OrderComm','ApiController@OrderComm');
    Route::post('ViewCostShipCommanded','ApiController@ViewCostShipCommanded');
    Route::get('chkEvents_comm/{id}','ApiController@chkEvents_comm');
    Route::post('chkEvents_staffs/','ApiController@chkEvents_staffs');
    Route::get('getNearbyEvents/{id}','ApiController@getNearbyEvents');
    Route::get('setStaffEvent/{event_id}/{dboy}','ApiController@setStaffEvent');
    Route::get('delStaffEvent/{event_id}','ApiController@delStaffEvent');
    Route::get('cancelComm_event/{id}','ApiController@cancelComm_event');
    Route::post('rateComm_event','ApiController@rateComm_event');


    /**
     * Visitas
     */
    Route::get('SetNewVisitStore/{store}/{user}','ApiController@SetNewVisitStore');

    include("dboy.php");
    include("store.php");

});
