<?php

namespace App\FormBuilder\FieldTypes;

class NumberFieldType extends FieldType
{
    public function __construct()
    {
        $this->type = 'number';
        parent::__construct();
    }
}
