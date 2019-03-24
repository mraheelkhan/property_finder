<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListingArea extends Model
{
    protected $fillable = [
        'area_name', 'sector_name', 'city_id', 'status'
    ];  

    public function sector(){
        return $this->belongsTo('App\Sector', 'sector_name', 'id')->withDefault();
    }
}
