<?php

namespace App\FormBuilder\Reports\ReportField;

use App\FieldOption;

trait CalculateFrequency
{
    public function calculateFrequency($responses)
    {
        $frequencies = [];

        foreach ($responses as $response) {
            if (!isset($response->value)) {
                continue;
            }
            if (isset($frequencies[$response->value])) {
                $frequencies[$response->value]['count']++;
            } else {
                $frequencies[$response->value]['count'] = 1;
                $frequencies[$response->value]['name'] = isset($response->optionText) ? $response->optionText : $response->value;
            }
        }
        ksort($frequencies);
        return $frequencies;
    }
}
