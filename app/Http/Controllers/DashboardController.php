<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Survey;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $survey_count = Survey::selectRaw('MONTH(created_at) month, COUNT(*) count')->whereYear('created_at', date('Y'))->groupBy('month')->orderBy('month')->get();
        $survey_total = [];
        for ($m = 1; $m <= 12; $m++) {
            $found = false;
            foreach ($survey_count as $value) {
                if ($m == $value->month) {
                    $month = date('F', mktime(0, 0, 0, $m, 1));
                    $survey_total[] = [$month, $value->count];
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $month = date('F', mktime(0, 0, 0, $m, 1));
                $survey_total[] = [$month, 0];
            }
        }
        $survey_monthcount = Survey::selectRaw('MONTH(created_at) month, SUM(ans1) sum1, SUM(ans2) sum2, SUM(ans3) sum3, SUM(ans4) sum4, SUM(ans5) sum5, SUM(ans6) sum6, SUM(ans7) sum7, SUM(ans8) sum8, SUM(ans9) sum9, SUM(ans10) sum10, SUM(ans11) sum11, SUM(ans12) sum12, SUM(ans13) sum13, SUM(ans14) sum14, SUM(ans15) sum15')
            ->whereYear('created_at', date('Y'))->groupBy('month')->get();
        $survey_resulttotal = [];
        for ($m = 1; $m <= 12; $m++) {
            $found = false;
            foreach ($survey_monthcount as $val) {
                if ($m == $val->month) {
                    $month = date('F', mktime(0, 0, 0, $m, 1));
                    $survey_resulttotal[] = [$month, $val->sum1 + $val->sum2 + $val->sum3 + $val->sum4 + $val->sum5 + $val->sum6 + $val->sum7 + $val->sum8 + $val->sum9 + $val->sum10 + $val->sum11 + $val->sum12 + $val->sum13 + $val->sum14 + $val->sum15];
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $month = date('F', mktime(0, 0, 0, $m, 1));
                $survey_resulttotal[] = [$month, 0];
            }
        }
        // echo '<pre>' . json_encode($survey_count, JSON_PRETTY_PRINT) . '</pre>';
        $batches = Batch::whereYear('startdate', date('Y'))->get();

        $thedates = [];
        foreach ($batches as $value) {
            $thedates[$value['startdate']] = array('modifier' => 'bg-red', 'html' => $value->application->name);
        }

        $data = [
            'barchart_surveypermonth' => $survey_total,
            'barchart_surveyresulttotal' => $survey_resulttotal,
            'count' => $survey_count,
            'batches' => $batches,
            'thedates' => $thedates
        ];
        // echo '<pre>' . json_encode($data, JSON_PRETTY_PRINT) . '</pre>';
        return view('dashboard.pages.index', $data);
    }
}
