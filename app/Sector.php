<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $fillable = [
        'sector_name', 'city_id', 'status'
    ];  

    public function city(){
        return $this->belongsTo(City::class)->withDefault();
    }
}
