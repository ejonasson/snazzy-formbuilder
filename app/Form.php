<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    public function field()
    {
        return $this->belongsToMany('App\Field');
    }
}
