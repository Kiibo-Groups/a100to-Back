<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bloquear extends Model
{
    protected $table = 'bloquear';
    
    use HasFactory,SoftDeletes;

    protected $dates = [
       'updated_at',
       'created_at',
       'deleted_at',
   ];

   protected $fillable = [
        'id',
        'user_id',
        'user_report',
        'details', 
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
