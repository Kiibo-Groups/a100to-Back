<?php

namespace App\Models;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Auth;
use DB;
use DateTime;

class User extends Authenticatable
{
    /*
    |----------------------------------------------------------------
    |   Validation Rules and Validate data for add & Update Records
    |----------------------------------------------------------------
    */

    public function rules($type)
    {
        if ($type === "add") {
            return [

                'name'      => 'required|unique:users',
                'phone'     => 'required',
                'email'     => 'required|unique:users',
                'password'  => 'required|min:6',

            ];
        } else {
            return [

                'name'      => 'required|unique:users,name,' . $type,
                'phone'    => 'required',
                'email'     => 'required|unique:users,email,' . $type,

            ];
        }
    }

    public function validate($data, $type)
    {

        $validator = Validator::make($data, $this->rules($type));
        if ($validator->fails()) {
            return $validator;
        }
    }

    /*
    |--------------------------------
    |Create/Update user 
    |--------------------------------
    */

    public function addNew($data, $type)
    {

        $a                          = isset($data['lid']) ? array_combine($data['lid'], $data['l_name']) : [];
        $b                          = isset($data['lid']) ? array_combine($data['lid'], $data['l_address']) : [];
        $add                        = $type === 'add' ? new User : User::find($type);
        $add->name                  = isset($data['name']) ? $data['name'] : null;
        $add->phone                 = isset($data['phone']) ? $data['phone'] : null;
        $add->email                 = isset($data['email']) ? $data['email'] : null;
        $add->status                = isset($data['status']) ? $data['status'] : 0;
        $add->city_id               = isset($data['city_id']) ? $data['city_id'] : 0;
        $add->address               = isset($data['address']) ? $data['address'] : 0;
        $add->delivery_time         = isset($data['delivery_time']) ? $data['delivery_time'] : null;
        $add->person_cost           = isset($data['person_cost']) ? $data['person_cost'] : null;
        $add->Cuenta_clave          = isset($data['Cuenta_clave']) ? $data['Cuenta_clave'] : null;
        $add->banco_name            = isset($data['banco_name']) ? $data['banco_name'] : null;
        $add->lat                   = isset($data['lat']) ? $data['lat'] : null;
        $add->lng                   = isset($data['lng']) ? $data['lng'] : null;
        $add->type                  = isset($data['store_type']) ? $data['store_type'] : 0;
        $add->subtype               = isset($data['store_subtype']) ? $data['store_subtype'] : 0;
        $add->subsubtype            = isset($data['subsubtype']) ? $data['subsubtype'] : 0;
        $add->type_menu             = isset($data['type_menu']) ? $data['type_menu'] : 0;
        $add->reservation_available = isset($data['reservation_available']) ? $data['reservation_available'] : 0;
        $add->min_cart_value        = isset($data['min_cart_value']) ? $data['min_cart_value'] : null;

        $add->c_type                = isset($data['c_type']) ? $data['c_type'] : 0;
        $add->c_value               = isset($data['c_value']) ? $data['c_value'] : 0;
        $add->t_type                = isset($data['t_type']) ? $data['t_type'] : 0;
        $add->t_value               = isset($data['t_value']) ? $data['t_value'] : 0;
        $add->purse_x_table         = isset($data['purse_x_table']) ? $data['purse_x_table'] : 0;
        $add->purse_x_pickup        = isset($data['purse_x_pickup']) ? $data['purse_x_pickup'] : 0;
        $add->purse_x_delivery      = isset($data['purse_x_delivery']) ? $data['purse_x_delivery'] : 0;

        $add->reward                = isset($data['reward']) ? $data['reward'] : null;
        $add->descripcion           = isset($data['descripcion']) ? $data['descripcion'] : null;
        $add->recommendations           = isset($data['recommendations']) ? $data['recommendations'] : null;
        $add->numero_reserva        = isset($data['numero_reserva']) ? $data['numero_reserva'] : 0;
        $add->urlproductos          = isset($data['urlproductos']) ? $data['urlproductos'] : null;



        $add->p_staff               = isset($data['p_staff']) ? $data['p_staff'] : 1;
        if ($add->p_staff == 1) {
            $add->delivery_charges_value = Admin::find(1)->costs_ship;
        } else {
            $add->delivery_charges_value = isset($data['delivery_charges_value']) ? $data['delivery_charges_value'] : null;
        }

        $add->delivery_min_distance = isset($data['delivery_min_distance']) ? $data['delivery_min_distance'] : 0;
        $add->delivery_min_charges_value    = isset($data['delivery_min_charges_value']) ? $data['delivery_min_charges_value'] : 0;
        $add->type_charges_value    = isset($data['type_charges_value']) ? $data['type_charges_value'] : 1;
        $add->distance_max          = isset($data['distance_max']) ? $data['distance_max'] : 0;

        $add->s_data                = serialize([$a, $b]);

        $add->stripe_pay            = isset($data['stripe_pay']) ? $data['stripe_pay'] : 0;
        $add->service_del           = isset($data['service_del']) ? $data['service_del'] : 1;
        $add->pickup                = isset($data['pickup']) ? $data['pickup'] : 0;
        // ME MODIFICA EL public/
        if (isset($data['img'])) {
            $filename   = time() . rand(111, 699) . '.' . $data['img']->getClientOriginalExtension();
            $data['img']->move("public/upload/user/", $filename);
            $add->img = $filename;
        }
        if (isset($data['logo'])) {
            $filename   = time() . rand(111, 699) . '.' . $data['logo']->getClientOriginalExtension();
            $data['logo']->move("public/upload/user/logo/", $filename);
            $add->logo = $filename;
        }

        if (isset($data['img_discount'])) {
            $filename   = time() . rand(111, 699) . '.' . $data['img_discount']->getClientOriginalExtension();
            $data['img_discount']->move("public/upload/user_discount/", $filename);
            $add->img_discount = $filename;
        }

        if (isset($data['password'])) {
            $add->password      = bcrypt($data['password']);
            $add->shw_password  = $data['password'];
        }

        // Agregamos un arreglo con los dias laborales
        $stat_type = $type === 'add' ? 'add' : $type;
        $times = [];

        ($data['status_mon'] == 1) ? $mon = (isset($data['open_mon']) && isset($data['close_mon'])) ? $data['open_mon'] . ' - ' . $data['close_mon'] : 'closed' : $mon = 'closed';
        ($data['status_tue'] == 1) ? $tue = (isset($data['open_tue']) && isset($data['close_tue'])) ? $data['open_tue'] . ' - ' . $data['close_tue'] : 'closed' : $tue = 'closed';
        ($data['status_wed'] == 1) ? $wed = (isset($data['open_wed']) && isset($data['close_wed'])) ? $data['open_wed'] . ' - ' . $data['close_wed'] : 'closed' : $wed = 'closed';
        ($data['status_thu'] == 1) ? $thu = (isset($data['open_thu']) && isset($data['close_thu'])) ? $data['open_thu'] . ' - ' . $data['close_thu'] : 'closed' : $thu = 'closed';
        ($data['status_fri'] == 1) ? $fri = (isset($data['open_fri']) && isset($data['close_fri'])) ? $data['open_fri'] . ' - ' . $data['close_fri'] : 'closed' : $fri = 'closed';
        ($data['status_sat'] == 1) ? $sat = (isset($data['open_sat']) && isset($data['close_sat'])) ? $data['open_sat'] . ' - ' . $data['close_sat'] : 'closed' : $sat = 'closed';
        ($data['status_sun'] == 1) ? $sun = (isset($data['open_sun']) && isset($data['close_sun'])) ? $data['open_sun'] . ' - ' . $data['close_sun'] : 'closed' : $sun = 'closed';


        array_push($times, [
            'mon' => $mon,
            'tue' => $tue,
            'wed' => $wed,
            'thu' => $thu,
            'fri' => $fri,
            'sat' => $sat,
            'sun' => $sun,
        ]);


        $add->saldo   = 0; // Valor por defecto para guardar.
        $add->save();

        if ($type == 'add') {
            // Creamos el QR
            $link_qr        = "https://a100to.web.app/item?store=" . substr(md5($add->name), 0, 15) . "&id=" . $add->id;
            $codeQR         = base64_encode(QrCode::format('png')->size(200)->generate($link_qr));

            $add->qr_code   = $codeQR;
            $add->save();
        }

        //Add Times Week
        $op_times = new Opening_times;
        $op_times->addNew($times, $add->id);

        $gallery = new UserImage;
        $gallery->addNew($data, $add->id);


        $social = new SocialesNegocios();

        $social->addNew($data, $add->id);
    }

    public function updateMap($data, $id)
    {
        $store = User::find($id);

        if ($store) {
            $store->address               = isset($data['address']) ? $data['address'] : 0;
            $store->lat                   = isset($data['lat']) ? $data['lat'] : null;
            $store->lng                   = isset($data['lng']) ? $data['lng'] : null;

            $store->save();
        }

        return true;
    }

    /*
    |--------------------------------------
    |Get all data from db
    |--------------------------------------
    */
    public function getAll($city_id = 0)
    {
        return User::where(function ($query) use ($city_id) {
            if ($city_id > 0) {
                $query->where('users.city_id', $city_id);
            }
        })->join('city', 'users.city_id', '=', 'city.id')
            ->leftjoin('categorystore', 'users.type', '=', 'categorystore.id')
            ->select('categorystore.name as Cat', 'users.*', 'city.name as city')
            ->orderBy('users.id', 'DESC')->get();
    }

    public function getAppData($city_id, $trending = false)
    {

        $lat        = isset($_GET['lat']) ? $_GET['lat'] : 0;
        $lon        = isset($_GET['lng']) ? $_GET['lng'] : 0;
        $cat        = isset($_GET['cat']) ? $_GET['cat'] : 0;

        $res  = User::where(function ($query) use ($city_id, $trending, $cat) {

            $query->where('status', 0)->where('city_id', $city_id);

            if (isset($_GET['banner'])) {
                $sid   = BannerStore::where('banner_id', $_GET['banner'])->pluck('store_id')->toArray();

                $query->whereIn('users.id', $sid);
            }

            // Obtenemos las categorias
            if ($cat == 0) {
                //$get_c = CategoryStore::pluck('id')->toArray();
            } else {
                $get_c = CategoryStore::where('type_cat', 2)->where('id_c', $cat)->pluck('id')->toArray();

                $query->whereIn('users.subsubtype', $get_c);
            }
        })->select('users.*', DB::raw("6371 * acos(cos(radians(" . $lat . ")) 
                * cos(radians(users.lat)) 
                * cos(radians(users.lng) - radians(" . $lon . ")) 
                + sin(radians(" . $lat . ")) 
                * sin(radians(users.lat))) AS distance"))
            ->orderBy('id', 'DESC')->skip(0)->take(100)->get();


        return $this->SaveData($res, $lat, $lon);
    }

    public function InTrending($city_id)
    {
        $lat        = isset($_GET['lat']) ? $_GET['lat'] : 0;
        $lon        = isset($_GET['lng']) ? $_GET['lng'] : 0;
        $res        = User::where(function ($query) use ($city_id) {

            $query->where('status', 0)->where('city_id', $city_id);

            $query->where('users.trending', 1);
        })->select('users.*', DB::raw("6371 * acos(cos(radians(" . $lat . ")) 
            * cos(radians(users.lat)) 
            * cos(radians(users.lng) - radians(" . $lon . ")) 
            + sin(radians(" . $lat . ")) 
            * sin(radians(users.lat))) AS distance"))
            ->orderBy('id', 'DESC')->get();


        return $this->SaveData($res, $lat, $lon);
    }


    function getUser($val, $type, $city_id)
    {

        $currency   = Admin::find(1)->currency;
        $lat        = isset($_GET['lat']) ? $_GET['lat'] : 0;
        $lon        = isset($_GET['lng']) ? $_GET['lng'] : 0;

        $res  = User::where(function ($query) use ($city_id, $val) {

            $query->where('status', 0)->where('city_id', $city_id);

            if (isset($val)) {
                $q   = $val;
                $query->whereRaw('lower(name) like "%' . strtolower($q) . '%"');
            }
        })->select('users.*', DB::raw("6371 * acos(cos(radians(" . $lat . ")) 
                * cos(radians(users.lat)) 
                * cos(radians(users.lng) - radians(" . $lon . ")) 
                + sin(radians(" . $lat . ")) 
                * sin(radians(users.lat))) AS distance"))
            ->orderBy('id', 'DESC')->get();

        return $this->SaveData($res, $lat, $lon);
    }

    public function getStoreOpen($city_id, $trending = false)
    {
        $currency   = Admin::find(1)->currency;
        $lat        = isset($_GET['lat']) ? $_GET['lat'] : 0;
        $lon        = isset($_GET['lng']) ? $_GET['lng'] : 0;

        $res  = User::where(function ($query) use ($city_id, $trending) {

            $query->where('status', 0)->where('city_id', $city_id);

            if ($trending) {
                $query->where('users.trending', 1);
            }

            if (isset($_GET['banner'])) {
                $sid   = BannerStore::where('banner_id', $_GET['banner'])->pluck('store_id')->toArray();

                $query->whereIn('users.id', $sid);
            }

            if (isset($_GET['q'])) {
                $q   = $_GET['q'];
                $ids = Item::whereRaw('lower(name) like "%' . strtolower($q) . '%"')->pluck('store_id')->toArray();

                if (count($ids) > 0) {
                    $query->whereIn('users.id', $ids);
                }

                $query->whereRaw('lower(name) like "%' . strtolower($q) . '%"');
            }
        })->select('users.*', DB::raw("6371 * acos(cos(radians(" . $lat . ")) 
                * cos(radians(users.lat)) 
                * cos(radians(users.lng) - radians(" . $lon . ")) 
                + sin(radians(" . $lat . ")) 
                * sin(radians(users.lat))) AS distance"))
            ->orderBy('id', 'DESC')->get();

        return $this->SaveData($res, $lat, $lon);
    }
    public function GetAllStores($city_id)
    {
        $currency   = Admin::find(1)->currency;
        $lat        = isset($_GET['lat']) ? $_GET['lat'] : 0;
        $lon        = isset($_GET['lng']) ? $_GET['lng'] : 0;
        $init       = isset($_GET['init']) ? $_GET['init'] : 0;

        $res  = User::where(function ($query) use ($city_id) {

            $query->where('status', 0)->where('city_id', $city_id);
        })->select('users.*', DB::raw("6371 * acos(cos(radians(" . $lat . ")) 
                * cos(radians(users.lat)) 
                * cos(radians(users.lng) - radians(" . $lon . ")) 
                + sin(radians(" . $lat . ")) 
                * sin(radians(users.lat))) AS distance"))
            ->orderBy('id', 'DESC')->get();
        // ->skip($init)->take(5)

        return $this->SaveData($res, $lat, $lon);
    }

    public function getStore($id)
    {
        $currency   = Admin::find(1)->currency;
        $lat        = isset($_GET['lat']) ? $_GET['lat'] : 0;
        $lon        = isset($_GET['lng']) ? $_GET['lng'] : 0;
        $user_id    = isset($_GET['user_id']) ? $_GET['user_id'] : 0;

        $res  = User::where('id', $id)->select('users.*', DB::raw("6371 * acos(cos(radians(" . $lat . ")) 
                * cos(radians(users.lat)) 
                * cos(radians(users.lng) - radians(" . $lon . ")) 
                + sin(radians(" . $lat . ")) 
                * sin(radians(users.lat))) AS distance"))
            ->orderBy('id', 'DESC')->get();

        $data = [];

        foreach ($res as $row) {
            $admin = Admin::find(1);

            /****** Function IsClose or IsOpen ******************/
            $op_time      = new Opening_times;

            if ($row->open == false) {
                $open          = ($op_time->ViewTime($row->id)['status'] != 0) ? true : false;
            } else {
                $open = false;
            }
            /****** Function IsClose or IsOpen ******************/

            /****** Favorites ******/
            $chk_favs = Favorites::where('store_id', $row->id)->where('user_id', $user_id)->first();
            if ($chk_favs) {
                $favorite = true;
            } else {
                $favorite = false;
            }
            /****** Favorites ******/

            /****** Obtenemos las visitas *******/
            // $visits = Visits::where('user_id',$user_id)->where('store_id',$id)->first();
            /****** Obtenemos las visitas *******/



            /****** Rating *******/
            $totalRate    = FeedSurvey::where('id_negocio', $row->id)->count();
            $totalRateSum = FeedSurvey::where('id_negocio', $row->id)->sum('rating');

            $avg           = 0;

            if ($totalRate > 0) {
                $avg          = $totalRateSum / $totalRate;
            }
            /****** Rating *******/

            /****** Validamos si el negocios es nuevo *******/
            $user_time = new DateTime($row->created_at); // Tiempo de registro
            $query_time = new DateTime(date("H:i")); // Tiempo de hoy
            $diff = $user_time->diff($query_time); // Diferencia
            $isNew = false;

            if ($diff->days <= 15) { // El negocio aun tiene 15 dias de registro se considera NUEVO
                $isNew = true;
            }



            /* CashBack   */

            $cashback = Schedule::where('store_id', $row->id)
            ->where('status', 0)
            ->get();

            $cashback = $cashback->sortBy(function ($schedule) {
                return $schedule->hora->name;
            });

            $cashDay = BlockedDay::where('store_id', $row->id)->get();
            $arrayCash = [];

            foreach ($cashback as $cash) {
                $arrayCash[] = array(
                    'dia' => $cash->day->name,
                    'valor' => $cash->per,
                    'hora'  => date('h:i  A', strtotime($cash->hora->name)),
                    'status' => $cash->status
                );
            }

            $times = new Opening_times;
            /****** Validamos si el negocios es nuevo *******/
            $data = [
                'id'            => $row->id,
                'title'         => $this->getLang($row->id)['name'],
                'img'           => Asset('upload/user/' . $row->img),
                'logo'          => Asset('upload/user/logo/' . $row->logo),
                'address'       => $this->getLang($row->id)['address'],
                'lat'           => $this->getLang($row->id)['lat'],
                'lng'           => $this->getLang($row->id)['lng'],
                'open'          => $open,
                'isNew'         => $isNew,
                'reservation_available' => $row->reservation_available,
                'type_menu'     => $row->type_menu,
                'trending'      => $row->trending,
                'phone'         => $row->phone,
                'rating'        => $avg > 0 ? number_format($avg, 1) : '0.0',
                'images'        => $this->userImages($row->id),
                'ratings'       => $this->getRating($row->id),
                'person_cost'   => $row->person_cost,
                'delivery_time' => $row->delivery_time,
                'type'          => CategoryStore::find($row->type)->name,
                'subtype'       => $row->subtype,
                'currency'      => $currency,
                'items'         => $this->menuItem($row->id, $row->c_type, $row->c_value),
                'items_trend'   => $this->menuTrend($row->id),
                'km'            => round($row->distance, 2),
                'favorite'      => $favorite,
                'reward'        => $row->reward,
                'descripcion'   => $row->descripcion,
                'recommendations' => $row->recommendations,
                'urlproductos'  => $row->urlproductos,
                'cashback'      => $arrayCash,
                'cashday'       => $cashDay,
                'times'         => $times->getAllApi($row->id),
            ];
        }

        return $data;
    }

    function SearchCat($city_id)
    {
        $currency   = Admin::find(1)->currency;
        $lat        = isset($_GET['lat']) ? $_GET['lat'] : 0;
        $lon        = isset($_GET['lng']) ? $_GET['lng'] : 0;
        $user_id    = isset($_GET['user_id']) ? $_GET['user_id'] : 0;

        $res  = User::where(function ($query) use ($city_id) {

            $query->where('status', 0)->where('city_id', $city_id);

            if (isset($_GET['cat'])) {
                $query->where('subsubtype', $_GET['cat']);
            }
        })->select('users.*', DB::raw("6371 * acos(cos(radians(" . $lat . ")) 
        * cos(radians(users.lat)) 
        * cos(radians(users.lng) - radians(" . $lon . ")) 
        + sin(radians(" . $lat . ")) 
        * sin(radians(users.lat))) AS distance"))
            ->orderBy('id', 'DESC')->get();

        $data = [];
        $open_store = [];
        $close_store = [];

        foreach ($res as $row) {
            $admin = Admin::find(1);

            /****** Function IsClose or IsOpen ******************/
            $op_time      = new Opening_times;

            if ($row->open == false) {
                $open          = ($op_time->ViewTime($row->id)['status'] != 0) ? true : false;
            } else {
                $open = false;
            }
            $time        = $op_time->ViewTime($row->id)['Time'];
            $opening_day = $op_time->ViewTime($row->id)['w_close'];
            /****** Function IsClose or IsOpen ******************/

            $totalRate    = FeedSurvey::where('id_negocio', $row->id)->count();
            $totalRateSum = FeedSurvey::where('id_negocio', $row->id)->sum('rating');

            if ($totalRate > 0) {
                $avg          = $totalRateSum / $totalRate;
            } else {
                $avg           = 0;
            }

            /****** Favorites ******/
            $chk_favs = Favorites::where('store_id', $row->id)->where('user_id', $user_id)->first();
            if ($chk_favs) {
                $favorite = true;
            } else {
                $favorite = false;
            }
            /****** Favorites ******/

            /****** Validamos si el negocios es nuevo *******/
            $user_time = new DateTime($row->created_at); // Tiempo de registro
            $query_time = new DateTime(date("H:i")); // Tiempo de hoy
            $diff = $user_time->diff($query_time); // Diferencia
            $isNew = false;

            if ($diff->days <= 15) { // El negocio aun tiene 15 dias de registro se considera NUEVO
                $isNew = true;
            }
            /****** Validamos si el negocios es nuevo *******/

            if ($open == true) {
                $open_store[] = [
                    'id'            => $row->id,
                    'title'         => $this->getLang($row->id)['name'],
                    'img'           => Asset('upload/user/' . $row->img),
                    'logo'           => Asset('upload/user/logo/' . $row->logo),
                    'address'       => $this->getLang($row->id)['address'],
                    'open'          => $open,
                    'rating'        => $avg > 0 ? number_format($avg, 1) : '0.0',
                    'person_cost'   => $row->person_cost,
                    'delivery_time' => $row->delivery_time,
                    'type'          => CategoryStore::find($row->type)->name,
                    'subtype'       => $row->subtype,
                    'km'            => round($row->distance, 2),
                    'favorite'      => $favorite
                ];
            } else {
                $close_store[] = [
                    'id'            => $row->id,
                    'title'         => $this->getLang($row->id)['name'],
                    'img'           => Asset('upload/user/' . $row->img),
                    'logo'           => Asset('upload/user/logo/' . $row->logo),
                    'address'       => $this->getLang($row->id)['address'],
                    'open'          => $open,
                    'isNew'         => $isNew,
                    'reservation_available' => $row->reservation_available,
                    'rating'        => $avg > 0 ? number_format($avg, 1) : '0.0',
                    'person_cost'   => $row->person_cost,
                    'delivery_time' => $row->delivery_time,
                    'type'          => CategoryStore::find($row->type)->name,
                    'subtype'       => $row->subtype,
                    'km'            => round($row->distance, 2),
                    'favorite'      => $favorite
                ];
            }
        }


        if (count($close_store) > 0) {
            foreach ($close_store as $row) {
                $data = $close_store;
            }
        }

        if (count($open_store) > 0) {
            foreach ($open_store as $row) {
                array_unshift($data, $row);
            }
        }


        return $data;
    }

    function SearchFilters($city_id)
    {
        $distance_max       = isset($_GET['distance_max']) ? $_GET['distance_max'] : 45;

        $type_filter        = isset($_GET['filter']) ? $_GET['filter'] : 0;
        $status_store       = isset($_GET['status']) ? $_GET['status'] : false;
        $distance_status    = isset($_GET['distance_status']) ? $_GET['distance_status'] : 1;
        $time_prep          = isset($_GET['time_prep']) ? $_GET['time_prep'] : '0';
        $prices             = isset($_GET['prices']) ? $_GET['prices'] : 0;
        $ratings            = isset($_GET['ratings']) ? $_GET['ratings'] : 0;

        $user_id            = isset($_GET['user_id']) ? $_GET['user_id'] : 0;
        $lat                = isset($_GET['lat']) ? $_GET['lat'] : 0;
        $lon                = isset($_GET['lng']) ? $_GET['lng'] : 0;

        $id_sociales        = isset($_GET['id_sociales']) ? $_GET['id_sociales'] : 0;
        $reembolso          = isset($_GET['reembolso']) ? $_GET['reembolso'] : 0;

        if ($reembolso  != 0) {
        list($menor, $mayor) = explode("-", $reembolso);
        }
        $menorRango = $menor ?? 0;
        $mayorRango = $mayor ?? 0;


        $precios          = isset($_GET['precios']) ? $_GET['precios'] : 0;
        
        if ( $precios >= 1000) {
            $menorPrecio =  $precios ;
            $mayorPrecio =  0;
        } else {
            if ($precios != 0) {
                list($menorP, $mayorP) = explode("-", $precios);
            }
            $menorPrecio = $menorP ?? 0;
            $mayorPrecio = $mayorP ?? 0;
        }
        
       

  
        $res = User::where('status', 0)->where('city_id', $city_id);

        if ($mayorPrecio != 0) {

            $res  =  $res->whereBetween('reward', [$menorRango, $mayorRango]);
        }


        if ($menorPrecio >= 1000) {
            $res = $res->where('person_cost', '>=', $menorPrecio);
        } else {
            if ($mayorPrecio != 0) {
                $res = $res->whereBetween('person_cost', [$menorPrecio, $mayorPrecio]);
            }
        }
            
        if ($lat != 0 && $lon != 0) {
            $res =$res->select('users.*', DB::raw("6371 * acos(cos(radians(" . $lat . ")) 
        * cos(radians(users.lat)) 
        * cos(radians(users.lng) - radians(" . $lon . ")) 
        + sin(radians(" . $lat . ")) 
        * sin(radians(users.lat))) AS distance"));
        }

        $res = $res->orderBy('id', 'DESC')->get();

        $data = [];
        $open_store = [];
        $close_store = [];
        
        foreach ($res as $row) {
            //dump($row);

            $socialarray  = SocialesNegocios::where('social_id', $row->id);

            if ($id_sociales) {
                $array_sociales = explode(",", $id_sociales);
                
                $socialarray  = $socialarray->whereIn('store_id', $array_sociales);
            }

            $socialarray =  $socialarray->count();

           
            if ($socialarray >= 1) {
             
               

                /****** Funcion para validar si el comercio esta abierto ******************/
                $op_time      = new Opening_times();

                if ($row->open == false) {
                    $open          = ($op_time->ViewTime($row->id)['status'] != 0) ? true : false;
                } else {
                    $open = false;
                }
                /****** Funcion para validar si el comercio esta abierto ******************/

                /****** Funcion para Obtener Ratings y Calificaciones *******/
                $totalRate    = FeedSurvey::where('id_negocio', $row->id)->count();
                $totalRateSum = FeedSurvey::where('id_negocio', $row->id)->sum('rating');

                if ($totalRate > 0) {
                    $avg          = $totalRateSum / $totalRate;
                } else {
                    $avg           = 0;
                }
                /****** Funcion para Obtener Ratings y Calificaciones *******/

                /****** Favorites ******/
                $chk_favs = Favorites::where('store_id', $row->id)->where('user_id', $user_id)->first();
                if ($chk_favs) {
                    $favorite = true;
                } else {
                    $favorite = false;
                }
                /****** Favorites ******/

                /****** Validamos si el negocios es nuevo *******/
                $user_time = new DateTime($row->created_at); // Tiempo de registro
                $query_time = new DateTime(date("H:i")); // Tiempo de hoy
                $diff = $user_time->diff($query_time); // Diferencia
                $isNew = false;

                if ($diff->days <= 15) { // El negocio aun tiene 15 dias de registro se considera NUEVO
                    $isNew = true;
                }

                /* Causas Sociales   */


                $social  = SocialesNegocios::where('social_id', $row->id)->get();

                $arraySocial = [];

                foreach ($social as $soc) {
                    $arraySocial[] = array(
                        'nombre' => $soc->NombreSocial->nombre,
                        'id' => $soc->NombreSocial->id,
                    );
                }

                /* CashBack   */


                $cashback  = Cashback::where('store_id', $row->id)->where('status', 0)->get();

                $arrayCash = [];

                foreach ($cashback as $cash) {
                    $arrayCash[] = array(
                        'valor' => $cash->cashback,
                        'hora'  => date('h:i  A', strtotime($cash->hora)),
                    );
                }

                $times = new Opening_times;

                /****** Validamos si el negocios es nuevo *******/

                /****** Filtros de distancia y tipo de negocio *********/
                if ($status_store == "true") {

                    // Agregamos solo comercios abiertos
                    if ($open) {

                        if ($distance_max == 6) { // distancia mayor a 6km = todos los comercios
                            if ($type_filter == 0) { // Mas Recientes
                                $data[] = [
                                    'id'            => $row->id,
                                    'title'         => $this->getLang($row->id)['name'],
                                    'img'           => Asset('upload/user/' . $row->img),
                                    'logo'           => Asset('upload/user/logo/' . $row->logo),
                                    'address'       => $this->getLang($row->id)['address'],
                                    'open'          => $open,
                                    'isNew'         => $isNew,
                                    'reservation_available' => $row->reservation_available,
                                    'numero_reserva' => $row->numero_reserva,
                                    'rating'        => $avg > 0 ? number_format($avg, 1) : '0.0',
                                    'delivery_time' => $row->delivery_time,
                                    'type'          => CategoryStore::find($row->type)->name,
                                    'subtype'       => $row->subtype,
                                    'delivery_type' => $row->service_del,
                                    'lat'           => $row->lat,
                                    'lng'           => $row->lng,
                                    'km'            => round($row->distance, 2),
                                    'favorite'      => $favorite,
                                    'reward'        => $row->reward,
                                    'descripcion'   => $row->descripcion,
                                    'c_social'      => $arraySocial,
                                    'cashback'      => $arrayCash,
                                    'times'         => $times->getAllApi($row->id),
                                ];
                            } elseif ($type_filter == 4) { // Con Ofertas
                                // Realizamos una busqueda en la tabla de ofertas
                                $offers = Offer::where("store_id", $row->id)->get();
                                if ($offers->count() > 0) { // el comercio tiene ofertas
                                    $data[] = [
                                        'id'            => $row->id,
                                        'title'         => $this->getLang($row->id)['name'],
                                        'img'           => Asset('upload/user/' . $row->img),
                                        'logo'           => Asset('upload/user/logo/' . $row->logo),
                                        'address'       => $this->getLang($row->id)['address'],
                                        'open'          => $open,
                                        'isNew'         => $isNew,
                                        'reservation_available' => $row->reservation_available,
                                        'numero_reserva' => $row->numero_reserva,
                                        'rating'        => $avg > 0 ? number_format($avg, 1) : '0.0',
                                        'delivery_time' => $row->delivery_time,
                                        'type'          => CategoryStore::find($row->type)->name,
                                        'subtype'       => $row->subtype,
                                        'delivery_type' => $row->service_del,
                                        'lat'           => $row->lat,
                                        'lng'           => $row->lng,
                                        'km'            => round($row->distance, 2),
                                        'favorite'      => $favorite,
                                        'reward'        => $row->reward,
                                        'descripcion'   => $row->descripcion,
                                        'c_social'      => $arraySocial,
                                        'cashback'      => $arrayCash,
                                        'times'         => $times->getAllApi($row->id),
                                    ];
                                }
                            } elseif ($type_filter == 5) { // en tendencia
                                if ($row->trending) {
                                    $data[] = [
                                        'id'            => $row->id,
                                        'title'         => $this->getLang($row->id)['name'],
                                        'img'           => Asset('upload/user/' . $row->img),
                                        'logo'           => Asset('upload/user/logo/' . $row->logo),
                                        'address'       => $this->getLang($row->id)['address'],
                                        'open'          => $open,
                                        'isNew'         => $isNew,
                                        'reservation_available' => $row->reservation_available,
                                        'numero_reserva' => $row->numero_reserva,
                                        'rating'        => $avg > 0 ? number_format($avg, 1) : '0.0',
                                        'delivery_time' => $row->delivery_time,
                                        'type'          => CategoryStore::find($row->type)->name,
                                        'subtype'       => $row->subtype,
                                        'delivery_type' => $row->service_del,
                                        'lat'           => $row->lat,
                                        'lng'           => $row->lng,
                                        'km'            => round($row->distance, 2),
                                        'favorite'      => $favorite,
                                        'reward'        => $row->reward,
                                        'descripcion'   => $row->descripcion,
                                        'c_social'      => $arraySocial,
                                        'cashback'      => $arrayCash,
                                        'times'         => $times->getAllApi($row->id),
                                    ];
                                }
                            } else {
                                $data[] = [
                                    'id'            => $row->id,
                                    'title'         => $this->getLang($row->id)['name'],
                                    'img'           => Asset('upload/user/' . $row->img),
                                    'logo'           => Asset('upload/user/logo/' . $row->logo),
                                    'address'       => $this->getLang($row->id)['address'],
                                    'open'          => $open,
                                    'isNew'         => $isNew,
                                    'reservation_available' => $row->numero_reserva,
                                    'rating'        => $avg > 0 ? number_format($avg, 1) : '0.0',
                                    'delivery_time' => $row->delivery_time,
                                    'type'          => CategoryStore::find($row->type)->name,
                                    'subtype'       => $row->subtype,
                                    'delivery_type' => $row->service_del,
                                    'lat'           => $row->lat,
                                    'lng'           => $row->lng,
                                    'km'            => round($row->distance, 2),
                                    'favorite'      => $favorite,
                                    'reward'        => $row->reward,
                                    'descripcion'   => $row->descripcion,
                                    'c_social'      => $arraySocial,
                                    'cashback'      => $arrayCash,
                                    'times'         => $times->getAllApi($row->id),
                                ];
                            }
                        } else { // Aplicamos condicional sobre la distancia minima
                            if ($row->distance <= $distance_max) {
                                if ($type_filter == 0) { // Mas Recientes
                                    $data[] = [
                                        'id'            => $row->id,
                                        'title'         => $this->getLang($row->id)['name'],
                                        'img'           => Asset('upload/user/' . $row->img),
                                        'logo'           => Asset('upload/user/logo/' . $row->logo),
                                        'address'       => $this->getLang($row->id)['address'],
                                        'open'          => $open,
                                        'isNew'         => $isNew,
                                        'reservation_available' => $row->reservation_available,
                                        'numero_reserva' => $row->numero_reserva,
                                        'rating'        => $avg > 0 ? number_format($avg, 1) : '0.0',
                                        'delivery_time' => $row->delivery_time,
                                        'type'          => CategoryStore::find($row->type)->name,
                                        'subtype'       => $row->subtype,
                                        'delivery_type' => $row->service_del,
                                        'lat'           => $row->lat,
                                        'lng'           => $row->lng,
                                        'km'            => round($row->distance, 2),
                                        'favorite'      => $favorite,
                                        'reward'        => $row->reward,
                                        'descripcion'   => $row->descripcion,
                                        'c_social'      => $arraySocial,
                                        'cashback'      => $arrayCash,
                                        'times'         => $times->getAllApi($row->id),
                                    ];
                                } elseif ($type_filter == 4) { // Con Ofertas
                                    // Realizamos una busqueda en la tabla de ofertas
                                    $offers = Offer::where("store_id", $row->id)->get();
                                    if ($offers->count() > 0) { // el comercio tiene ofertas
                                        $data[] = [
                                            'id'            => $row->id,
                                            'title'         => $this->getLang($row->id)['name'],
                                            'img'           => Asset('upload/user/' . $row->img),
                                            'logo'           => Asset('upload/user/logo/' . $row->logo),
                                            'address'       => $this->getLang($row->id)['address'],
                                            'open'          => $open,
                                            'isNew'         => $isNew,
                                            'reservation_available' => $row->numero_reserva,
                                            'rating'        => $avg > 0 ? number_format($avg, 1) : '0.0',
                                            'delivery_time' => $row->delivery_time,
                                            'type'          => CategoryStore::find($row->type)->name,
                                            'subtype'       => $row->subtype,
                                            'delivery_type' => $row->service_del,
                                            'lat'           => $row->lat,
                                            'lng'           => $row->lng,
                                            'km'            => round($row->distance, 2),
                                            'favorite'      => $favorite,
                                            'reward'        => $row->reward,
                                            'descripcion'   => $row->descripcion,
                                            'c_social'      => $arraySocial,
                                            'cashback'      => $arrayCash,
                                            'times'         => $times->getAllApi($row->id),
                                        ];
                                    }
                                } elseif ($type_filter == 5) { // en tendencia
                                    if ($row->trending) {
                                        $data[] = [
                                            'id'            => $row->id,
                                            'title'         => $this->getLang($row->id)['name'],
                                            'img'           => Asset('upload/user/' . $row->img),
                                            'logo'           => Asset('upload/user/logo/' . $row->logo),
                                            'address'       => $this->getLang($row->id)['address'],
                                            'open'          => $open,
                                            'isNew'         => $isNew,
                                            'reservation_available' => $row->reservation_available,
                                            'numero_reserva' => $row->numero_reserva,
                                            'rating'        => $avg > 0 ? number_format($avg, 1) : '0.0',
                                            'delivery_time' => $row->delivery_time,
                                            'type'          => CategoryStore::find($row->type)->name,
                                            'subtype'       => $row->subtype,
                                            'delivery_type' => $row->service_del,
                                            'lat'           => $row->lat,
                                            'lng'           => $row->lng,
                                            'km'            => round($row->distance, 2),
                                            'favorite'      => $favorite,
                                            'reward'        => $row->reward,
                                            'descripcion'   => $row->descripcion,
                                            'c_social'      => $arraySocial,
                                            'cashback'      => $arrayCash,
                                            'times'         => $times->getAllApi($row->id),
                                        ];
                                    }
                                } else {
                                    $data[] = [
                                        'id'            => $row->id,
                                        'title'         => $this->getLang($row->id)['name'],
                                        'img'           => Asset('upload/user/' . $row->img),
                                        'logo'           => Asset('upload/user/logo/' . $row->logo),
                                        'address'       => $this->getLang($row->id)['address'],
                                        'open'          => $open,
                                        'isNew'         => $isNew,
                                        'reservation_available' => $row->numero_reserva,
                                        'rating'        => $avg > 0 ? number_format($avg, 1) : '0.0',
                                        'delivery_time' => $row->delivery_time,
                                        'type'          => CategoryStore::find($row->type)->name,
                                        'subtype'       => $row->subtype,
                                        'delivery_type' => $row->service_del,
                                        'lat'           => $row->lat,
                                        'lng'           => $row->lng,
                                        'km'            => round($row->distance, 2),
                                        'favorite'      => $favorite,
                                        'reward'        => $row->reward,
                                        'descripcion'   => $row->descripcion,
                                        'c_social'      => $arraySocial,
                                        'cashback'      => $arrayCash,
                                        'times'         => $times->getAllApi($row->id),
                                    ];
                                }
                            }
                        }
                    }
                } else {                  
                    // Agregamos todo tipo de comercios
                  
                    if ($distance_max == 6) { // distancia mayor a 6km = todos los comercios
                      

                        if ($type_filter == 0) { // Mas Recientes
                            $data[] = [
                                'id'            => $row->id,
                                'title'         => $this->getLang($row->id)['name'],
                                'img'           => Asset('upload/user/' . $row->img),
                                'logo'           => Asset('upload/user/logo/' . $row->logo),
                                'address'       => $this->getLang($row->id)['address'],
                                'open'          => $open,
                                'isNew'         => $isNew,
                                'reservation_available' => $row->reservation_available,
                                'numero_reserva' => $row->numero_reserva,
                                'rating'        => $avg > 0 ? number_format($avg, 1) : '0.0',
                                'delivery_time' => $row->delivery_time,
                                'type'          => CategoryStore::find($row->type)->name,
                                'subtype'       => $row->subtype,
                                'delivery_type' => $row->service_del,
                                'lat'           => $row->lat,
                                'lng'           => $row->lng,
                                'km'            => round($row->distance, 2),
                                'favorite'      => $favorite,
                                'reward'        => $row->reward,
                                'descripcion'   => $row->descripcion,
                                'c_social'      => $arraySocial,
                                'cashback'      => $arrayCash,
                                'times'         => $times->getAllApi($row->id),
                            ];
                        } elseif ($type_filter == 4) { // Con Ofertas
                            // Realizamos una busqueda en la tabla de ofertas
                            $offers = Offer::where("store_id", $row->id)->get();
                            if ($offers->count() > 0) { // el comercio tiene ofertas
                                $data[] = [
                                    'id'            => $row->id,
                                    'title'         => $this->getLang($row->id)['name'],
                                    'img'           => Asset('upload/user/' . $row->img),
                                    'logo'           => Asset('upload/user/logo/' . $row->logo),
                                    'address'       => $this->getLang($row->id)['address'],
                                    'open'          => $open,
                                    'isNew'         => $isNew,
                                    'reservation_available' => $row->reservation_available,
                                    'numero_reserva' => $row->numero_reserva,
                                    'rating'        => $avg > 0 ? number_format($avg, 1) : '0.0',
                                    'delivery_time' => $row->delivery_time,
                                    'type'          => CategoryStore::find($row->type)->name,
                                    'subtype'       => $row->subtype,
                                    'delivery_type' => $row->service_del,
                                    'lat'           => $row->lat,
                                    'lng'           => $row->lng,
                                    'km'            => round($row->distance, 2),
                                    'favorite'      => $favorite,
                                    'reward'        => $row->reward,
                                    'descripcion'   => $row->descripcion,
                                    'c_social'      => $arraySocial,
                                    'cashback'      => $arrayCash,
                                    'times'         => $times->getAllApi($row->id),
                                ];
                            }
                        } elseif ($type_filter == 5) { // en tendencia
                            if ($row->trending) {
                                $data[] = [
                                    'id'            => $row->id,
                                    'title'         => $this->getLang($row->id)['name'],
                                    'img'           => Asset('upload/user/' . $row->img),
                                    'logo'           => Asset('upload/user/logo/' . $row->logo),
                                    'address'       => $this->getLang($row->id)['address'],
                                    'open'          => $open,
                                    'isNew'         => $isNew,
                                    'reservation_available' => $row->reservation_available,
                                    'numero_reserva' => $row->numero_reserva,
                                    'rating'        => $avg > 0 ? number_format($avg, 1) : '0.0',
                                    'delivery_time' => $row->delivery_time,
                                    'type'          => CategoryStore::find($row->type)->name,
                                    'subtype'       => $row->subtype,
                                    'delivery_type' => $row->service_del,
                                    'lat'           => $row->lat,
                                    'lng'           => $row->lng,
                                    'km'            => round($row->distance, 2),
                                    'favorite'      => $favorite,
                                    'reward'        => $row->reward,
                                    'descripcion'   => $row->descripcion,
                                    'c_social'      => $arraySocial,
                                    'cashback'      => $arrayCash,
                                    'times'         => $times->getAllApi($row->id),
                                ];
                            }
                        } else {
                            $data[] = [
                                'id'            => $row->id,
                                'title'         => $this->getLang($row->id)['name'],
                                'img'           => Asset('upload/user/' . $row->img),
                                'logo'           => Asset('upload/user/logo/' . $row->logo),
                                'address'       => $this->getLang($row->id)['address'],
                                'open'          => $open,
                                'isNew'         => $isNew,
                                'reservation_available' => $row->numero_reserva,
                                'rating'        => $avg > 0 ? number_format($avg, 1) : '0.0',
                                'delivery_time' => $row->delivery_time,
                                'type'          => CategoryStore::find($row->type)->name,
                                'subtype'       => $row->subtype,
                                'delivery_type' => $row->service_del,
                                'lat'           => $row->lat,
                                'lng'           => $row->lng,
                                'km'            => round($row->distance, 2),
                                'favorite'      => $favorite,
                                'reward'        => $row->reward,
                                'descripcion'   => $row->descripcion,
                                'c_social'      => $arraySocial,
                                'cashback'      => $arrayCash,
                                'times'         => $times->getAllApi($row->id),
                            ];
                        }
                    } else { 
                        // Aplicamos condicional sobre la distancia minima

                       // dump($socialarray);
                       // dump($row->distance.'$row->distance');
                       // dump($distance_max.'$distance_max');
                        if ($row->distance <= $distance_max) {
                           
                            if ($type_filter == 0) { // Mas Recientes
                                $data[] = [
                                    'id'            => $row->id,
                                    'title'         => $this->getLang($row->id)['name'],
                                    'img'           => Asset('upload/user/' . $row->img),
                                    'logo'           => Asset('upload/user/logo/' . $row->logo),
                                    'address'       => $this->getLang($row->id)['address'],
                                    'open'          => $open,
                                    'isNew'         => $isNew,
                                    'reservation_available' => $row->reservation_available,
                                    'numero_reserva' => $row->numero_reserva,
                                    'rating'        => $avg > 0 ? number_format($avg, 1) : '0.0',
                                    'delivery_time' => $row->delivery_time,
                                    'type'          => CategoryStore::find($row->type)->name,
                                    'subtype'       => $row->subtype,
                                    'delivery_type' => $row->service_del,
                                    'lat'           => $row->lat,
                                    'lng'           => $row->lng,
                                    'km'            => round($row->distance, 2),
                                    'cashback'      => $arrayCash,
                                    'person_cost'   => $row->person_cost,
                                    'reward'        => $row->reward,
                                    'descripcion'   => $row->descripcion,
                                    'c_social'      => $arraySocial,
                                    'cashback'      => $arrayCash,
                                    'times'         => $times->getAllApi($row->id),
                                ];
                            } elseif ($type_filter == 4) { // Con Ofertas
                                // Realizamos una busqueda en la tabla de ofertas
                                $offers = Offer::where("store_id", $row->id)->get();
                                if ($offers->count() > 0) { // el comercio tiene ofertas
                                    $data[] = [
                                        'id'            => $row->id,
                                        'title'         => $this->getLang($row->id)['name'],
                                        'img'           => Asset('upload/user/' . $row->img),
                                        'logo'           => Asset('upload/user/logo/' . $row->logo),
                                        'address'       => $this->getLang($row->id)['address'],
                                        'open'          => $open,
                                        'isNew'         => $isNew,
                                        'reservation_available' => $row->reservation_available,
                                        'numero_reserva' => $row->numero_reserva,
                                        'rating'        => $avg > 0 ? number_format($avg, 1) : '0.0',
                                        'delivery_time' => $row->delivery_time,
                                        'type'          => CategoryStore::find($row->type)->name,
                                        'subtype'       => $row->subtype,
                                        'delivery_type' => $row->service_del,
                                        'lat'           => $row->lat,
                                        'lng'           => $row->lng,
                                        'km'            => round($row->distance, 2),
                                        'favorite'      => $favorite,
                                        'person_cost'   => $row->person_cost,
                                        'reward'        => $row->reward,
                                        'descripcion'   => $row->descripcion,
                                        'c_social'      => $arraySocial,
                                        'cashback'      => $arrayCash,
                                        'times'         => $times->getAllApi($row->id),
                                    ];
                                }
                            } elseif ($type_filter == 5) { // en tendencia
                                if ($row->trending) {
                                    $data[] = [
                                        'id'            => $row->id,
                                        'title'         => $this->getLang($row->id)['name'],
                                        'img'           => Asset('upload/user/' . $row->img),
                                        'logo'           => Asset('upload/user/logo/' . $row->logo),
                                        'address'       => $this->getLang($row->id)['address'],
                                        'open'          => $open,
                                        'isNew'         => $isNew,
                                        'reservation_available' => $row->reservation_available,
                                        'numero_reserva' => $row->numero_reserva,
                                        'rating'        => $avg > 0 ? number_format($avg, 1) : '0.0',
                                        'delivery_time' => $row->delivery_time,
                                        'type'          => CategoryStore::find($row->type)->name,
                                        'subtype'       => $row->subtype,
                                        'delivery_type' => $row->service_del,
                                        'lat'           => $row->lat,
                                        'lng'           => $row->lng,
                                        'km'            => round($row->distance, 2),
                                        'favorite'      => $favorite,
                                        'person_cost'   => $row->person_cost,
                                        'reward'        => $row->reward,
                                        'descripcion'   => $row->descripcion,
                                        'c_social'      => $arraySocial,
                                        'cashback'      => $arrayCash,
                                        'times'         => $times->getAllApi($row->id),
                                    ];
                                }
                            } else {
                               
                                $data[] = [
                                    'id'            => $row->id,
                                    'title'         => $this->getLang($row->id)['name'],
                                    'img'           => Asset('upload/user/' . $row->img),
                                    'logo'           => Asset('upload/user/logo/' . $row->logo),
                                    'address'       => $this->getLang($row->id)['address'],
                                    'open'          => $open,
                                    'isNew'         => $isNew,
                                    'reservation_available' => $row->numero_reserva,
                                    'rating'        => $avg > 0 ? number_format($avg, 1) : '0.0',
                                    'delivery_time' => $row->delivery_time,
                                    'type'          => CategoryStore::find($row->type)->name,
                                    'subtype'       => $row->subtype,
                                    'delivery_type' => $row->service_del,
                                    'lat'           => $row->lat,
                                    'lng'           => $row->lng,
                                    'km'            => round($row->distance, 2),
                                    'favorite'      => $favorite,
                                    'person_cost'   => $row->person_cost,
                                    'reward'        => $row->reward,
                                    'descripcion'   => $row->descripcion,
                                    'c_social'      => $arraySocial,
                                    'cashback'      => $arrayCash,
                                    'times'         => $times->getAllApi($row->id),
                                ];
                            }
                        }
                    }
                }
                /****** Filtros de distancia y tipo de negocio *********/
            }
        }


        if ($type_filter == 1) { // Acomodamos por cercania
            usort($data, function ($a, $b) {
                return $a['km'] <=> $b['km'];
            });
        } else if ($type_filter == 2) { // Acomodamos por entrega rapida
            usort($data, function ($a, $b) {
                return $a['delivery_time'] <=> $b['delivery_time'];
            });
        } else if ($type_filter == 3) { // Acomodamos por Costos bajos
            usort($data, function ($a, $b) {
                return $a['delivery_charges_value']['costs_ship'] <=> $b['delivery_charges_value']['costs_ship'];
            });
        } else if ($type_filter == 6) { // Acomodamos por mejor calificaciones
            usort($data, function ($a, $b) {
                return $a['rating'] <=> $b['rating'];
            });
        }

        return $data;
    }

    private function getAddress($lat, $lon) {
        $apiKey = Admin::find(1)->ApiKey_google;

        $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng={$lat},{$lon}&key={$apiKey}";

        $response= file_get_contents($url);

        $data = json_decode($response, true);

        $address = $data['status'] === 'OK' && count($data['results']) > 0
        ? $data['results'][0]['formatted_address']
        : null;

        return $address;
    }

    function SaveData($res, $lat, $lon) //Envio info Api
    {
        $user_id    = isset($_GET['user_id']) ? $_GET['user_id'] : 0;

        $fecha      = isset($_GET['fecha']) ? $_GET['fecha'] : 0;
        $hora       = isset($_GET['hora']) ? $_GET['hora'] : 0;


        $data = [];

        foreach ($res as $row) {

            /****** Verificacion de abierto/Cerrado ******************/
            $op_time      = new Opening_times;

            if ($row->open == false) {
                $open          = ($op_time->ViewTime($row->id)['status'] != 0) ? true : false;
            } else {
                $open = false;
            }
            /****** Verificacion de abierto/Cerrado ******************/

            /****** Ratings ********/
            $totalRate    = FeedSurvey::where('id_negocio', $row->id)->count();
            $totalRateSum = FeedSurvey::where('id_negocio', $row->id)->sum('rating');

            if ($totalRate > 0) {
                $avg          = $totalRateSum / $totalRate;
            } else {
                $avg           = 0;
            }
            /****** Ratings ********/

            /****** Favorites ******/
            $chk_favs = Favorites::where('store_id', $row->id)->where('user_id', $user_id)->first();
            if ($chk_favs) {
                $favorite = true;
            } else {
                $favorite = false;
            }
            /****** Favorites ******/

            /****** Validamos si el negocios es nuevo *******/
            $user_time = new DateTime($row->created_at); // Tiempo de registro
            $query_time = new DateTime(date("H:i")); // Tiempo de hoy
            $diff = $user_time->diff($query_time); // Diferencia
            $isNew = false;

            if ($diff->days <= 15) { // El negocio aun tiene 15 dias de registro se considera NUEVO
                $isNew = true;
            }
            /****** Validamos si el negocios es nuevo *******/

            if (CategoryStore::find($row->subtype)) {
                $subtype = CategoryStore::find($row->subtype)->name;
            } else {
                $subtype = null;
            }

            if (CategoryStore::find($row->subsubtype)) {
                $subsubtype = CategoryStore::find($row->subsubtype)->name;
            } else {
                $subsubtype = null;
            }

            /* Causas Sociales   */


            $social  = SocialesNegocios::where('social_id', $row->id)->get();

            $arraySocial = [];

            foreach ($social as $soc) {
                $arraySocial[] = array(
                    'nombre' => $soc->NombreSocial->nombre,
                    'id' => $soc->NombreSocial->id,
                );
            }

            /* CashBack   */

            $cashback = Schedule::where('store_id', $row->id)
            ->where('status', 0)
            ->get();

            $cashback = $cashback->sortBy(function ($schedule) {
                return $schedule->hora->name;
            });

            $arrayCash = [];
            $cashDay = BlockedDay::where('store_id', $row->id)->get();
            foreach ($cashback as $cash) {
                $arrayCash[] = array(
                    'valor' => $cash->per,
                    'Dia' => $cash->day->name,
                    'hora'  => date('h:i  A', strtotime($cash->hora->name)),
                    'status' => $cash->status
                );
            }


            /* reservation_available   */


            $numero_reserva =  $row->numero_reserva;
            $reserva        = Reserva::where('store_id', $row->id)->where('status', 1)
                ->where('hora', $hora)->where('fecha', $fecha)->sum('invitados');
            $total_reserva  = $numero_reserva - $reserva;

            $usuarios_sinreserva  = Reserva::where('store_id', $row->id)->where('status', 1)->where('reserva', 1)
                ->where('hora', $hora)->where('fecha', $fecha)->sum('invitados');
            $usuarios_conreserva  = Reserva::where('store_id', $row->id)->where('status', 1)->where('reserva', 0)
                ->where('hora', $hora)->where('fecha', $fecha)->sum('invitados');

            $times = new Opening_times;

            $address = $this->getAddress($row->lat, $row->lng);

            $data[] = [
                'id'            => $row->id,
                'title'         => $row->name,
                'lat'           => $row->lat,
                'lng'           => $row->lng,
                'address'       => $address,
                'img'           => asset('upload/user/' . $row->img),
                'logo'          => asset('upload/user/logo/' . $row->logo),
                'open'          => $open,
                'isNew'         => $isNew,
                'numero_reserva'        => $row->numero_reserva,
                'reservation_available' => $row->reservation_available,
                'reserva_disponible'    => $total_reserva,
                'usuarios_con_reserva'  => $usuarios_conreserva,
                'usuarios_sin_reserva'  => $usuarios_sinreserva,
                'rating'        => $avg > 0 ? number_format($avg, 1) : 0,
                'delivery_time' => $row->delivery_time,
                'categoria'     => CategoryStore::find($row->type)->name,
                'type'          => $subtype,
                'subtype'       => $subsubtype,
                'favorite'      => $favorite,
                'reward'        => $row->reward,
                'descripcion'   => $row->descripcion,
                'recommendations' => $row->recommendations,
                'urlproductos'  => $row->urlproductos,
                'c_social'      => $arraySocial,
                'cashback'      => $arrayCash,
                'cashday'      => $cashDay,
                'times'         => $times->getAllApi($row->id),
            ];
        }

        return $data;
    }

    public function getTotsStores($city_id)
    {
        $lat        = isset($_GET['lat']) ? $_GET['lat'] : 0;
        $lon        = isset($_GET['lng']) ? $_GET['lng'] : 0;

        $res  = User::where(function ($query) use ($city_id) {
            $query->where('status', 0)->where('city_id', $city_id);
        })->orderBy('id', 'DESC')->get();

        return $res->count();
    }

    public function SetCommShip($id, $type, $max_distance, $distance)
    {
        $req = null;
        $user   = User::find($id);
        $admin   = City::find($user->city_id); //Admin::find(1);

        if ($type == 1) {
            // Los cobros son del admin
            if ($admin->c_type == 0) {
                // El cobro es en Base a KM
                $req = $this->Costs_shipKM(
                    $admin->c_value,
                    $admin->min_distance,
                    $admin->min_value,
                    $distance
                );
            } else {
                // El cobro es en Fijo
                $req = [
                    'costs_ship'    => $admin->c_value,
                    'duration'      => '0'
                ];
            }
        } else {
            // Los cobros son del usuarios 
            if ($user->type_charges_value == 0) {
                // El cobro es en Base a KM
                $req = $this->Costs_shipKM(
                    $user->delivery_charges_value,
                    $user->delivery_min_distance,
                    $user->delivery_min_charges_value,
                    $distance
                );
            } else {
                // El cobro es en Fijo
                $req = [
                    'costs_ship'    => $user->delivery_charges_value,
                    'duration'      => '0'
                ];
            }
        }


        return $req;
    }

    public function getDeliveryType($id)
    {
        return User::select('service_del', 'pickup')->where('id', $id)->get();
    }

    public function getLang($id)
    {

        $data = User::find($id);

        /****** Function IsClose or IsOpen ******************/
        $op_time      = new Opening_times;
        $open        = false;

        if ($data->open == false) {
            $open          = ($op_time->ViewTime($id)['status'] != 0) ? true : false;
        } else {
            $open = false;
        }
        /****** Function IsClose or IsOpen ******************/

        return [
            'name' => $data->name,
            'address' => $data->address,
            'lat'     => $data->lat,
            'lng'     => $data->lng,
            'time_delivery' => $data->delivery_time,
            'open_status' => $open
        ];
    }

    public function discount($id, $currency)
    {
        $res =  OfferStore::join('offer', 'offer_store.offer_id', '=', 'offer.id')
            ->select('offer.*')
            ->where('offer.status', 0)
            ->where('offer_store.store_id', $id)
            ->orderBy('offer.id', 'DESC')
            ->first();
        $msg = null;
        $val = 0;

        if (isset($res->id)) {
            $val = $res->value;

            if ($res->type == 0) {
                $msg = $res->value . "% off use coupen " . $res->code;
            } else {
                $msg = $currency . $res->value . " flat off use coupen " . $res->code;
            }
        }

        return ['msg' => $msg, 'value' => $val];
    }

    public function getRating($id)
    {
        $res =  Rate::join('app_user', 'rate.user_id', '=', 'app_user.id')
            ->select('app_user.name as user', 'rate.*')
            ->where('rate.store_id', $id)
            ->orderBy('rate.id', 'DESC')
            ->get();
        $data = [];

        foreach ($res as $row) {
            $data[] = ['user' => $row->user, 'star' => $row->star, 'comment' => $row->comment, 'date' => date('d-M-Y', strtotime($row->created_at))];
        }

        return $data;
    }

    public function userImages($id)
    {
        $res = UserImage::where('user_id', $id)->get();
        $data = [];

        foreach ($res as $row) {
            $data[] = ['img' => Asset('upload/user/gallery/' . $row->img)];
        }

        return $data;
    }

    public function menuItem($id, $type, $value)
    {
        $data     = [];
        // where('status',0)->
        $cates    = Item::where('store_id', $id)->select('category_id')->distinct()->get();
        $price    = 0;
        $last_price = 0;

        foreach ($cates as $cate) {
            // where('status',0)->
            $items = Item::where('category_id', $cate->category_id)->where('store_id', $id)->orderBy('sort_no', 'ASC')->get();
            $count = [];

            foreach ($items as $i) {
                $IPrice = $this->checaValor(intval(str_replace('$', '', $i->small_price)));
                $lastPrice = $this->checaValor(intval(str_replace("$", "", $i->last_price)));

                if ($i->small_price) {
                    $price = $IPrice;
                    $count[] = $IPrice;
                }

                if ($i->last_price) {
                    $last_price = $lastPrice;
                }

                // Items

                $item[] = [
                    'id'            => $i->id,
                    'name'          => $this->getLangItem($i->id)['name'],
                    'img'           => $i->img ? Asset('upload/item/' . $i->img) : null,
                    'description'   => $this->getLangItem($i->id)['desc'],
                    's_price'       => $IPrice,
                    'price'         => $price,
                    'last_price'    => $last_price,
                    'count'         => count($count),
                    'nonveg'        => $i->nonveg,
                    'addon'         => $this->addon($i->id),
                    'status'        => $i->status
                ];
            }

            $data[] = [
                'id' => $cate->category_id,
                'sort_no' => $this->getLangCate($cate->category_id)['sort_no'],
                'cate_name' => $this->getLangCate($cate->category_id)['name'],
                'items' => $item
            ];

            unset($item);
        }

        return $data;
    }

    public function menuTrend($id)
    {

        $data     = [];
        // where('status',0)->
        $cates    = Item::where('store_id', $id)->where('trending', 1)->get();
        $price    = 0;
        $last_price = 0;

        foreach ($cates as $i) {
            $IPrice = $this->checaValor(intval(str_replace('$', '', $i->small_price)));
            $lastPrice = $this->checaValor(intval(str_replace("$", "", $i->last_price)));

            if ($i->small_price) {
                $price = $IPrice;
                $count[] = $IPrice;
            }

            if ($i->last_price) {
                $last_price = $lastPrice;
            }

            // Items

            $data[] = [
                'id'            => $i->id,
                'name'          => $this->getLangItem($i->id)['name'],
                'img'           => $i->img ? Asset('upload/item/' . $i->img) : null,
                'description'   => $this->getLangItem($i->id)['desc'],
                's_price'       => $IPrice,
                'price'         => $price,
                'last_price'    => $last_price,
                'count'         => count($count),
                'nonveg'        => $i->nonveg,
                'addon'         => $this->addon($i->id),
                'status'        => $i->status
            ];
        }

        return $data;
    }

    public function getLangCate($id)
    {

        $data = Category::find($id);


        if ($data) {
            return [
                'id'            => $data->id,
                'sort_no'       => $data->sort_no,
                'name'          => $data->name,
                'required'      => $data->required,
                'single_opcion' => $data->single_option,
                'max_options'   => $data->max_options
            ];
        }
    }

    public function getLangItem($id)
    {

        $data = Item::find($id);
        return ['name' => $data->name, 'desc' => $data->description];
    }

    public function addon($id)
    {
        $i = 0;

        $item_addon  = ItemAddon::where('item_id', $id)->select('category_id')->distinct()->get();
        $data = [];
        // $items = [];
        $addon_items = [];
        $item = [];
        $pos = 0;

        foreach ($item_addon as $cate) {


            $addons = ItemAddon::where('category_id', $cate->category_id)->where('item_id', $id)->orderBy('category_id', 'ASC')->get();

            foreach ($addons as $add) {

                $addon = Addon::find($add->addon_id);
                if ($addon) {
                    $item[] = [
                        'id'            => $addon->id,
                        'name'          => $addon->name,
                        'price'         => $addon->price,
                    ];
                } else {
                    ItemAddon::where('addon_id', $add->addon_id)->delete();
                }
            }

            $data[] = [
                'cate_id'       => $this->getLangCate($cate->category_id)['id'],
                'cate_sort_no'  => $this->getLangCate($cate->category_id)['sort_no'],
                'cate_name'     => $this->getLangCate($cate->category_id)['name'],
                'required'      => $this->getLangCate($cate->category_id)['required'],
                'single_opcion' => $this->getLangCate($cate->category_id)['single_opcion'],
                'max_options'   => $this->getLangCate($cate->category_id)['max_options'],
                'items'         => $item
            ];

            unset($item);
        }


        return $data;
    }

    public function overview()
    {
        return [

            'order'     => Order::where('store_id', Auth::user()->id)->count(),
            'complete'  => Order::where('store_id', Auth::user()->id)->where('status', 6)->count(),
            'month'     => Order::where('store_id', Auth::user()->id)->whereDate('created_at', 'LIKE', date('Y-m') . '%')
                ->count(),
            'items'     => Item::where('store_id', Auth::user()->id)->where('status', 0)->count(),
            'saldos'    => User::find(Auth::user()->id)->saldo
        ];
    }

    /*
    |--------------------------------------
    |Get all data from db for Charts
    /  6361143526 - Martha
    /  
    |--------------------------------------
    */

    public function overview_app()
    {
        $admin = new Admin;

        return [
            'total'     => Order::where('store_id', $_GET['id'])->count(),
            'complete'  => Order::where('store_id', $_GET['id'])->where('status', 6)->count(),
            'canceled'  => Order::where('store_id', $_GET['id'])->where('status', 2)->count(),
            'saldos_m'  => $this->saldos($_GET['id']),
            'x_day'     => [
                'tot_orders' => Order::where('store_id', $_GET['id'])
                    ->whereDate('created_at', 'LIKE', '%' . date('m-d') . '%')
                    ->count(),
                'order'     => $this->chartxday($_GET['id'], 0, 1)['order'],
                'cancel'    => $this->chartxday($_GET['id'], 0, 1)['cancel'],
                'amount'    => $this->chartxday($_GET['id'], 0, 1)['amount']
            ],
            'day_data'     => [
                'day_1'    => [
                    'data'  => $this->chartxday($_GET['id'], 2, 1),
                    'day'   => $admin->getDayName(2)
                ],
                'day_2'    => [
                    'data'  => $this->chartxday($_GET['id'], 1, 1),
                    'day'   => $admin->getDayName(1)
                ],
                'day_3'    => [
                    'data'  => $this->chartxday($_GET['id'], 0, 1),
                    'day'   => $admin->getDayName(0)
                ]
            ],
            'week_data' => [
                'total' => $this->chartxWeek($_GET['id'])['total']
            ],
            'month'     => [
                'month_1'     => $admin->getMonthName(2),
                'month_2'     => $admin->getMonthName(1),
                'month_3'     => $admin->getMonthName(0),
            ],
            'complet'   => [
                'complet_1'    => $this->chart($_GET['id'], 2, 1)['order'],
                'complet_2'    => $this->chart($_GET['id'], 1, 1)['order'],
                'complet_3'    => $this->chart($_GET['id'], 0, 1)['order'],
            ],
            'cancel'   => [
                'cancel_1'    => $this->chart($_GET['id'], 2, 1)['cancel'],
                'cancel_2'    => $this->chart($_GET['id'], 1, 1)['cancel'],
                'cancel_3'    => $this->chart($_GET['id'], 0, 1)['cancel']
            ]
        ];
    }

    public function saldos($id)
    {
        // Saldos y Movimientos
        $discount = 0;
        $cargos   = 0;
        $ventas   = 0;

        $i           = new OrderItem;
        $store       = User::find($id);
        $saldo       = $store->saldo;
        $order_day   = Order::where(function ($query) use ($id) {

            $query->where('store_id', $id);
        })->where('status', 6)->get();

        if ($order_day->count() > 0) {
            foreach ($order_day as $cm) {
                $store_comm = $store->c_value;

                $total_store    = $i->GetTaxes($cm->id)['gananciasxt'];

                $real_valor  = $i->GetTaxes($cm->id)['reteneciones']; //$cm->total - $cm->d_charges;
                $ventas      = $ventas + $total_store;

                if ($cm->d_charges > 0) {
                    $cargos      = $cargos + $real_valor; //($real_valor - $total_store);
                } else {
                    $cargos      = $cargos + ($real_valor);
                }
            }
        }

        return [
            'Ventas'     => $ventas,
            'Cargos'     => $cargos,
            'Saldo'      => $saldo
        ];
    }

    public function setNewMov($id, $store_id, $total, $d_charges)
    {
        $item           = new OrderItem;
        $store          = User::find($store_id);
        $saldo          = $store->saldo;
        $total_store    = $item->RealTotal($id);

        $real_valor  = $total - $d_charges;
        $cargos      = ($real_valor - $total_store);
        $amount_tot  = $saldo - $cargos;

        $store->saldo = $amount_tot;
        $store->save();

        if ($amount_tot <= 100) {
            // Notificamos al comercio
            $msg = "Al vencer, podrias dejar de aparecer en nuestro listado, por favor te invitamos a realizar una recarga.";
            $title = "Tu saldo esta por vencer!!";
            app('App\Http\Controllers\Controller')->sendPushS($title, $msg, $store_id);
        }

        return true;
    }

    public function add_saldo($data, $id)
    {

        $store = User::find($id);
        $newSaldo = $store->saldo + $data['new_saldo'];

        $store->saldo = $newSaldo;
        $store->save();

        return true;
    }

    public function chart($id, $type, $sid = 0)
    {
        $month      = date('Y-m', strtotime(date('Y-m') . ' - ' . $type . ' month'));
        // Ordenes  Completas
        $order   = Order::where(function ($query) use ($sid, $id) {

            if ($sid > 0) {
                $query->where('store_id', $id);
            }
        })->where('status', 6)->whereDate('created_at', 'LIKE', $month . '%')->count();
        // Ordenes Canceladas
        $cancel  = Order::where(function ($query) use ($sid, $id) {

            if ($sid > 0) {
                $query->where('store_id', $id);
            }
        })->where('status', 2)->whereDate('created_at', 'LIKE', $month . '%')->count();

        return [
            'order' => $order,
            'cancel' => $cancel
        ];
    }

    public function chartxday($id, $type, $sid = 0)
    {
        $date_past = strtotime('-' . $type . ' day', strtotime(date('Y-m-d')));
        $day = date('m-d', $date_past);
        $i           = new OrderItem;
        $ventas = 0;

        $order   = Order::where(function ($query) use ($sid, $id) {

            if ($sid > 0) {
                $query->where('store_id', $id);
            }
        })->where('status', 6)->whereDate('created_at', 'LIKE', '%' . $day . '%')->get();

        $cancel  = Order::where(function ($query) use ($sid, $id) {

            if ($sid > 0) {
                $query->where('store_id', $id);
            }
        })->where('status', 2)->whereDate('created_at', 'LIKE', '%' . $day . '%');

        if ($order->count() > 0) {
            foreach ($order as $cm) {
                $total_store    = $i->GetTaxes($cm->id)['gananciasxt'];
                $ventas      = $ventas + $total_store;
            }
        }

        return ['order' => $order->count(), 'cancel' => $cancel->count(), 'amount' => $ventas];
    }

    public function chartxWeek($id)
    {
        $date = strtotime(date("Y-m-d"));

        $init_week = strtotime('last Sunday');
        $end_week  = strtotime('next Saturday');

        $total   = Order::where(function ($query) use ($id) {

            $query->where('store_id', $id);
        })->where('status', 6)
            ->where('created_at', '>=', date('Y-m-d', $init_week))
            ->where('created_at', '<=', date('Y-m-d', $end_week))->count();

        $sum   = Order::where(function ($query) use ($id) {

            $query->where('store_id', $id);
        })->where('status', 6)
            ->where('created_at', '>=', date('Y-m-d', $init_week))
            ->where('created_at', '<=', date('Y-m-d', $end_week))->sum('d_charges');

        return [
            'total'   => $total,
            'lastday' => date('Y-m-d', $init_week),
            'nextday' => date('Y-m-d', $end_week)
        ];
    }

    /**
     * Funciones para saldos de comercios
     */

    public function amounts_mat($id)
    {
        $orderItem      = new OrderItem;
        $taxes          = $orderItem->GetTaxes($id);
        $payment_method = $taxes['payment_method'];
        $store          = User::find($taxes['store']);

        /*
        * si payment == 1 el pago fue en efectivo y el comercio le debe al admin
        * si payment == 2 el pago fue con tarjeta y el administrador le debe al comercio
        */
        $amount_sale    = ($payment_method == 1) ? $taxes['payment_to_admin'] : $taxes['gananciasxt'];

        if ($payment_method == 1) {
            $newSaldo = ($store->saldo - $amount_sale);
        } else {
            $newSaldo = ($store->saldo + $amount_sale);
        }

        // Guardamos
        $store->saldo = $newSaldo;
        $store->save();

        return $store->saldo;
    }

    public function getSData($data, $id, $field)
    {
        $data = unserialize($data);

        return isset($data[$field][$id]) ? $data[$field][$id] : null;
    }

    public function login($data)
    {
        if (isset($data['spdmin'])) {
            # login admin
            if (auth()->guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
                return ['msg' => 'done', 'user_id' => 1];
            } else {
                # Login SubAccounts
                $chk = Admin::where('username', $data['email'])->where('shw_password', $data['password'])->first();
                if (isset($chk->id)) {
                    return ['msg' => 'done', 'user_id' => $chk->id];
                } else {
                    return ['msg' => 'Opps! Detalles de acceso incorrectos '];
                }
            }
        } else {
            $chk = User::where('status', 0)->where('email', $data['email'])->where('shw_password', $data['password'])->first();

            if (isset($chk->id)) {
                return ['msg' => 'done', 'user_id' => $chk->id];
            } else {
                return ['msg' => 'Opps! Detalles de acceso incorrectos'];
            }
        }
    }

    public function getCom($id, $total)
    {
        $order = Order::find($id);
        $user  = User::find($order->store_id);

        if ($user->c_type == 0) {
            $val = $user->c_value;
        } else {
            $val = round($total * $user->c_value / 100);
        }

        return $val;
    }

    public function checaValor($numero)
    {
        return round($numero, 2);
    }
 
    function Costs_shipKM($value, $min_distance, $min_value, $distance)
    {
        $km_inm       = $distance;

        if ($km_inm > 0) {
            if ($km_inm < $min_distance) {
                // la distancia es menor a la requerida
                $costs_ship  = intval($min_value);
            } else {
                $km_extra   = (round($km_inm) - $min_distance); // 3 - 1 = 2
                $value_ext  = ($km_extra * $value); // 2 * 3.5 = 7
                $costs_ship = ($min_value + $value_ext); // 20 + 7 = 27
            }
        } else {
            $costs_ship = 0;
        }

        return [
            'costs_ship'    => $costs_ship,
            'duration'      => 0,
            'value'   => $value,
            'min_distance' => $min_distance,
            'min_value' => $min_value,
            'distance' => round($distance, 0)
        ];
    }
}
