<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\FieldOption;
use App\Submission;
use App\FormBuilder\FieldView;
use App\FormBuilder\Rules\FieldRules;
use App\FormBuilder\FieldTypes;

class Field extends Model
{
    protected $validTypes = ['text', 'select', 'radio', 'number', 'checkbox'];

    protected $typesWithOptions = ['select', 'radio', 'checkbox'];


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function form()
    {
        return $this->belongsTo('App\Form');
    }

    public function fieldOptions()
    {
        return $this->hasMany('App\FieldOption');
    }

    /**
     * Get the supported types of forms (like text, select, etc)
     * @return array valid form types
     */
    public function getValidTypes()
    {
        return $this->validTypes;
    }
    public function getTypesWithOptions()
    {
        return $this->typesWithOptions;
    }
    
    public function hasOptions()
    {
        if ($this->typeData()->hasOptions()) {
            return true;
        }
        return false;
    }

    public function getRules()
    {
        $rules = new FieldRules($this->rules);
        return $rules->getRules();
    }


    public function isRequired()
    {
        $rules = (array) $this->getRules();
        if (in_array('required', $rules)) {
            return true;
        }
        return false;
    }

    /**
     * Gets the type data for the Field Type
     * @return class FieldType
     */
    public function typeData()
    {
        $classString = 'App\FormBuilder\FieldTypes\\' . ucfirst($this->type);
        $type = $classString . 'FieldType';
        return new $type();
    }

    /**
     * Loads the HTML for this Model
     * @return HTML
     */
    public function getView()
    {
        $view = $this->typeData()->getTypeView($this);
        return $view->render();
    }

    public function getOptionByValue($field_value)
    {
        foreach ($this->fieldOptions as $fieldOption) {
            if ($fieldOption->name == $field_value) {
                return $fieldOption;
            }
        }
    }

    /**
     * Get all Responses that exist for this field
     * @return array Responses
     */
    public function getResponses()
    {
        $responses = [];
        $form_submissions = $this->form->submissions->all();
        foreach ($form_submissions as $form_submission) {
            $responses[] = $form_submission->getFieldSubmissionResponse($this);
        }
        return $responses;
    }
    /**
     * Get responses that exist for fieldOption fields
     * We need a special function since there can be
     * multiple responses per field
     */
    public function getFieldOptionResponses()
    {
        $unique_responses = [];
        $responses = $this->getResponses();

        foreach ($responses as $response) {
            if ($response === null) {
                continue;
            }

            if (is_array($response->value)) {
                foreach ($response->value as $value) {
                    $unique_responses[] = $this->getSingleFieldOptionResponse($response, $value);
                }
            } else {
                $unique_responses[] = $this->getSingleFieldOptionResponse($response, $response->value);
            }

        }
        return $unique_responses;
    }

    public function getSingleFieldOptionResponse($response, $value)
    {
        $fieldOption = $this->getOptionByValue($value);
        $single_response = new \stdClass;
        $single_response->id = $response->id;
        $single_response->name = $response->name;
        $single_response->type = $response->type;
        $single_response->text = $fieldOption->text;
        $single_response->value = $value;
        return $single_response;
    }
}
