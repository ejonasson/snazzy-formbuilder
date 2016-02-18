<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    public function getSubmissionData()
    {
        $submission_data = json_decode($this->submission);
        $submission_data['submission_date'] = $this->created_at->toDateString();
        $submission_data['submission_time'] = $this->created_at->toTimeString();
        return $submission_data;

    }

    public function getFieldSubmissionResponse(\App\Field $field)
    {
        $submission_data = $this->getSubmissionData();
        foreach ($submission_data as $key => $field_submission) {
            if (!is_object($field_submission)) {
                continue;
            }
            if ($field_submission->id == $field->id) {
                return $field_submission->value;
            }
        }
    }

    public function form()
    {
        return $this->belongsTo('App\Form');
    }
}
