<?php

namespace App\Models;

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

}
