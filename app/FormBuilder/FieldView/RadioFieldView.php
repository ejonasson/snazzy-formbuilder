<?php

namespace App\FormBuilder\FieldView;

use App\Field;

class RadioFieldView extends FieldView
{

    public $classes = array('form-control', 'input-radio');

    public function render()
    {

        $field = $this->field;
        $view = $this->renderTitle();
        $view .= $this->getOptions();
        return $view;
    }

    protected function getOptions()
    {
        $optionsView = null;
        $looped = false;
        foreach ($this->field->fieldOptions as $option) {
            $optionsView .= '<div class="radio">';
            $optionsView .= '<label>';
                
            $optionsView .= '<input type="radio" class="' . $this->getClasses() . '"';
            $optionsView .= 'name="' . $this->field->id . '"';
            $optionsView .= 'value="' . $option->name . '"';
            if (!$looped) {
                $optionsView .= 'checked="checked"';
                $looped = true;
            }
            $optionsView .= '">';
                
            $optionsView .= $option->text;
            $optionsView .= '</label>';
            $optionsView .= '</div>';
            $looped = true;
        }
        return $optionsView;
    }

    protected function renderValidation()
    {
        //
    }
}
