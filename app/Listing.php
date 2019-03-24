<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    public function user(){
        return $this->belongsTo('App\User')->withDefault();
    }
    public function area(){
        return $this->belongsTo('App\ListingArea', 'listing_area_id', 'id')->withDefault();
    }
}
