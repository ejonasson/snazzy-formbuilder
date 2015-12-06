<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{

    protected $validTypes = ['text', 'select', 'radio'];

    protected $typesWithOptions = ['select'];

    /**
     * Get the supported types of forms (like text, select, etc)
     * @return array valid form types
     */
    public function getValidTypes()
    {
        return $this->validTypes;
    }
    public function hasOptions()
    {
        if (in_array($this->type, $this->typesWithOptions)) {
            return true;
        }
        return false;
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
     * Prepares the Fields as a JSON object (including fieldOptions)
     * @param  Form   $form form object
     * @return JSON       Fields JSON object
     */
    private function prepareJsonFields()
    {
        $prepared_fields = array();
        $form_fields = $this->fields->toArray();
        foreach ($form_fields as $form_field) {
            $field = $this->fields($form_field['id'])->first();
            //dd($field);
            if ($field->hasOptions()) {
                $form_field['fieldOptions'] = $field->fieldOptions->toArray();
            }
            $prepared_fields[] = $form_field;
        }
        dd($prepared_fields);
        return json_encode($prepared_fields);
    }
}
