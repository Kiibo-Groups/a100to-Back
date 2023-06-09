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

    /**
     * Bienvenida y datos iniciales
     */
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
    Route::get('GetInfiniteScroll/{id}','ApiController@GetInfiniteScroll');
    
    /**
     * Funciones de busqueda y Cagtegorias
     */
    Route::get('search/{query}/{type}/{city}','ApiController@search');
    Route::get('SearchCat/{city}','ApiController@SearchCat');
    Route::get('SearchFilters/{city}','ApiController@SearchFilters');
    Route::get('ViewAllCats','ApiController@ViewAllCats');
    
    
    /**
     * Funciones de carrito de compras
     */
    Route::get('getCart/{cartNo}','ApiController@getCart');
    Route::post('addToCart','ApiController@addToCart');
    Route::get('cartCount/{cartNo}','ApiController@cartCount');
    Route::get('updateCart/{id}/{type}','ApiController@updateCart');
    
    /**
     * Funciones de cupones de descuento
     */
    Route::get('getOffer/{cartNo}','ApiController@getOffer');
    Route::get('applyCoupen/{id}/{cartNo}','ApiController@applyCoupen');
    
    /**
     * Funciones de registro
     */
    Route::post('signup','ApiController@signup');
    Route::post('signupOP','ApiController@signupOP');
    Route::post('sendOTP','ApiController@sendOTP');
    Route::post('SignPhone','ApiController@SignPhone');
    
    /**
     * Funciones de recuperacion de contraseña
     */
    Route::post('forgot','ApiController@forgot');
    Route::post('verify','ApiController@verify');
    Route::post('updatePassword','ApiController@updatePassword');
    Route::post('updateInfo/{id}','ApiController@updateInfo');
    
    /**
     * Funciones de inicio de sesion y validacion de usuario
     */
    Route::post('chkUser','ApiController@chkUser');
    Route::post('login','ApiController@login');
    Route::post('Newlogin','ApiController@Newlogin'); 
    Route::post('loginFb','ApiController@loginFb');
    Route::get('userinfo/{id}','ApiController@userinfo');
    
    /**
     * Funciones de gestion de direcciones de entrega
     */
    Route::get('getAddress/{id}','ApiController@getAddress');
    Route::get('getAllAdress/{id}','ApiController@getAllAdress');
    Route::post('addAddress','ApiController@addAddress');
    Route::get('removeAddress/{id}','ApiController@removeAddress');
    
    /**
     * Funciones de pedidos 
     */
    Route::post('order','ApiController@order');
    Route::get('myOrder/{id}','ApiController@myOrder');
    Route::get('getStatus/{id}', 'ApiController@getStatus');
    Route::get('cancelOrder/{id}/{uid}','ApiController@cancelOrder');
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

    // Calificaiones del pedido
    Route::post('rate','ApiController@rate');
    // Realziacion de cobros por Stripe
    Route::get('makeStripePayment', 'ApiController@stripe');
    // Paginas del negocio (Quienes somos, preguntas frecuentes, contactanos, etc.)
    Route::get('pages','ApiController@pages');
    // Obtencion de idiomas en que se trabaja (Sin funcionar)
    Route::get('lang','ApiController@lang');

    /**
     * Funciones de Chat (Aun sin terminar)
     */
    Route::post('sendChat','ApiController@sendChat');
    Route::get('getChat/{id}','ApiController@getChat');


    include("dboy.php");
    include("store.php");

});
