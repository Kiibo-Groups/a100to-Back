<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tickets extends Model
{
    use HasFactory,SoftDeletes;

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
    'imagen',
    'reserva',
    'fecha',
    'descripcion',
    'created_at',
    'updated_at',
    'deleted_at'

    ];
    public function negocio(){
        return $this->belongsTo(User::class, 'id_negocio' ,'id');
    }
    public function usuario(){
        return $this->belongsTo(AppUser::class, 'id_cliente' ,'id');
    }

    public function reservacion(){
        return $this->belongsTo(Reserva::class, 'reserva' ,'id');
    } 
    
    public function dias(){
        

        $fecha = Carbon::now();
        $fechaActual = $fecha->format('Y-m-d');
        $fechaHace6Meses = $fecha->subMonths(6);
        
    }

    public function getNumDiasAttribute()
    {

        $fecha   = $this->fecha;
        $fechahoy   = Carbon::now();
      
        return $fechahoy->diffInDays($fecha);;
    }





}
