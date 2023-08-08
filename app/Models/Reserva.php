<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reserva extends Model
{
    use HasFactory,SoftDeletes;

    protected $dates = [
       'updated_at',
       'created_at',
       'deleted_at',

   ];
   protected $fillable = [
    'id',
    'store_id',
    'user_id',
    'recompensa',
    'invitados',
    'primera',
    'fecha',
    'hora',
    'status',
    'reserva',
    'created_at',
    'updated_at',
    'deleted_at'

    ];

    public function negocio(){
        return $this->belongsTo(User::class, 'store_id' ,'id');
    }
    public function usuario(){
        return $this->belongsTo(AppUser::class, 'user_id' ,'id');
    }

    public function getFullEstadoAttribute()
    {
        $status = $this->status;

        if ($status == 1) {
            $valor =  'Pendiente';
        }
        if ($status == 2) {
            $valor =  'Cumplida';
        }
       
        if ($status == 3) {
            $valor =  'Cancelada';
        }
       
        return $valor;
    }

}
