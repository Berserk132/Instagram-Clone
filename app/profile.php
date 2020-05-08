<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{

    protected $guarded = [];

    public function  user(){

        return $this->belongsTo(User::class);
    }

    public function getImage(){

        $imagePath = ($this->image) ? $this->image : 'profile/7cxcHf8GjGCrwNa7LUxJojQFS5MZfBIxTZAlmLhs.jpeg';

        return '/storage/' . $imagePath;
    }
}
