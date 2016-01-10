<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\FormBuilder\FieldView;
use App\FormBuilder\Rules\FieldRules;

class Field extends Model
{
    protected $validTypes = ['text', 'select', 'radio', 'number'];

    protected $typesWithOptions = ['select', 'radio'];


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
        if (in_array($this->type, $this->typesWithOptions)) {
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

    public function loadView()
    {
        switch ($this->type) {
            case 'text':
                $view = new FieldView\TextFieldView($this);
                break;
            case 'select':
                $view = new FieldView\SelectFieldView($this);
                break;
            case 'radio':
                $view = new FieldView\RadioFieldView($this);
                break;
            case 'number':
                $view = new FieldView\NumberFieldView($this);
                break;
            default:
                $view = null;
                break;
        }
        if ($view) {
            return $view->render();
        }
        return false;
    }
}
