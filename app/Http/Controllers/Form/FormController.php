<?php

namespace App\Http\Controllers\Form;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\FormRequest;

use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Form;
use App\Field;
use App\FieldOption;
use Carbon\Carbon;

class FormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['index', 'create', 'store', 'edit', 'update', 'delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $forms = $user->forms->all();
        $json = $user->forms->toJson();
        return view('customForms.index', ['forms' => $forms, 'json' => $json]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = new Form;
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

        return redirect("forms/{$new_form->id}/edit");
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
        $form->field_types_with_options = $this->getTypesWithOptions();
        $form->json_form = $form->toJson();
        $form->getSortedFields();
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
        $fields = $form->updateFormFields($request);
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
        $form = Form::findOrFail($id);
        $user = Auth::user();
        $this->authorize('delete', $form);
        $form->delete();
        return response()->json(['status' => 'success']);
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
        $form->confirmation_message = $request->form_confirmation;
        if (Auth::check()) {
            $form->user_id = Auth::user()->id;
        }
        
        return $form;
    }

    private function getFieldTypes()
    {
        $field = new Field;
        return $field->getValidTypes();
    }
    private function getTypesWithOptions()
    {
        $field = new Field;
        return $field->getTypesWithOptions();
    }
}
