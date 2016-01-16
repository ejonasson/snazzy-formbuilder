<?php

namespace App;

use App\Field;
use App\FieldOption;
use App\Http\Requests\FormRequest;
use App\FormBuilder\Rules\FieldRules;
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
            
            $form_field['rules'] = json_decode($form_field['rules']);
            
            $prepared_fields[] = $form_field;
        }
        return json_encode($prepared_fields);
    }

    public function updateFormFields(FormRequest $request)
    {
        foreach ($request->fields as $request_key => $request_value) {
            $field = Field::findOrNew($request_key);
            $field->name = $request_value['name'];
            $field->description = $request_value['description'];
            $field->type = $request_value['type'];
            $field->form_id = $this->id;

            // Generate a blank Rules Array if needed
            $rules_array = !empty($request_value['rules']) ? $request_value['rules'] : array();
            $rules = new FieldRules($rules_array);
            $field->rules = json_encode($rules->normalize());
            $field->save();

            if ($field->hasOptions()) {
                $this->updateFieldOptions($field, $request_value['fieldOptions']);
            }
        }
    }

    /**
     * Update field options
     * @param  Field  $field
     * @return Field with updated Options
     */
    public function updateFieldOptions(Field $field, $field_options)
    {
        foreach ($field_options as $key => $value) {
            $option = FieldOption::findOrNew($key);
            $option->text = $value;
            $option->name = strtolower(str_replace(' ', '_', $value));
            $option->field_id = $field->id;
            $option->save();
        }
    }
}
