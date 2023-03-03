<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Respondent;
use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyResource extends Controller
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
    public function detail($id)
    {
        $surveys = Survey::with('respondent')->where('application_id', $id)->whereYear('created_at', date('Y'))->orderBy('created_at')->paginate(10);
        // $batches = Batch::where('application_id', $id)->whereYear('startdate', date('Y'))->get();
        $data = [
            'surveys' => $surveys,
            // 'batches' => $batches
        ];
        return view('dashboard.pages.surveydetail', $data);
        // echo '<pre>' . json_encode($data, JSON_PRETTY_PRINT) . '</pre>';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $np = $request->input('np');
        $findrespondent_id = Respondent::select('id')->where('np', $np)->first();
        if ($findrespondent_id) {
            $respondent_id = $findrespondent_id;
        } else {
            $respondent_data = [
                'respondentdepartment_id' => $request->input('respondentdepartment_id'),
                'name' => $request->input('name'),
                'np' => $np
            ];
            $respondent = Respondent::create($respondent_data);
            $respondent_id = $respondent->id;
        }
        $data = [
            'application_id' => $request->input('application_id'),
            'respondent_id' => $respondent_id,
            'idea' => $request->input('idea')
        ];
        for ($i = 1; $i < $request->input('length'); $i++) {
            $data["ans$i"] = $request->input("response$i");
        }
        Survey::create($data);
        $message = '<div class="alert alert-primary" role="alert">Survey berhasil diserahkan, terima kasih!</div>';
        return redirect('/application')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function show(Survey $survey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function edit(Survey $survey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Survey $survey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function destroy(Survey $survey)
    {
        //
    }
}
