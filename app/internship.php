<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class internship extends Model
{
    protected $fillable = ['sirket','aciklama','baslik','user_id','aktif'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
