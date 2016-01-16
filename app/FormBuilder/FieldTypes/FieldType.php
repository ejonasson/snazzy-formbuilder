<?php

namespace App\FormBuilder\FieldTypes;

use App\FormBuilder\FieldView;
use App\Field;

abstract class FieldType
{
    protected $type;
    protected $view;

    public function __construct()
    {
        //
    }

    public function getType()
    {
        return $this->type;
    }

    public function hasOptions()
    {
        return false;
    }

    public function canBeRequired()
    {
        return true;
    }

    public function getTypeView(Field $field)
    {
        $string = 'App\FormBuilder\FieldView\\' . ucfirst($this->type);
        $type = $string . 'FieldView';
        return new $type($field);
    }
}
