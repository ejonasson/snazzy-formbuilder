<?php

namespace App\FormBuilder\Reports\ReportField;

use App\Field;

class NumberFieldProcessor implements ReportFieldProcessing
{
    public $field;
    public $rule;
    
    public function __construct(Field $field, $rule)
    {
        $this->field = $field;
        $this->rule = $rule;
    }
    public function calculateResult()
    {
        $responses = $this->field->getResponses();
        switch ($this->rule) {
            case 'numMean':
                return array_sum($responses) / count($responses);
                break;
            
            default:
                # code...
                break;
        }
    }
}
