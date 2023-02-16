<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Applicationdocumentfile;
use Illuminate\Http\Request;

class ApplicationDocumentFileResource extends Controller
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
    public function create(Application $application)
    {
        return view('dashboard.pages.applicationdocumentcreate', ['application' => $application]);
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
        $application_id = $request->input('application_id');
        $data = [
            'application_id' => $application_id,
            'user_id' => auth()->user()->id,
            'label' => $request->input('name'),
            'batch' => $request->input('batch')
        ];
        if ($request->hasFile('file')) {
            $data['file'] = $request->file->store('documents-application');
        }
        Applicationdocumentfile::create($data);
        return redirect("/applications/$application_id")->with('message', 'Penambahan dokumen PIR berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Applicationdocumentfile  $applicationdocumentfile
     * @return \Illuminate\Http\Response
     */
    public function show(Applicationdocumentfile $applicationdocumentfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Applicationdocumentfile  $applicationdocumentfile
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicationdocumentfile $applicationdocumentfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Applicationdocumentfile  $applicationdocumentfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicationdocumentfile $applicationdocumentfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Applicationdocumentfile  $applicationdocumentfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicationdocumentfile $applicationdocumentfile)
    {
        //
    }
}
