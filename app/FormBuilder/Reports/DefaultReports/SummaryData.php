<?php

namespace App\FormBuilder\Reports\DefaultReports;

use App\Form;
use App\Report;

class SummaryData
{

    public static function getReport($form_id)
    {
        $report = new Report;
        $report->title = 'Standard Report';
        $report->form_id = $form_id;

        $form = Form::findOrFail($form_id);
        $reportFields = [];
        $reportFields['reportFields'] = [];
        $reportFields['form'] = $form_id;
        foreach ($form->fields as $field) {
            $reportFields['reportFields'][$field->id]['fieldId'] = $field->id;
            $reportFields['reportFields'][$field->id]['display'] = 'text';

            switch ($field->type) {
                case 'number':
                    $reportFields['reportFields'][$field->id]['reportType'] = 'numMean';
                    break;
                default:
                    $reportFields['reportFields'][$field->id]['reportType'] = 'frequency';
                    break;
            }

            $reportFields['reportFields'] = array_values($reportFields['reportFields']);
        }
        $report->rules = json_encode($reportFields);
        return $report;
    }
}
