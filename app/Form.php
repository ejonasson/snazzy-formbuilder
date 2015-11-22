<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Form extends Model
{

    public function fields()
    {
        return $this->belongsToMany('App\Field');
    }

    public function getFields()
    {
        return $this->fields->lists('id');
    }
}
