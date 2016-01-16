<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use app\Field;
use app\FieldOption;
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
}
