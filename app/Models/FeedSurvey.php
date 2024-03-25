<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeedSurvey extends Model
{
    use HasFactory;
    protected $table = "feedback_survey";

    protected $fillable = [
        'user_id',
        'id_negocio',
        'rating',
        'descript_rating',
        'preguntas'
    ];


    public function addXpAward($user_id, $amount)
    {
        $user = AppUser::find($user_id);
        $saldo_xp = $user->saldo_xp;
        $new_saldo = $saldo_xp + $amount;
        $user->saldo_xp = $new_saldo;
        $user->save();

        /**
         * Agregamos el registro a la tabla de TrendingUsers
         * para calcular su nivel
         */
        $lims_data_trending = new TrendingUsers;
        $lims_data_trending->create([
            'user_id' => $user_id,
            'xp'      => $amount,
            'type'    => 0 // SUMA
        ]);

        // Notificamos al usuario
        app('App\Http\Controllers\Controller')->sendPush("Gracias por contestar la encuesta", "Haz recibido " . $new_saldo . " XP por completar la retroalimentación.", $user_id);

    }
  
}
