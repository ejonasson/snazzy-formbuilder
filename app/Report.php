<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\FormBuilder\Reports\ReportData;

class Report extends Model
{
    public $data;

    public function parseRules()
    {
        $rules = json_decode($this->rules);
        return $rules;
    }

    public function getReportFields()
    {
        $data = $this->parseRules();
        return $data->reportFields;
    }

    public function getReportData()
    {
        if (!isset($this->data)) {
            $this->data = new ReportData($this);
        }
        return $this->data->reportFields;
    }
}
