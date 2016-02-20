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
                $frequencies[$response->value]['value']++;
            } else {
                $frequencies[$response->value]['value'] = 1;
                $frequencies[$response->value]['name'] = isset($response->text)
                ? $response->text : $response->value;
            }
        }
        ksort($frequencies);
        return $frequencies;
    }
}
