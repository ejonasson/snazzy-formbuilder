<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    public function getSubmissionData()
    {
        return json_decode($this->submission);

    }
    public function form()
    {
        return $this->belongsTo('App\Form');
    }
}
