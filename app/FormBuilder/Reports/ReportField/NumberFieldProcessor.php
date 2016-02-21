<?php

namespace App\FormBuilder\Reports\ReportField;

use App\Field;

class NumberFieldProcessor implements ReportFieldProcessing
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
            case 'numMean':
                return $this->calculateMean($responses);
                break;
            
            default:
                return $this->calculateFrequency($responses);
                break;
        }
    }

    public function calculateMean($responses)
    {
        
        $values = [];
        foreach ($responses as $response) {
            $values[] = $response->value;
        }
        $mean = array_sum($values) / count($values);
        $field = [
                'name' => 'Average',
                'value' => $mean
                    ];
        $response_fields = [$field];
        return $response_fields;
    }
}
