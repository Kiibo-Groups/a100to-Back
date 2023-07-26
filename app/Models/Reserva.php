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
    'fecha',
    'hora',
    'status',
    'created_at',
    'updated_at',
    'deleted_at'

    ];
}
