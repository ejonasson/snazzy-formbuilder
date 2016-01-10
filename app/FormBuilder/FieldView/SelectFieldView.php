<?php

namespace App\FormBuilder\FieldView;

use App\Field;

class SelectFieldView extends FieldView
{

    public $classes = array('form-control', 'input-select');

    public function render()
    {

        $field = $this->field;
        $view = $this->renderTitle();
        $view .= '<select name="' . $field->id . '"';
        $view .= 'class="' . $this->getClasses();
        $view .= '">';
        $view .= $this->getOptions();
        $view .= '</select>';
        return $view;
    }

    protected function getOptions()
    {
        $optionsView = null;
        foreach ($this->field->fieldOptions as $option) {
            $optionsView .= '<option value="' . $option->name . '">';
            $optionsView .= $option->text;
            $optionsView .= '</option>';
        }
        return $optionsView;
    }
}
