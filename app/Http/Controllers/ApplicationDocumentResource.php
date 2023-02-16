<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Applicationdocument;
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
        //
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
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
