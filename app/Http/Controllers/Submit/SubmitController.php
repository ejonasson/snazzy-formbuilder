<?php

namespace App\Http\Controllers\Submit;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Form;
use App\Submission;
use \stdClass;

class SubmitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $submission = new Submission;
        $form = Form::findorfail($id);
        $inputs = $request->all();
        $submission->submission = $this->_prepareSubmission($inputs, $form);
        $submission->form_id = $id;
        $submission->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $submission = Submission::findorfail($id);
        $data = $submission->getSubmissionData();
        return view('submissions.show', ['response' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    protected function _prepareSubmission($inputs, Form $form)
    {
        // We don't need the CSRF token, so drop it
        unset($inputs['_token']);
        $submission_data = [];
        foreach ($inputs as $field_id => $field_value) {
            $field = $form->fields->find($field_id);
            $single_submission = new StdClass;
            $single_submission->id = $field_id;
            $single_submission->name = $field->name;
            $single_submission->value = $field_value;
            $submission_data[] = $single_submission;
        }
        return json_encode($submission_data);
    }
}