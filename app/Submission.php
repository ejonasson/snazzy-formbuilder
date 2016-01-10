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
    public function form()
    {
        return $this->belongsTo('App\Form');
    }
}
