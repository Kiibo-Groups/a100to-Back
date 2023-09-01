<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrendingUsers extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "trending_users_xp";

    protected $fillable = [
        'user_id', // ID del usuario
        'xp', // Saldo XP de una accion en especifico
        'type' // Tipo de saldo: 0 = Positivo/Acumulativo, 1 = Negativo/Disminuye
    ];  
}
