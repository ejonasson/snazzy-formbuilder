<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{

    protected $validTypes = ['text', 'select', 'radio'];

    protected $typesWithOptions = ['select', 'radio'];

    /**
     * Get the supported types of forms (like text, select, etc)
     * @return array valid form types
     */
    public function getValidTypes()
    {
        return $this->validTypes;
    }
    public function getTypesWithOptions()
    {
        return $this->typesWithOptions;
    }
    public function hasOptions()
    {
        if (in_array($this->type, $this->typesWithOptions)) {
            return true;
        }
        return false;
    }

    public function form()
    {
        return $this->belongsTo('App\Form');
    }

    public function fieldOptions()
    {
        return $this->hasMany('App\FieldOption');
    }
}
