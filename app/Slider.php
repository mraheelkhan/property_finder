<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'slider_name', 'status', 'user_id'
    ];
    public function user(){
        return $this->belongsTo('App\User')->withDefault();
    }
}
