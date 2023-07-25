<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialesNegocios extends Model
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
    'social_id',
    'created_at',
    'updated_at',
    'deleted_at'

    ];

    public function NombreSocial(){
        return $this->belongsTo(Sociales::class, 'store_id' ,'id');
    }

    public function addNew($data,$id)
    {
        SocialesNegocios::where('social_id',$id)->delete();
        
        $uid = isset($data['sociales']) ? $data['sociales'] : [];
        
        for($i=0;$i<count($uid);$i++)
        {
           if(isset($uid[$i]))
           {
             $add                = new SocialesNegocios;
             $add->store_id      = $uid[$i];
             $add->social_id      = $id;
             $add->save();
           }
        }
    }
}
