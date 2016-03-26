<?php

namespace App\FormBuilder\FieldView;

trait renderFieldDetails
{
    public function renderTitle()
    {
        $output = '<h3 class="field-name">' . $this->field->name . '</h2>';
        $output .= '<p class="field-description">' . $this->field->description . '</p>';
        return $output;
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
