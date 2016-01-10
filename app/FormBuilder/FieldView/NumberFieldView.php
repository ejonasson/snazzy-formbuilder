<?php

namespace App\FormBuilder\FieldView;

use App\Field;

class NumberFieldView extends FieldView
{

    public $classes = array('form-control', 'input-text');

    public function render()
    {
        $field = $this->field;
        $view = $this->renderTitle();
        $view .= '<input type="number" name="' . $field->id . '"';
        $view .= 'class="' . $this->getClasses();
        $view .= $this->renderValidation();
        $view .= '">';
        return $view;
    }

    protected function renderValidation()
    {
        if ($this->field->isRequired()) {
            return ' required ';
        }
    }
}
