<?php

namespace App\FormBuilder\FieldTypes;

class RadioFieldType extends FieldType
{
    public function __construct()
    {
        $this->type = 'radio';
        parent::__construct();
    }
    public function hasOptions()
    {
        return true;
    }
    public function canBeRequired()
    {
        return false;
    }
}
