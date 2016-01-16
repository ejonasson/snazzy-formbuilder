<?php

namespace App\FormBuilder\FieldTypes;

class TextFieldType extends FieldType
{
    public function __construct()
    {
        $this->type = 'text';
        parent::__construct();
    }
}
