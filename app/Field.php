<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    public function form()
    {
        return $this->belongsToMany('App\Form');
    }
}
