<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Survey;
use App\Models\Respondent;
use Illuminate\Http\Request;
use App\Exports\SurveysExport;
use Maatwebsite\Excel\Facades\Excel;

class SurveyResource extends Controller
{
    public function export($id)
    {
        $surveys = Survey::with('respondent')->where('application_id', $id)->whereYear('created_at', date('Y'))->orderBy('created_at')->get();
        $result = [];
        $result[] = ['No', 'Responden', 'Nilai Kepuasan', 'Waktu Survey'];
        $i = 1;
        foreach ($surveys as $key => $item) {
            $result[] = [$i++, $item->respondent->name, $item->ans1 + $item->ans2 + $item->ans3 + $item->ans4 + $item->ans5 + $item->ans6 + $item->ans7 + $item->ans8 + $item->ans9 + $item->ans10 + $item->ans11 + $item->ans12 + $item->ans13 + $item->ans14 + $item->ans15 + $item->ans16 + $item->ans17 + $item->ans18 + $item->ans19 + $item->ans20, $item->created_at->format('d M Y H:m')];
        }
        $export = new SurveysExport($result);
        return Excel::download($export, 'surveys.xlsx');
    }
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
            $respondent_id = $findrespondent_id->id;
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
