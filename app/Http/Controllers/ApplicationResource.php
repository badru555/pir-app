<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Applicationplatform;
use App\Models\Batch;
use App\Models\Survey;
use Illuminate\Http\Request;

class ApplicationResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Application::with('platform')->get());
        return view('dashboard.pages.application', [
            'applications' => Application::with('applicationplatform')->withCount('survey')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.applicationcreate', [
            'platforms' => Applicationplatform::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'applicationplatform_id' => $request->input('applicationplatform_id'),
            'user_id' => auth()->user()->id,
            'name' => $request->input('name'),
            'link' => $request->input('link'),
            'description' => $request->input('description')
        ];
        if ($request->hasFile('image')) {
            $data['image'] = $request->image->store('images-application');
        }
        Application::create($data);
        return redirect('/applications/create')->with('message', 'Penambahan aplikasi berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        // dd($application->applicationdocument);
        $batches = Batch::where('application_id', $application->id)->whereYear('startdate', date('Y'))->orderBy('startdate')->get();
        $surveyresult_perbatch = [];
        $i = 1;
        foreach ($batches as $value) {
            $surveys = Survey::selectRaw('application_id, SUM(ans1) sum1, SUM(ans2) sum2, SUM(ans3) sum3, SUM(ans4) sum4, SUM(ans5) sum5, SUM(ans6) sum6, SUM(ans7) sum7, SUM(ans8) sum8, SUM(ans9) sum9, SUM(ans10) sum10, SUM(ans11) sum11, SUM(ans12) sum12, SUM(ans13) sum13, SUM(ans14) sum14, SUM(ans15) sum15')
                ->where('application_id', $application->id)
                ->whereDate('created_at', '>=', $value->startdate)
                ->whereDate('created_at', '<=', $value->enddate)
                ->groupBy('application_id')
                ->get();
            $values = [];
            foreach ($surveys as $val) {
                array_push($values, $val->sum1 + $val->sum2 + $val->sum3 + $val->sum4 + $val->sum5 + $val->sum6 + $val->sum7 + $val->sum8 + $val->sum9 + $val->sum10 + $val->sum11 + $val->sum12 + $val->sum13 + $val->sum14 + $val->sum15);
            }
            $surveyresult_perbatch["PIR " . $i++] = $values;
        }
        return view('dashboard.pages.applicationshow', [
            'application' => $application,
            'surveyresult_perbatch' => $surveyresult_perbatch
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
    }
}
