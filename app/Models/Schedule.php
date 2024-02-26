<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{

  protected $table = 'schedules';

  protected $guarded = ['id'];

  public function day() {
    return $this->belongsTo(Day::class);
  }

  public function hora() {
    return $this->belongsTo(Hora::class);
  }

}