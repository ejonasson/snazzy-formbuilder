<?php

namespace App\FormBuilder\FieldTypes;

class SelectFieldType extends FieldType
{
    public function __construct()
    {
        $this->type = 'select';
        parent::__construct();
    }
    public function hasOptions()
    {
        return true;
    }
}
