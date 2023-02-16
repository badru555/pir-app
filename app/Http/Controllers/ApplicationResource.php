<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Applicationplatform;
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
        return view('dashboard.pages.applicationshow', ['application' => $application]);
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
