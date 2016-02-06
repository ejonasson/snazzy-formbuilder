<?php

namespace App\FormBuilder\FieldView;

use App\Field;

interface FieldRendering
{
    abstract public function render();
    abstract public function renderValidation();
}

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

abstract class FieldView implements FieldRendering
{

    public $field;
    protected $type;

    public function __construct(Field $field)
    {
        $this->field = $field;
        $this->type = $field->type;
    }

    use renderFieldDetails;
}
