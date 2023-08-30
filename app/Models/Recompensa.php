<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recompensa extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',

    ];
    protected $fillable = [
        'id',
        'id_cliente',
        'id_negocio',
        'status',
        'reserva',
        'fecha',
        'valor',
        'descripcion',
        'created_at',
        'updated_at',
        'deleted_at'

    ];

    public function addNew($data, $type)
    {
        $count = Recompensa::where('reserva', $data['reserva'])->count();
      
        if ($count == 0) {
            $add                   = $type === 'add' ? new Recompensa() : Recompensa::find($type);
            $add->id_cliente       = isset($data['id_user']) ? $data['id_user'] : null;
            $add->id_negocio       = isset($data['id_negocio']) ? $data['id_negocio'] : null;
            $add->reserva          =  isset($data['reserva']) ? $data['reserva'] : null;
            $add->valor            = isset($data['valor']) ? $data['valor'] : null;
            $add->descripcion      = isset($data['descripcion']) ? $data['descripcion'] : null;
            $add->fecha            = Carbon::now()->format('Y-m-d');



            $add->save();
        }
    }

    public function negocio(){
        return $this->belongsTo(User::class, 'id_negocio' ,'id');
    }
    public function usuario(){
        return $this->belongsTo(AppUser::class, 'id_cliente' ,'id');
    }
    public function reservas(){
        return $this->belongsTo(Reserva::class, 'reserva' ,'id');
    }

    public function getFullEstadoAttribute()
    {
        $status = $this->status;

        if ($status == 0) {
            $valor =  'Pendiente';
        }
        if ($status == 1) {
            $valor =  'Cumplida';
        }
       
        if ($status == 3) {
            $valor =  'Cancelada';
        }
       
        return $valor;
    }
}
