<?php

namespace App\FormBuilder\FieldView;

use App\Field;

interface FieldRendering
{
    abstract public function render();
    abstract public function renderValidation();
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
