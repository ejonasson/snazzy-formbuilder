<?php

namespace App\FormBuilder\FieldTypes;

class CheckboxFieldType extends FieldType
{
    public function __construct()
    {
        $this->type = 'checkbox';
        parent::__construct();
    }
    public function hasOptions()
    {
        return true;
    }
}
