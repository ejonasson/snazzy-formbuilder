<?php

namespace App\Http\Controllers\Report;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Report;
use App\Form;

use App\FormBuilder\Reports\DefaultReports\SummaryData;
use App\FormBuilder\Reports\ReportData;

use Auth;

class ReportController extends Controller
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

        return view('reports.index', ['forms' => $forms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $forms = $user->forms->all();
        foreach ($forms as $form) {
            $form->fields = $form->fields->all();
        }
        $json = json_encode($forms);

        return view('reports.create', ['forms' => $forms, 'json' => $json]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = Report::findOrFail($id);
        $report->data = $report->getReportData();
        return view('reports.show', ['report' => $report]);
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

    public function getOverview($form_id)
    {
        $report = SummaryData::getReport($form_id);
        $report->data = $report->getReportData();
        return view('reports.show', ['report' => $report]);
    }

    public function getFormReports($form_id)
    {
        $form = Form::findOrFail($form_id);
        return view('reports.form', ['form' => $form]);
    }
}
