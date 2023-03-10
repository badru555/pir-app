<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Question;
use App\Models\Respondent;
use App\Models\Respondentdepartment;
use App\Models\Survey;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function survey(Application $application)
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

    public function checkrespondent($np, Application $application)
    {
        // $today = date('Y-m-d');
        $respondent_exist = Respondent::where('np', $np)->first();
        $now = Carbon::parse(date('Y-m-d'));
        if ($respondent_exist) {
            foreach ($application->batch as $value) {
                $startdate = $value->startdate;
                $enddate = $value->enddate;
                if ($now->isBetween($startdate, $enddate)) {
                    $check = Survey::where('application_id', $application->id)->where('respondent_id', $respondent_exist->id)->whereDate('created_at', '>=', $startdate)->whereDate('created_at', '<=', $enddate)->first();
                    if ($check) {
                        $result = [
                            'found' => true,
                            'date' => $check->created_at->format('d M Y')
                        ];
                        return response()->json($result);
                    }
                }
            }
        }
        return response()->json([
            'found' => false,
            'date' => 0
        ]);
    }
}
