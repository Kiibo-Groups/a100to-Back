<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Follow extends Model
{
    use HasFactory,SoftDeletes;

    protected $dates = [
       'updated_at',
       'created_at',
       'deleted_at',

   ];
   protected $fillable = [
    'id',
    'seguido_id',
    'seguidor_id',
 
    'created_at',
    'updated_at',
    'deleted_at'

    ];

    public function usuario(){
        return $this->belongsTo(AppUser::class, 'seguido_id' ,'id');
    }

    public function seguidor(){
        return $this->belongsTo(AppUser::class, 'seguidor_id' ,'id');
    }
}
