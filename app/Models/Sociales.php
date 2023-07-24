<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sociales extends Model
{
    use HasFactory,SoftDeletes;

    protected $dates = [
       'updated_at',
       'created_at',
       'deleted_at',

   ];
   protected $fillable = [
    'id',
    'nombre',
    'descripcion',
    'created_at',
    'updated_at',
    'deleted_at'

    ];


    public function addNew($data,$type)
    {
    
        $add                    = $type === 'add' ? new Sociales : Sociales::find($type);
        $add->nombre            = isset($data['nombre']) ? $data['nombre'] : null;
        $add->descripcion       = isset($data['descripcion']) ? $data['descripcion'] : null;

        $add->save();

        
    }
}
