<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $image_url;

    function getImageUrlAttribute(){
        return $this->photo;
    }
}
