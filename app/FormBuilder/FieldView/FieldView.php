<?php

namespace App\FormBuilder\FieldView;

use App\Field;

abstract class FieldView
{

    public $field;
    protected $type;

    abstract public function render();
    abstract protected function renderValidation();

    public function __construct(Field $field)
    {
        $this->field = $field;
        $this->type = $field->type;
    }

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
