<?php

namespace App\FormBuilder\Reports;


use App\Field;
use App\FormBuilder\Reports\ReportField;

class ReportData
{
    public $report;
    public $reportFields;


    public function __construct(\App\Report $report)
    {
        $this->report = $report;
        $this->reportFields = $report->getReportFields();
        $this->processReportFields();
    }

    public function processReportFields()
    {
        foreach ($this->reportFields as $report_field) {
             $report_field->field = Field::find($report_field->fieldId);
             $report_field->data = $this->processReportField($report_field);
        }
        return $this->reportFields;
    }

    public function processReportField($report_field)
    {

        $field = Field::FindOrFail($report_field->fieldId);
        $rule = $report_field->reportType;

        $processor = $this->setProcessor($field, $rule);
        return $processor->calculateResult();

    }

    public function setProcessor(Field $field, $rule)
    {
        switch ($field->type) {
            case 'number':
                return new ReportField\NumberFieldProcessor($field, $rule);
                break;
            
            default:
                return new ReportField\TextFieldProcessor($field, $rule);
                break;
        }
    }

}