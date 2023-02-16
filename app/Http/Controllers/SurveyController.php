<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Question;
use App\Models\Respondentdepartment;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index(Application $application)
    {
        return view('questionare.survey', [
            'questions' => Question::all(),
            'application' => $application,
            'departments' => Respondentdepartment::all()
        ]);
    }

    public function application()
    {
        return view('questionare.application', ['applications' => Application::all()]);
    }
}
