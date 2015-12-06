<?php

namespace App\Http\Controllers\Form;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\FormRequest;

use App\Http\Controllers\Controller;
use App\Form;
use App\Field;
use App\FieldOption;
use Carbon\Carbon;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Form::all();
        return view('customForms.index', ['forms' => $forms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customForms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\FormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormRequest $request)
    {
        $form = new Form;
        $new_form = $this->buildForm($form, $request);
        $new_form->save();
        return redirect('forms');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $form = Form::findOrFail($id);
        return view('customForms.show', ['form' => $form]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $form = Form::findOrFail($id);
        $form->valid_fields = $this->getFieldTypes();
        $form->json_form = $form->toJson();
        $form->json_fields = $form->prepareJsonFields();
        return view('customForms.edit', ['form' => $form]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormRequest $request, $id)
    {

        $form = Form::findOrFail($id);
        $update_form = $this->buildForm($form, $request);
        $update_form->update();
        $fields = $this->updateFormFields($form, $request);
        return redirect('forms');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Builds or Modifies form based on the Reqest Object
     * @param  Form        $form    Form Object
     * @param  FormRequest $request Request object
     * @return Form               
     */
    private function buildForm(Form $form, FormRequest $request)
    {
        $form->name = $request->form_name;
        $form->description = $request->form_description;
        return $form;
    }


    private function updateFormFields(Form $form, FormRequest $request)
    {
        foreach ($request->fields as $request_key => $request_value) {
            // Currently, the default ID is set to 'unset'
            // But if we change that, we need to update it here as well

            $field = Field::findOrNew($request_key);
            
            $field->name = $request_value['name'];
            $field->description = $request_value['description'];
            $field->type = $request_value['type'];
            $field->form_id = $form->id;
            if ($field->hasOptions()) {
                $this->updateFieldOptions($field, $request_value['fieldOptions']);
            }
            $field->save();
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

    private function getFieldTypes()
    {
        $field = new Field;
        return $field->getValidTypes();
    }
}
