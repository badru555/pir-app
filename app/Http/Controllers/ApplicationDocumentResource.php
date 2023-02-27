<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Applicationdocument;
use App\Models\Documentobservationrisk;
use App\Models\Documentobservationriskactivity;
use App\Models\Documentprojectrisk;
use App\Models\Documentprojectriskactivity;
use App\Models\Documentprojectriskactivitymigitation;
use Illuminate\Http\Request;

class ApplicationDocumentResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.applicationdocument', [
            'applicationdocuments' => Applicationdocument::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.applicationdocumentcreate', [
            'applications' => Application::all()
        ]);
    }
    // $observationrisks = $request->input('observation_risk');
    // $documentobservationrisk_ids = [];
    // foreach ($observationrisks as $keyfase => $obs) {
    //     foreach ($obs as $keyrisk => $val) {
    //         $documentobservationriskactivity_ids = [];
    //         $documentobservationriskactivity_data = [];
    //         $activity = $request->input('activity');
    //         $observation = $request->input('observation');
    //         $status = $request->input('status');
    //         for ($i = 0; $i < count($activity); $i++) {
    //             $documentobservationriskactivity_data['activity'] = $activity[$keyfase][$keyrisk][$i];
    //             $documentobservationriskactivity_data['observation'] = $observation[$keyfase][$keyrisk][$i];
    //             $documentobservationriskactivity_data['status'] = $status[$keyfase][$keyrisk][$i];
    //             $documentobservationriskactivity = Documentobservationriskactivity::create($documentobservationriskactivity_data);
    //             array_push($documentobservationriskactivity_ids, $documentobservationriskactivity->id);
    //         }
    //         $observationrisk_data = [
    //             'fase' => $keyfase,
    //             'risk' => $val,
    //             'documentobservationriskactivity_ids' => $documentobservationriskactivity_ids
    //         ];
    //         $documentobservationrisk = Documentobservationrisk::create($observationrisk_data);
    //         array_push($documentobservationrisk_ids, $documentobservationrisk->id);
    //     }
    // }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $i = 1;
        $observationrisks = $request->input('observation_risk');
        // $dataprint = [];
        foreach ($observationrisks as $keyfase => $itemfase) {
            $documentobservationrisk_ids = [];
            foreach ($itemfase as $keyrisk => $itemrisk) {
                $documentobservationriskactivity_ids = [];
                $activity = $request->input('activity');
                $observation = $request->input('observation');
                $status = $request->input('status');

                $activities = $activity[$keyfase][$keyrisk];
                $observations = $observation[$keyfase][$keyrisk];
                $statuses = $status[$keyfase][$keyrisk];

                $merged = array_map(null, $activities, $observations, $statuses);
                foreach ($merged as $item) {
                    $documentobservationriskactivity_data = [
                        // 'id' => rand(1, 9),
                        'activity' => $item[0],
                        'observation' => $item[1],
                        'status' => $item[2],
                    ];
                    // $dataprint['activity' . $i++] = $documentobservationriskactivity_data;
                    // array_push($documentobservationriskactivity_ids, $documentobservationriskactivity_data['id']);
                    $documentobservationriskactivity = Documentobservationriskactivity::create($documentobservationriskactivity_data);
                    array_push($documentobservationriskactivity_ids, $documentobservationriskactivity->id);
                }

                $observationrisk_data = [
                    // 'id' => rand(1, 9),
                    'fase' => $keyfase,
                    'risk' => $itemrisk,
                    'documentobservationriskactivity_ids' => implode(',', $documentobservationriskactivity_ids)
                ];
                // $dataprint['observationrisk' . $i++] = $observationrisk_data;
                // array_push($documentobservationrisk_ids, $observationrisk_data['id']);
                $observationrisk = Documentobservationrisk::create($observationrisk_data);
                array_push($documentobservationrisk_ids, $observationrisk->id);
            }
        }

        $projects = $request->input('projects');


        $migitasi = $request->input('migitasi');
        $isdone = $request->input('isdone');
        $note = $request->input('note');
        $projectrisks = $request->input('project_risk');
        foreach ($projects as $keyfase => $itemfase) {
            $documentprojectriskproject_ids = [];
            foreach ($itemfase as $keyproject => $itemproject) {
                $documentprojectriskactivity_ids = [];
                foreach ($projectrisks[$keyfase][$keyproject] as $keyrisk => $itemrisk) {
                    $documentprojectriskactivitymigitation_ids = [];
                    $migitasis = $migitasi[$keyfase][$keyproject][$keyrisk];
                    $isdones = $isdone[$keyfase][$keyproject][$keyrisk];
                    $notes = $note[$keyfase][$keyproject][$keyrisk];
                    $merged = array_map(null, $migitasis, $isdones, $notes);
                    foreach ($merged as $item) {
                        $migitation_data = [
                            // 'id' => rand(1, 9),
                            'migitation' => $item[0],
                            'isdone' => $item[1],
                            'note' => $item[2]
                        ];
                        // $dataprint['migitation' . $i++] = $migitation_data;
                        // array_push($documentprojectriskactivitymigitation_ids, $migitation_data['id']);
                        $migitation = Documentprojectriskactivitymigitation::create($migitation_data);
                        array_push($documentprojectriskactivitymigitation_ids, $migitation->id);
                    }
                    $projectriskactivity_data = [
                        // 'id' => rand(1, 9),
                        'risk' => $itemrisk,
                        'documentprojectriskactivitymigitation_ids' => implode(',', $documentprojectriskactivitymigitation_ids)
                    ];
                    // $dataprint['projectrisk' . $i++] = $projectriskactivity_data;
                    // array_push($documentprojectriskactivity_ids, $projectriskactivity_data['id']);
                    $projectriskactivity = Documentprojectriskactivity::create($projectriskactivity_data);
                    array_push($documentprojectriskactivity_ids, $projectriskactivity->id);
                }
                $projects_data = [
                    // 'id' => rand(1, 9),
                    'fase' => $keyfase,
                    'project' => $itemproject,
                    'documentprojectriskactivity_ids' => implode(',', $documentprojectriskactivity_ids)
                ];
                // $dataprint['projects' . $i++] = $projects_data;
                // array_push($documentprojectriskproject_ids, $projects_data['id']);
                $projects = Documentprojectrisk::create($projects_data);
                array_push($documentprojectriskproject_ids, $projects->id);
            }
        }

        $appdoc_data = [
            'user_id' => auth()->user()->id,
            'application_id' => $request->input('application_id'),
            'batch' => $request->input('batch'),
            'documentobservationrisk_ids' => implode(',', $documentobservationrisk_ids),
            'documentprojectrisk_ids' => implode(',', $documentprojectriskproject_ids),
            'plantodo' => $request->input('planning')
        ];
        Applicationdocument::create($appdoc_data);
        return redirect('/applicationdocuments/create')->with('message', 'Dokumen PIR telah dibuat!');

        // $dataprint['appdoc'] = $appdoc_data;
        // echo '<pre>' . json_encode($dataprint, JSON_PRETTY_PRINT) . '</pre>';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Applicationdocument  $applicationdocument
     * @return \Illuminate\Http\Response
     */
    public function show(Applicationdocument $applicationdocument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Applicationdocument  $applicationdocument
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicationdocument $applicationdocument)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Applicationdocument  $applicationdocument
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicationdocument $applicationdocument)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Applicationdocument  $applicationdocument
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicationdocument $applicationdocument)
    {
        //
    }
}
