<?php

namespace App\FormBuilder\Reports\ReportField;

use App\Field;

class TextFieldProcessor implements ReportFieldProcessing
{
    public $field;
    public $rule;
    
    use CalculateFrequency;


    public function __construct(Field $field, $rule)
    {
        $this->field = $field;
        $this->rule = $rule;
    }
    public function calculateResult()
    {
        $responses = $this->field->getResponses();
        switch ($this->rule) {
            case 'frequency':
            default:
                return $this->calculateFrequency($responses);
                break;
        }
    }
}
