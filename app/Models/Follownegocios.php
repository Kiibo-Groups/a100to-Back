<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Follownegocios extends Model
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
 
    'created_at',
    'updated_at',
    'deleted_at'

    ];

    public function usuario(){
        return $this->belongsTo(AppUser::class, 'user_id' ,'id');
    }

    public function negocio(){
        return $this->belongsTo(User::class, 'store_id' ,'id');
    }
}
