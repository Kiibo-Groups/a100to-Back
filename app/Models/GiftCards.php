<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GiftCards extends Model
{
    
    protected $table = 'gift_cards';
    use HasFactory;

    protected $fillable = [
      'logo',
      'name',
      'descript',
      'codigo',
      'trending',
      'stock_g',
      'recompensas',
      'codigos',
      'status'
    ];

    public function getAll()
    {
      return GiftCards::get();
    }

    public function getGiftCards()
    {
      $req   = GiftCards::where('status',0)->get();
      $data  = [];
    
      foreach ($req as $key => $value) {   
        $data[] = [
          'id' => $value->id,
          'logo' => asset('upload/giftcards/'.$value->logo),
          'name' => $value->name,
          'descript' => $value->descript,
          'trending' => $value->trending,
          'stock_g'  => $value->stock_g,
          'recompensas' => json_decode($value->recompensas, true),
          'codigos' => json_decode($value->codigos, true),
          'created'  => $value->created_at
        ];
      }

      return $data;
    }

    public function getGiftCard($id)
    {
      $value   = GiftCards::find($id);
      $data  = [];
    
      $data = [
        'id' => $value->id,
        'logo' => asset('upload/giftcards/'.$value->logo),
        'name' => $value->name,
        'descript' => $value->descript,
        'codigo'   => $value->codigo,
        'trending' => $value->trending,
        'stock_g'  => $value->stock_g,
        'recompensas' => json_decode($value->recompensas, true),
        'codigos' => json_decode($value->codigos, true),
        'created'  => $value->created_at
      ];

      return $data;
    }
}