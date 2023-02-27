<?php

namespace App\Http\Controllers;

use App\Models\Applicationdocument;
use App\Models\Documentobservationrisk;
use App\Models\Documentobservationriskactivity;
use App\Models\Documentprojectrisk;
use Illuminate\Http\Request;
use Elibyy\TCPDF\Facades\TCPDF;
use PDO;

class DraftController extends Controller
{
    public function pir(Applicationdocument $applicationdocument)
    {
        $get_observations = Documentobservationrisk::whereIn('id', explode(',', $applicationdocument->documentobservationrisk_ids))->get();
        $observations = [];
        foreach ($get_observations as $key => $value) {
            $observations[$value->fase][] = $value;
        }
        $get_migitations = Documentprojectrisk::whereIn('id', explode(',', $applicationdocument->documentprojectrisk_ids))->get();
        $migitations = [];
        foreach ($get_migitations as $key => $value) {
            $migitations[$value->fase][] = $value;
        }
        $data = [
            'applicationdocument' => $applicationdocument,
            'observations' => $observations,
            'migitations' => $migitations
        ];
        // echo '<pre>' . json_encode($data, JSON_PRETTY_PRINT) . '</pre>';
        $view = view('dashboard.draft.report', $data);
        $htmlrender = $view->render();
        $html = explode('<div style="display: none;">NEWPAGE</div>', $htmlrender);
        $pdf = new TCPDF;
        $pdf::SetTitle('PIR Document');
        for ($i = 0; $i < count($html); $i++) {
            $pdf::AddPage('L');
            $pdf::WriteHTML($html[$i], true, false, true, false, '');
        }
        $pdf::Output('Dokumen PIR.pdf');
    }
}
