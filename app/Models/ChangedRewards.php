<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChangedRewards extends Model
{
    
    protected $table = 'changed_rewards';
    use HasFactory;

    protected $fillable = [
      'id',
      'user_id',
      'gift_card_id',
      'spent',
      'reward_code'
    ];
 
 
 
}