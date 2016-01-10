<?php

namespace App\FormBuilder\Rules;

abstract class Rules
{
    public $rules;

    public function __construct($json)
    {
        $this->rules = json_decode($json);
    }

    public function getRules()
    {
        return $this->rules;
    }
}
