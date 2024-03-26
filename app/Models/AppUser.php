<?php

namespace App\Models;

use Mail;

use Validator;
use Illuminate\Support\Carbon;
use Illuminate\Notifications\Notifiable;
use App\Http\Controllers\OpenpayController;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class AppUser extends Authenticatable
{
    protected $table = 'app_user';
    use SoftDeletes;

    public function addNew($data)
    {
        $count = AppUser::where('email', $data['email'])->count();
        $date  = Carbon::now();

        if ($count == 0) {
            if (filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {

                $count_phone = AppUser::where('phone', $data['phone'])->count();

                if ($count_phone == 0) {

                    $count_user_name = AppUser::where('user_name', $data['user_name'])->count();

                    if ($count_user_name == 0) {
                        $add                = new AppUser;
                        $add->name          = $data['name'];
                        $add->fecha_cambio  = $date->format('Y-m-d');
                        $add->email         = $data['email'];
                        $add->phone         = isset($data['phone']) ? $data['phone'] : 'null';
                        $add->password      = Hash::make($data['password']);
                        $add->shw_password  = $data['password'];
                        $add->pswfacebook   = isset($data['pswfb']) ? $data['pswfb'] : 0;
                        $add->refered       = isset($data['refered']) ? $data['refered'] : '';

                        $add->last_name     = isset($data['last_name']) ? $data['last_name'] : 'null';
                        $add->birthday      = isset($data['birthday']) ? $data['birthday'] : 'null';
                        $add->sex_type      = isset($data['sex_type']) ? $data['sex_type'] : 'null';
                        $add->user_name     = isset($data['user_name']) ? $data['user_name'] : 'null';
                        $add->foto          = isset($data['foto']) ? $data['foto'] : 'null';

                        $add->save();

                        if ($data['refered'] && $add->save()) {
                           
                            $user  = AppUser::where('user_name', $data['refered'])->first();
                            $valor = Admin::find(1)->first();

                            $add2                   = new Recompensa();
                            $add2->id_cliente       = $user->id;
                            $add2->id_negocio       = null;
                            $add2->reserva          = null;
                            $add2->valor            = $valor->recompensa_nuevo;
                            $add2->descripcion      = 'Referencia de nuevo usuario :'.$data['refered'];
                            $add2->fecha            = Carbon::now()->format('Y-m-d');   
                            $add2->primaria         = 0;              
                            $add2->save();

                            /**
                             * Sumamos los XP
                             * En cada persona activa referida 250 XP
                             * Ej.- En este caso:
                             * Cuando un usuario A ingresa como referido a un usuario B
                             * los XP se le brindaran al usuario B
                             */
                            $feed_survey = new FeedSurvey;
                            $feed_survey->addXpAward($user->id, 250);
                            
                        }


                        return ['msg' => 'done', 'user_id' => $add->id];
                    } else {
                        return ['msg' => 'Opps! Este User Name  ya existe.'];
                    }
                } else {
                    return ['msg' => 'Opps! Este número telefonico ya existe.'];
                }
            } else {
                return ['msg' => 'Opps! El Formato del Email es invalido'];
            }
        } else {
            return ['msg' => 'Opps! Este correo electrónico ya existe.'];
        }
    }

    public function signupOP($data)
    {
        $openPay = new OpenpayController;
        $addclientOP = $openPay->addClient($data);

        $user               = AppUser::find($data['id']);
        $user->customer_id  = $addclientOP['data']['id'];
        $user->save();

        return ['msg' => 'done', 'data' => $addclientOP];
    }

    public function chkUser($data)
    {

        if (isset($data['user_id']) && $data['user_id'] != 'null') {
            // Intentamos con el id
            $res = AppUser::find($data['user_id']);

            if (isset($res->id)) {
                /**
                 * Hasta este punto el usuario ya tiene una sesion iniciada, ya comprobo el numero telefonico
                 * y esta intentando registrarlo
                 * Comprobamos que el numero telefonico que intenta agregar no exista con otra cuenta
                 * en caso contrario se le pedira un nuevo numero telefonico
                 */

                $req = AppUser::where('phone', $data['phone'])->first();
                if ($req) {
                    // El numero telefonico existe con otra cuenta
                    return ['msg' => 'phone_exist'];
                } else {
                    // Si el numero telefonico no existe lo Registramos
                    $res->phone = $data['phone'];
                    $res->save();
                    return ['msg' => 'user_exist', 'user_id' => $res->id];
                }
            } else {
                return ['msg' => 'not_exist'];
            }
        } else {
            /**
             * Hasta este punto el usuario ya se registro previamente
             * ingreso un numero telefonico y lo comprobo con codigo SMS
             * verificamos si el numero de telefono existe
             */

            $res = AppUser::where('phone', $data['phone'])->first();
            if ($res) {
                return ['msg' => 'user_exist', 'user_id' => $res->id];
            } else {
                return ['msg' => 'not_exist'];
            }
        }
    }

    public function SignPhone($data)
    {
        $res = AppUser::where('id', $data['user_id'])->first();

        if ($res->id) {
            $res->phone = $data['phone'];
            $res->save();

            $return = ['msg' => 'done', 'user_id' => $res->id];
        } else {
            $return = ['msg' => 'error', 'error' => '¡Lo siento! Algo salió mal.'];
        }

        return $return;
    }

    public function login($data)
    {
        $chk = AppUser::where('email', $data['username'])->first();

        $msg = "Detalles de acceso incorrectos";
        $user = 0;
        if (isset($chk->id)) // Validamos si existe el email
        {
            if (Hash::check($data['password'], $chk->password)) {
            // Validamos la contraseña
                $msg = 'done';
                $user = $chk->id;
            }
        } else {

            $chk_username = AppUser::where('user_name', $data['username'])->first();
            if (isset($chk_username->id)) {
                if (Hash::check($data['password'], $chk_username->password)) { // Validamos la contraseña
                    $msg = 'done';
                    $user = $chk_username->id;
                }
            }
        }


        return ['msg' => $msg, 'user_id' => $user];
    }

    public function Newlogin($data)
    {
        $chk = AppUser::where('phone', $data['phone'])->first();

        if (isset($chk->id)) {
            return ['msg' => 'done', 'user_id' => $chk->id];
        } else {
            return ['msg' => 'error', 'error' => 'not_exist'];
        }
    }

    public function loginfb($data)
    {
        $chk = AppUser::where('email', $data['email'])->first();

        if (isset($chk->id)) {
            if (Hash::check($data['password'], $chk->password)) {
                // Esta logeado con facebook
                return ['msg' => 'done', 'user_id' => $chk->id];
            } else {
                // Esta logeado normal pero si existe se registra el FB - ID
                $chk->pswfacebook = $data['password'];
                $chk->save();
                // Registramos
                return ['code' => 200,'data' => 'done', 'user_id' => $chk->id];
            }
        } else {
            return ['code' => 401, 'data' => 'Opps! Detalles de acceso incorrectos'];
        }
    }

    public function SocialMediaSign($data)
    {
        $email      = $data['email'];
        $password   = $data['password'];
        $type       = $data['type'];

        $user = AppUser::where('email', $email)->first();

        if (!$user) {
            // Registramos
            $date  = Carbon::now();
            $add   = new AppUser;
            $add->fecha_cambio  = $date->format('Y-m-d');
            $add->email         = $email;
            
            switch ($type) {
                case 1: // Login With Google
                    $add->pswgoogle      = Hash::make($password);
                    break;
                case 2: // Login With Twtitter
                    $add->pswtwitter      = Hash::make($password);
                    break;
                default:
                    $add->pswgoogle      = Hash::make($password);
                    break;
            }

            $add->save();

            return ['data' => 'new_account_create', 'msg' => 'done', 'user_id' => $add->id];
        }

        switch ($type) {
            case 1: // Login With Google
                if (Hash::check($password, $user->pswgoogle)) {
                    // Esta logeado con facebook
                    return ['msg' => 'done', 'user_id' => $user->id];
                }
                break;
            case 2: // Login With Twtitter
                if (Hash::check($password, $user->pswtwitter)) {
                    // Esta logeado con facebook
                    return ['msg' => 'done', 'user_id' => $user->id];
                }
                break;
            default:
                if (Hash::check($password, $user->pswgoogle)) {
                    // Esta logeado con facebook
                    return ['msg' => 'done', 'user_id' => $user->id];
                }
                break;
        }

        return ['data' => 'error' ,'code' => 401, 'error' => 'Opps! Detalles de acceso incorrectos'];
    }

    public function updateInfo($data, $id)
    {
        $count = AppUser::where('id', '!=', $id)->where('email', $data['email'])->count();

        if ($count == 0) {
            $add                = AppUser::find($id);
            $add->name          = $data['name'];
            $add->email         = $data['email'];
            $add->phone         = $data['phone'];

            $add->last_name     = $data['last_name'];
            $add->birthday      = $data['birthday'];
            $add->sex_type      = $data['sex_type'];
            $add->user_name     = $data['user_name'];
            $add->foto          = $data['foto'];

            if (isset($data['password'])) {
                $add->password     = Hash::make($data['password']);
                $add->shw_password = $data['shw_password'];
            }

            $add->save();

            return ['msg' => 'done', 'user_id' => $add->id, 'data' => $add];
        } else {
            return ['msg' => 'Opps! Este correo electrónico ya existe.'];
        }
    }

    public function forgot($data)
    {
        $res = AppUser::where('email', $data['email'])->first();

        if (isset($res->id)) {
            $otp = rand(1111, 9999);

            $res->otp = $otp;
            $res->save();

            $para       =   $data['email'];
            $asunto     =   'Codigo de acceso - A100TO';
            $mensaje    =   "Hola " . $res->name . " Un gusto saludarte, se ha pedido un codigo de recuperacion para acceder a tu cuenta en A100TO";
            $mensaje    .=  ' ' . '<br>';
            $mensaje    .=  "Tu codigo es: <br />";
            $mensaje    .=  '# ' . $otp;
            $mensaje    .=  "<br /><hr />Recuerda, si no lo has solicitado tu has caso omiso a este mensaje y te recomendamos hacer un cambio en tu contrasena.";
            $mensaje    .=  "<br/ ><br /><br /> Te saluda el equipo de A100TO";

            $cabeceras = 'From: A100TO' . "\r\n";

            $cabeceras .= 'MIME-Version: 1.0' . "\r\n";

            $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            mail($para, $asunto, utf8_encode($mensaje), $cabeceras);

            $return = ['msg' => 'done', 'user_id' => $res->id];
        } else {
            $return = ['msg' => 'error', 'error' => '¡Lo siento! Este correo electrónico no está registrado con nosotros.'];
        }

        return $return;
    }

    public function verify($data)
    {
        $res = AppUser::where('id', $data['user_id'])->where('otp', $data['otp'])->first();

        if (isset($res->id)) {
            $return = ['msg' => 'done', 'user_id' => $res->id];
        } else {
            $return = ['msg' => 'error', 'error' => '¡Lo siento! OTP no coincide.'];
        }

        return $return;
    }

    public function updatePassword($data)
    {
        $res = AppUser::where('id', $data['user_id'])->first();

        if (isset($res->id)) {
            $res->password = Hash::make($data['password']);
            $res->shw_password = $data['password'];
            $res->save();

            $return = ['msg' => 'done', 'user_id' => $res->id];
        } else {
            $return = ['msg' => 'error', 'error' => '¡Lo siento! Algo salió mal.'];
        }

        return $return;
    }

    public function countOrder($id)
    {
        return Order::where('user_id', $id)->where('status', '>', 0)->count();
    }
    public function Edad($id)
    {
        return  Carbon::parse($id)->age;

    }
    public function Tickets($id)
    {
        return Tickets::where('id_cliente', $id)->whereIn('status', [1,2])->count();
    }

    public function Tickets6Meses($id)
    {
        $fecha = Carbon::now();
        $fechaActual = $fecha->format('Y-m-d');
        $fechaHace6Meses = $fecha->subMonths(6);

        return Tickets::where('id_cliente', $id)->whereIn('status', [1,2])
                        ->whereBetween('fecha', [$fechaHace6Meses, $fechaActual])
                        ->count();
    }

    public function Reportes($id)
    {
        return Reportar::where('seguido_id', $id)->count();
    }

    /*
    |--------------------------------------
    |Get all data from db
    |--------------------------------------
    */
    public function getAll($store = 0)
    {
        return AppUser::get();
    }

    public function getAllUser($id)
    {
        $us = AppUser::find($id);
        $transx = Order::where('user_id', $id)->get();

        $data = [];
        $compras = 0;
        $cashback = 0;
        $transaction = [];
        foreach ($transx as $key) {

            /******** Compras *********/
            $compras = $compras + $key->total;
            /******** Compras *********/

            /******** CashBack *********/
            $cashback = $cashback + $key->monedero;
            /******** CashBack *********/

            /******** Transaccion *********/
            $transaction[] = [
                'id'        => $key->id,
                'date'      => $key->created_at->diffForHumans(),
                'payment'   => $key->payment_method,
                'amount'    => $key->total,
                'd_charges' => $key->d_charges,
                'use_mon'   => $key->use_mon,
                'uso_monedero' => $key->uso_monedero,
                'cashback'  => $key->monedero
            ];
            /******** Transaccion *********/
        }

        return [
            'compras'   => $compras,
            'cashback'  => $cashback,
            'transaction' => $transaction
        ];
    }

    /*
    |--------------------------------------
    |Get Report
    |--------------------------------------
    */
    public function getReport($data)
    {
        $res = AppUser::where(function ($query) use ($data) {

            if ($data['user_id']) {
                $query->where('app_user.id', $data['user_id']);
            }
        })->select('app_user.*')
            ->orderBy('app_user.id', 'ASC')->get();

        $allData = [];

        foreach ($res as $row) {

            // Obtenemos el comercio
            $store = User::find($row->ord_store_id);

            $allData[] = [
                'id'                => $row->id,
                'status'            => $row->status,
                'name'              => $row->name,
                'email'             => $row->email,
                'Telefono'          => $row->phone,
                'refered'           => $row->refered,
                'last_name'         => $row->last_name,
                'birthday'          => $row->birthday,
                'sex_type'          => $row->sex_type,
                'user_name'         => $row->user_name
            ];
        }

        return $allData;
    }


    public function addMoney($amount, $user, $use_mon)
    {
        $res = AppUser::where('id', $user)->first();

        if ($use_mon == true) { // El usuario ha utilizado su dinero en monedero
            // Limpiamos primero
            $res->monedero = 0;
            $res->save();
        }

        // Agregamos el nuevo pedido al monedero
        $amount = ($res->monedero + $amount);
        $res->monedero = $amount;
        $res->save();
    }
}
