<?php

namespace App\FormBuilder\FieldView;

use App\Field;

class CheckboxFieldView extends FieldView
{

    public $classes = array('form-control', 'input-checkbox');

    public function render()
    {
        $optionsView =   $this->renderTitle();
      
        foreach ($this->field->fieldOptions as $option) {
            $optionsView .= '<div class="checkbox">';
            $optionsView .= '<label>';
                
            $optionsView .= '<input type="checkbox" class="' . $this->getClasses() . '"';
            $optionsView .= 'name="' . $this->field->id . '[]"';
            $optionsView .= 'value="' . $option->name . '"';
            $optionsView .= $this->renderValidation();
            $optionsView .= '">';
                
            $optionsView .= $option->text;
            $optionsView .= '</label>';
            $optionsView .= '</div>';

        }
        return $optionsView;

    }

    protected function renderValidation()
    {
        if ($this->field->isRequired()) {
            return ' required ';
        }
    }
}
