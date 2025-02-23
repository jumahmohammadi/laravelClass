<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = "setting";
    protected $appends = ['image_url'];


    function getImageUrlAttribute(){
        return asset('uploads/'.$this->logo);
    }
}