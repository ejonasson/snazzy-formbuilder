<?php

namespace App\FormBuilder\Rules;

/**
 * "Rules" are passed in from the form editor page
 *  And then are normalized here to be easily readable/storable.
 */
abstract class Rules
{
    public $rules;
    public $processed_rules;


    public function __construct($rules)
    {
        $this->rules = $rules;
        $this->processed_rules = array();
    }

    public function getRules()
    {
        return $this->rules;
    }

    public function getProcessedRules()
    {
        return $this->processed_rules;
    }

    /**
     * Checks to see if a rule exists by name
     * Adds a true rule if it does
     * @param  string $rule_name
     * @return $this
     */
    protected function processBoolean($rule_name)
    {
        if (array_key_exists($rule_name, $this->rules)) {
            $rule[] = $rule_name;
            $this->add($rule);
        }
        return $this;
    }

    protected function getBoolean($rule_name)
    {
        if (in_array($rule_name, $this->rules)) {
            return true;
        }
        return false;
    }

    /**
     * Add a rule to the array of processed rules
     * @param array $rule [description]
     */
    public function add(array $rule)
    {
        $this->processed_rules = array_merge($this->processed_rules, $rule);
        return $this;
    }



    abstract public function normalize();
}
