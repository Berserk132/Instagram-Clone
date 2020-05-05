<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    // don't guard any field in database
    protected $guarded = [];

    public function user(){

        return $this->belongsTo(User::class);
    }
}
