<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceProvider extends Model
{
    protected $fillable = [ 'user_id', 'electrical_systems', 'concrete', 'steel_frames', 'ceiling', 'masonry', 'plumbing', 'windows', 'labour', 'transport', 'comment'];

}