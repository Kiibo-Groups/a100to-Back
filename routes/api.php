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

      /**
     * Datos iniciales para usuarios registrados
     */
    Route::get('homepage/{city}','ApiController@homepage');
    Route::get('homepage_init/{city}','ApiController@homepage_init');

    Route::get('getStore/{id}','ApiController@getStore');
    Route::get('GetNearbyCity','ApiController@GetNearbyCity');
    Route::get('getStores/{city}','ApiController@getStores');
    


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

    /*Usuario*/
    Route::get('userinfo/{id}','ApiController@userinfo');
    Route::get('getTrendingUsers','ApiController@getTrendingUsers');
    Route::post('editar_imagen','ApiController@ImagenUsuario');
    Route::get('usuarios','ApiController@KardexUsuario');
    Route::post('eliminar_cuenta','ApiController@EliminarCuenta');
    Route::get('editar_nombre/{id}','ApiController@editarNombre');
    Route::post('cambiar_password', 'ApiController@cambiarPassword');
    Route::get('editar_informacion/{id}','ApiController@updateInformacion');
    Route::get('editar_ciudad/{id}','ApiController@updateCiudad');




    /** Tickets  */
     Route::post('tickets','ApiController@Tickets');
     Route::get('tickets_historial/{id}','ApiController@TicketsHistorial');
     /** Causas Sociales  */
    Route::get('causas_sociales','ApiController@getCausasSociales');
     /** CashBack  */
    Route::get('cashback/{id}','ApiController@getCashback');

    /**
    * Reservas
    */
    Route::post('crear_reserva','ApiController@CrearReserva');
    Route::get('cancelar_reserva/{id}','ApiController@CancelarReserva');
    Route::get('historial_reserva/{id}','ApiController@HistorialReserva');

    /**
    * Follow
    */
    Route::post('seguir_follow','ApiController@SeguirFollow');
    Route::get('ver_seguidos_follow/{id}','ApiController@SeguirVerFollow');
    Route::get('ver_seguidores_follow/{id}','ApiController@SeguidoresVerFollow');
    Route::get('cancelar_follow','ApiController@Eliminarfollow');
    Route::post('block_user','ApiController@block_user');

    /* Filter */

    Route::get('SearchFilters/{city}','ApiController@SearchFilters');

    /** * Colecciones  */
    Route::post('coleccion','ApiController@Coleccion');
    Route::get('colecciones/{id}','ApiController@Colecciones');
    Route::get('coleccion_eliminar/{id}','ApiController@ColeccionEliminar');
    Route::get('coleccion_ver/{id}','ApiController@ColeccionesVer'); 



    Route::post('asignar_coleccion','ApiController@CrearColeccion');
    Route::get('cancelar_coleccion/{id}','ApiController@CancelarColeccion');
    Route::get('historial_coleccion_asignadas/{id}','ApiController@HistorialColeccion');

    /*** Follow  */
    Route::post('follow','ApiController@FollowNegocio');
    Route::get('follownegocio/{id}','ApiController@FollowNegocioVer');
    Route::get('follow_eliminar/{id}','ApiController@FollowNegocioEliminar');

    /*** Top  */
 
    Route::get('top_restaurantes/{id}','ApiController@topRestaurantes');

    /*** Follow  */
    Route::post('reportar','ApiController@ReportarUsuario');


    /*** Recompensas  */
    Route::get('recompensa/{id}','ApiController@RecompensasUsuario');
    Route::post('dividir_recompensa','ApiController@DividirRecompensasUsuario');


  
    
    /**
     * Obtencion de informacion de negocios
     */

    Route::get('getStoreOpen/{city}','ApiController@getStoreOpen');
    Route::get('getTypeDelivery/{id}','ApiController@getTypeDelivery');
    Route::get('search/{query}/{type}/{city}','ApiController@search');
    Route::get('SearchCat/{city}','ApiController@SearchCat');
  
    Route::get('ViewAllCats','ApiController@ViewAllCats');
    Route::post('addToCart','ApiController@addToCart');
    Route::get('cartCount/{cartNo}','ApiController@cartCount');
    Route::get('updateCart/{id}/{type}','ApiController@updateCart');
    Route::get('getCart/{cartNo}','ApiController@getCart');
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
     * GiftCards
     */
    Route::get('getGiftCards','ApiController@getGiftCards');

    /**
     * Visitas
     */
    Route::get('SetNewVisitStore/{store}/{user}','ApiController@SetNewVisitStore');


    /**
     * Funciones para la encuesta  Retroalimentacion
     */
    Route::post('setSurvey','ApiController@setSurvey');

    include("dboy.php");
    include("store.php");

});
