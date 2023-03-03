<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;

class BatchResource extends Controller
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

    public function getbatchlist($application_id)
    {
        $batches = Batch::where('application_id', $application_id)->whereYear('startdate', date('Y'))->get();
        $i = 1;
        $options[] = ['text' => '', 'id' => ''];
        foreach ($batches as $value) {
            $options[] = [
                'text' => $i++ . ': ' . date('d M Y', strtotime($value['startdate'])) . ' - ' . date('d M Y', strtotime($value['enddate'])),
                'id' => $value['id']
            ];
        }

        return response()->json($options);
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
        $data = [
            'application_id' => $request->input('application_id'),
            'startdate' => $request->input('startdate'),
            'enddate' => $request->input('enddate')
        ];
        Batch::create($data);
        return redirect()->back()->with('message', 'Jadwal PIR berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function show(Batch $batch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function edit(Batch $batch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Batch $batch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Batch $batch)
    {
        //
    }
}
