<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'listing_id', 'comment_body', 'status'];

    public function user(){
        return $this->belongsTo(User::class)->withDefault();
    }
    public function listing(){
        return $this->belongsTo(Listing::class)->withDefault();
    }
}
