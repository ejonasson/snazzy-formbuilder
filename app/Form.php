<?php

namespace App;

use Auth;
use App\User;
use App\Field;
use App\FieldOption;
use Illuminate\Http\Request;
use App\Http\Requests\FormRequest;
use App\FormBuilder\Rules\FieldRules;
use Gate;
use Validator;
use Illuminate\Database\Eloquent\Model;
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

    public function user()
    {
        return $this->belongsTo('App\User');
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
            $form_field['fieldOptions'] = $form_field['hasOptions'] ? $field->fieldOptions->toArray() : array();

            $rules = explode('|', $form_field['rules']);
            $rules = new FieldRules($rules);
            $form_field['rules'] = $rules->toArray();
            
            $prepared_fields[] = $form_field;
        }
        return json_encode($prepared_fields);
    }

    public function updateFormFields(FormRequest $request)
    {
        foreach ($request->fields as $request_key => $request_value) {
            $field = Field::findOrNew($request_key);
            if (Gate::denies('hasFormAccess', $field)) {
                abort(403);
            }
            $field->name = $request_value['name'];
            $field->description = $request_value['description'];
            $field->type = $request_value['type'];
            $field->form_id = $this->id;

            // Generate a blank Rules Array if needed
            $rules_array = !empty($request_value['rules']) ? $request_value['rules'] : array();
            $rules = new FieldRules($rules_array);
            $field->rules = implode('|', $rules->normalize());
            
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

    /**
     * Dynamically generate our validator based on rules in each field
     * @param  [type] $request [description]
     * @return [type]          [description]
     */
    public function validateInputs($request)
    {
        $inputs = $request->all();
        // We don't need the CSRF token, so drop it
        unset($inputs['_token']);
        $validator_rules = [];
        foreach ($inputs as $key => $input) {
            $field = Field::find($key);
            if (!$field) {
                continue;
            }
            $rules = $field->getRules();
            $fieldRules = [];
            foreach ($rules as $rule => $enabled) {
                if ($enabled) {
                    $fieldRules[] = $rule;
                }
            }
            if (!empty($fieldRules)) {
                $fieldRules = implode('|', $fieldRules);
                $validator_rules[$field->id] = $fieldRules;
            }
        }
        $validator = Validator::make($request->all(), $validator_rules);
        return $validator;
    }
}
