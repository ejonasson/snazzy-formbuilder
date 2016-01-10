<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\FormBuilder\Rules\FormRules;

class Form extends Model
{
    public function fields()
    {
        return $this->HasMany('App\Field');
    }

    public function getFields()
    {
        return $this->fields->lists('id');
    }

    public function getRules()
    {
        $rules = new FormRules($this->rules);
        return $rules->getRules();
    }

    public function submissions()
    {
        return $this->HasMany('App\Submission');
    }


    /**
     * Prepares the Fields as a JSON object (including fieldOptions)
     * @param  Form   $form form object
     * @return JSON       Fields JSON object
     */
    public function prepareJsonFields()
    {
        $prepared_fields = array();
        $form_fields = $this->fields->toArray();
        foreach ($form_fields as $form_field) {
            $field = $this->fields->find($form_field['id']);
            $form_field['hasOptions'] = $field->hasOptions();
            if ($field->hasOptions()) {
                $form_field['fieldOptions'] = $field->fieldOptions->toArray();
            }

            $prepared_fields[] = $form_field;
        }
        return json_encode($prepared_fields);
    }
}
