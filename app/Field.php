<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{

    protected $validTypes = ['text', 'select'];

    public function getValidTypes()
    {
        return $this->validTypes;
    }


    public function forms()
    {
        return $this->belongsToMany('App\Form');
    }
}
