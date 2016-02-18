<?php

namespace App\FormBuilder\Rules;

class FieldRules extends Rules
{
    public function normalize()
    {
        $this->processBoolean('required');
        
        return $this->getProcessedRules();
    }
}
