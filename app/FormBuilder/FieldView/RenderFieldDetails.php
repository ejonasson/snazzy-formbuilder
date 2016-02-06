<?php

namespace App\FormBuilder\FieldView;

trait renderFieldDetails
{
    public function renderTitle()
    {
        return '<h2>' . $this->field->name . '</h2>';
    }

    protected function getClasses()
    {
        return implode(' ', $this->classes);
    }

    public function getType()
    {
        return $this->type;
    }
}
